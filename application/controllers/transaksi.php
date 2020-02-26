<?php
defined('BASEPATH') or exit('No direct script access allowed');

class transaksi extends CI_Controller
{
    //fungsi yang akan dijalankan saat classnya diinstansiasi
    public function __construct()
    {
        //digunakan untuk menjalankan fungsi construct pada class parent(ci_controller)
        parent::__construct();
        $this->load->model('transaksi_model');
    }


    public function index()
    {
        //modul untuk load database
        // $this->load->database();
        $data['title'] = 'List Transaksi Inventaris JTI';
        $data['transaksi'] = $this->transaksi_model->getAllTransaksi();
        $data['gabungan'] = $this->transaksi_model->getAllTransaksiUserKategori();
        if ($this->input->post('keyword')) {
            #code..
            $data['transaksi'] = $this->transaksi_model->cariDataTransaksi();
        }
        $this->load->view('template/header', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Form Menambahkan Data Transaksi';
        $this->load->library('form_validation');
        $data['pegawai'] = $this->transaksi_model->getAllPegawai();
        $data['kategori'] = $this->transaksi_model->getAllKategori();
        $this->form_validation->set_rules('id_user', 'Id_user', 'required');
        $this->form_validation->set_rules('id_kategori', 'Id_kategori', 'required');
        $this->form_validation->set_rules('jumlah_nominal', 'Jumlah_nominal', 'required');


        if ($this->form_validation->run() == FALSE) {
            #code...
            $this->load->view('template/header', $data);
            $this->load->view('transaksi/tambah', $data);
            $this->load->view('template/footer');
        } else {
            #code...
            $this->transaksi_model->tambahdatatransaksi();
            $this->session->set_flashdata('flash-data', 'ditambahkan');
            redirect('transaksi', 'refresh');
        }
    }

    public function hapus($id)
    {
        $this->mahasiswa_model->hapusdatamhs($id);
        //untuk flashdata memiliki 2 parameter (nama flashdata/alias, isi flashdata)
        $this->session->flashdata('flash-data-hapus', 'Dihapus');
        redirect('mahasiswa', 'refresh');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Mahasiswa';
        $data['mahasiswa'] = $this->mahasiswa_model->getmahasiswabyid($id);
        $this->load->view('template/header', $data);
        $this->load->view('mahasiswa/detail', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Form Edit Mahasiswa';
        $data['mahasiswa'] = $this->mahasiswa_model->getmahasiswabyid($id);
        $data['jurusan'] = ['Teknologi Informasi', 'kimia', 'Teknik Industri', 'mesin'];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'Nim', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('mahasiswa/edit', $data);
            $this->load->view('template/footer');
        } else {
            $this->mahasiswa_model->ubahdatamhs();
            $this->session->set_flashdata('flash-data', 'diedit');
            redirect('mahasiswa', 'refresh');
        }
    }
}

/* End of file Controllername.php */
