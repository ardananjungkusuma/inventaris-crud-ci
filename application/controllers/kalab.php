<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kalab extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('kalab_model');

        if ($this->session->userdata('level') == "user") {
            redirect('user', 'refresh');
        } elseif ($this->session->userdata('level') == "user" and $this->session->userdata('status') == "Tidak Aktif") {
            $this->session->sess_destroy();
            $data['pesan'] = "Maaf Anda Belum Aktif, Tolong Hubungi Admin";
            $data['title'] = 'Login User';
            $this->load->view('auth/template/header', $data);
            $this->load->view('auth/login', $data);
        } elseif ($this->session->userdata('level') != "kalab") {
            redirect('auth', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Kalab Dashboard';
        $this->load->view('kalab/template/header', $data);
        $this->load->view('kalab/index');
    }
}
