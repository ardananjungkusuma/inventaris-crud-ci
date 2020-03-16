---
description: Ardan Anjung Kusuma & Sugeng Prastiyo
---

# Laporan Inventaris JTI

> Source Code [https://github.com/ardananjungkusuma/inventaris-crud-ci](https://github.com/ardananjungkusuma/inventaris-crud-ci)

Database File

![Gambar Database](.gitbook/assets/image%20%284%29.png)

Konfigurasi Awal CI

1. Setup Awal Standar CI, mengganti config.php, database.php, routes.php di application/config/

{% tabs %}
{% tab title="config.php" %}
```php
$config['base_url'] = 'http://localhost/inventarisjti/';
$config['index_page'] = ''; //kosongi index page
```
{% endtab %}

{% tab title="database.php" %}
{% code title="config.php" %}
```php
$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost', // ganti sesuai hostname
	'username' => 'root', //ganti sesuai username
	'password' => '', //ganti sesuai password
	'database' => 'inventaris_jti', //ganti sesuai nama database
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
```
{% endcode %}
{% endtab %}

{% tab title="routes.php" %}
```php
$route['default_controller'] = 'Auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
```
{% endtab %}
{% endtabs %}

2. Membuat .htaccess pada root directory

{% code title=".htaccess" %}
```text
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]
```
{% endcode %}

3.  Mulai membuat controller admin, auth, barang, kalab, mahasiswa,transaksi, user

1. Admin \([https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/controllers/admin.php](https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/controllers/admin.php)\)
2. Auth \([https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/controllers/auth.php](https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/controllers/auth.php)\)
3. Barang\([https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/controllers/barang.php](https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/controllers/barang.php)\)
4. Kalab\([https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/controllers/kalab.php](https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/controllers/kalab.php)\)
5. Mahasiswa\([https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/controllers/mahasiswa.php](https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/controllers/mahasiswa.php)\)
6. Transaksi\([https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/controllers/transaksi.php](https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/controllers/transaksi.php)\)
7. User\([https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/controllers/user.php](https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/controllers/user.php)\)

4. Mulai membuat model admin, auth, barang, kalab, mahasiswa,transaksi, user

1. Admin\([https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/models/admin\_model.php](https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/models/admin_model.php)\)
2. Auth\([https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/models/auth\_model.php](https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/models/auth_model.php)\)
3. Barang\([https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/models/barang\_model.php](https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/models/barang_model.php)\)
4. Kalab\([https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/models/kalab\_model.php](https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/models/kalab_model.php)\)
5. Mahasiswa\([https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/models/mahasiswa\_model.php](https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/models/mahasiswa_model.php)\)
6. Transaksi\([https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/models/transaksi\_model.php](https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/models/transaksi_model.php)\)
7. User\([https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/models/user\_model.php](https://github.com/ardananjungkusuma/inventaris-crud-ci/blob/master/application/models/user_model.php)\)

5. Membuat view dari admin, auth, barang, kalab, mahasiswa,transaksi, user

* View Source Code \([https://github.com/ardananjungkusuma/inventaris-crud-ci/tree/master/application/views](https://github.com/ardananjungkusuma/inventaris-crud-ci/tree/master/application/views)\)

6. Fitur yang ada pada Controller adalah CRUD, dan untuk Auth ada fitur Authentication yang didapatkan berdasarkan data pengguna yang dimasukan ataupun yang baru registrasi.

7. Penambahan Authorization contohnya dengan kode berikut. Kita memfilter berdasarkan sessionnya yaitu jika session user maka dia akan redirect ke user dan jika level admin maka akan memunculkan semua data user dan dibuat menjadi datatables. Jika selain admin dan user maka akan redirect ke auth atau login kembali

```php
    public function listUser()
    {
        if ($this->session->userdata('level') == "user") {
            redirect('user', 'refresh');
        } elseif ($this->session->userdata('level') == "admin") {
            $data['title'] = 'Data Admin';
            $data['user'] = $this->user_model->datatabels();
            if ($this->input->post('keyword')) {
                $data['user'] = $this->user_model->cariDataUser();
            }
            $this->load->view('admin/template/header', $data);
            $this->load->view('user/list', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth', 'refresh');
        }
    }
```

8. Penambahan datatables dengan cara memasukan script js datatables. Dan menyediakan sebuah function yang nantinya akan merubah sebuah table menjadi datatable berdasarkan id table nya. Seperti index.php memiliki id table listMahasiswa. Jangan lupa memberikan thead dan tbody agar datatablenya mau keluar

{% tabs %}
{% tab title="header.php" %}
```php
<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>assets/css/jquery.dataTables.min.css">
<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css" type="text/css">
```
{% endtab %}

{% tab title="footer.php" %}
```markup
<script type="text/javascript">
    $(document).ready(function() {
        $('#listBarang').DataTable();
        $('#listMahasiswa').DataTable();
        $('#listUser').DataTable();
        $('#listTransaksi').DataTable();

    });
</script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
```
{% endtab %}

{% tab title="index.php" %}
```markup
<table class="table table-striped table-bordered" id="listMahasiswa">
                <thead>
                    <tr style="background-color:darkcyan;color:white">
                        <td>Nama Mahasiswa</td>
                        <td>NIM</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($mahasiswa as $mhs) : ?>
                        <tr>
                            <td>
                                <?= $mhs->nama; ?>
                            </td>
                            <td>
                                <?= $mhs->nim; ?>
                            </td>
                            <td>
                                <a href=" <?php echo base_url(); ?>mahasiswa/hapusDataMahasiswa/<?= $mhs->id_mahasiswa ?>" class="btn btn-danger float-center" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                                <a href="<?= base_url(); ?>mahasiswa/edit/<?= $mhs->id_mahasiswa ?>" class="btn btn-success float-center">Edit</a>
                                <a href="<?php echo base_url(); ?>mahasiswa/detail/<?= $mhs->id_mahasiswa ?>" class="btn btn-primary float-center">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
```
{% endtab %}
{% endtabs %}

9. Menambahkan SQL Join untuk data transaksi, dengan menggunakan perintah dibawah ini. Agar kita dapat mengeluarkan data dari barang maupun mahasiswa.

{% tabs %}
{% tab title="Transaksi\_model.php" %}
```php
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
```
{% endtab %}
{% endtabs %}

10. Membuat fitur cetak. Kita harus menginstall composer terlebih dahulu.

{% hint style="info" %}
Setelah menginstall composer anda bisa membuka cmd, lalu masuk ke dalam folder website anda dan mengetikkan composer require dompdf/dompdf
{% endhint %}

11. Setelah composer terinstall kita disini membuat sebuah library dan memberi nama Pdf.

{% tabs %}
{% tab title="Pdf.php" %}
```php
<?php defined('BASEPATH') or exit('No direct script allowed');

use Dompdf\Dompdf;

class pdf extends Dompdf
{
    /**
     * PDF filename
     * @var String
     */
    public $filename;
    public function __construct()
    {
        parent::__construct();
        $this->filename = "laporan.pdf";
    }
    /**
     * Get an instance of CodeIgniter
     *
     * @access    protected
     * @return    void
     */
    protected function ci()
    {
        return get_instance();
    }
    /**
     * Load a CodeIgniter view into domPDF
     *
     * @access    public
     * @param    string    $view The view to load
     * @param    array    $data The view data
     * @return    void
     */
    public function load_view($view, $data = array())
    {
        $html = $this->ci()->load->view($view, $data, TRUE);
        $this->load_html($html);
        // Render the PDF
        $this->render();
        // Output the generated PDF to Browser
        $this->stream($this->filename, array("Attachment" => false));
    }
}

```
{% endtab %}
{% endtabs %}

12. Membuat cetak\_model.php untuk mencetak suatu data dari database. Pada function didalamnya kita memberikan sebuah query untuk data yang ingin dicetak.

{% tabs %}
{% tab title="Cetak\_model.php" %}
```php
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

```
{% endtab %}
{% endtabs %}

13. Membuat view cetak, untuk tampilan hasil cetakan \(PDF\) berikut adalah salah satu contoh views pada barang/laporan.php

{% tabs %}
{% tab title="laporan.php" %}
```markup
<!DOCTYPE html>
<html>

<head>
    <title><?= $title ?></title>
    <style type="text/css">
        table {
            border: 1px solid #e3e3e3;
            border-collapse: collapse;
            font-family: arial;
            color: #5E5B5C;
            margin: 0 auto;
            width: 100%;
        }

        thead th {
            text-align: left;
            padding: 10px;
        }

        tbody td {
            border-top: 1px solid #e3e3e3;
            padding: 10px;
        }

        tbody tr:nth-child(even) {
            background: #F6F5FA;
        }

        tbody tr:hover {
            background: #EAE9F5;
        }
    </style>
</head>

<body>
    <center>
        <h3>Data Barang</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Merk</th>
                    <th>Jumlah Barang</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($barang as $brg) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $brg->nama_barang; ?></td>
                        <td><?= $brg->merk; ?></td>
                        <td><?= $brg->jumlah_barang; ?></td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </center>
</body>

</html>
```
{% endtab %}
{% endtabs %}

Output dari hasil cetak barang

![laporan-barang.pdf](.gitbook/assets/image%20%286%29.png)



