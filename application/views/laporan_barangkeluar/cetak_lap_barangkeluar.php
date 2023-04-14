<!DOCTYPE html>
<html>

<head>
    <title>Laporan Barang Keluar</title>
</head>

<body style='font-family:tahoma; font-size:8pt;' onload="window.print()">
    <div style="text-align:justify; margin-top: 20px">
        <p style="text-align: center; line-height: 17px">
		<span style="font-size: 15px">LAPORAN BARANG KELUAR</span><br />
        <span style="font-size: 20px;"><strong>CV TUNAS BAROKAH</strong></span><br />
        <span style="font-size: 12px">Jln. Ahmad Yani Komplek Villa Ceria Lestari No:37 Telp. (271) 891068 Kodepos: 57272</span><br />
        <span style="font-size: 12px">Email : tunas.barokah@gmail.com</span>
            <hr>
        </p>
    </div>

    <center>

        <table style='width:100%; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td width='100%' align='left' style='padding-right:80px; vertical-align:top'>
                <span style='font-size:12pt'><b>Periode <?= date('d/m/Y', strtotime($tgl_awal)); ?> s.d <?= date('d/m/Y', strtotime($tgl_akhir)); ?></b></span></br>
            </td>
        </table>
        <table cellspacing='0' style='width:100%; font-size:10pt; font-family:calibri;  border-collapse: collapse;' border='1'>
            </br>
            <tr align='center'>
                <th>No</th>
                <th>Tanggal</th>
                <th>Invoice</th>
                <th>Kode Barang</th>
				<th>Nama Barang</th>
                <th>Jumlah Keluar</th>
            </tr>
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
                    
        </table>

        <table style='width:100%; font-size:7pt;' cellspacing='2'>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <tr>
                <td style='border:0px solid black; padding:5px; text-align:left; width:80%'></td>
                <td align='center'>Pontianak, <?= date('d F Y'); ?></br>Direktur,</br></br></br></br></br></br><u>..................</u></td>
            </tr>
        </table>
    </center>
</body>

</html>