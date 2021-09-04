<?php
$tgl_kembali = date("Y-m-d");
$tgl_id = date("dmY");
include 'koneksi.php';
$noku =  $_GET ['no'];
$subtotal = 0;
 $sql = mysqli_query($koneksi,"select * from pembelian_head_oktavia where id_beli='$noku'");
                                    $data2 = mysqli_fetch_array($sql);
                                            ?>
<script >
    window.print()
</script>
<!DOCTYPE html>
<html> 
<head>
	<title>Cetak Faktur</title>
</head>
<body>

<table border="0" align="center" style="text-align: center;">
	<tr>
		<td><br>
     
			<label style="font-weight: bold; font-size: 25px;">OKTAVIA STUDIO</label><br>
			<label style="font-size: 15px;">Alamat : Jl. Raya ---, ----- Kota Tasikmalaya</label><br>
      <label style="font-size: 15px;"></label><br>
		</td>
	</tr>
</table><br>

<table width="100%">
    <tr>
      <td width="10%">Id Beli</td>
      <td width="60%">: <?php echo $noku;?>
     </tr>
     <tr>
      <td width="10%">Tanggal</td>
      <td width="20%">: <?php echo $data2['tgl_beli'];?></td>
    </tr>
    <tr>
      <td width="10%">Nama</td>
      <td width="20%">: <?php echo $data2['nm_beli'];?></td>
    </tr>
    <tr>
      <td width="10%">Alamat</td>
      <td width="20%">: <?php echo $data2['alamat_beli']; ?></td>
    </tr>
  </table><br><br>
  <table width="100%" cellpadding="10" style="border-collapse: collapse;" border="1">
    <thead>
        <tr>
            <th>Id Beli</th>
            <th>Id Paket</th>
            <th>Nama Paket</th>
            <th>Harga</th>
            <th>Jumlah Beli</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
      <?php
                                    include 'koneksi.php';
                                    $nom = 1;
                                    $sql = mysqli_query($koneksi,"select * from pembelian_det_oktavia where id_beli='$noku'");
                                    while ($data = mysqli_fetch_array($sql)) {
      ?>
      <tr>.
          <td ><?php echo $data['id_beli'];?></td>
                                            <td ><?php echo $data['id_paket'];?></td>
                                            <td ><?php echo $data['nama_paket'];?></td>
                                            <td ><?php echo 'Rp. '.number_format($data['harga']).',-';?></td>
                                            <td ><?php echo $data['jumlah'];?></td>
                                            <td ><?php echo 'Rp. '.number_format($data['total']).',-';?></td>
      </tr>
      <?php
          $subtotal = $subtotal + $data['total'];
        }
      ?>
    </tbody>
    <tr>
      <td colspan="3"></td>
      <td>Total Bayar</td>
      <td>:</td>
      <td colspan="2">
        <p><?php echo 'Rp. '.number_format($subtotal).',-' ?></p>
      </td>
    </tr>
    <tr>
      <td colspan="3"></td>
      <td>Bayar</td>
      <td>:</td>
      <td colspan="2">
        <?php 
        $sql = mysqli_query($koneksi,"select * from payment_oktavia where id_beli='$noku'");
    while ($data = mysqli_fetch_array($sql)) {
        echo 'Rp. '.number_format($data['bayar']).',-' ?>
      </td>
    </tr>
    <tr>
      <td colspan="3"></td>
      <td>Kembali</td>
      <td>:</td>
      <td colspan="2">
        <p><?php 
        echo 'Rp. '.number_format($data['kembali']).',-'?>      
      </p>
      </td>
    </tr>
    <?php
  }
  ?>
  </table>
</body>
</html>

