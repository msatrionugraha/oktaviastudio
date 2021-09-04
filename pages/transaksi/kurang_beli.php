<?php
	include 'koneksi.php';
	$no = $_GET['no'];
	$kode = $_GET['kode'];
$sql = mysqli_query($koneksi,"select * from pembelian_det_oktavia where no = '$no'");
                                    while ($data = mysqli_fetch_array($sql)) {
	
	$harga = $data['harga'];
	$jmbaru = $data['jumlah'];
	$ttbaru = $data['total'];
	$itung = $ttbaru - $harga;
	$total = $jmbaru-'1';
}$sqlku = mysqli_query($koneksi,"select * from pembelian_head_oktavia where id_beli='$kode'");
                                    while ($dataku = mysqli_fetch_array($sqlku)) {
	$namaku = $dataku['nm_beli'];
	$alamatku = $dataku['alamat_beli'];
	$notelp = $dataku['no_telp'];
}
if ($total<1) {
	$dl = mysqli_query($koneksi,"delete from pembelian_det_oktavia where no='$no'");
	if ($dl) {
    ?>
    <script type="text/javascript">
        window.location.href="index2.php?page=lanjut&idbel=<?php echo $kode;?>&namaku=<?php echo $namaku;?>&alamatku=<?php echo $alamatku;?>&notelp=<?php echo $notelp;?>";
    </script>   
    <?php
}else{
	echo"<script>alert('Gagal');</script>";
}		
	}else {
	$sqlu =mysqli_query($koneksi,"update pembelian_det_oktavia set jumlah = ($total), total = ($itung) where no='$no'");
	if ($sqlu) {
    ?>
    <script type="text/javascript">
        window.location.href="index2.php?page=lanjut&idbel=<?php echo $kode;?>&namaku=<?php echo $namaku;?>&alamatku=<?php echo $alamatku;?>&notelp=<?php echo $notelp;?>";
    </script>   
    <?php
}else{
	echo"<script>alert('Gagal');</script>";
}	
	}
	
?>