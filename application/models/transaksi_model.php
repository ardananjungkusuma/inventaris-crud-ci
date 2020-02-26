<?php

defined('BASEPATH') or exit('No direct script access allowed');

class transaksi_model extends CI_Model
{
    public function getAllTransaksiUserKategori()
    {
        $this->db->select('*');
        $this->db->from('transaksi_inventaris t');
        $this->db->join('mahasiswa m', 'm.id_mahasiswa = t.id_mahasiswa');
        $this->db->join('barang b', 'b.id_barang = t.id_barang');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambahdatatransaksi()
    {
        $tanggal_pinjam = date('d:m:y');
        $tanggal_kembali = date('d:m:y', strtotime("+1 days"));

        $data = [
            "id_mahasiswa" => $this->input->post('id_user', true), // ini sama dengan htmlspecialchars($_POST['nama'])
            "id_barang" => $this->input->post('id_kategori', true),
            "tanggal_pinjam" => $tanggal_pinjam,
            "tanggal_kembali" => $tanggal_kembali,
            "tanggal_dikembalikan" => 'None',
            "status" => 'Belum Dikembalikan'
        ];
        $this->db->insert('transaksi_inventaris', $data);
    }

    public function hapusdatamhs($id)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->delete('transaksi');
    }

    public function gettransaksibyid($id)
    {
        return $this->db->get_where('transaksi', ['id_transaksi' => $id])->row_array();
    }

    public function ubahdatatransaksi()
    {
        $data = [
            "id_user" => $this->input->post('id_user', true), // ini sama dengan htmlspecialchars($_POST['nama'])
            "id_kategori" => $this->input->post('id_kategori', true),
            "jumlah_nominal" => $this->input->post('jumlah_nominal', true)
        ];

        $this->db->where('id_transaksi', $this->input->post('id_transaksi'));
        $this->db->update('transaksi', $data);
    }

    public function cariDataTransaksi()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('nama', $keyword);
        $this->db->or_like('nama_kategori', $keyword);
        return $this->db->get('transaksi')->result_array();
    }
}

/* End of file Controllername.php */
