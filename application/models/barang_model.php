<?php

defined('BASEPATH') or exit('No direct script access allowed');

class barang_model extends CI_Model
{
    public function getAllBarang()
    {
        $query = $this->db->query("select * from barang");
        return $query->result_array();
    }
}
