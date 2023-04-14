<div class="card">
    <div class="card-header">
        <div class="col-md-2">
            <a href="<?= base_url('barangmasuk'); ?>" class="btn btn-block btn-outline-primary">TAMBAH</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>No Invoice</th>
                    <th>Nama Distributor</th>
                    <th>No Telp</th>
                    <th>Total Harga</th>
                    <th>Bukti</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($tampil_barangmasuk as $brgmsk) :
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $brgmsk['tanggal']; ?></td>
                        <td><?= $brgmsk['invoice_masuk']; ?></td>
                        <td><?= $brgmsk['nama']; ?></td>
                        <td><?= $brgmsk['no_telp']; ?></td>
                        <td><?= $brgmsk['grand_total']; ?></td>
                        <td><a href="<?php echo base_url('assets/dist/foto/' . $brgmsk['bukti']) ?>" data-toggle="lightbox" data-title="bukti">
                            <img src="<?php echo base_url('assets/dist/foto/' . $brgmsk['bukti']) ?>" width="60" class="img-fluid mb-2" alt="tidak ada bukti">
                            </a>
                        </td>
                        <td>
                            <a href="<?= base_url() ?>barangmasuk/cetak/<?= $brgmsk['invoice_masuk']; ?>" target="_blank" class="btn btn-small text-primary"><i class="fa fa-print"></i></a>
                            <a href="<?= base_url() ?>barangmasuk/hapus/<?= $brgmsk['invoice_masuk']; ?>" onclick="return confirm('Yakin Data Akan Dihapus..?');" class="btn btn-small text-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>