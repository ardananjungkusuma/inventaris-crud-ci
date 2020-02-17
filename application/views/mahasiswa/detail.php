<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Data Mahasiswa
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $mahasiswa['nama']; ?></h5>
                    <p class="card-text">
                        <label for=""><b>Email :</b></label>
                        <?= $mahasiswa['email']; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>NIM :</b></label>
                        <?= $mahasiswa['nim']; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Jurusan :</b></label>
                        <?= $mahasiswa['jurusan']; ?>
                    </p>
                    <a href="<?= base_url(); ?>mahasiswa" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>