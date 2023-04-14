 <div class="card card-primary">
     <div class="card-header">
         <h3 class="card-title">Edit Data</h3>
     </div>
     <!-- /.card-header -->
     <!-- form start -->
     <form action="" method="post">
         <input type="hidden" value="<?= $ubah_kategori['id'] ?>" name="kode" class="form-control">
         <div class="card-body">
             <div class="form-group">
                 <label for="exampleInputEmail1">Nama Kategori</label>
                 <input type="text" value="<?= $ubah_kategori['nama_kategori'] ?>" name="nama" class="form-control" placeholder="Input Nama Kategori">
                 <small class="form-text text-danger"><?= form_error('nama'); ?></small>
             </div>
         </div>
         <!-- /.card-body -->
         <div class="card-footer">
             <button type="submit" name="ubah" class="btn btn-primary">Update</button>
         </div>
     </form>
 </div>
 <!-- /.card -->