<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Transaksi
                </div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">
                        <label for=""><b>ID User :</b></label>
                        <?php echo $transaksi['id_user']; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>ID Kategori :</b></label>
                        <?= $transaksi['id_kategori']; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Jumlah Nominal :</b></label>
                        <?= $transaksi['jumlah_nominal']; ?>
                    </p>
                    <a href="<?= base_url(); ?>transaksi" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>