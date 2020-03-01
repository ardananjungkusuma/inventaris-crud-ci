<div class="container">
    <div class="row mt-3">
        <div class="col-md-6" style="margin: 0 auto;">
            <div class="card-header" style="background-color: limegreen;color:white">
                Form Tambah Data Barang
            </div>
            <div class="card-body">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors() ?>
                    </div>
                <?php endif ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="nama">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" placeholder="Printer">
                        <label for="nama" style="margin-top: 10px">Merk Barang</label>
                        <input type="text" class="form-control" name="merk" placeholder="Epson 110">
                        <label for="no_hp" style="margin-top: 10px">Jumlah Barang</label>
                        <input type="number" class="form-control" name="jumlah_barang" placeholder="10">
                        <small class="text-muted">Satuan Barang : Unit</small><br>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary float-right">Tambah Data Barang</button>
                </form>
            </div>
        </div>
    </div>
</div>