<div class="container">
    <?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Transaksi<strong> berhasil</strong><?php echo $this->session->flashdata('flash-data'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('flash-data-hapus')) : ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Transaksi<strong> berhasil </strong><?php echo $this->session->flashdata('flash-data-hapus'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row mt-4">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>transaksi/tambah" class="btn btn-primary">Tambah Data</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Data Transaksi" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <h2>Daftar Transaksi</h2>

            <?php if (empty($gabungan)) : ?>
                <div class="alert alert-danger" role="alert">
                    Data Transaksi tidak ditemukan
                </div>
            <?php endif; ?>
            <table border="1">
                <tr>
                    <td>Nama Pegawai</td>
                    <td>Pekerjaan</td>
                    <td>Kategori Pemasukan</td>
                    <td>Jumlah Nominal</td>
                    <td>Aksi</td>
                </tr>
                <?php
                foreach ($gabungan as $gbgn) : ?>
                    <tr>
                        <td>
                            <?= $gbgn['nama']; ?>
                        </td>
                        <td>
                            <?= $gbgn['pekerjaan'] ?>
                        </td>
                        <td>
                            <?= $gbgn['nama_kategori']; ?>
                        </td>
                        <td>
                            <?= $gbgn['jumlah_nominal']; ?>
                        </td>
                        <td>
                            <a href="<?php echo base_url(); ?>transaksi/hapus/<?php echo $gbgn['id_transaksi']; ?>" class="badge badge-danger float-right" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                            <a href="<?= base_url(); ?>transaksi/edit/<?= $gbgn['id_transaksi']; ?>" class="badge badge-success float-right">Edit</a>
                            <a href="<?php echo base_url(); ?>transaksi/detail/<?php echo $gbgn['id_transaksi']; ?>" class="badge badge-primary float-right">Detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>


        </div>
    </div>
</div>