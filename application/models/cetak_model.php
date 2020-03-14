<?php

defined('BASEPATH') or exit('No direct script access allowed');

class cetak_model extends CI_Model
{
    public function viewMahasiswa()
    {
        $this->db->select('nama,nim,no_hp,alamat');
        $query = $this->db->get('mahasiswa');
        return $query->result();
    }
    public function viewBarang()
    {
        $this->db->select('*');
        $query = $this->db->get('barang');
        return $query->result();
    }

    public function viewTransaksi()
    {
        $query = $this->db->query("select * from transaksi_inventaris t join mahasiswa m on m.id_mahasiswa = t.id_mahasiswa join barang b on b.id_barang = t.id_barang");
        return $query->result();
    }

    public function viewUser()
    {
        $this->db->select('*');
        $query = $this->db->get('user');
        return $query->result();
    }
}
