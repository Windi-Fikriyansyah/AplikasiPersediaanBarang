<div class="card">
    <div class="card-header">
        <div class="col-md-2">
            <a href="<?= base_url('satuan/tambah'); ?>" class="btn btn-block btn-outline-primary">TAMBAH</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama satuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($satuan as $stn) :
                ?>
                    <tr>
                        <td> <?= $no++ ?></td>
                        <td> <?= $stn['nama_satuan']; ?></td>
                        <td>
                            <a href="<?= base_url() ?>satuan/hapus/<?= $stn['id']; ?>" onclick="return confirm('Yakin Data Akan DiHapus..?');" class="btn btn-small text-danger"><i class="fas fa-trash"></i></a>
                            <a href="<?= base_url() ?>satuan/ubah/<?= $stn['id']; ?>" class="btn btn-small text-info"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>