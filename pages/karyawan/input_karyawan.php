<?php
session_start();
$idpetugas = $_SESSION['id_petugas'];
include '././koneksi.php';
$tgl_daftar = date("Y-m-d");
$tgl_id = date("Ymd");
$query = mysqli_query($koneksi, "SELECT max(id_karyawan) FROM karyawan_oktavia");
$dataid = mysqli_fetch_array($query);
if ($dataid) {
 $idbaru = substr($dataid[0], 3);
       $idku = $idbaru+1;
       if ($idku<10) {
        $kode_otomatis = "KRY000".$idku;
       }else if($idku>=10 && $idku<100){
        $kode_otomatis = "KRY000".$idku;
      }else if($idku>=100 && $idku<1000){
        $kode_otomatis = "KRY000".$idku;
       }
     }
       else{$kode_otomatis = "KRY0001";
  }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Input Karyawan</h1>
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
                <h3 class="card-title">Masukan Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST">
                <div class="card-body">
                  <div class="masuk1paket">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Id Karyawan</label>
                    <input type="text" class="form-control" name="id_kry" value="<?php echo $kode_otomatis;?>"readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Karyawan</label>
                    <input type="text" class="form-control" name="nama_kry" placeholder="Masukan Nama">
                    <input type="text" hidden="" class="form-control" name="tgl" value="<?php echo $tgl_daftar;?>" placeholder="Masukan Paket">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat"></input>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Nomor Telepon</label>
                    <input type="number" name="no_telp" class="form-control" placeholder="Nomor">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" placeholder="Masukan Jabatan"></input>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Gaji</label>
                    <input type="text" class="form-control" name="gaji" placeholder="Masukan Gaji"></input>
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
$id_kry = $_POST['id_kry'];
$nama_kry = $_POST['nama_kry'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$jabatan = $_POST['jabatan'];
$gaji = $_POST['gaji'];
$pet = $idpetugas;
if(!empty($id_kry) and !empty($nama_kry) and !empty($alamat) and !empty($no_telp) and !empty($jabatan) and !empty($gaji)) {
$mysqli ="INSERT INTO karyawan_oktavia(id_karyawan,nama,alamat,no_telp,jabatan,gaji) VALUES('$id_kry','$nama_kry','$alamat','$no_telp','$jabatan','$gaji')";
$sql = mysqli_query($koneksi, $mysqli);
if ($sql) {
  echo"<script>alert('Berhasil');</script>";
  ?>
  <script type="text/javascript">
    window.location.href="index2.php?page=karyawan";
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
