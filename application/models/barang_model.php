<?php

defined('BASEPATH') or exit('No direct script access allowed');

class barang_model extends CI_Model
{
    public function getAllBarang()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $query = $this->db->get();
        return $query->result_array();
    }
}
