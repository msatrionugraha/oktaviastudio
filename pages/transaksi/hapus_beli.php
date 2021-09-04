<?php
	include 'koneksi.php';
	$no = $_GET['no'];
	$kode = $_GET['kode'];
$sqlku = mysqli_query($koneksi,"select * from pembelian_head_oktavia where id_beli='$kode'");
                                    while ($dataku = mysqli_fetch_array($sqlku)) {
	$namaku = $dataku['nm_beli'];
	$alamatku = $dataku['alamat_beli'];
	$notelp = $dataku['no_telp'];
}
$mysqli = ("DELETE FROM pembelian_det_oktavia where no='$no'");
        $sql = mysqli_query($koneksi, $mysqli);
if ($sql) {
    ?>
    <script type="text/javascript">
        window.location.href="index2.php?page=lanjut&idbel=<?php echo $kode;?>&namaku=<?php echo $namaku;?>&alamatku=<?php echo $alamatku;?>&notelp=<?php echo $notelp;?>";
    </script>   
    <?php
}else{
	echo"<script>alert('Gagal');</script>";
}
?>