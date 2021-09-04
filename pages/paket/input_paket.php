<?php
session_start();
$idpetugas = $_SESSION['id_petugas'];
include '././koneksi.php';
$tgl_daftar = date("Y-m-d");
$tgl_id = date("Ymd");
$query = mysqli_query($koneksi, "SELECT max(id_paket) FROM paket_oktavia");
$dataid = mysqli_fetch_array($query);
if ($dataid) {
 $idbaru = substr($dataid[0], 3);
       $idku = $idbaru+1;
       if ($idku<10) {
        $kode_otomatis = "PNT000".$idku;
       }else if($idku>=10 && $idku<100){
        $kode_otomatis = "PNT000".$idku;
      }else if($idku>=100 && $idku<1000){
        $kode_otomatis = "PNT000".$idku;
       }
     }
       else{$kode_otomatis = "PNT0001";
  }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Pembeli</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pembelian</li>
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
                <h3 class="card-title">Masukan Paket</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST">
                <div class="card-body">
                  <div class="masuk1paket">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Id Paket</label>
                    <input type="text" class="form-control" name="id_paket" value="<?php echo $kode_otomatis;?>"readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Paket</label>
                    <input type="text" class="form-control" name="nama_paket" placeholder="Masukan Paket">
                    <input type="text" hidden="" class="form-control" name="tgl" value="<?php echo $tgl_daftar;?>" placeholder="Masukan Paket">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Keterangan</label>
                    <textarea class="form-control" name="keterangan" placeholder="Masukan Keterangan"></textarea>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Harga</label>
                    <input type="number" name="harga" class="form-control" placeholder="Rp.">
                  </div>
                  </div>
                  
                <!-- /.card-body -->
                  <button type="submit" name="simpan" class="btn btn-primary">Submit</button>  <button type="reset" class="btn btn-danger" onclick="document.location.reload(true)">
                                             Reset
                                        </button>
                
              </form>
            </div>
            <?php
include '././koneksi.php';
if(isset($_POST['simpan'])){
$id_paket = $_POST['id_paket'];
$nama_paket = $_POST['nama_paket'];
$keterangan = $_POST['keterangan'];
$tgl = $_POST['tgl'];
$harga = $_POST['harga'];
$pet = $idpetugas;
if(!empty($id_paket) and !empty($nama_paket) and !empty($keterangan) and !empty($tgl) and !empty($harga)) {
$mysqli ="INSERT INTO paket_oktavia(id_paket,nama_paket,keterangan,harga,tgl_masuk,id_petugas) VALUES('$id_paket','$nama_paket','$keterangan','$harga','$tgl','$pet')";
$sql = mysqli_query($koneksi, $mysqli);
if ($sql) {
  echo"<script>alert('Berhasil');</script>";
  ?>
  <script type="text/javascript">
    window.location.href="index2.php?page=paket";
  </script> 
  <?php
}else{
echo"<script>alert('Gagal');history.go(-1);</script>";
}
}else {
 echo"<div class='swalDefaultError'><script>alert('Isi Data Dengan Benar');history.go(-1);</script></div>"; 
}
}
?>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
