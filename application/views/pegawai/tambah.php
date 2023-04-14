<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Pegawai</label>
                <input type="text" name="nama" class="form-control" placeholder="Input Nama Pegawai">
                <small class="form-text text-danger"><?= form_error('nama'); ?></small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">No Telp</label>
                <input type="number" name="no_telp" class="form-control" placeholder="Input No Telp">
                <small class="form-text text-danger"><?= form_error('no_telp'); ?></small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="Input Alamat">
                <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <select name="status" class="form-control">
                    <option value="">--PILIH--</option>
                    <option value="1">Aktif</option>
                    <option value="2">Tidak Aktif</option>
                </select>
                <small class="form-text text-danger"><?= form_error('status'); ?></small>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>