<div class="card">
    <div class="card-header">
        <div class="col-md-2">
            <a href="<?= base_url('pegawai/tambah'); ?>" class="btn btn-block btn-outline-primary">TAMBAH</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pegawai</th>
                    <th>No Telp</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($pegawai as $pgw) :
                ?>
                    <tr>
                        <td> <?= $no++ ?></td>
                        <td> <?= $pgw['nama']; ?></td>
                        <td><?= $pgw['no_telp']; ?></td>
                        <td><?= $pgw['alamat']; ?></td>
                        <td><?= $pgw['status'] == '1' ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-danger">Tidak Aktif</span>'; ?></td>
                        <td>
                            <a href="<?= base_url() ?>pegawai/hapus/<?= $pgw['id']; ?>" onclick="return confirm('Yakin Data Akan DiHapus..?');" class="btn btn-small text-danger"><i class="fas fa-trash"></i></a>

                            <a href="<?= base_url() ?>pegawai/ubah/<?= $pgw['id']; ?>" class="btn btn-small text-info"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>