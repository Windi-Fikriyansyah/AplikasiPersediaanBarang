<!DOCTYPE html>
<html>

<head>
  <title>Invoice Barang Masuk</title>
</head>

<body style='font-family:tahoma; font-size:8pt;' onload="window.print()">
  <div style="text-align:justify; margin-top: 20px" id="cetak">
    <!-- <img src="<?= base_url(); ?>assets/dist/img/avatar2.png" style="width: 78px; height: 80px; float:left; margin:0 8px 4px 0;"/> -->
    <p style="text-align: center; line-height: 20px">
      <span style="font-size: 15px">BUKTI BARANG MASUK</span><br />
      <span style="font-size: 20px;"><strong>CV TUNAS BAROKAH</strong></span><br />
      <span style="font-size: 12px">Jln. Ahmad Yani Komplek Villa Ceria Lestari No:37 Telp. (271) 891068 Kodepos: 57272</span><br />
      <span style="font-size: 12px">Email : tunas.barokah@gmail.com</span>
      <hr>
    </p>
  </div>
  <center>
    <table style='width:800px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
      <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
        <span style='font-size:12pt'><b>INVOICE</b></span></br>
        Nama Distributor : <?= $barangmasuk['nama'] ?></br>
        No Telp : <?= $barangmasuk['no_telp'] ?></br>
        Alamat : <?= $barangmasuk['alamat'] ?>
      </td>
      <td style='vertical-align:top' width='30%' align='left'>
        <b><span style='font-size:12pt'></span></b></br>
        No Invoice : <?= $barangmasuk['invoice_masuk'] ?></br>
        Tanggal : <?= $barangmasuk['tanggal'] ?></br>
      </td>
    </table>
    <table cellspacing='0' style='width:800px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>
      </br>
      <tr align='center'>
        <td width='20%'>Nama Barang</td>
        <td width='13%'>Harga</td>
        <td width='4%'>Jumlah</td>
        <td width='13%'>Subtotal</td>
      </tr>
      <?php foreach ($detail_brgmasuk as $ctk) : ?>
        <tr align='left'>
          <td><?= $ctk['nama_bahan'] ?></td>
          <td><?= $ctk['harga'] ?></td>
          <td><?= $ctk['jumlah'] ?></td>
          <td style='text-align:right'><?= number_format($ctk['subtotal'], 0, '.', ','); ?></td>
        <?php endforeach; ?>
        <tr>

          <td colspan='3'>
            <div style='text-align:right'><b>Grand Total : </b></div>
          </td>
          <td style='text-align:right'><b>Rp. <?= number_format($barangmasuk['grand_total'], 0, '.', ','); ?></b></td>
        </tr>

    </table>

    <table style='width:800px; font-size:7pt;' cellspacing='2'>
      <br>
      <br>
      <br>
      <tr>
        <td align='center'>Mengetahui,</br></br></br></br></br></br><u>(........)</u></td>
        <td style='border:0px solid black; padding:5px; text-align:left; width:40%'></td>
        <td align='center'>Diterima Oleh,</br></br></br></br></br></br><u>(........)</u></td>
      </tr>
    </table>
  </center>
</body>

</html>