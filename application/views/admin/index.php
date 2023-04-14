<div class="card">
    <div class="card-header">
        <div class="col-md-2">
            <a href="<?= base_url('admin/tambah'); ?>" class="btn btn-block btn-outline-primary">TAMBAH</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pegawai</th>
                    <th>Username</th>
                    <th>Level Akses</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($tampil_admin as $admin) :
                ?>
                    <tr>
                        <td> <?= $no++ ?></td>
                        <td> <?= $admin['nama']; ?></td>
                        <td><?= $admin['username']; ?></td>
                        <td><?= $admin['level'] == 1 ? "Pimpinan" : "Admin"; ?></td>
                        <td>
                            <?php if ($this->fungsi->user_login()->id_admin == $admin['id_admin']) {
                            } else { ?>
                                <a href="<?= base_url() ?>admin/hapus/<?= $admin['id_admin']; ?>" onclick="return confirm('Yakin Data Akan DiHapus..?');" class="btn btn-small text-danger"><i class="fas fa-trash"></i></a>
                            <?php } ?>
                            <a href="<?= base_url() ?>admin/ubah/<?= $admin['id_admin']; ?>" class="btn btn-small text-info"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>