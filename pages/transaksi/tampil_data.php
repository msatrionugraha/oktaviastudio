   <?php
include 'koneksi.php';
$tgl_daftar = date("Y-m-d");
$tgl_id = date("Ymd");
$subtotal = 0;
$query = mysqli_query($koneksi, "SELECT max(id_beli) FROM pembelian_head_oktavia");
$data = mysqli_fetch_array($query);
if ($data) {
 $idbaru = substr($data[0], 11);
       $idku = $idbaru+0;
       if ($idku<10) {
        $kode_otomatis = "TRS".$tgl_id."000".$idku;
       }else if($idku>=10 && $idku<100){
        $kode_otomatis = "TRS".$tgl_id."00".$idku;
      }else if($idku>=100 && $idku<1000){
        $kode_otomatis = "TRS".$tgl_id."0".$idku;
       }
     }
       else{ $kode_otomatis = "TRS".$tgl_id."0001";
  }
$query1 = mysqli_query($koneksi, "SELECT max(no) FROM pembelian_det_oktavia");
$data1 = mysqli_fetch_array($query1);
if ($data1) {
       $idku1 = $data1[0]-0;
  }
  $noku = $kode_otomatis;
  $noka = $idku1;
?>
<script src="jquery-3.4.1.min.js" type="text/javascript"></script>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
            
              <!-- /.card-header -->
              <!-- form start -->
              <div class="tabel">
             <center><table id="example1" class="table table-bordered table-striped">
    <thead>
      <form method="POST" class="form-tamkur">
        <input type="text" hidden="" class="form-control" name="no" value="<?php echo $noka;?>" readonly>
        <tr align="center">
            <th>Id Beli</th>
            <th>Id Paket</th>
            <th>Nama Paket</th>
            <th>Harga</th>
            <th>Jumlah Beli</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
      <?php
                                    include '././koneksi.php';
                                    $nom = 1;
                                    $sql = mysqli_query($koneksi,"select * from pembelian_det_oktavia where id_beli='$noku'");
                                    while ($data = mysqli_fetch_array($sql)) {
                                            ?>
      <tr>
                                            <td ><?php echo $data['id_beli'];?></td>
                                            <td ><?php echo $data['id_paket'];?></td>
                                            <td ><?php echo $data['nama_paket'];?></td>
                                            <td ><?php echo 'Rp. '.number_format($data['harga']).',-';?></td>
                                            <td ><?php echo $data['jumlah'];?></td>
                                            <td ><?php echo 'Rp. '.number_format($data['total']).',-';?></td>
          <td>
            <a href="index2.php?page=tambah&no=<?php echo $data['no'];?>&kode=<?php echo $data['id_beli'];?>" class="btn btn-success" title="Tambah" id="tambah"><i class="fa fa-dot-circle-o"></i> +</a>
              <a href="index2.php?page=kurang&no=<?php echo $data['no'];?>&kode=<?php echo $data['id_beli'];?>" class="btn btn-success" title="Kurang">-</a>
              <a href="index2.php?page=hapus&no=<?php echo $data['no'];?>&kode=<?php echo $data['id_beli'];?>" id="hapus" class="btn btn-danger" title="Hapus">x</a>
          </td>
      </tr>
      <?php
          $subtotal = $subtotal + $data['total'];
        }
      ?>
    </tbody>
    <tr></tr>
    <tr>
    <td colspan="3"></td>
      <td>Subtotal</td>
      <td>:</td>
      <td><?php echo 'Rp. '.number_format($subtotal).',-'?></td>
      <td><a style="margin-right: 20px; " href="index2.php?page=bayar&no=<?php echo $kode_otomatis;?>" title="Bayar" class="btn btn-success">Pembayaran</a>
    <a onclick ="return confirm('Yakin Hapus Data ?')" href="index2.php?page=batal&no=<?php echo $kode_otomatis;?>" title="Batal" class="btn btn-danger">Batal Transaksi</td>
    </tr>
  </table>
  </center>
</form>
</div>

            </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <script type="text/javascript"> 

    
</script>