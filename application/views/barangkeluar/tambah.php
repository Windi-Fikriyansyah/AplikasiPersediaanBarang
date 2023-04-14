<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Tambah Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <?= form_open_multipart('barangkeluar/tambah'); ?>
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Tanggal</label>
                <input type="date" name="tanggal" value="<?= date('Y-m-d') ?>" class="form-control">
                <small class="form-text text-danger"><?= form_error('tanggal'); ?></small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Data Barang</label>
                <select name="bahan" class="form-control select2" style="width: 100%;">
                    <option value="">--PILIH--</option>
                    <?php foreach ($barang as $brg) : ?>
                        <option value="<?= $brg['id_bahan']; ?>"><?= $brg['id_bahan']; ?> - <?= $brg['nama_bahan']; ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('bahan'); ?></small>
                <!-- <span class="input-group-btn">
                    <button type="button" id="brg" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-barang">
                        <i class="fa fa-plus"></i>
                    </button>
                </span> -->
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Jumlah</label>
                <input type="number" name="jumlah" class="form-control" placeholder="Input Jumlah">
                <small class="form-text text-danger"><?= form_error('jumlah'); ?></small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" placeholder="Input Keterangan">
                <small class="form-text text-danger"><?= form_error('keterangan'); ?></small>
            </div>
            <div class="form-group">
                    <label>Upload Bukti</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="foto" class="custom-file-input">
                            <label class="custom-file-label">Choose file</label>
                        </div>
                        <!-- <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div> -->
                    </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
        </div>
    <?= form_close(); ?>
</div>
<!-- /.card -->

<div class="modal fade" id="modal-barang" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Bahan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('barangmasuk/simpan_bahan') ?>" method="post">
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
        </div>
    </div>
</div>