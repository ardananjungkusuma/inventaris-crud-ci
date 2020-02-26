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

    public function getAllTransaksiUserKategoriById($id)
    {
        $query = $this->db->query("select * from transaksi_inventaris t join mahasiswa m on m.id_mahasiswa = t.id_mahasiswa join barang b on b.id_barang = t.id_barang where t.id_transaksi = $id");
        return $query->row();
    }

    public function tambahDataTransaksi()
    {
        $tanggal_pinjam = date('yy-m-d');
        $tanggal_kembali = date('yy-m-d', strtotime("+1 days"));
        $data = [
            "id_mahasiswa" => $this->input->post('id_mahasiswa', true), // ini sama dengan htmlspecialchars($_POST['nama'])
            "id_barang" => $this->input->post('id_barang', true),
            "tanggal_pinjam" => $tanggal_pinjam,
            "tanggal_kembali" => $tanggal_kembali,
            "tanggal_dikembalikan" => 'None',
            "status" => 'Belum Dikembalikan'
        ];
        $id_barangnya = $this->input->post('id_barang', true);
        $queryGetJumlah = $this->db->query("select * from barang where id_barang = $id_barangnya");
        foreach ($queryGetJumlah->result() as $row) {
            $kurangBarang = $row->jumlah_barang - 1;
        }
        $this->db->query("UPDATE barang SET jumlah_barang = $kurangBarang WHERE id_barang = $id_barangnya");
        $this->db->insert('transaksi_inventaris', $data);
    }

    public function ubahDataTransaksi()
    {
        $data = [
            "tanggal_dikembalikan" => $this->input->post('tanggal_dikembalikan', true),
            "status" => $this->input->post('status', true)
        ];

        $this->db->where('id_transaksi', $this->input->post('id_transaksi'));
        $this->db->update('transaksi_inventaris', $data);
    }

    public function cariDataTransaksi()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('tanggal_pinjam', $keyword);
        $this->db->or_like('nama', $keyword);
        return $this->db->get('transaksi_inventaris')->result_array();
    }
}

/* End of file Controllername.php */
