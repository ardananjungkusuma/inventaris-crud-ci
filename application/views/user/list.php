<div class="container">
    <?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data User<strong> berhasil </strong><?php echo $this->session->flashdata('flash-data'); ?>
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
                    Data User<strong> berhasil </strong><?php echo $this->session->flashdata('flash-data-hapus'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row mt-4">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>user/cetakLaporan" class="btn btn-info">Cetak Data User</a>
        </div>
    </div>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Nama/Username User" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div> -->
    <div class="row mt-3">

        <div class="col-lg-12" style="margin: 0 auto;">
            <h2>Daftar User</h2>
            <?php if (empty($user)) : ?>
                <div class="alert alert-danger" role="alert">
                    Data User Tidak Ditemukan
                </div>
            <?php endif; ?>
            <table class="table table-striped table-bordered" id="listUser">
                <thead>
                    <tr style="background-color:darkcyan;color:white">
                        <td>Nama</td>
                        <td>Username</td>
                        <td>Email</td>
                        <td>Level</td>
                        <td>Status</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($user as $usr) : ?>
                        <tr>
                            <td>
                                <?= $usr->nama ?>
                            </td>
                            <td>
                                <?= $usr->username ?>
                            </td>
                            <td>
                                <?= $usr->email ?>
                            </td>
                            <td>
                                <?= $usr->level ?>
                            </td>
                            <td>
                                <?= $usr->status ?>
                            </td>
                            <?php
                            $usernameLoginNow = $this->session->userdata('user');
                            if ($usr->username  == $usernameLoginNow) { ?>
                                <td>
                                    <a href="<?php echo base_url(); ?>user/detail/<?= $usr->id_user ?>" class="btn btn-primary float-center">Detail</a>
                                </td>
                            <?php
                            } else { ?>
                                <td>
                                    <a href=" <?php echo base_url(); ?>user/hapusDataUser/<?= $usr->id_user ?>" class="btn btn-danger float-center" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                                    <a href="<?= base_url(); ?>user/edit/<?= $usr->id_user ?>" class="btn btn-success float-center">Edit</a>
                                    <a href="<?php echo base_url(); ?>user/detail/<?= $usr->id_user ?>" class="btn btn-primary float-center">Detail</a>
                                    <a href="<?php echo base_url(); ?>user/changePassword/<?= $usr->id_user ?>" class="btn btn-warning float-center">Change Pass</a>
                                </td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>