<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mahasiswa extends CI_Controller
{
    //fungsi yang akan dijalankan saat classnya diinstansiasi
    // public function __construct()
    // {
    //     //digunakan untuk menjalankan fungsi construct pada class parent(ci_controller)
    //     parent::__construct();
    //     $this->load->database();
    // }


    public function index()
    {
        $this->load->model('mahasiswa_model');
        //modul untuk load database
        // $this->load->database();
        $data['title'] = 'List Mahasiswa';
        $data['mahasiswa'] = $this->mahasiswa_model->getAllMahasiswa();
        $this->load->view('template/header', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('template/footer');
    }
}

/* End of file Controllername.php */
