<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card-header">
                Form Edit Data Mahasiswa
            </div>
            <div class="card-body">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors() ?>
                    </div>
                <?php endif ?>
                <form action="" method="POST">
                    <input type="hidden" name="id_mahasiswa" value="<?= $mahasiswa->id_mahasiswa; ?>">
                    <div class="form-group">
                        <label for="nama">Nama Mahasiswa :</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $mahasiswa->nama; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nim">NIM Mahasiswa :</label>
                        <input type="number" class="form-control" id="nim" name="nim" value="<?= $mahasiswa->nim; ?>">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomor Handphone :</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= $mahasiswa->no_hp; ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Rumah :</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $mahasiswa->alamat; ?>">
                    </div>
                    <a href="<?= base_url('mahasiswa'); ?>" class="btn btn-primary">Kembali</a>
                    <button type="submit" name="submit" class="btn btn-success float-right">Update Data</button>
                </form>
            </div>
        </div>
    </div>
</div>