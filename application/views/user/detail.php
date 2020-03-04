<div class="container">
    <div class="row mt-3">
        <div class="col-md-6" style="margin: 0 auto">
            <div class="card">
                <div class="card-header">
                    Detail Informasi User
                </div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">
                        <label for=""><b>Nama : </b></label>
                        <?php echo $user->nama; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Username : </b></label>
                        <?= $user->username; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Email : </b></label>
                        <?= $user->email; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Level : </b></label>
                        <?= $user->level; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Status : </b></label>
                        <?= $user->status; ?>
                    </p>
                    <a href="<?= base_url('user/listUser'); ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>