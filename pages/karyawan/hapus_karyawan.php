<?php
	include '././koneksi.php';
	$no = $_GET['no'];
$mysqli = ("DELETE FROM karyawan_oktavia where id_karyawan='$no'");
        $sql = mysqli_query($koneksi, $mysqli);
if ($sql) {
    ?>
    <script type="text/javascript">
        window.location.href="index2.php?page=karyawan";
    </script>   
    <?php
}else{
	echo"<script>alert('Gagal');</script>";
}
?>