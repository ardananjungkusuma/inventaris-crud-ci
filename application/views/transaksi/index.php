<div class="container">
    <?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Transaksi<strong> berhasil </strong><?php echo $this->session->flashdata('flash-data'); ?>
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
            <?php
            if ($this->session->userdata('level') == "user") {
            ?>
                <a href="<?= base_url(); ?>transaksi/cetakLaporan" class="btn btn-info">Cetak Data Transaksi</a>
            <?php
            } else {
            ?>
                <a href="<?= base_url(); ?>transaksi/tambah" class="btn btn-primary">Tambah Peminjaman</a>
                <a href="<?= base_url(); ?>transaksi/cetakLaporan" class="btn btn-info">Cetak Data Transaksi</a>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Transaksi" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div> -->
    <div class="row mt-3">
        <div class="col-lg-12">
            <h2>Daftar Transaksi</h2>

            <?php if (empty($transaksi)) : ?>
                <div class="alert alert-danger" role="alert">
                    Data Transaksi tidak ditemukan
                </div>
            <?php endif; ?>
            <table class="table table-striped table-bordered" id="listTransaksi">
                <thead>
                    <tr style="background-color: cornflowerblue;color:white">
                        <td>Tanggal Peminjaman</td>
                        <td>Nama Peminjam</td>
                        <td>Barang Yang Dipinjam</td>
                        <td>Status Peminjaman</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($transaksi as $trans) :
                        $tanggalAwal = $trans->tanggal_pinjam;
                        $newDate = date("d-m-Y", strtotime($tanggalAwal));
                    ?>
                        <tr>
                            <td>
                                <?= $newDate ?>
                            </td>
                            <td>
                                <?= $trans->nama ?>
                            </td>
                            <td>
                                <?= $trans->nama_barang ?> <?= $trans->merk ?>
                            </td>
                            <td>
                                <?= $trans->status ?>
                            </td>
                            <?php
                            if ($trans->status == "Sudah Dikembalikan" or $trans->status == "Dikembalikan Terlambat") {
                            ?>
                                <td>
                                    <a href="<?php echo base_url(); ?>transaksi/detail/<?= $trans->id_transaksi ?>" class="btn btn-primary float-center">Detail</a>
                                </td>
                            <?php
                            } else {
                            ?>
                                <td>
                                    <?php
                                    $status_login = $this->session->userdata('level');
                                    if ($status_login == 'user') {
                                    ?>
                                        <a href="<?php echo base_url(); ?>transaksi/detail/<?= $trans->id_transaksi ?>" class="btn btn-primary float-center">Detail</a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="<?= base_url(); ?>transaksi/edit/<?= $trans->id_transaksi ?>" class="btn btn-success float-center">Edit</a>
                                        <a href="<?php echo base_url(); ?>transaksi/detail/<?= $trans->id_transaksi ?>" class="btn btn-primary float-center">Detail</a>
                                    <?php
                                    }
                                    ?>
                                </td>
                        </tr>
                <?php
                            }
                        endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>