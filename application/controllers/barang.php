<?php
defined('BASEPATH') or exit('No direct script access allowed');

class barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('barang_model');
    }


    public function index()
    {
        $data['title'] = 'List Barang';
        $data['barang'] = $this->barang_model->getAllBarang();
        if ($this->input->post('keyword')) {
            #code..
            $data['barang'] = $this->barang_model->cariDataBarang();
        }
        $this->load->view('template/header', $data);
        $this->load->view('barang/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
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
    }

    public function hapus($id)
    {

        $this->barang_model->hapusDataBarang($id);
        $this->session->flashdata('flash-data-hapus', 'Dihapus');
        redirect('barang', 'refresh');
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
    }
}
