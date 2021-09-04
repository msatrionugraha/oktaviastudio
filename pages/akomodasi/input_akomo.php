<?php
session_start();
$idpetugas = $_SESSION['id_petugas'];
include '././koneksi.php';
$tgl_daftar = date("Y-m-d");
$tgl_id = date("Ymd");
$query1 = mysqli_query($koneksi, "SELECT max(no_id) FROM jurnal_oktavia");
$data1 = mysqli_fetch_array($query1);
if ($data1) {
 $idbaru = substr($data1[0], 11);
       $idku = $idbaru+1;
       if ($idku<10) {
        $kodeid = "JRN".$tgl_id."000".$idku;
       }else if($idku>=10 && $idku<100){
        $kodeid = "JRN".$tgl_id."00".$idku;
      }else if($idku>=100 && $idku<1000){
        $kodeid = "JRN".$tgl_id."0".$idku;
       }
     }
       else{ $kodeid = "JRN".$tgl_id."0001";
  }

$query = mysqli_query($koneksi, "SELECT max(id_akomo) FROM akomodasi_oktavia");
$data = mysqli_fetch_array($query);
if ($data) {
 $idbaru = substr($data[0], 11);
       $idku = $idbaru+1;
       if ($idku<10) {
        $kode_otomatis = "AKM".$tgl_id."000".$idku;
       }else if($idku>=10 && $idku<100){
        $kode_otomatis = "AKM".$tgl_id."00".$idku;
      }else if($idku>=100 && $idku<1000){
        $kode_otomatis = "AKM".$tgl_id."0".$idku;
       }
     }
       else{ $kode_otomatis = "AKM".$tgl_id."0001";
  }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Akomodasi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Akomodasi</li>
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
                    <label for="exampleInputEmail1">Id Akomodasi</label>
                    <input type="text" class="form-control" name="id_akomo" value="<?php echo $kode_otomatis;?>"readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" placeholder="Masukan Keterangan">
                    <input type="text" hidden="" class="form-control" name="tgl" value="<?php echo $tgl_daftar;?>" placeholder="Masukan Paket">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jenis</label>
                    <select name="jenis" class="form-control" id="jenis">
                      <option>Pilih</option>
                      <option value="pengeluaran">Pengeluaran</option>
                      <option value="pemasukan">Pemasukan</option>
                    </select>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Debit</label>
                    <input type="number" name="debit" id="debit" class="form-control" placeholder="Rp.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kredit</label>
                    <input type="number" name="kredit" id="kredit" class="form-control" placeholder="Rp.">
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
$id_akomo = $_POST['id_akomo'];
$keterangan = $_POST['keterangan'];
$tgl = $_POST['tgl'];
$jenis = $_POST['jenis'];
$kredit = $_POST['kredit'];
$debit = $_POST['debit'];
$ket1 = "Pemasukan dari No Id :".$kode_otomatis;
$ket2 = "Pengeluaran dari No Id :".$kode_otomatis;
  $jen = "pemasukan";
$my = mysqli_query($koneksi, "select * from saldo_oktavia");
while ($dataku = mysqli_fetch_array($my)) {
  $masuk  = $dataku['saldoku']+$debit;
  $keluar  = $dataku['saldoku']-$kredit;
}
if(!empty($id_akomo) and !empty($jenis) and !empty($keterangan) and !empty($tgl)) {
if ($jenis == 'pemasukan') {
$mysqli ="INSERT INTO akomodasi_oktavia(id_akomo,keterangan,tgl_akomo,jenis,debit) VALUES('$id_akomo','$keterangan','$tgl','$jenis','$debit')";
$sql7 = mysqli_query($koneksi, "INSERT INTO jurnal_oktavia (no_id,keterangan,tgl,jenis,uang_masuk) VALUES ('$kodeid', '$ket1', '$tgl_daftar', '$jenis','$debit')");
$sql = mysqli_query($koneksi, $mysqli);
$query = mysqli_query($koneksi, "SELECT * FROM saldo_oktavia ");
$data = mysqli_fetch_array($query);
$idbaru = $data['no'];
  if (is_null($idbaru)) {
    $sql3 = mysqli_query($koneksi, "INSERT INTO saldo_oktavia(no,saldoku)VALUES('$idbaru+1','$debit')");
  }else {    
    $sql3 = mysqli_query($koneksi, "UPDATE saldo_oktavia SET saldoku = $masuk");
}
}else if ($jenis == 'pengeluaran') {
  $mysqli ="INSERT INTO akomodasi_oktavia(id_akomo,keterangan,tgl_akomo,jenis,kredit) VALUES('$id_akomo','$keterangan','$tgl','$jenis','$kredit')";
  $sql7 = mysqli_query($koneksi, "INSERT INTO jurnal_oktavia (no_id,keterangan,tgl,jenis,uang_keluar) VALUES ('$kodeid', '$ket1', '$tgl_daftar', '$jenis','$kredit')");
$sql = mysqli_query($koneksi, $mysqli);
$query = mysqli_query($koneksi, "SELECT * FROM saldo_oktavia ");
$data = mysqli_fetch_array($query);
$idbaru = $data['no'];
  if (is_null($idbaru)) {
    $isiker = "-".$kredit;
$sql3 = mysqli_query($koneksi, "INSERT INTO saldo_oktavia(no,saldoku)VALUES('$idbaru+1','$isiker')");
    
  }else {
    $sql3 = mysqli_query($koneksi, "UPDATE saldo_oktavia SET saldoku = $keluar");
  }
}
if ($sql) {
  echo"<script>alert('Berhasil');</script>";
  ?>
  <script type="text/javascript">
    window.location.href="index2.php?page=akomo";
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
