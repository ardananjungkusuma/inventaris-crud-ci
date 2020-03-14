<?php
defined('BASEPATH') or exit('No direct script access allowed');

class transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_model');
        $this->load->model('barang_model');
        $this->load->model('mahasiswa_model');
        $this->load->model('cetak_model');

        if ($this->session->userdata('level') == "user" and $this->session->userdata('status') == "Tidak Aktif") {
            $this->session->sess_destroy();
            $data['pesan'] = "Maaf Anda Belum Aktif, Tolong Hubungi Admin";
            $data['title'] = 'Login User';
            $this->load->view('auth/template/header', $data);
            $this->load->view('auth/login', $data);
        } elseif ($this->session->userdata('level') == "kalab" and $this->session->userdata('status') == "Tidak Aktif") {
            $this->session->sess_destroy();
            $data['pesan'] = "Maaf Anda Belum Aktif, Tolong Hubungi Admin";
            $data['title'] = 'Login User';
            $this->load->view('auth/template/header', $data);
            $this->load->view('auth/login', $data);
        } elseif ($this->session->userdata('level') != "user" and $this->session->userdata('level') != "admin" and $this->session->userdata('level') != "kalab") {
            redirect('auth', 'refresh');
        }
    }


    public function index()
    {
        $data['title'] = 'List Transaksi Inventaris JTI';
        // $data['transaksi'] = $this->transaksi_model->getAllTransaksiUserKategori();
        $data['transaksi'] = $this->transaksi_model->datatabels();
        if ($this->input->post('keyword')) {
            #code..
            $data['transaksi'] = $this->transaksi_model->cariDataTransaksi();
        }
        $status_login = $this->session->userdata('level');
        if ($status_login == 'admin') {
            $this->load->view('admin/template/header', $data);
            $this->load->view('transaksi/index', $data);
            $this->load->view('template/footer');
        } elseif ($status_login == 'user') {
            $this->load->view('user/header', $data);
            $this->load->view('transaksi/index', $data);
            $this->load->view('template/footer');
        } elseif ($status_login == 'kalab') {
            $this->load->view('template/header', $data);
            $this->load->view('transaksi/index', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function tambah()
    {
        $status_login = $this->session->userdata('level');
        if ($status_login == 'user') {
            redirect('transaksi', 'refresh');
        } elseif ($status_login == 'admin' || $status_login == 'kalab') {
            $data['title'] = 'Form Menambahkan Data Transaksi';
            $this->load->library('form_validation');
            $data['barang'] = $this->barang_model->getAllBarang();
            $data['mahasiswa'] = $this->mahasiswa_model->getAllMahasiswa();
            $this->form_validation->set_rules('id_barang', 'Id_barang', 'required');
            $this->form_validation->set_rules('id_mahasiswa', 'Id_mahasiswa', 'required');

            if ($this->form_validation->run() == FALSE) {
                #code...
                $this->load->view('template/header', $data);
                $this->load->view('transaksi/tambah', $data);
                $this->load->view('template/footer');
            } else {
                #code...
                $this->transaksi_model->tambahdatatransaksi();
                $this->session->set_flashdata('flash-data', 'Data Ditambahkan');
                redirect('transaksi', 'refresh');
            }
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function detail($id)
    {
        $status_login = $this->session->userdata('level');
        if ($status_login == 'user') {
            $data['title'] = 'Detail Peminjaman';
            $data['transaksi'] = $this->transaksi_model->getAllTransaksiUserKategoriById($id);
            $this->load->view('user/header', $data);
            $this->load->view('transaksi/detail', $data);
            $this->load->view('template/footer');
        } elseif ($status_login == 'admin' || $status_login == 'kalab') {
            $data['title'] = 'Detail Peminjaman';
            $data['transaksi'] = $this->transaksi_model->getAllTransaksiUserKategoriById($id);
            $this->load->view('template/header', $data);
            $this->load->view('transaksi/detail', $data);
            $this->load->view('template/footer');
        }
    }

    public function edit($id)
    {
        $status_login = $this->session->userdata('level');
        if ($status_login == 'user') {
            redirect('transaksi', 'refresh');
        } elseif ($status_login == 'admin' || $status_login == 'kalab') {
            $data['title'] = 'Form Edit Peminjaman';
            $data['transaksi'] = $this->transaksi_model->getAllTransaksiUserKategoriById($id);
            $this->load->library('form_validation');
            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('tanggal_dikembalikan', 'Tanggal_dikembalikan', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data);
                $this->load->view('transaksi/edit', $data);
                $this->load->view('template/footer');
            } else {
                $this->transaksi_model->ubahDataTransaksi($id);
                $this->session->set_flashdata('flash-data', 'diedit');
                redirect('transaksi', 'refresh');
            }
        } else {
            redirect('auth', 'refresh');
        }
    }

    function json()
    {
        header('Content-Type: application/json');
        echo $this->transaksi_model->json();
    }

    public function cetakLaporan()
    {
        $data['title'] = 'Laporan Transaksi';
        $data['transaksi'] = $this->cetak_model->viewTransaksi();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "laporan_transaksi.pdf";
        $this->pdf->load_view('transaksi/laporan', $data);
    }
}

/* End of file Controllername.php */
