<div class="x_panel">
    <div class="x_content">
        <div class="row">
            <div class="col-sm-12">
                <table width="100%">
                    <form action="<?= base_url('barangmasuk/tambah_keranjang'); ?>" method="post">
                        <tr>
                            <td width="20%">
                                <div class="form-group">
                                    <select name="id_brg" id="kd_bhn" onchange="bhn()" class="form-control select2" style="width: 100%;">
                                        <option value="">--PILIH--</option>
                                        <?php foreach ($barang as $brg) : ?>
                                            <option value="<?= $brg['id_bahan']; ?>" data-stk="<?= $brg['stok']; ?>" data-hrg="<?= $brg['harga']; ?>" data-nm="<?= $brg['nama_bahan']; ?>"><?= $brg['id_bahan']; ?> - <?= $brg['nama_bahan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <!-- <span class="input-group-btn">
                                        <button type="button" id="brg" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-barang">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span> -->
                                </div>
                            </td>
                            <td width="2%">
                                <div class="form-group">
                                    <button type="button" id="brg" class="btn btn-info" data-toggle="modal" data-target="#modal-barang">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                </div>
                            </td>
                            <td >
                                <div class="form-group">
                                    <input type="text" name="nm_brg" id="nm_brg" class="form-control" placeholder="Nama barang" readonly>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="stock" id="stock" class="form-control" placeholder="stok" readonly>
                                </div>
                            </td>
                            <td></td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="harga" id="harga_bhn" class="form-control" placeholder="harga" readonly>
                                </div>
                            </td>
                            <td></td>
                            <td>
                                <div class="form-group">
                                    <input required type="number" name="jumlah" id="jumlah" min="1" class="form-control" placeholder="jumlah">
                                </div>
                            </td>
                            <td></td>
                            <td>
                                <div class="form-group">
                                    <button type="submit" name="tambah_keranjang" id="tambah" class="btn btn-primary">
                                        <i class="fa fa-cart-plus"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="x_panel">
    <div class="x_content">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <tr>
                        <th width="50">No</th>
                        <th width="">Nama Barang</th>
                        <th width="120">Harga</th>
                        <th width="130">Jumlah</th>
                        <th width="120">Subtotal</th>
                        <th width="75">Aksi</th>
                    </tr>
                    <?php
                    $no = 1;
                    $total = 0;
                    $subtotal = 0;
                    $minus = 0;
                    foreach ($cart as $crt) :
                        $rowid = $crt['rowid'];
                        $link_hapus = base_url("barangmasuk/hapus_data/$rowid");
                        $subtotal = $crt['qty'] * $crt['price'];
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $crt['name']; ?></td>
                            <td align="right">
                                <span class="pull-left">Rp</span>
                                <?= $crt['price']; ?>
                            </td>
                            <td align="center"><?= $crt['qty'] ?></td>
                            <td align="right">
                                <span class="pull-left">Rp</span>
                                <?= number_format($subtotal, 0, ',', '.');; ?>
                            </td>
                            <td>
                                <a href="<?= $link_hapus; ?>" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>

                    <tr style="font-weight: bold;" class="text-blue">
                        <td colspan="4">
                            <h4><b>Total</b></h4>
                        </td>
                        <td align="left" colspan="2">
                            <h4><b>Rp. <?= number_format($total, 0, ',', '.'); ?></b></h4>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<?= form_open_multipart('barangmasuk/simpan'); ?>
    <div class="x_panel">
        <div class="x_content">
            <div class="row">
                <div class="col-sm-6">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top">
                                <label for="date">Date</label>
                            </td>
                            <td class="form-group">
                                <div class="form-group">
                                    <input type="date" readonly name="tgl" value="<?= date('Y-m-d') ?>" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="date">Invoice</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="invoice" value="<?= $no_otomatis; ?>" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-6">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top width 30%">
                                <label for="catatan">Distributor</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <select name="distributor" class="form-control select2" style="width: 100%;">
                                        <option value="">--PILIH--</option>
                                        <?php foreach ($supplier as $spl) : ?>
                                            <option value="<?= $spl['id']; ?>"><?= $spl['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top width 30%">
                                <label for="sub_total">Keterangan</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="hidden" name="total" id="total" value="<?= $total; ?>" class="form-control" readonly>
                                    <input type="text" name="keterangan" class="form-control">
                                </div>
                            </td>

                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="x_panel">
        <div class="x_content">
            <div class="row">
                <div class="col-sm-6">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top width 20%">
                                <label>Upload Bukti</label>
                            </td>
                            <td width="80%">
                                <div class="form-group">
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
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-6">
                    <table width="100%">
                        <tr>
                            <td>
                                <div class="form-group" align="right">
                                    <button type="submit" name="simpan" id="simpan" class="btn btn-success">
                                        <i class="fa fa-save"></i> Simpan
                                    </button>

                                    <a href="<?= base_url('barangmasuk/delete'); ?>" class="btn btn-danger">
                                        <i class='fa fa-trash'></i> Clear Data
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?= form_close(); ?>

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