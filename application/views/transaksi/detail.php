<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Transaksi Peminjaman
                </div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <?php
                    $tanggalAwalPinjam = $transaksi->tanggal_pinjam;
                    $tanggal_pinjam = date("d-m-Y", strtotime($tanggalAwalPinjam));
                    $tanggalKembaliPinjam = $transaksi->tanggal_kembali;
                    $tanggal_kembali = date("d-m-Y", strtotime($tanggalKembaliPinjam));
                    if ($transaksi->tanggal_dikembalikan == 'None') {
                        $tanggal_dikembalikannya = $transaksi->tanggal_dikembalikan;
                    } else {
                        $tanggalDikembalikann = $transaksi->tanggal_dikembalikan;
                        $tanggal_dikembalikannya = date("d-m-Y", strtotime($tanggalDikembalikann));
                    }
                    ?>
                    <p class="card-text">
                        <label for=""><b>Nama User :</b></label>
                        <?php echo $transaksi->nama; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Barang yang Dipinjam :</b></label>
                        <?= $transaksi->nama_barang; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Merk Barang :</b></label>
                        <?= $transaksi->merk; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Tanggal Pinjam :</b></label>
                        <?= $tanggal_pinjam; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Tanggal Kembali :</b></label>
                        <?= $tanggal_kembali; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Tanggal Dikembalikan :</b></label>
                        <?= $tanggal_dikembalikannya; ?>
                    </p>
                    <p class="card-text">
                        <label for=""><b>Status Peminjaman:</b></label>
                        <?= $transaksi->status; ?>
                    </p>

                    <a href="<?= base_url(); ?>transaksi" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>