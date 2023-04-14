<!DOCTYPE html>
<html>

<head>
    <title>Laporan Persediaan Barang</title>
</head>

<body style='font-family:tahoma; font-size:8pt;' onload="window.print()">
    <div style="text-align:justify; margin-top: 20px">
        <p style="text-align: center; line-height: 17px">
		<span style="font-size: 15px">LAPORAN PERSEDIAAN BARANG</span><br />
        <span style="font-size: 20px;"><strong>CV TUNAS BAROKAH</strong></span><br />
        <span style="font-size: 12px">Jln. Ahmad Yani Komplek Villa Ceria Lestari No:37 Telp. (271) 891068 Kodepos: 57272</span><br />
        <span style="font-size: 12px">Email : tunas.barokah@gmail.com</span>
            <hr>
        </p>
    </div>

    <center>

        <table style='width:100%; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td width='100%' align='left' style='padding-right:80px; vertical-align:top'>
                
            </td>
        </table>
        <table cellspacing='0' style='width:100%; font-size:10pt; font-family:calibri;  border-collapse: collapse;' border='1'>
            </br>
            <tr align='center'>
                <th>No</th>
                    <th>Kode Bahan</th>
                    <th>Nama Bahan</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Satuan</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
            </tr>
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