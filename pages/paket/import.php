
<?php 
include 'koneksi.php';
?>
<div class="konten">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Paket</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Import</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
 
<table>
                
  <form method="post" enctype="multipart/form-data" >
   <tr>
    <td>Pilih File</td>
    <td><input name="filemhsw" type="file" required="required"></td>
   </tr>
   <tr>
    <td></td>
    <td><input name="upload" type="submit" value="Import"></td>
   </tr>
  </form>
 </table>
 <?php
 if (isset($_POST['upload'])) {

  require('spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
  require('spreadsheet-reader-master/SpreadsheetReader.php');

  //upload data excel kedalam folder uploads
  $target_dir = "uploads/".basename($_FILES['filemhsw']['name']);
  
  move_uploaded_file($_FILES['filemhsw']['tmp_name'],$target_dir);

  $Reader = new SpreadsheetReader($target_dir);

  foreach ($Reader as $Key => $Row)
  {
   // import data excel mulai baris ke-2 (karena ada header pada baris 1)
   if ($Key < 1) continue;   
   $query=mysqli_query($koneksi,"INSERT INTO paket(id_paket,nama_paket,harga,keterangan,tgl_masuk,id_petugas) VALUES ('".$Row[0]."', '".$Row[1]."','".$Row[2]."','".$Row[3]."','".$Row[4]."','".$Row[5]."')");
  }
  if ($query) {
    echo "Import data berhasil";
   }else{
    echo mysqli_error();
   }
 }
 ?> 
</body>
</html>