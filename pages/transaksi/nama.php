<?php
include '././koneksi.php';
$idpaket = $_GET['idpaket'];
$query = mysqli_query($koneksi, "select * from paket where id_paket='$idpaket'");
$paket = mysqli_fetch_array($query);
$data = array(
            'idnama'      =>  $paket['nama_paket'],
			'hargapaket'      =>  $paket['harga'],);
 echo json_encode($data);
?>