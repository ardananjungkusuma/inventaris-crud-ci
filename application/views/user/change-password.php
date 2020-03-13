<script>
    function passwordShowUnshow() {
        var x = document.getElementById("password");
        var y = document.getElementById("passwordConf");
        if (x.type == "password" || y.type == "password") {
            x.type = "text";
            y.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
        }
    }
</script>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card-header">
                Change Password User
            </div>
            <div class="card-body">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors() ?>
                    </div>
                <?php endif ?>
                <?php
                form_open('user/changePassword');
                ?>
                <form action="" method="POST">
                    <input type="hidden" name="id_user" value="<?= $user->id_user; ?>">
                    <div class="form-group">
                        <label>Name : <?= $user->nama; ?></label><br>
                        <label>New Password : </label>
                        <input type="password" class="form-control" id="password" name="password">
                        <label>Confirm New Password :</label>
                        <input type="password" class="form-control" id="passwordConf" name="passwordConf">
                        <input type="checkbox" onclick="passwordShowUnshow()">Show/Unshow Password
                    </div>
                    <a href="<?= base_url('user/listUser'); ?>" class="btn btn-primary">Kembali</a>
                    <button type="submit" name="submit" class="btn btn-warning float-right">Change Password</button>
                </form>
                <?php
                form_close();
                ?>
            </div>
        </div>
    </div>
</div>