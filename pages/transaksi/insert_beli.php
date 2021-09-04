<?php 
    include 'koneksi.php';
  $query = mysqli_query($koneksi, "SELECT max(no) FROM pembelian_det_oktavia");
$data = mysqli_fetch_array($query);
 $idbaru = substr($data[0], 0);
 $idkuy = $idbaru+1;

    $head = "INSERT INTO pembelian_head_oktavia (id_beli,nm_beli,alamat_beli,no_telp,tgl_beli) VALUES ('$_POST[id_beli]', '$_POST[nama_beli]', '$_POST[alamat_beli]', '$_POST[no_telp]', '$_POST[tgl_beli]')";
    $sql = mysqli_query($koneksi, $head);
    $mysqli ="INSERT INTO pembelian_det_oktavia(no,id_beli,id_paket,nama_paket,harga,jumlah,total,tgl_beli) VALUES ('$idkuy','$_POST[id_beli]', '$_POST[idpaket]', '$_POST[namapaket]', '$_POST[harga]', '$_POST[jumlah]', '$_POST[total]', '$_POST[tgl_beli]')";
	$sqlku = mysqli_query($koneksi, $mysqli);
?>