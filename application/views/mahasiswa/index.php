<div class="container">
    <?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Mahasiswa<strong> berhasil </strong><?php echo $this->session->flashdata('flash-data'); ?>
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
                    Data Mahasiswa<strong> berhasil </strong><?php echo $this->session->flashdata('flash-data-hapus'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row mt-4">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>mahasiswa/tambah" class="btn btn-primary">Tambah Data Mahasiswa</a>
            <a href="<?= base_url(); ?>mahasiswa/cetak_laporan" class="btn btn-info">Cetak Data Mahasiswa</a>
        </div>
    </div>
    <div class="row mt-3">

        <div class="col-lg-12" style="margin: 0 auto;">
            <h2>Daftar Mahasiswa</h2>
            <?php if (empty($mahasiswa)) : ?>
                <div class="alert alert-danger" role="alert">
                    Data Mahasiswa
                </div>
            <?php endif; ?>
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
        </div>
    </div>
</div>