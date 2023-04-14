<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-9">
                <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Import to
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" target="_blank" href="<?= base_url('laporan_barangkeluar/cetak_lap_barangkeluar/' . $tgl_awal . '/' . $tgl_akhir); ?>">
                            <span class="icon text-black-200">
                                <i class="fas fa-fw fa-print"></i>
                            </span>
                            <span class="text-black-200">Print</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr align="center">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Invoice</th>
                    <th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($lap_barangkeluar as $dp) :
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $dp['tanggal']; ?></td>
                        <td><?= $dp['kd_brg_keluar']; ?></td>
                        <td><?= $dp['id_bahan']; ?></td>
                        <td><?= $dp['nama_bahan']; ?></td>
                        <td><?= $dp['jumlah']; ?></td>
                    </tr>
                <?php endforeach; ?>
                
            </tbody>
        </table>
    </div>
</div>