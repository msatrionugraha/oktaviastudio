<?php
include '././koneksi.php';
$idbel = $_GET['no'];
$tgl_daftar = date("Y-m-d");
$tgl_id = date("Ymd");
$query = mysqli_query($koneksi, "SELECT max(id_beli) FROM pembelian_head_oktavia");
$data = mysqli_fetch_array($query);
if ($data) {
 $idbaru = substr($data[0], 11);
       $idku = $idbaru+1;
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
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pelunasan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pelunasan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Info</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                 
                        <div class="card-body">
                    <div class="awak">
                      <form method="post" class="formlunas"> 
                    <table width="100%" style="margin-bottom: -200px;">
                                                <?php
                                    include 'konek.php';
                                    $nom = 1;
                                    $sql = mysqli_query($koneksi,"select * from pembelian_head_oktavia where id_beli='$idbel'");
                                     $data = mysqli_fetch_array($sql);
                                     $kurang = $data['kurang'];
                                            ?>
    <tr>
      <td width="10%">Id Beli</td>
      <td width="60%">: <?php echo $idbel;?><input type="hidden" name="idnya" value="<?php echo $idbel;?>" readonly=""/></td>
     </tr>
     <tr>
      <td width="10%">Tanggal</td>
      <td width="20%">: <?php echo $data['tgl_beli'];?></td>
    </tr>
    <tr>
      <td width="10%">Nama</td>
      <td width="20%">: <?php echo $data['nm_beli'];?></td>
    </tr>
    <tr>
      <td width="10%">Alamat</td>
      <td width="20%">: <?php echo $data['alamat_beli']; ?></td>
    </tr>
  </table><br><br>
                                </div>
                                    
                                    <table class="table table-hover table-bordered" style="margin-left: 40px; width: 900px; margin-bottom: 30px; margin-top: 30px;">
                                    
    <thead>
        <tr align="center">
            <th>Id Beli</th>
            <th>Id Paket</th>
            <th>Nama Paket</th>
            <th>Harga</th>
            <th>Jumlah Beli</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
      <?php
        $no = 1;
        include 'koneksi.php';
                                    
                                    $sql = mysqli_query($koneksi,"select * from pembelian_det_oktavia where id_beli='$idbel'");
                                    while ($data = mysqli_fetch_array($sql)) {
      ?>
      <tr>.
          <td ><?php echo $data['id_beli'];?></td>
                                            <td ><?php echo $data['id_paket'];?></td>
                                            <td ><?php echo $data['nama_paket'];?></td>
                                            <td ><?php echo 'Rp. '.number_format($data['harga']).',-';?></td>
                                            <td ><?php echo $data['jumlah'];?></td>
                                            <td ><?php echo 'Rp. '.number_format($data['total']).',-';?></td>
      </tr>
      <?php
                   $subtotal = $subtotal + $data['total'];
                   
        }
                                        
      ?>
    </tbody>
    <tr>
      <td colspan="3"></td>
      <td>Total Bayar</td>
      <td>:</td>
      <td colspan="2">
        <?php echo 'Rp. '.number_format($subtotal).',-' ?>
        <input class="form-control" style="display: none;" type="number" name="subtotal" id="subtotal" value="<?php echo $subtotal; ?>" readonly >
      </td>
    </tr>
    <tr><td colspan="6"><br></td></tr>
     <tr>
      <td colspan="3"></td>
      <td>Kurang</td>
      <td>:</td>
      <td colspan="2">
        <input class="form-control" name="kurang" id="kurang" type="number" aria-describedby="emailHelp" value="<?php echo $kurang; ?>" placeholder="Kurang" onkeyup="hitung1();"  readonly="">
      </td>
    </tr>
    <tr>
      <td colspan="3"></td>
      <td>Bayar</td>
      <td>:</td>
      <td colspan="2">
        <input class="form-control" name="bayar" id="bayar" type="number" aria-describedby="emailHelp" placeholder="Bayar" onkeyup="hitung1();" autofocus="">
      </td>
    </tr>
    <tr>
      <td colspan="3"></td>
      <td>Sisa</td>
      <td>:</td>
      <td colspan="2">
        <input class="form-control" name="sisa" id="sisa" type="number" aria-describedby="emailHelp" placeholder="Sisa" onkeyup="hitung1();" autofocus="" readonly="">
      </td>
    </tr>
    <tr>
      <td colspan="5"></td>
      <td><a class="btn btn-primary btn-sm" style="color: white;" name="melunasi" id="lunasi">
                                            <i class="fa fa-dot-circle-o"></i> Simpan
                                        </a>
        <a target="_blank" href="pages/transaksi/cetak.php?no=<?php echo $idbel;?>" class="btn btn-success btn-sm" name="cetak">
                                            <i class="fa fa-dot-circle-o"></i> Cetak
                                        </a>
        <a href="index2.php?page=pembayaran" class="btn btn-warning btn-sm" style="color: white;" name="selesai" id="selesai">
                                            <i class="fa fa-dot-circle-o"></i> Selesai</a>
      </td>
    </tr>
  </table>
</form>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      <!-- /.container-fluid -->
    </section>
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- /.content -->
<!-- ./wrapper -->

<!-- jQuery -->