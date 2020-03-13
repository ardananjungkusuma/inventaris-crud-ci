<?php

defined('BASEPATH') or exit('No direct script access allowed');

class auth_model extends CI_Model
{
    function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function register()
    {
        $data = [
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => htmlspecialchars(MD5($this->input->post('password'))),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'level' => htmlspecialchars($this->input->post('level', true)),
            'status' => 'Tidak Aktif'
        ];
        $this->db->insert('user', $data);
    }
}
