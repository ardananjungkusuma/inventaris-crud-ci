<div class="container">
    <?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Barang<strong> berhasil </strong><?php echo $this->session->flashdata('flash-data'); ?>
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
                    Data Barang<strong> berhasil </strong><?php echo $this->session->flashdata('flash-data-hapus'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row mt-4">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>barang/tambah" class="btn btn-primary">Tambah Data Barang</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Data Barang" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-3">

        <div class="col-lg-12" style="margin: 0 auto;">
            <h2>Daftar Barang</h2>
            <?php if (empty($barang)) : ?>
                <div class="alert alert-danger" role="alert">
                    Data Barang
                </div>
            <?php endif; ?>
            <table class="table table-striped">
                <tr style="background-color:darksalmon;color:white">
                    <td>Nama Barang</td>
                    <td>Merk Barang</td>
                    <td>Jumlah Barang</td>
                    <td>Aksi</td>
                </tr>
                <?php
                foreach ($barang as $brg) : ?>
                    <tr>
                        <td>
                            <?= $brg['nama_barang']; ?>
                        </td>
                        <td>
                            <?= $brg['merk']; ?>
                        </td>
                        <td>
                            <?= $brg['jumlah_barang']; ?> Unit
                        </td>
                        <td>
                            <a href=" <?php echo base_url(); ?>barang/hapus/<?php echo $brg['id_barang']; ?>" class="btn btn-danger float-center" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                            <a href="<?= base_url(); ?>barang/edit/<?= $brg['id_barang']; ?>" class="btn btn-success float-center">Edit</a>
                            <a href="<?php echo base_url(); ?>barang/detail/<?php echo $brg['id_barang']; ?>" class="btn btn-primary float-center">Detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>


        </div>
    </div>
</div>