<div class="container">
    <div class="row mt-3">
        <div class="col-md-6" style="margin: 0 auto;">
            <div class="card-header" style="background-color: rebeccapurple;color:white">
                Form Tambah Data Transaksi
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
                        <select class="form-control" name="id_mahasiswa" id="id_mahasiswa">
                            <option selected="selected">Pilih Nama Mahasiswa</option>
                            <?php foreach ($mahasiswa as $mhs) : ?>
                                <option value="<?= $mhs['id_mahasiswa'] ?>"><?= $mhs['nama'] ?> - <?= $mhs['nim'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <select class="form-control" name="id_barang" id="id_barang">
                            <option selected="selected">Pilih Barang</option>
                            <?php foreach ($barang as $brg) : ?>
                                <option value="<?= $brg['id_barang'] ?>"><?= $brg['nama_barang'] ?> <?= $brg['merk'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>