<?php

defined('BASEPATH') or exit('No direct script access allowed');

class barang_model extends CI_Model
{
    public function getAllBarang()
    {
        $query = $this->db->query("select * from barang");
        return $query->result_array();
    }

    public function datatabels()
    {
        $query = $this->db->order_by('id_barang', 'DESC')->get('barang');
        return $query->result();
    }

    public function tambahDataBarang()
    {
        $data = [
            "nama_barang" => $this->input->post('nama_barang', true),
            "merk" => $this->input->post('merk', true),
            "jumlah_barang" => $this->input->post('jumlah_barang', true)
        ];

        $this->db->insert('barang', $data);
    }

    public function hapusDataBarang($id)
    {
        $this->db->where('id_barang', $id);
        $this->db->delete('barang');
    }

    public function getBarangById($id)
    {
        return $this->db->get_where('barang', ['id_barang' => $id])->row();
    }

    public function ubahDataBarang()
    {
        $data = [
            "nama_barang" => $this->input->post('nama_barang', true),
            "merk" => $this->input->post('merk', true),
            "jumlah_barang" => $this->input->post('jumlah_barang', true)
        ];

        $this->db->where('id_barang', $this->input->post('id_barang', true));
        $this->db->update('barang', $data);
    }

    public function cariDataBarang()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('nama_barang', $keyword);
        $this->db->or_like('merk', $keyword);
        return $this->db->get('barang')->result_array();
    }
}
