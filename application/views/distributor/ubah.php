<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="post">
        <div class="card-body">
            <input type="hidden" name="kode" value="<?= $ubah_distributor['id']; ?>" class="form-control">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Distributor</label>
                <input type="text" name="nama" value="<?= $ubah_distributor['nama']; ?>" class="form-control" placeholder="Input Nama Pegawai">
                <small class="form-text text-danger"><?= form_error('nama'); ?></small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">No Telp</label>
                <input type="text" name="no_telp" value="<?= $ubah_distributor['no_telp']; ?>" class="form-control" placeholder="Input No Telp">
                <small class="form-text text-danger"><?= form_error('no_telp'); ?></small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <input type="text" name="alamat" value="<?= $ubah_distributor['alamat']; ?>" class="form-control" placeholder="Input Password">
                <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="tambah" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
<!-- /.card -->