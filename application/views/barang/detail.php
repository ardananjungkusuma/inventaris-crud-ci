<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Informasi Barang
                </div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">
                        <label for=""><b>Nama Barang</b></label>
                        <?php echo $barang->nama_barang; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Merk Barang :</b></label>
                        <?= $barang->merk; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Jumlah Barang :</b></label>
                        <?= $barang->jumlah_barang; ?>
                    </p>
                    <a href="<?= base_url('barang'); ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>