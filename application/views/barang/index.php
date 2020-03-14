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
            <?php
            if ($this->session->userdata('level') == "user") {
            ?>
                <a href="<?= base_url(); ?>barang/cetakLaporan" class="btn btn-info">Cetak Data Barang</a>
            <?php
            } else {
            ?>
                <a href="<?= base_url(); ?>barang/tambah" class="btn btn-primary">Tambah Data Barang</a>
                <a href="<?= base_url(); ?>barang/cetakLaporan" class="btn btn-info">Cetak Data Barang</a>
            <?php
            }
            ?>

        </div>
    </div>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Nama/Merk Barang" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div> -->
    <div class="row mt-3">

        <div class="col-lg-12" style="margin: 0 auto;">
            <h2>Daftar Barang</h2>
            <?php if (empty($barang)) : ?>
                <div class="alert alert-danger" role="alert">
                    Data Barang
                </div>
            <?php endif; ?>
            <table id="listBarang" class="table table-striped table-bordered">
                <thead>

                    <tr style="background-color:darksalmon;color:white">
                        <td>No</td>
                        <td>Nama Barang</td>
                        <td>Merk Barang</td>
                        <td>Jumlah Barang</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($barang as $barang) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <?= $barang->nama_barang; ?>
                            </td>
                            <td>
                                <?= $barang->merk ?>
                            </td>
                            <td>
                                <?= $barang->jumlah_barang ?> Unit
                            </td>
                            <td>
                                <?php
                                $status_login = $this->session->userdata('level');
                                if ($status_login == 'admin' || $status_login == 'kalab') {
                                ?>
                                    <a href=" <?php echo base_url(); ?>barang/hapus/<?= $barang->id_barang ?>" class="btn btn-danger float-center" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                                    <a href="<?= base_url(); ?>barang/edit/<?= $barang->id_barang ?>" class="btn btn-success float-center">Edit</a>
                                    <a href="<?php echo base_url(); ?>barang/detail/<?= $barang->id_barang ?>" class="btn btn-primary float-center">Detail</a>
                                <?php
                                } else {
                                ?>
                                    <a href="<?php echo base_url(); ?>barang/detail/<?= $barang->id_barang ?>" class="btn btn-primary float-center">Detail</a>
                                <?php
                                }
                                ?>
                            </td>
                        <?php
                    }
                        ?>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>