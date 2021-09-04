<?php 
// menghubungkan dengan koneksi
include '../../koneksi.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";
?>
 
<?php
// upload file xls
$target = basename($_FILES['filepegawai']['name']) ;
move_uploaded_file($_FILES['filepegawai']['tmp_name'], $target);
 
// beri permisi agar file xls dapat di baca
chmod($_FILES['filepegawai']['name'],0777);
 
// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filepegawai']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);
 
// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=5; $i<=$jumlah_baris; $i++){
 
	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$id     = $data->val($i, 1);
	$nama   = $data->val($i, 2);
	$harga  = $data->val($i, 3);
	$ket  = $data->val($i, 4);
 	$tgl  = $data->val($i, 5);
 	$pet  = $data->val($i, 6);
	if($id != "" && $nam != "" && $harga != "" && $ket != "" && $tgl != "" && $pet != ""){
		// input data ke database (table data_pegawai)
		mysqli_query($koneksi,"insert into paket(id_paket,nama_paket,harga,keterangan,tgl_masuk,id_petugas) values('$id','$nama','$harga','$ket','$tgl','$pet')");
		$berhasil++;
	}
}
 
// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filepegawai']['name']);
 
// alihkan halaman ke index.php
header("location:../../index2.php?page=paket");
?>