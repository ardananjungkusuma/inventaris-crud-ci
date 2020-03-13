<?php

defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{
    public function getAllUser()
    {
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function datatabels()
    {
        $query = $this->db->order_by('id_user', 'DESC')->get('user');
        return $query->result();
    }

    public function getUserById($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row();
    }

    public function ubahDataUser()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "username" => $this->input->post('username', true),
            "email" => $this->input->post('email', true),
            "level" => $this->input->post('level', true),
            "status" => $this->input->post('status', true)
        ];

        $this->db->where('id_user', $this->input->post('id_user', true));
        $this->db->update('user', $data);
    }

    public function changePassword()
    {
        $password = [
            "password" => htmlspecialchars(MD5($this->input->post('password', true)))
        ];
        $this->db->where('id_user', $this->input->post('id_user', true));
        $this->db->update('user', $password);
    }

    public function cariDataUser()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('nama', $keyword);
        $this->db->or_like('username', $keyword);
        return $this->db->get('user')->result_array();
    }

    public function hapusDataUser($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }
}
