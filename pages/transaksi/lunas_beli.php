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
  }
  $id = $_POST['idnya'];
  $kur = $_POST['kurang'];
  $bay = $_POST['bayar'];
  $sis = $_POST['sisa'];
  $cek = $kur - $bayar;
  $ket = "Pemasukan dari No Id :".$kode_otomatis;
  $jen = "pemasukan";
  $kr = '0';
  $mas = $bay - $sis;
    if ($cek <= 0) {
    $sql2 = mysqli_query($koneksi, "INSERT INTO payment_oktavia (id_payment,id_beli,tgl_payment,bayar,kembali) VALUES ('$kode_otomatis', '$_POST[idnya]', '$tgl_daftar', '$_POST[bayar]','$_POST[sisa]')");
    $sql3 = mysqli_query($koneksi, "INSERT INTO jurnal_oktavia (no_id,keterangan,tgl,jenis,uang_masuk) VALUES ('$kodeid', '$ket', '$tgl_daftar', '$jen','$_POST[bayar]')");
    $sql6 = mysqli_query($koneksi, "UPDATE saldo_oktavia SET  saldoku = $hasil");
    $sql8 = mysqli_query($koneksi, "UPDATE pembelian_head_oktavia SET kurang = 0, tgl_lunas = '$tgl_daftar' WHERE id_beli = '$_POST[idnya]'");
    $sql = mysqli_query($koneksi,"update pembelian_head_oktavia set kurang = 0, tgl_lunas = '$tgl_daftar' where id_beli ='$id'");
    }else {
       $sql8 = mysqli_query($koneksi, "UPDATE pembelian_head_oktavia SET kurang = 0, tgl_lunas = '$tgl_daftar' WHERE id_beli = '$_POST[idnya]'");
    $sql = mysqli_query($koneksi,"update pembelian_head_oktavia set kurang = 0, tgl_lunas = '$tgl_daftar' where id_beli ='$id'");
    $sql2 = mysqli_query($koneksi, "INSERT INTO payment_oktavia (id_payment,id_beli,tgl_payment,bayar,kembali) VALUES ('$kode_otomatis', '$_POST[idnya]', '$tgl_daftar', '$_POST[bayar]','$_POST[sisa]')");
    $sql3 = mysqli_query($koneksi, "INSERT INTO jurnal_oktavia (no_id,keterangan,tgl,jenis,uang_masuk) VALUES ('$kodeid', '$ket', '$tgl_daftar', '$jen','$_POST[bayar]')");
    $sql6 = mysqli_query($koneksi, "UPDATE saldo SET  saldoku = $hasil");
    }
?>