<?php
defined('BASEPATH') or exit('No direct script access allowed');

class barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('barang_model');
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
        $data = array(
            'title' => 'List Barang',
            'barang' =>  $this->barang_model->datatabels()
        );
        if ($this->input->post('keyword')) {
            #code..
            $data['barang'] = $this->barang_model->cariDataBarang();
        }
        $status_login = $this->session->userdata('level');
        if ($status_login == 'admin') {
            $this->load->view('admin/template/header', $data);
            $this->load->view('barang/index', $data);
            $this->load->view('template/footer');
        } elseif ($status_login == 'user') {
            $this->load->view('user/header', $data);
            $this->load->view('barang/index', $data);
            $this->load->view('template/footer');
        } elseif ($status_login == 'kalab') {
            $this->load->view('template/header', $data);
            $this->load->view('barang/index', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function tambah()
    {
        $status_login = $this->session->userdata('level');
        if ($status_login == 'user') {
            redirect('barang', 'refresh');
        } elseif ($status_login == 'admin' || $status_login == 'kalab') {
            $data['title'] = 'Form Menambahkan Data Barang';
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama_barang', 'Nama_barang', 'trim|required');
            $this->form_validation->set_rules('merk', 'Merk', 'trim|required');
            $this->form_validation->set_rules('jumlah_barang', 'Jumlah_barang', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data);
                $this->load->view('barang/tambah', $data);
                $this->load->view('template/footer');
            } else {
                $this->barang_model->tambahDataBarang();
                $this->session->set_flashdata('flash-data', 'ditambahkan');
                redirect('barang', 'refresh');
            }
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function hapus($id)
    {
        $status_login = $this->session->userdata('level');
        if ($status_login == 'user') {
            redirect('barang', 'refresh');
        } elseif ($status_login == 'admin' || $status_login == 'kalab') {
            $this->barang_model->hapusDataBarang($id);
            $this->session->flashdata('flash-data-hapus', 'Dihapus');
            redirect('barang', 'refresh');
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Barang';
        $data['barang'] = $this->barang_model->getBarangById($id);
        $this->load->view('template/header', $data);
        $this->load->view('barang/detail', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $status_login = $this->session->userdata('level');
        if ($status_login == 'user') {
            redirect('barang', 'refresh');
        } elseif ($status_login == 'admin' || $status_login == 'kalab') {
            $data['title'] = 'Form Edit Barang';
            $data['barang'] = $this->barang_model->getBarangById($id);
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama_barang', 'Nama_barang', 'trim|required');
            $this->form_validation->set_rules('merk', 'Merk', 'trim|required');
            $this->form_validation->set_rules('jumlah_barang', 'Jumlah_barang', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data);
                $this->load->view('barang/edit', $data);
                $this->load->view('template/footer');
            } else {
                $this->barang_model->ubahDataBarang();
                $this->session->set_flashdata('flash-data', 'diedit');
                redirect('barang', 'refresh');
            }
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function cetakLaporan()
    {
        $data['title'] = 'Laporan Barang';
        $data['barang'] = $this->cetak_model->viewBarang();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_barang.pdf";
        $this->pdf->load_view('barang/laporan', $data);
    }
}
