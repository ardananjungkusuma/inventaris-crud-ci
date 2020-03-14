<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mahasiswa_model');
        $this->load->model('cetak_model');

        if ($this->session->userdata('level') == "kalab" and $this->session->userdata('status') == "Tidak Aktif") {
            $this->session->sess_destroy();
            $data['pesan'] = "Maaf Anda Belum Aktif, Tolong Hubungi Admin";
            $data['title'] = 'Login User';
            $this->load->view('auth/template/header', $data);
            $this->load->view('auth/login', $data);
        } elseif ($this->session->userdata('level') == "user") {
            redirect('user', 'refresh');
        } elseif ($this->session->userdata('level') != "kalab" and $this->session->userdata('level') != "admin" and $this->session->userdata('level') != "user") {
            redirect('auth', 'refresh');
        }
    }


    public function index()
    {
        $data['title'] = 'List Mahasiswa';
        $data['mahasiswa'] = $this->mahasiswa_model->datatabels();
        if ($this->input->post('keyword')) {
            #code..
            $data['mahasiswa'] = $this->mahasiswa_model->cariDataMahasiswa();
        }
        $status_login = $this->session->userdata('level');
        if ($status_login == 'admin') {
            $this->load->view('admin/template/header', $data);
            $this->load->view('mahasiswa/index', $data);
            $this->load->view('template/footer');
        } elseif ($status_login == 'kalab') {
            $this->load->view('template/header', $data);
            $this->load->view('mahasiswa/index', $data);
            $this->load->view('template/footer');
        } elseif ($status_login == 'user') {
            redirect('user', 'refresh');
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
            $data['title'] = 'Form Menambahkan Data Mahasiswa';
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('nim', 'Nim', 'trim|required');
            $this->form_validation->set_rules('no_hp', 'No_hp', 'trim|required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data);
                $this->load->view('mahasiswa/tambah', $data);
                $this->load->view('template/footer');
            } else {
                $this->mahasiswa_model->tambahDataMahasiswa();
                $this->session->set_flashdata('flash-data', 'ditambahkan');
                redirect('mahasiswa', 'refresh');
            }
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function hapusDataMahasiswa($id)
    {
        $status_login = $this->session->userdata('level');
        if ($status_login == 'user') {
            redirect('transaksi', 'refresh');
        } elseif ($status_login == 'admin' || $status_login == 'kalab') {
            $this->mahasiswa_model->hapusDataMahasiswa($id);
            $this->session->flashdata('flash-data-hapus', 'Dihapus');
            redirect('mahasiswa', 'refresh');
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function detail($id)
    {
        $status_login = $this->session->userdata('level');
        if ($status_login == 'user') {
            redirect('transaksi', 'refresh');
        } elseif ($status_login == 'admin' || $status_login == 'kalab') {
            $data['title'] = 'Detail Mahasiswa';
            $data['mahasiswa'] = $this->mahasiswa_model->getMahasiswaById($id);
            $this->load->view('template/header', $data);
            $this->load->view('mahasiswa/detail', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function edit($id)
    {
        $status_login = $this->session->userdata('level');
        if ($status_login == 'user') {
            redirect('transaksi', 'refresh');
        } elseif ($status_login == 'admin' || $status_login == 'kalab') {
            $data['title'] = 'Form Edit Mahasiswa';
            $data['mahasiswa'] = $this->mahasiswa_model->getMahasiswaById($id);
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('nim', 'Nim', 'trim|required');
            $this->form_validation->set_rules('no_hp', 'No_hp', 'trim|required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');


            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data);
                $this->load->view('mahasiswa/edit', $data);
                $this->load->view('template/footer');
            } else {
                $this->mahasiswa_model->ubahDataMahasiswa();
                $this->session->set_flashdata('flash-data', 'diedit');
                redirect('mahasiswa', 'refresh');
            }
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function cetak_laporan()
    {
        $data['title'] = 'Laporan Mahasiswa';
        $data['mahasiswa'] = $this->cetak_model->viewMahasiswa();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_mahasiswa.pdf";
        $this->pdf->load_view('mahasiswa/laporan', $data);
    }
}
