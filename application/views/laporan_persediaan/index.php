<div class="card">
    <div class="card-header">
        <div class="col-md-2">
            <a href="<?= base_url('laporan_persediaan/cetak'); ?>" target="_blank" class="btn btn-block btn-outline-primary">Print</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Bahan</th>
                    <th>Nama Bahan</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Satuan</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($bahan as $bhn) :
                ?>
                    <tr>
                        <td> <?= $no++ ?></td>
                        <td> <?= $bhn['id_bahan']; ?></td>
                        <td> <?= $bhn['nama_bahan']; ?></td>
                        <td> <?= $bhn['nama_kategori']; ?></td>
                        <td> <?= $bhn['harga']; ?></td>
                        <td> <?= $bhn['nama_satuan']; ?></td>
                        <td> <?= $bhn['stok']; ?></td>
                        <td> <?= $bhn['deskripsi']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>