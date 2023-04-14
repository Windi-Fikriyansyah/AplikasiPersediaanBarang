<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="post">
        <div class="card-body">
            <input type="hidden" name="kode" value="<?= $ubah_pegawai['id']; ?>" class="form-control">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Pegawai</label>
                <input type="text" name="nama" value="<?= $ubah_pegawai['nama']; ?>" class="form-control" placeholder="Input Nama Pegawai">
                <small class="form-text text-danger"><?= form_error('nama'); ?></small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">No Telp</label>
                <input type="text" name="no_telp" value="<?= $ubah_pegawai['no_telp']; ?>" class="form-control" placeholder="Input No Telp">
                <small class="form-text text-danger"><?= form_error('no_telp'); ?></small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <input type="text" name="alamat" value="<?= $ubah_pegawai['alamat']; ?>" class="form-control" placeholder="Input Password">
                <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Level</label>
                <select name="status" class="form-control">
                    <option value="<?= $ubah_pegawai['status']; ?>"><?= $ubah_pegawai['status'] == 1 ? "Aktif" : "Tidak Aktif"; ?></option>
                    <option value="1">Aktif</option>
                    <option value="2">Tidak Aktif</option>
                </select>
                <small class="form-text text-danger"><?= form_error('status'); ?></small>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="tambah" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
<!-- /.card -->