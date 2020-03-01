<div class="container">
    <div class="row mt-3">
        <div class="col-md-6" style="margin: 0 auto;">
            <div class="card-header" style="background-color: orangered;color:white">
                Form Tambah Data Mahasiswa
            </div>
            <div class="card-body">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors() ?>
                    </div>
                <?php endif ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="nama">Nama Mahasiswa</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
                        <label for="nama" style="margin-top: 10px">Nomor Induk Mahasiswa</label>
                        <input type="number" class="form-control" name="nim" placeholder="Masukan NIM">
                        <label for="no_hp" style="margin-top: 10px">Nomer Handphone</label>
                        <input type="number" class="form-control" name="no_hp" placeholder="Masukan No Hp">
                        <small class="text-muted">Isi dengan format : 628528967800</small><br>
                        <label for="alamat" style="margin-top: 10px">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary float-right">Tambah Data Mahasiswa</button>
                </form>
            </div>
        </div>
    </div>
</div>