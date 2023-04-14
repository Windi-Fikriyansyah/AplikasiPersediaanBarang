 <div class="card card-primary">
     <div class="card-header">
         <h3 class="card-title">Edit Data</h3>
     </div>
     <!-- /.card-header -->
     <!-- form start -->
     <form action="" method="post">
         <input type="hidden" value="<?= $ubah_barang_keluar['kd_brg_keluar'] ?>" name="kode" class="form-control">
         <div class="card-body">
             <div class="form-group">
                 <label for="exampleInputEmail1">Tanggal</label>
                 <input type="date" name="tanggal" value="<?= $ubah_barang_keluar['tanggal'] ?>" class="form-control">
                 <small class="form-text text-danger"><?= form_error('tanggal'); ?></small>
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail1">Data Barang</label>
                 <select name="bahan" class="form-control select2" style="width: 100%;">
                     <option value="<?= $ubah_barang_keluar['id_bahan'] ?>"><?= $ubah_barang_keluar['id_bahan']; ?> - <?= $ubah_barang_keluar['nama_bahan']; ?></option>
                     <?php foreach ($barang as $brg) : ?>
                         <option value="<?= $brg['id_bahan']; ?>"><?= $brg['id_bahan']; ?> - <?= $brg['nama_bahan']; ?></option>
                     <?php endforeach; ?>
                 </select>
                 <small class="form-text text-danger"><?= form_error('bahan'); ?></small>
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail1">Jumlah</label>
                 <input type="number" name="jumlah" value="<?= $ubah_barang_keluar['jumlah'] ?>" class="form-control" placeholder="Input Jumlah">
                 <small class="form-text text-danger"><?= form_error('jumlah'); ?></small>
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail1">Keterangan</label>
                 <input type="text" name="keterangan" value="<?= $ubah_barang_keluar['keterangan'] ?>" class="form-control" placeholder="Input Keterangan">
                 <small class="form-text text-danger"><?= form_error('keterangan'); ?></small>
             </div>
         </div>
         <!-- /.card-body -->
         <div class="card-footer">
             <button type="submit" name="ubah" class="btn btn-primary">Update</button>
         </div>
     </form>
 </div>
 <!-- /.card -->