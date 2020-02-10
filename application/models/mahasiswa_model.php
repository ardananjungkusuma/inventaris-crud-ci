<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mahasiswa_model extends CI_Controller
{

    public function getAllMahasiswa()
    {
        return $this->db->get('mahasiswa')->result_array();
    }
}

/* End of file Controllername.php */
