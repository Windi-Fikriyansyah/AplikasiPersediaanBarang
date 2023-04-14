 <div class="card card-primary">
     <div class="card-header">
         <h3 class="card-title">Tambah Data</h3>
     </div>
     <!-- /.card-header -->
     <!-- form start -->
     <form action="" method="post">
         <div class="card-body">
             <div class="form-group">
                 <label for="exampleInputEmail1">Nama Bahan</label>
                 <input type="text" name="nama" class="form-control" placeholder="Input Nama Bahan">
                 <small class="form-text text-danger"><?= form_error('nama'); ?></small>
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail1">Kategori</label>
                 <select name="kategori" class="form-control">
                     <option value="">----</option>
                     <?php foreach ($kategori as $ktg) : ?>
                         <option value="<?= $ktg['id'] ?>"><?= $ktg['nama_kategori'] ?></option>
                     <?php endforeach; ?>
                 </select>
                 <small class="form-text text-danger"><?= form_error('kategori'); ?></small>
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail1">Harga</label>
                 <input type="number" name="harga" class="form-control" placeholder="Input Harga">
                 <small class="form-text text-danger"><?= form_error('harga'); ?></small>
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail1">Satuan</label>
                 <select name="satuan" class="form-control">
                     <option value="">----</option>
                     <?php foreach ($satuan as $stn) : ?>
                         <option value="<?= $stn['id'] ?>"><?= $stn['nama_satuan'] ?></option>
                     <?php endforeach; ?>
                 </select>
                 <small class="form-text text-danger"><?= form_error('satuan'); ?></small>
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail1">Stok</label>
                 <input type="number" name="stok" class="form-control" placeholder="Input Stok">
                 <small class="form-text text-danger"><?= form_error('stok'); ?></small>
             </div>
             <div class="form-group">
                 <label for="exampleInputEmail1">Deskripsi</label>
                 <input type="text" name="deskripsi" class="form-control" placeholder="Input Deskripsi">
                 <small class="form-text text-danger"><?= form_error('deskripsi'); ?></small>
             </div>
         </div>
         <!-- /.card-body -->
         <div class="card-footer">
             <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
         </div>
     </form>
 </div>
 <!-- /.card -->