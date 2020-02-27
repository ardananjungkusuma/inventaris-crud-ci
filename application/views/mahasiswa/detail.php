<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Informasi Mahasiswa
                </div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">
                        <label for=""><b>Nama Mahasiswa</b></label>
                        <?php echo $mahasiswa->nama; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Nomor Induk Mahasiswa :</b></label>
                        <?= $mahasiswa->nim; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Nomer HP :</b></label>
                        <?= $mahasiswa->no_hp; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Alamat : </b></label>
                        <?= $mahasiswa->alamat; ?>
                    </p>
                    <a href="<?= base_url('mahasiswa'); ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>