<?php
session_start();
$idpetugas = $_SESSION['id_petugas'];
include '././koneksi.php';
$no = $_GET['no'];
        $sqlku = mysqli_query($koneksi,"select * from karyawan where id_karyawan='$no'");
        while ($data = mysqli_fetch_array($sqlku)) {
          
$tgl_daftar = date("Y-m-d");
$tgl_id = date("Ymd");
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
                    <label for="exampleInputEmail1">Id Karyawan</label>
                    <input type="text" class="form-control" name="id_kry" value="<?php echo $data['id_karyawan'];?>"readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Karyawan</label>
                    <input type="text" class="form-control" name="nama_kry" placeholder="Masukan Nama" value="<?php echo $data['nam'];?>">
                    <input type="text" hidden="" class="form-control" name="tgl" value="<?php echo $tgl_daftar;?>" placeholder="Masukan Paket">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo $data['alamat'];?>"></input>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Nomor Telepon</label>
                    <input type="number" name="no_telp" class="form-control" placeholder="Nomor" value="<?php echo $data['no_telp'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" placeholder="Masukan Jabatan" value="<?php echo $data['jabatan'];?>"></input>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Gaji</label>
                    <input type="text" class="form-control" name="gaji" placeholder="Masukan Gaji" value="<?php echo $data['gaji'];?>"></input>
                  </div>
                  </div>
                  
                <!-- /.card-body -->
                  <button type="submit" name="simpan" class="btn btn-primary">Submit</button>  <button type="reset" class="btn btn-danger" onclick="document.location.reload(true)">
                                             Reset
                                        </button>
                
              </form>
            </div>
            <?php
            }
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
 $sql = mysqli_query($koneksi,"update paket set id_karyawan = '$id_kry', nama = '$nama_kry', alamat = '$alamat', no_telp='$no_telp', jabatan = '$jabatan', gaji = '$gaji' where id_karyawan ='$no'");
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
