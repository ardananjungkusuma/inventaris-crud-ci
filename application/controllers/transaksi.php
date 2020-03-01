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
    }


    public function index()
    {
        $data['title'] = 'List Transaksi Inventaris JTI';
        $data['transaksi'] = $this->transaksi_model->getAllTransaksiUserKategori();
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
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Peminjaman';
        $data['transaksi'] = $this->transaksi_model->getAllTransaksiUserKategoriById($id);
        $this->load->view('template/header', $data);
        $this->load->view('transaksi/detail', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
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
    }
}

/* End of file Controllername.php */
