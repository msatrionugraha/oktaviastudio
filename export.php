<!DOCTYPE html>
<html>
<head>
	<title>Export Data Ke Excel</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Backup.xls");
	?>
	<center>
		<h1>Data Paket</h1>
	</center>
	<table border="1">
		<tr>
			<th>Id Paket</th>
                    <th>Nama Paket</th>
                    <th>Harga Paket</th>
                    <th>Keterangan</th>
                    <th>Tanggal Masuk</th>
                    <th>Petugas Menginput</th>
		</tr>
		<tr>
			  <?php
                                    include 'koneksi.php';
                                    $no = 1;
                                    $sql = mysqli_query($koneksi,"select * from paket_oktavia");
                                    while ($data = mysqli_fetch_array($sql)) {
                                    
                                    ?>
			 <td><?php echo $data['id_paket'];?></td>
                                            <td><?php echo $data['nama_paket'];?></td>
                                            <td ><?php echo $data['harga'];?></td>
                                            <td><?php echo $data['keterangan'];?></td>
                                            <td><?php echo $data['tgl_masuk'];?></td>
                                            <td><?php echo $data['id_petugas'];?></td>
		</tr>
		<?php } ?>
	</table>
	<center>
		<h1>Data Karyawan</h1>
	</center>
	<table border="1">
		<tr>
                    <th>Id Karyawan</th>
                    <th>Nama Karyawan</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Jabatan</th>
                    <th>Gaji</th>
		</tr>
		<tr>
			  <?php
                                    include 'koneksi.php';
                                    $no = 1;
                                    $sql = mysqli_query($koneksi,"select * from karyawan_oktavia");
                                    while ($data = mysqli_fetch_array($sql)) {
                                    
                                    ?>
			<td><?php echo $data['id_karyawan'];?></td>
                                            <td><?php echo $data['nama'];?></td>
                                            <td><?php echo $data['alamat'];?></td>
                                            <td><?php echo $data['no_telp'];?></td>
                                            <td><?php echo $data['jabatan'];?></td>
                                            <td ><?php echo $data['gaji'];?></td>
		</tr>
		<?php } ?>
	</table>
    
	<center>
		<h1>Data Akomodasi</h1>
	</center>
	<table border="1">
		<tr>
			<th>Id Akomodasi</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Jenis</th>
                    <th>Debit</th>
                    <th>Kredit</th>
		</tr>
			  <?php
                                    include 'koneksi.php';
                                    $no = 1;
                                     $sql = mysqli_query($koneksi,"select * from akomodasi_oktavia");
                                    while ($data = mysqli_fetch_array($sql)) {
                                    
                                    ?>
                                    <tr>
                                            <td><?php echo $data['id_akomo'];?></td>
                                            <td><?php echo $data['keterangan'];?></td>
                                            <td><?php echo $data['tgl_akomo'];?></td>
                                            <td><?php echo $data['jenis'];?></td>
                                            <td><?php echo $data['debit']; ?></td>
                                            <td><?php echo $data['kredit'];?></td>
		</tr>
		<?php } ?>
	</table>
	<center>
		<h1>Data Penjualan Head and Detail</h1>
	</center>
	<table border="1">
		<tr>
			 <th>Id Beli</th>
                    <th>Tanggal Beli</th>
                    <th>Nama Pembeli</th>
                    <th>Alamat Pembeli</th>
                    <th>No Telepon</th>
                    <th>Total Beli</th>
                    <th>Kekurangan</th>
                    <th>Tanggal Lunas</th>
                    <th>Keterangan</th>
		</tr>
		
			  <?php
                                    include 'koneksi.php';
                                    $no = 1;
                                     $sql = mysqli_query($koneksi,"select * from pembelian_head_oktavia ");
                                    while ($data = mysqli_fetch_array($sql)) {
                                    
                                    ?>
                                    <tr>
                                             <td>
                                            <?php echo $data['id_beli'];?></td>             
                                            <td><?php echo $data['tgl_beli'];?></td>
                                            <td><?php echo $data['nm_beli'];?></td>
                                            <td><?php echo $data['alamat_beli'];?></td>
                                            <td><?php echo $data['no_telp'];?></td>
                                            <td ><?php echo $data['sub_bayar'];?></td>
                                            <td ><?php echo $data['kurang'];?></td>
                                            <td><?php echo $data['tgl_lunas'];?></td>
                                            <td><?php echo $data['keterangan'];?></td>
		</tr>
		<?php } ?>
	</table>
<br>
	<table border="1">
		<tr>
			<th>No</th>
			 <th>Id Beli</th>
			 <th>Id Paket</th>
                    <th>Tanggal Beli</th>
                    <th>Nama Paket</th>
                    <th>Harga</th>
                    <th>Jumlah Beli</th>
                    <th>Total Harga</th>
		</tr>
		
			  <?php
                                    include 'koneksi.php';
                                    $no = 1;
                                     $sql = mysqli_query($koneksi,"select * from pembelian_det_oktavia");
                                    while ($data = mysqli_fetch_array($sql)) {
                                    
                                    ?>
                                    <tr>
                                    	 <td>
                                            <?php echo $data['no'];?></td>             
                                             <td>
                                            <?php echo $data['id_beli'];?></td>
                                            <td><?php echo $data['id_paket'];?></td>                          
                                            <td><?php echo $data['tgl_beli'];?></td>
                                            <td><?php echo $data['nama_paket'];?></td>
                                            <td><?php echo $data['harga'];?></td>
                                            <td><?php echo $data['jumlah'];?></td>
                                            <td ><?php echo $data['total'];?></td>
		</tr>
		<?php } ?>
	</table>   
    <?php
include 'koneksi.php';
$tables = array();
$result = mysqli_query($koneksi,"SHOW TABLES");
while($row = mysqli_fetch_row($result)){
  $tables[] = $row[0];
}
$return = '';
foreach($tables as $table){
  $result = mysqli_query($koneksi,"SELECT * FROM ".$table);
  $num_fields = mysqli_num_fields($result);
  $return .= 'DROP TABLE '.$table.';';
  $row2 = mysqli_fetch_row(mysqli_query($koneksi,"SHOW CREATE TABLE ".$table));
  $return .= "\n\n".$row2[1].";\n\n";
  
  for($i=0;$i<$num_fields;$i++){
    while($row = mysqli_fetch_row($result)){
      $return .= "INSERT INTO ".$table." VALUES(";
      for($j=0;$j<$num_fields;$j++){
        $row[$j] = addslashes($row[$j]);
        if(isset($row[$j])){ $return .= '"'.$row[$j].'"';}
        else{ $return .= '""';}
        if($j<$num_fields-1){ $return .= ',';}
      }
      $return .= ");\n";
    }
  }
  $return .= "\n\n\n";
}
//save file
$handle = fopen("backup.sql","w+");
fwrite($handle,$return);
fclose($handle);
echo"<script>alert('Berhasil Di Backup');</script>";
?>
    <script type="text/javascript">
        window.location.href="index.php";
    </script>   
    <?php
?>