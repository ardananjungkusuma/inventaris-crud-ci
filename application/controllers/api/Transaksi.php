<?php

defined('BASEPATH') or exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Transaksi extends REST_Controller
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['index_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['index_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['index_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->methods['index_put']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function index_get()
    {
        // Users from a data store e.g. database
        $id = $this->get('id');

        // If the id parameter doesn't exist return all the users

        if ($id === NULL) {

            $this->db->select('*');
            $this->db->from('transaksi_inventaris t');
            $this->db->join('mahasiswa m', 'm.id_mahasiswa = t.id_mahasiswa');
            $this->db->join('barang b', 'b.id_barang = t.id_barang');
            $transaksi = $this->db->get()->result_array();
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($transaksi) {
                // Set the response and exit
                $this->response($transaksi, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            } else {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'Tidak Ditemukan Transaksi'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.
        else {
            $id = (int) $id;

            // Validate the id.
            if ($id <= 0) {
                // Invalid id, set the response and exit.
                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            }

            $this->db->query("select * from transaksi_inventaris t join mahasiswa m on m.id_mahasiswa = t.id_mahasiswa join barang b on b.id_barang = t.id_barang order by t.id_transaksi DESC");
            $transaksi = $this->db->get("transaksi_inventaris")->row_array();

            $this->response($transaksi, REST_Controller::HTTP_OK);
        }
    }

    public function index_post()
    {
        // $this->some_model->update_user( ... );
        $data = [
            'id_transaksi' => $this->post('id_transaksi'),
            'id_mahasiswa' => $this->post('id_mahasiswa'),
            'id_barang' => $this->post('id_barang'),
            'tanggal_pinjam' => $this->post('tanggal_pinjam'),
            'tanggal_kembali' => $this->post('tanggal_kembali'),
            'tanggal_dikembalikan' => $this->post('tanggal_dikembalikan'),
            'status' => $this->post('status')
        ];

        $this->db->insert("transaksi_inventaris", $data);

        $this->set_response($data, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }

    public function index_delete()
    {
        // $this->some_model->delete_something($id);

        $id = $this->delete('id_transaksi');
        $this->db->where('id_transaksi', $id);
        $this->db->delete('transaksi_inventaris');
        $messages = array('status' => "Data berhasil dihapus");
        $this->set_response($messages, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
    }

    public function index_put()
    {
        $data = array(
            'id_transaksi' => $this->put('id_transaksi'),
            'id_mahasiswa' => $this->put('id_mahasiswa'),
            'id_barang' => $this->put('id_barang'),
            'tanggal_pinjam' => $this->put('tanggal_pinjam'),
            'tanggal_kembali' => $this->put('tanggal_kembali'),
            'tanggal_dikembalikan' => $this->put('tanggal_dikembalikan'),
            'status' => $this->put('status')
        );

        $this->db->where('id_transaksi', $this->put('id_transaksi'));
        $this->db->update('transaksi_inventaris', $data);

        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }
}
