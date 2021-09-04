<?php 

    include 'koneksi.php';
    $tgl_daftar = date("Y-m-d");
    $tgl_id = date("Ymd");
    $query1 = mysqli_query($koneksi, "SELECT max(no_id) FROM jurnal_oktavia");
$data1 = mysqli_fetch_array($query1);
if ($data1) {
 $idbaru = substr($data1[0], 11);
       $idku = $idbaru+1;
       if ($idku<10) {
        $kodeid = "JRN".$tgl_id."000".$idku;
       }else if($idku>=10 && $idku<100){
        $kodeid = "JRN".$tgl_id."00".$idku;
      }else if($idku>=100 && $idku<1000){
        $kodeid = "JRN".$tgl_id."0".$idku;
       }
     }
       else{ $kodeid = "JRN".$tgl_id."0001";
  }
$query = mysqli_query($koneksi, "SELECT max(id_payment) FROM payment_oktavia");
$data = mysqli_fetch_array($query);
if ($data) {
 $idbaru = substr($data[0], 11);
       $idku = $idbaru+1;
       if ($idku<10) {
        $kode_otomatis = "PYM".$tgl_id."000".$idku;
       }else if($idku>=10 && $idku<100){
        $kode_otomatis = "PYM".$tgl_id."00".$idku;
      }else if($idku>=100 && $idku<1000){
        $kode_otomatis = "PYM".$tgl_id."0".$idku;
       }
     }
       else{ $kode_otomatis = "TRS".$tgl_id."0001";
  }
  $sal = mysqli_query($koneksi, "SELECT * FROM saldo_oktavia");
  while($dar = mysqli_fetch_array($sal)){
    $hasil = $dar['saldoku'] + $_POST['bayar'];
    $hasil1 = $dar['saldoku'] + $_POST['subtotal'];
  }
    $cek = $_POST['kurang'];
    $ket = "Pemasukan dari No Id :".$kode_otomatis;
  $jen = "pemasukan";
    if ($cek <= 0) {
    $sql1 = mysqli_query($koneksi,"UPDATE pembelian_head_oktavia SET sub_bayar = ('$_POST[subtotal]'), kurang = ($cek), tgl_lunas = ('$tgl_daftar'), keterangan = 'Belum Selesai' where id_beli='$_POST[idnya]'");
    $sql2 = mysqli_query($koneksi, "INSERT INTO payment_oktavia (id_payment,id_beli,tgl_payment,bayar,total_bayar,kembali) VALUES ('$kode_otomatis', '$_POST[idnya]', '$tgl_daftar', '$_POST[subtotal]', '$_POST[bayar]', '$_POST[kembali]')");
    $query = mysqli_query($koneksi, "SELECT * FROM saldo ");
$data = mysqli_fetch_array($query);
$idbaru = $data['no'];
  if (is_null($idbaru)) {
    $sql3 = mysqli_query($koneksi, "INSERT INTO saldo_oktavia(no,saldoku)VALUES('$idbaru+1','$_POST[subtotal]')");
  }else {    
       $sql9 = mysqli_query($koneksi, "UPDATE saldo_oktavia SET  saldoku = $hasil1");
}
    $sql7 = mysqli_query($koneksi, "INSERT INTO jurnal_oktavia (no_id,keterangan,tgl,jenis,uang_masuk) VALUES ('$kodeid', '$ket', '$tgl_daftar', '$jen','$_POST[bayar]')");
    } else  {
    $sql4 =  mysqli_query($koneksi,"UPDATE pembelian_head_oktavia SET sub_bayar = ('$_POST[subtotal]'), kurang = ($cek), keterangan = 'Belum Selesai' where id_beli='$_POST[idnya]'");
    $sql5 = mysqli_query($koneksi, "INSERT INTO payment_oktavia (id_payment,id_beli,tgl_payment,bayar,total_bayar,kembali) VALUES ('$kode_otomatis', '$_POST[idnya]', '$tgl_daftar', '$_POST[bayar]', '$_POST[bayar]', '$_POST[kembali]')");
       $query = mysqli_query($koneksi, "SELECT * FROM saldo_oktavia ");
$data = mysqli_fetch_array($query);
$idbaru = $data['no'];
  if (is_null($idbaru)) {
    $sql3 = mysqli_query($koneksi, "INSERT INTO saldo_oktavia(no,saldoku)VALUES('$idbaru+1','$_POST[bayar]')");
  }else {    
       $sql9 = mysqli_query($koneksi, "UPDATE saldo_oktavia SET  saldoku = $hasil");
}
    $sql8 = mysqli_query($koneksi, "INSERT INTO jurnal_oktavia (no_id,keterangan,tgl,jenis,uang_masuk) VALUES ('$kodeid', '$ket', '$tgl_daftar', '$jen','$_POST[bayar]')");
}
    
    
    
    
?>