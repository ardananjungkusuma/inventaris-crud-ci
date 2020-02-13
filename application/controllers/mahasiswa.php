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
        $this->load->view('template/header', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Form Menambahkan Data Mahasiswa';

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
            redirect('mahasiswa', 'refresh');
        }
    }
}

/* End of file Controllername.php */
