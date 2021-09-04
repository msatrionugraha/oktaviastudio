<?php
include '../../koneksi.php';
require('../../fpdf/fpdf.php');
{
date_default_timezone_set('Asia/Jakarta');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
}
$subtotal=0;
$subtotal1=0;
$subtotal3=0;
$awal=$_POST['tanggal_awal'];
$akhir=$_POST['tanggal_akhir'];
$awal1=date('Y-m-d',strtotime($awal));
$akhir1=date('Y-m-d',strtotime($akhir));
$awal2=date('d-m-Y',strtotime($awal));
$akhir2=date('d-m-Y',strtotime($akhir));
// Ukuran kertas PDF
$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Cell(25,0.8,'Laporan Data Penjualan',0,1,'C');
$pdf->Cell(25,0.8,'Oktavia Studio',0,0,'C');
$pdf->Cell(25,0.8,'Periode :'.$awal2.' S/D '.$akhir2,0,0,'C');
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
$pdf->Cell(2.5, 0.8, 'Id Beli', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Nama Pembeli', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Alamat Pembeli', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tanggal Beli', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Total Bayar', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Kekurangan', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Tanggal Lunas', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Keterangan', 1, 1, 'C');
$pdf->SetFont('Arial','',7);
$no=1;
// from dan edn ini adalah nama dari form star_filter.php yang berfungsi untuk memanggil tanggal yang di atur
// memanggil database

$query=mysqli_query($koneksi,"select * from pembelian_head_oktavia WHERE (tgl_beli BETWEEN '$awal1' AND '$akhir1')");
$query1=mysqli_query($koneksi,"select * from pembelian_det_oktavia WHERE (tgl_beli BETWEEN '$awal1' AND '$akhir1' )");
while($lihat1=mysqli_fetch_array($query)){
 $subtotal = $subtotal + $lihat1['sub_bayar'];
                            $subtotal1 = $subtotal1 + $lihat1['kurang'];
// Queri yang ingin ditampilkan yang berada di database
	$pdf->SetX(-25);
 $pdf->Cell(2.5, 0.8, $lihat1['id_beli'], 1, 0,'C');
 $pdf->Cell(5, 0.8, $lihat1['nm_beli'], 1, 0,'C');
 $pdf->Cell(3, 0.8, $lihat1['alamat_beli'],1, 0, 'C');
 $pdf->Cell(3, 0.8, $lihat1['tgl_beli'],1, 0, 'C');
 $pdf->Cell(2, 0.8, $lihat1['sub_bayar'], 1, 0,'C');
 $pdf->Cell(2, 0.8, $lihat1['kurang'], 1, 0,'C');
 $pdf->Cell(2, 0.8, $lihat1['tgl_lunas'], 1, 0,'C');
 $pdf->Cell(2, 0.8, $lihat1['keterangan'], 1, 1,'C');
 $no++;
                            
                                

                            
}
$pdf->SetX(-25);
$pdf->Cell(5, 0.8, 'Jumlah :', 1, 0,'C');
$pdf->Cell(5.5, 0.8, number_format($subtotal), 1, 0,'C');
$pdf->Cell(5, 0.8, 'Jumlah Kekurangan :', 1, 0,'C');
$pdf->Cell(6, 0.8, number_format($subtotal1), 1, 0,'C');
$pdf->ln(1);
$pdf->SetX(-25);
$pdf->Cell(2.5, 0.8, 'Id Beli', 1, 0, 'C');
$pdf->Cell(5, 0.8, 'Id Paket', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Nama Paket', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Tanggal Beli', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Harga', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Jumlah', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Total', 1, 1, 'C');
$pdf->SetFont('Arial','',7);
$no=1;
while($lihat=mysqli_fetch_array($query1)){

// Queri yang ingin ditampilkan yang berada di database
	$pdf->SetX(-25);
 $pdf->Cell(2.5, 0.8, $lihat['id_beli'], 1, 0,'C');
 $pdf->Cell(5, 0.8, $lihat['id_paket'], 1, 0,'C');
 $pdf->Cell(3, 0.8, $lihat['tgl_beli'],1, 0, 'C');
 $pdf->Cell(3, 0.8, $lihat['nama_paket'],1, 0, 'C');
 $pdf->Cell(2, 0.8, $lihat['harga'], 1, 0,'C');
 $pdf->Cell(2, 0.8, $lihat['jumlah'], 1, 0,'C');
 $pdf->Cell(2, 0.8, $lihat['total'], 1, 1,'C');
 $no++;
                            
             $subtotal3 = $subtotal3 + $lihat['total'];                     

                            
}
$pdf->SetX(-25);
$pdf->Cell(10, 0.8, 'Jumlah :', 1, 0,'C');
$pdf->Cell(9.5, 0.8, number_format($subtotal), 1, 1,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(40.5,0.7,"Tasikmalaya",0,10,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(40.5,0.7,"Galih Freti Oktavia",0,10,'C');
// Nama file ketika di print
$pdf->Output("laporan_penjualan Periode : ".$awal2." S/D ".$akhir2.".pdf","I");
?>