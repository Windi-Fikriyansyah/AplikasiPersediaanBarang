 <div class="card card-primary">
     <div class="card-header">
         <h3 class="card-title">Edit Data</h3>
     </div>
     <!-- /.card-header -->
     <!-- form start -->
     <form action="" method="post">
         <input type="hidden" value="<?= $ubah_bahan['id_bahan'] ?>" name="kode" class="form-control">
         <div class="card-body">
             <div class="form-group">
                 <label for="exampleInputEmail1">Nama Bahan</label>
                 <input type="text" name="nama" value="<?= $ubah_bahan['nama_bahan'] ?>" class="form-control" placeholder="Input Nama Bahan">
                 <small class="form-text text-danger"><?= form_error('nama'); ?></small>
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail1">Kategori</label>
                 <select name="kategori" class="form-control">
                     <option value="<?= $ubah_bahan['id_kategori'] ?>"><?= $ubah_bahan['nama_kategori'] ?></option>
                     <?php foreach ($kategori as $ktg) : ?>
                         <option value="<?= $ktg['id'] ?>"><?= $ktg['nama_kategori'] ?></option>
                     <?php endforeach; ?>
                 </select>
                 <small class="form-text text-danger"><?= form_error('kategori'); ?></small>
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail1">Harga</label>
                 <input type="number" name="harga" value="<?= $ubah_bahan['harga'] ?>" class="form-control" placeholder="Input Harga">
                 <small class="form-text text-danger"><?= form_error('harga'); ?></small>
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail1">Satuan</label>
                 <select name="satuan" class="form-control">
                     <option value="<?= $ubah_bahan['id_satuan'] ?>"><?= $ubah_bahan['nama_satuan'] ?></option>
                     <?php foreach ($satuan as $stn) : ?>
                         <option value="<?= $stn['id'] ?>"><?= $stn['nama_satuan'] ?></option>
                     <?php endforeach; ?>
                 </select>
                 <small class="form-text text-danger"><?= form_error('satuan'); ?></small>
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail1">Stok</label>
                 <input type="number" name="stok" value="<?= $ubah_bahan['stok'] ?>" class="form-control" placeholder="Input Stok">
                 <small class="form-text text-danger"><?= form_error('stok'); ?></small>
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail1">Deskripsi</label>
                 <input type="text" name="deskripsi" value="<?= $ubah_bahan['deskripsi'] ?>" class="form-control" placeholder="Input Deskripsi">
                 <small class="form-text text-danger"><?= form_error('deskripsi'); ?></small>
             </div>
         </div>
         <!-- /.card-body -->
         <div class="card-footer">
             <button type="submit" name="ubah" class="btn btn-primary">Update</button>
         </div>
     </form>
 </div>
 <!-- /.card -->