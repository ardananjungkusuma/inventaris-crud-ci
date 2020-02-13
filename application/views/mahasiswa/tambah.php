<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card-header">
                Form Tambah Data Mahasiswa
            </div>
            <div class="card-body">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors() ?>
                    </div>
                <?php endif ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="number" class="form-control" id="nim" name="nim">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select name="jurusan" class="form-control" id="jurusan" name="jurusan">
                            <option selected>-------</option>
                            <option value="kimia">Kimia</option>
                            <option value="teknologi informasi">Teknologi Informasi</option>
                            <option value="mesin">Mesin</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>