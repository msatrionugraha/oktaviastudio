<?php
	include 'koneksi.php';
	$no = $_GET['no'];
$mysqli = ("DELETE FROM paket_oktavia where id_paket='$no'");
        $sql = mysqli_query($koneksi, $mysqli);
if ($sql) {
    ?>
    <script type="text/javascript">
        window.location.href="index2.php?page=paket";
    </script>   
    <?php
}else{
	echo"<script>alert('Gagal');</script>";
}
?>