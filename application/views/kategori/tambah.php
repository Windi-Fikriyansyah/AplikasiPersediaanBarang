 <div class="card card-primary">
     <div class="card-header">
         <h3 class="card-title">Tambah Data</h3>
     </div>
     <!-- /.card-header -->
     <!-- form start -->
     <form action="" method="post">
         <div class="card-body">
             <div class="form-group">
                 <label for="exampleInputEmail1">Nama Kategori</label>
                 <input type="text" name="nama" class="form-control" placeholder="Input Nama Kategori">
                 <small class="form-text text-danger"><?= form_error('nama'); ?></small>
             </div>
         </div>
         <!-- /.card-body -->
         <div class="card-footer">
             <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
         </div>
     </form>
 </div>
 <!-- /.card -->