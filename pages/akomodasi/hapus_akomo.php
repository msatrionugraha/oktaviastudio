<?php
	include 'koneksi.php';
	$no = $_GET['no'];
	$query = mysqli_query($koneksi,"SELECT * FROM akomodasi_oktavia WHERE id_akomo='$no'");
	while ($data = mysqli_fetch_array($query)) {
		$ket = $data['jenis'];
		$deb = $data['debit'];
		$kred = $data['kredit'];
		$query1 = mysqli_query($koneksi,"SELECT * FROM saldo_oktavia");
		$dataku = mysqli_fetch_array($query1);
		$sald = $dataku['saldoku'];
		if ($ket == 'pemasukan') {
			$sisa = $sald - $deb;
			$sq = mysqli_query($koneksi,"update saldo_oktavia set saldoku = '$sisa'");
		} else if ($ket == 'pengeluaran'){
			$sisa = $sald + $kred;
			$sq = mysqli_query($koneksi,"update saldo_oktavia set saldoku = '$sisa'");
		}
	}
$mysqli = ("DELETE FROM akomodasi_oktavia where id_akomo='$no'");
        $sql = mysqli_query($koneksi, $mysqli);
if ($sql && $sq) {
    ?>
    <script type="text/javascript">
        window.location.href="index2.php?page=akomo";
    </script>   
    <?php
}else{
	echo"<script>alert('Gagal');</script>";
}
?>