<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="post">
        <div class="card-body">
            <input type="hidden" name="kode" value="<?= $ubah_admin['id_admin']; ?>" class="form-control">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input readonly type="text" name="nm_user" value="<?= $ubah_admin['nama']; ?>" class="form-control" placeholder="Input Nama">
                <small class="form-text text-danger"><?= form_error('nm_user'); ?></small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" name="username" value="<?= $ubah_admin['username']; ?>" class="form-control" placeholder="Input Username">
                <small class="form-text text-danger"><?= form_error('username'); ?></small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" name="pass1" class="form-control" placeholder="Input Password">
                <small class="form-text text-danger"><?= form_error('pass2'); ?></small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Konfirmasi Password</label>
                <input type="password" name="pass2" class="form-control" placeholder="Input Konfirmasi Password">
                <small class="form-text text-danger"><?= form_error('pass2'); ?></small>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="tambah" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
<!-- /.card -->