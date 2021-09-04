<?php
include '../../koneksi.php';
require('../../fpdf/fpdf.php');
{
date_default_timezone_set('Asia/Jakarta');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
}

// Ukuran kertas PDF
$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Cell(25,0.8,'Laporan Data Pembelian Akomodasi',0,1,'C');
$pdf->Cell(25,0.8,'Oktavia Studio',0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
//Format tanggal
$pdf->SetX(-25);
$pdf->Cell(5,0.7,"Printed On : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
// st font yang ingin anda gunakan
$pdf->SetFont('Arial','B',7);
// queri yang ingin di tampilkan di tabel sehingga ketika diubah tidak akan berpengaruh
// Kode 1, 0, 'C' dan banyak kode di bawah adalah ukuran lebar tabel ubah jika tidak sesuai keinginan anda.
$pdf->SetX(-25);
$pdf->Cell(2.5, 0.8, 'Id Akomodasi', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Keterangan', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tanggal Masuk', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Jenis', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Debit', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Kredit', 1, 1, 'C');
$pdf->SetFont('Arial','',7);
$no=1;
// from dan edn ini adalah nama dari form star_filter.php yang berfungsi untuk memanggil tanggal yang di atur
// memanggil database
$awal=$_POST['from'];
$akhir=$_POST['end'];
$awal1=date('Y-m-d',strtotime($awal));
$akhir1=date('Y-m-d',strtotime($akhir));
$query=mysqli_query($koneksi,"select * from akomodasi_oktavia WHERE (tgl_akomo BETWEEN '$awal1' AND '$akhir1')");
while($lihat=mysqli_fetch_array($query)){

// Queri yang ingin ditampilkan yang berada di database
	$pdf->SetX(-25);
 $pdf->Cell(2.5, 0.8, $lihat['id_akomo'], 1, 0,'C');
 $pdf->Cell(5, 0.8, $lihat['keterangan'], 1, 0,'C');
 $pdf->Cell(3, 0.8, $lihat['tgl_akomo'],1, 0, 'C');
 $pdf->Cell(3, 0.8, $lihat['jenis'],1, 0, 'C');
 $pdf->Cell(2, 0.8, $lihat['debit'], 1, 0,'C');
 $pdf->Cell(2, 0.8, $lihat['kredit'], 1, 1,'C');
 $no++;
}
$pdf->ln(1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(40.5,0.7,"Tasikmalaya",0,10,'C');

$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(40.5,0.7,"Galih Freti Oktavia",0,10,'C');
// Nama file ketika di print
$pdf->Output("laporan_akomodasi.pdf","I");

?>

Saya a