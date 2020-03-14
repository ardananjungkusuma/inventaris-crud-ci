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
        <h3>Data Transaksi Peminjaman dan Pengembalian Barang</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mahasiswa</th>
                    <th>Barang</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Tanggal Dikembalikan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($transaksi as $trn) :
                    $tanggalAwalPinjam = $trn->tanggal_pinjam;
                    $tanggal_pinjam = date("d-m-Y", strtotime($tanggalAwalPinjam));
                    $tanggalKembaliPinjam = $trn->tanggal_kembali;
                    $tanggal_kembali = date("d-m-Y", strtotime($tanggalKembaliPinjam));
                    if ($trn->tanggal_dikembalikan == 'None') {
                        $tanggal_dikembalikannya = $trn->tanggal_dikembalikan;
                    } else {
                        $tanggalDikembalikann = $trn->tanggal_dikembalikan;
                        $tanggal_dikembalikannya = date("d-m-Y", strtotime($tanggalDikembalikann));
                    }
                ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $trn->nama; ?></td>
                        <td><?= $trn->nama_barang; ?></td>
                        <td><?= $tanggal_pinjam; ?></td>
                        <td><?= $tanggal_kembali; ?></td>
                        <td><?= $tanggal_dikembalikannya; ?></td>
                        <td><?= $trn->status; ?></td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </center>
</body>

</html>