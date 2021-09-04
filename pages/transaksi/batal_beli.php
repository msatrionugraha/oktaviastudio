<?php
	include 'koneksi.php';
	$no = $_GET['no'];
$mysqli = ("DELETE FROM pembelian_det_oktavia where id_beli='$no'");
        $sql = mysqli_query($koneksi, $mysqli);
$mysql = ("DELETE FROM pembelian_head_oktavia where id_beli='$no'");
        $sql1 = mysqli_query($koneksi, $mysql);
if ($sql && $sql1) {
    ?>
    <script type="text/javascript">
        window.location.href="index2.php?page=transaksi";
    </script>   
    <?php
}else{
	echo"<script>alert('Gagal');</script>";
}
	
?>