<!DOCTYPE html>
<html>
<head>
 <title>Import Paket</title>
 <?php
 include '../../koneksi.php';
 ?>
</head>
<body>

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
 <h3><a href="../../index2.php?page=paket">Kembali</a></h3>
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
   if ($Key < 2) continue;   
   $query=mysqli_query($koneksi,"INSERT INTO paket_oktavia(id_paket,nama_paket,harga,keterangan,tgl_masuk,id_petugas) VALUES ('".$Row[0]."', '".$Row[1]."','".$Row[2]."','".$Row[3]."','".$Row[4]."','".$Row[5]."')");
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
