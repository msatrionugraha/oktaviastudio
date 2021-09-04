<?php 

    include 'koneksi.php';
    $no = $_GET['no'];
      $sql = mysqli_query($koneksi,"select * from pembelian_head_oktavia where id_beli='$no'");
                                    while ($data = mysqli_fetch_array($sql)){
    $lunas = $data['kurang'];
    if ($lunas <= 0) {
    $sql1 = mysqli_query($koneksi,"UPDATE pembelian_head_oktavia SET keterangan = 'Selesai' where id_beli='$no'");
    } else  {
    $sql1 = mysqli_query($koneksi,"UPDATE pembelian_head_oktavia SET keterangan = 'Selesai' where id_beli='$no'");
    }
    
    }
    if ($sql) {
    ?>
    <script type="text/javascript">
        window.location.href="index2.php?page=pembayaran";
    </script>   
    <?php
}else{
  echo"<script>alert('Gagal');</script>";
}
    
?>