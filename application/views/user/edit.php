<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card-header">
                Form Edit Data User
            </div>
            <div class="card-body">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors() ?>
                    </div>
                <?php endif ?>
                <form action="" method="POST">
                    <input type="hidden" name="id_user" value="<?= $user->id_user; ?>">
                    <div class="form-group">
                        <label>Nama :</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $user->nama; ?>">
                        <label>Username :</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= $user->username; ?>">
                        <label>Email :</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $user->email; ?>">
                        <label>Level :</label>
                        <select class="form-control" name="level">
                            <option selected>Choose Level</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                        <small style="background-color: orangered;color:white">*Level User <?= $user->username; ?> = <?= $user->level; ?></small><br>
                        <label>Status :</label>
                        <select name="status" class="form-control">
                            <option selected>Choose Status</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                            <option value="Aktif">Aktif</option>
                        </select>
                        <small style="background-color: orangered;color:white">Status User <?= $user->username; ?> = <?= $user->status; ?></small>
                    </div>
                    <a href="<?= base_url('user/listUser'); ?>" class="btn btn-primary">Kembali</a>
                    <button type="submit" name="submit" class="btn btn-success float-right">Update Data</button>
                </form>
            </div>
        </div>
    </div>
</div>