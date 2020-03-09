<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('user_model');

        if ($this->session->userdata('level') == "user" and $this->session->userdata('status') == "Tidak Aktif") {
            $this->session->sess_destroy();
            $data['pesan'] = "Maaf Anda Belum Aktif, Tolong Hubungi Admin";
            $data['title'] = 'Login User';
            $this->load->view('auth/template/header', $data);
            $this->load->view('auth/login', $data);
        } elseif ($this->session->userdata('level') != "user" and $this->session->userdata('level') != "admin") {
            redirect('auth', 'refresh');
        }
    }

    public function index()
    {
        if ($this->session->userdata('level') == "admin") {
            redirect('admin', 'refresh');
        }
        $data['title'] = 'User Dashboard';
        $this->load->view('user/header', $data);
        $this->load->view('user/index');
    }

    public function hapusDataUser($id)
    {

        $this->user_model->hapusDataUser($id);
        $this->session->flashdata('flash-data-hapus', 'Dihapus');
        redirect('user/list', 'refresh');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail User';
        $data['user'] = $this->user_model->getUserById($id);
        $this->load->view('admin/template/header', $data);
        $this->load->view('user/detail', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Form Edit User';
        $data['user'] = $this->user_model->getUserById($id);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/template/header', $data);
            $this->load->view('user/edit', $data);
        } else {
            $this->user_model->ubahDataUser();
            $this->session->set_flashdata('flash-data', 'diedit');
            redirect('user/listUser', 'refresh');
        }
    }

    public function listUser()
    {
        if ($this->session->userdata('level') == "user") {
            redirect('user', 'refresh');
        } elseif ($this->session->userdata('level') == "admin") {
            $data['title'] = 'Data Admin';
            $data['user'] = $this->user_model->getAllUser();
            if ($this->input->post('keyword')) {
                $data['user'] = $this->user_model->cariDataUser();
            }
            $this->load->view('admin/template/header', $data);
            $this->load->view('user/list', $data);
        } else {
            redirect('auth', 'refresh');
        }
    }
}
