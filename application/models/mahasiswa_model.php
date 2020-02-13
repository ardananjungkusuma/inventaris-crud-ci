<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mahasiswa_model extends CI_Model
{

    public function getAllMahasiswa()
    {
        $query = $this->db->get('mahasiswa');
        return $query->result_array();
    }

    public function tambahdatamhs()
    {
        $data = [
            "nama" => $this->input->post('nama', true), // ini sama dengan htmlspecialchars($_POST['nama'])
            "nim" => $this->input->post('nim', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true)
        ];

        // $this->db->insert('Table',$object);
        $this->db->insert('mahasiswa', $data);
    }
}

/* End of file Controllername.php */
