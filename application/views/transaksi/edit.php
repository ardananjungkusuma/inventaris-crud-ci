 <div class="container">
     <div class="row mt-3">
         <div class="col-md-6">
             <div class="card-header">
                 Form Edit Data Peminjaman
             </div>
             <div class="card-body">
                 <?php if (validation_errors()) : ?>
                     <div class="alert alert-danger" role="alert">
                         <?php echo validation_errors() ?>
                     </div>
                 <?php endif ?>
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
                     <?= $transaksi->tanggal_pinjam; ?>
                 </p>
                 <p class="card-text">
                     <label for=""><b>Tanggal Kembali :</b></label>
                     <?= $transaksi->tanggal_kembali; ?>
                 </p>
                 <form action="" method="POST">
                     <input type="hidden" name="id_barang" value="<?= $transaksi->id_barang; ?>">
                     <input type="hidden" name="id_transaksi" value="<?= $transaksi->id_transaksi; ?>">
                     <div class="form-group">
                         <label for="tanggal_dikembalikan">Tanggal Dikembalikan :</label>
                         <input type="date" class="form-control" id="tanggal_dikembalikan" name="tanggal_dikembalikan">
                     </div>
                     <div class="form-group">
                         <label for="status">Status Peminjaman</label>
                         <select name="status" class="form-control" id="status" name="status">
                             <option selected>Pilih Status</option>
                             <option value="Sudah Dikembalikan">Sudah Dikembalikan</option>
                             <option value="Belum Dikembalikan">Belum Dikembalikan</option>
                             <option value="Dikembalikan Terlambat">Dikembalikan Terlambat</option>
                         </select>
                     </div>
                     <button type="submit" name="submit" class="btn btn-success float-right">Submit Data</button>
                 </form>
                 <a href="<?= base_url(); ?>transaksi" class="btn btn-primary">Kembali</a>
             </div>
         </div>
     </div>
 </div>