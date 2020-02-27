<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card-header">
                Form Edit Data Barang
            </div>
            <div class="card-body">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors() ?>
                    </div>
                <?php endif ?>
                <form action="" method="POST">
                    <input type="hidden" name="id_barang" value="<?= $barang->id_barang; ?>">
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang :</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $barang->nama_barang; ?>">
                    </div>
                    <div class="form-group">
                        <label for="merk">Merk Barang :</label>
                        <input type="text" class="form-control" id="merk" name="merk" value="<?= $barang->merk; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_barang">Jumlah Barang :</label>
                        <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" value="<?= $barang->jumlah_barang; ?>">
                    </div>
                    <a href="<?= base_url('barang'); ?>" class="btn btn-primary">Kembali</a>
                    <button type="submit" name="submit" class="btn btn-success float-right">Update Data</button>
                </form>
            </div>
        </div>
    </div>
</div>