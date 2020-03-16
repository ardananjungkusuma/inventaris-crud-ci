<?=
    form_open('auth/prosesLogin');
?>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6" style="margin:0 auto;background-color: #0f4c81;border-radius: 25px;color:white">
            <div class="card-body">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors() ?>
                    </div>
                <?php endif ?>
                <h4 style="text-align: center">Login</h4><br>
                <?= $this->session->flashdata('message'); ?>
                <?php
                if (isset($pesan)) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $pesan; ?>
                    </div>
                <?php
                }
                ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <input type="checkbox" onclick="passwordShowUnshow()">Show/Unshow Password
                    </div>
                    Dont have an account? <a href="<?= base_url(); ?>auth/register">Register Here</a>
                    <br>
                    <a onclick="myFunction()">Forgot Password</a>
                    <button type="submit" name="submit" class="btn btn-primary float-right">Login</button><br><br>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function myFunction() {
        alert("Mohon Hubungi Administrator :)");
    }
</script>
<?=
    form_close();
?>