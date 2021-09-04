<?php
session_start();
include 'koneksi.php';
$tampil = mysqli_query($koneksi,"select * from petugas_oktavia WHERE username='$_POST[username]' AND password= md5('$_POST[password]')");
$data = mysqli_fetch_array($tampil);
if($_SESSION["code"] != $_POST["kode"]){
    echo "<script>alert('captcha yang anda masukkan salah');window.history.go(-1);window.location='index.php'</script>";
}else{
if (!empty($data['username'])) {
  $_SESSION['username']=$data['username'];
  $_SESSION['password']=$data['password'];
  $_SESSION['nama_ptgs']=$data['nama_ptgs'];
  $_SESSION['id_petugas']=$data['id_petugas'];
   $_SESSION['level']=$data['level'];
  header('location:index2.php');
}else{
  echo "<script>alert('login gagal username dan password tidak sesuai'); window.location='index.php'</script>";
}
}
?>
