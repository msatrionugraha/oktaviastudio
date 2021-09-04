<!-- restore -->

<?php
include 'koneksi.php';
$filename = 'backup.sql';
$handle = fopen($filename,"r+");
$contents = fread($handle,filesize($filename));
$sql = explode(';',$contents);
foreach($sql as $query){
  $result = mysqli_query($koneksi,$query);
  if($result){
      echo '<tr><td><br></td></tr>';
      echo '<tr><td>'.$query.' <b>SUCCESS</b></td></tr>';
      echo '<tr><td><br></td></tr>';
  }
}
fclose($handle);
echo"<script>alert('Berhasil Di Restore');</script>";
?>
    <script type="text/javascript">
        window.close();
    </script>   
    <?php
?>