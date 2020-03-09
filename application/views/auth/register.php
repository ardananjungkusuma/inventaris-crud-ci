<?=
    form_open('auth/prosesRegister');
?>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6" style="margin:0 auto;background-color: #0f4c81;border-radius: 25px;color:white">
            <div class="card-body">
                <h4 style="text-align: center">Register</h4><br>
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors() ?>
                    </div>
                <?php endif ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                        <label>Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                        <label>Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <label>Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" id="passwordConf" name="passwordConf">
                        <input type="checkbox" onclick="passwordShowUnshow()">Show/Unshow Password
                    </div>
                    Already Have an Account? <a href="<?= base_url(); ?>auth/login">Login Here</a>
                    <button type="submit" name="submit" class="btn btn-primary float-right">Register</button><br><br>
                </form>
            </div>
        </div>
    </div>
</div>
<?=
    form_close();
?>