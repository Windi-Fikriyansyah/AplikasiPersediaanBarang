<div class="card">
    <div class="card-header">
        <div class="col-md-2">
            <a href="<?= base_url('barangkeluar/tambah'); ?>" class="btn btn-block btn-outline-primary">TAMBAH</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kode Bahan</th>
                    <th>Nama Bahan</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    <th>Bukti</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($barangkeluar as $bhn) :
                ?>
                    <tr>
                        <td> <?= $no++ ?></td>
                        <td> <?= $bhn['tanggal']; ?></td>
                        <td> <?= $bhn['id_bahan']; ?></td>
                        <td> <?= $bhn['nama_bahan']; ?></td>
                        <td> <?= $bhn['jumlah']; ?></td>
                        <td> <?= $bhn['keterangan']; ?></td>
                        <td><a href="<?php echo base_url('assets/dist/foto/' . $bhn['bukti']) ?>" data-toggle="lightbox" data-title="bukti">
                            <img src="<?php echo base_url('assets/dist/foto/' . $bhn['bukti']) ?>" width="60" class="img-fluid mb-2" alt="tidak ada bukti">
                            </a>
                        </td>
                        <td>
                            <a href="<?= base_url() ?>barangkeluar/hapus/<?= $bhn['kd_brg_keluar']; ?>" onclick="return confirm('Yakin Data Akan DiHapus..?');" class="btn btn-small text-danger"><i class="fas fa-trash"></i></a>
                            <!-- <a href="<?= base_url() ?>barangkeluar/ubah/<?= $bhn['kd_brg_keluar']; ?>" class="btn btn-small text-info"><i class="fas fa-edit"></i></a> -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>