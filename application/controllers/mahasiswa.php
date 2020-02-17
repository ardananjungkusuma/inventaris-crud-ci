<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mahasiswa extends CI_Controller
{
    //fungsi yang akan dijalankan saat classnya diinstansiasi
    public function __construct()
    {
        //digunakan untuk menjalankan fungsi construct pada class parent(ci_controller)
        parent::__construct();
        $this->load->model('mahasiswa_model');
    }


    public function index()
    {
        //modul untuk load database
        // $this->load->database();
        $data['title'] = 'List Mahasiswa';
        $data['mahasiswa'] = $this->mahasiswa_model->getAllMahasiswa();
        if ($this->input->post('keyword')) {
            #code..
            $data['mahasiswa'] = $this->mahasiswa_model->cariDataMahasiswa();
        }
        $this->load->view('template/header', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Form Menambahkan Data Mahasiswa';
        $data['jurusan'] = ['Teknologi Informasi', 'kimia', 'Teknik Industri', 'mesin'];
        $this->load->library('form_validation');

        // $this->$this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'Nim', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');


        if ($this->form_validation->run() == FALSE) {
            #code...
            $this->load->view('template/header', $data);
            $this->load->view('mahasiswa/tambah', $data);
            $this->load->view('template/footer');
        } else {
            #code...
            $this->mahasiswa_model->tambahdatamhs();
            $this->session->set_flashdata('flash-data', 'ditambahkan');
            redirect('mahasiswa', 'refresh');
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
