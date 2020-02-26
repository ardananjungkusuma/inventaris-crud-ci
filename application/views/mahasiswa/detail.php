<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Transaksi Peminjaman
                </div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">
                        <label for=""><b>Nama Mahasiswa</b></label>
                        <?php echo $transaksi->nama; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Nomor Induk Mahasiswa :</b></label>
                        <?= $transaksi->nama_barang; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Nomer HP :</b></label>
                        <?= $transaksi->tanggal_pinjam; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Alamat : :</b></label>
                        <?= $transaksi->tanggal_kembali; ?>
                    </p>
                    <a href="<?= base_url('mahasiswa'); ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>