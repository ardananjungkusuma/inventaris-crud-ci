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
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <?php foreach ($status as $st) : ?>
                                <?php if ($st == $user->status) : ?>
                                    <option value="<?= $user->status ?>" selected><?= $user->status ?></option>
                                <?php else : ?>
                                    <option value="<?= $st ?>"><?= $st ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <label>Level : </label>
                        <select name="level" class="form-control">
                            <?php foreach ($level as $lv) : ?>
                                <?php if ($lv == $user->level) : ?>
                                    <option value="<?= $user->level ?>" selected><?= $user->level ?></option>
                                <?php else : ?>
                                    <option value="<?= $lv ?>"><?= $lv ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <a href="<?= base_url('user/listUser'); ?>" class="btn btn-primary">Kembali</a>
                    <button type="submit" name="submit" class="btn btn-success float-right">Update Data</button>
                </form>
            </div>
        </div>
    </div>
</div>