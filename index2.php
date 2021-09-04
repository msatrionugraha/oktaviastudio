<?php
error_reporting(E_ALL ^ (E_NOTICE|E_WARNING));
include "function.php";
session_start();
$petugas=$_SESSION['username'];
$idpetugas = $_SESSION['id_petugas'];
$level = $_SESSION['level'];
if (empty($_SESSION['username']) and empty($_SESSION['password'])){
    echo "<script>alert('harus login dulu');window.location='index.php'</script>";
    $tgl_daftar = date("Y-m-d");
    $tgl_id = date("Ymd");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>OKTAVIA STUDIO</title>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="jquery-3.4.1.min.js" type="text/javascript"></script>
   <style type="text/css">
    .tombol_masuk{
      float: right;
    }
    .card-body {
      width: 500px;
    }
    .card{
      width: 1000px;
    }
    .masuk1paket{
      width: 400px;
    }
    .masuk1paket{
      width: 800px;
    }
    .masuk2{
      width: 400px;
      float: left;
      margin-left: 500px;
      margin-top: -370px;
    }
    .masuk3{
      width: 400px;
      float: left;
      margin-left: 500px;
      margin-top: -350px;
    }
      .awak{
      margin-bottom: 100px;
      
    }
    #popup {
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    visibility: hidden;
    z-index: 9999;
    background: rgba(0,0,0,.7);
}
#popup1 {
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    visibility: hidden;
    z-index: 9999;
    background: rgba(0,0,0,.7);
}

.window {
    box-shadow: 3px 3px 2px rgba(0,0,0,0.4);
            border: 5px;
    width: 420px;
    height: 400px;
    background: #fff;
    border-radius: 10px;
    position: relative;
    padding: 10px;
    text-align: center;
    margin: 5% auto;
    font-size: 14px;
  z-index : 3;
}
.window1 {
    box-shadow: 3px 3px 2px rgba(0,0,0,0.4);
            border: 5px;
    width: 820px;
    height: 70%;
    background: #fff;
    border-radius: 10px;
    position: relative;
    padding: 10px;
    text-align: center;
    margin: 5% auto;
    font-size: 14px;
  z-index : 3;
}
.window h2 {
    margin: 30px 0 0 0;
}
/* Button Close */
.close-button {
    width: 6%;
    height: 8%;
    line-height: 23px;
    background: #000;
    border-radius: 50%;
    border: 3px solid #fff;
    display: block;
    text-align: center;
    color: #fff;
    text-decoration: none;
    position: absolute;
    top: -10px;
    right: -10px;   
}

/* Memunculkan Jendela Pop Up*/
#popup:target {
    visibility: visible;
}
#popup1:target {
    visibility: visible;
}
.table{
      width: 900px;
      margin-top: 10px;
    }
    .tabel{
      width: 900px;
      margin-top: 10px;
    }
    .tabelku{
      width: 900px;
      margin-top: 10px;
      margin-left: 200px;
    }
    .kecil{
      width: 900px; 
    }
    .rowjadi{
      width: 900px; 
    }
    .tengah{
      width: 400px; 
    }
   @media screen and (max-width: 500px){
     .rowjadi{
      width: 100%; 
    }
      .table{
      width: 300px;
      font-size: 10px;
    }
    .kecil{
     width: 450px;
    }
    .btn{
      font-size: 10px;
    }
      .card{
        width: 500px;
      }
      .masuk1paket{
      width: 100%;
    }
      .card-body{
        width: 100%;
      }
      .card-primary{
        width: 100%;
      }
      .masuk2{

       margin-left: 0px;
      margin-top: 0px;
      }
      .konten{
        width: 900px;
      }

    }
 </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index2.php" class="brand-link">
      <i class="fas fa-laugh-wink"></i>
      <span class="brand-text font-weight-light">OKTAVIA STUDIO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $petugas=$_SESSION['nama_ptgs']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <?php
      if ($level=='1'){
      ?>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
          <a href="index2.php?page=home" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
                <p>Dashboard
                </p>
              </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Transaksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index2.php?page=pembayaran" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index2.php?page=akomo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembelian</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index2.php?page=paket" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index2.php?page=karyawan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Karyawan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Admin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a target="_blank" href="export.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Backup</p>
                </a>
              </li>
              <li class="nav-item">
                <a target="_blank" href="restore.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Restore</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index2.php?page=ganti" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ganti Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="logout.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <?php
     }if($level=='2'){
      ?>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
          <a href="index2.php?page=home" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
                <p>Dashboard
                </p>
              </a>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Transaksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index2.php?page=pembayaran" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index2.php?page=akomo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembelian</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index2.php?page=paket" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index2.php?page=karyawan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Karyawan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Admin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index2.php?page=forbiden" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Backup</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index2.php?page=forbiden" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Restore</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index2.php?page=ganti" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ganti Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="logout.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
  <?php
     }if($level=='3'){
      ?>
            ?>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
          <a href="index2.php?page=home" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
                <p>Dashboard
                </p>
              </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Transaksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index2.php?page=forbiden" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index2.php?page=forbiden" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembelian</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               <a href="index2.php?page=forbiden" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produk</p>
                </a>
              </li>
              <li class="nav-item">
               <a href="index2.php?page=forbiden" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Karyawan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Admin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               <a href="index2.php?page=forbiden" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Backup</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="index2.php?page=forbiden" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Restore</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index2.php?page=ganti" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ganti Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="logout.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
     <?php
     }
      ?>
    <!-- /.sidebar -->
  </aside>
  <?php 

  if(isset($_GET['page'])){
    $page = $_GET['page'];
 
    switch ($page) {
      case 'home':
        include "index3.php";
        break;
        case 'forbiden':
        include "forbidden.php";
        break;
      case 'transaksi':
        include "pages/transaksi/pembelian.php";
        break;
      case 'paket':
        include "pages/paket/paket.php";
        break;
      case 'edit':
        include "pages/paket/edit_paket.php";
        break;
      case 'masukpaket':
        include "pages/paket/input_paket.php";
        break;
      case 'hapuspaket':
        include "pages/paket/hapus_paket.php";
        break;
      case 'tambah':
        include "pages/transaksi/tambah_beli.php";
        break;
      case 'hapus':
        include "pages/transaksi/hapus_beli.php";
        break;      
      case 'lanjut':
        include "pages/transaksi/pembelian_lanjutan.php";
        break; 
      case 'kurang':
        include "pages/transaksi/kurang_beli.php";
        break;
      case 'batal':
        include "pages/transaksi/batal_beli.php";
        break;      
      case 'lunas':
        include "pages/transaksi/lunas.php";
        break;
      case 'pembayaran':
        include "pages/transaksi/data_pembayaran.php";
        break;      
      case 'sukses':
        include "pages/transaksi/sukses.php";
        break;
      case 'karyawan':
        include "pages/karyawan/karyawan.php";
        break;
      case 'input_karyawan':
        include "pages/karyawan/input_karyawan.php";
        break;
      case 'edit_karyawan':
        include "pages/karyawan/edit_karyawan.php";
        break;
      case 'hapus_karyawan':
        include "pages/karyawan/hapus_karyawan.php";
        break;
      case 'bayar':
        include "pages/transaksi/pembayaran.php";
        break;
      case 'info':
        include "pages/transaksi/info.php";
        break;
      
      case 'hapusakomo':
        include "pages/akomodasi/hapus_akomo.php";
        break;
      case 'akomo':
        include "pages/akomodasi/akomo.php";
        break;
      case 'masukakomo':
        include "pages/akomodasi/input_akomo.php";
        break;
      case 'ganti':
        include "ganti.php";
        break;
      default:
        echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
        break;
    }
  }else{
    include "index3.php";
  }
 
   ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright 2021 OKTAVIA STUDIO</strong>
    All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script>
  $(document).ready(function () {
                $('#dataTables-example').dataTable(

                  );
            });
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- page script -->
<script src="js/main.js"></script>
<script type="text/javascript"> 
    $(document).ready(function(){
    $("#submit").click(function(){
      var nm = document.getElementById('nm_beli').value;
      var alm = document.getElementById('alamat_beli').value;
      var notlp = document.getElementById('no_telp').value;
      var idpkt = document.getElementById('idpaket').value;
      var nmpkt = document.getElementById('nama_paket').value;
      var jmlu = document.getElementById('jumlah_beli').value;
      if (nm == '' || alm == '' || notlp == '' || idpkt == '' || nmpkt == '' || jmlu == '0') {
        window.alert("Isi Dengan Benar !");
      }else {
        var data = $('.form-user').serialize();
        $.ajax({
        type: 'POST',
        url: "pages/transaksi/insert_beli.php",
        data: data,
        success: function() {
                          $("#idpaket").val("");
                          $("#nama_paket").val("");
                          $("#hargaku").val("");
                          $("#jumlah_beli").val("0");
                          $("#total_paket").val("0");
                          $('.tampildata').load("pages/transaksi/tampil_data.php");
        }
      });
      }
    });
  });
    $(document).ready(function(){
    $("#masuk").click(function(){
      var data = $('.formku').serialize();
      $.ajax({
        type: 'POST',
        url: "pages/transaksi/update_beli.php",
        data: data,
        success: function() {
                          $("#subtotal").attr('disabled','true');
                          $("#bayar").attr('disabled','true');
                          $("#kurang").attr('disabled','true');
                          $("#kembali").attr('disabled','true');
        }
      });
    });
    });    
    $(document).ready(function(){
    $("#lunasi").click(function(){
      var data = $('.formlunas').serialize();
      $.ajax({
        type: 'POST',
        url: "pages/transaksi/lunas_beli.php",
        data: data,
        success: function() {
                          $("#subtotal").attr('disabled','true');
                          $("#bayar").attr('disabled','true');
                          $("#kurang").attr('disabled','true');
                          $("#kembali").attr('disabled','true');
        }
      });
    });
    }); 
    $(document).on("click",".sukses", function () {
    var row=$(this);
    var id=$(this).attr("id");
    $("#id").val(id);
    var nameid = row.closest("tr").find("td:eq(0)").text();
    $("#idpaket").val(nameid);
    var data = $("#idpaket").val(); 
      $.ajax({
        type: 'POST',
        url: "pages/transaksi/sukses.php",
        data: data,
        success: function() {
                          $('.tampilku').load("pages/transaksi/data_pembayaranku.php");
        }
      });
    });
function changeValue(id){  
       <?php echo $jsArray; ?> 
    document.getElementById('nama_paket').value = prd[id].nama_paket; 
    <?php echo $jsArray2; ?> 
    document.getElementById('hargaku').value = prd[id].harga;   
    };
    $(document).on("click",".edit", function () {
    var row=$(this);
    var id=$(this).attr("id");
    $("#id").val(id);
    
    var nameid = row.closest("tr").find("td:eq(0)").text();
    var name = row.closest("tr").find("td:eq(1)").text();
    var namesat = row.closest("tr").find("td:eq(2)").text();
    $("#idpaket").val(nameid);
    $("#nama_paket").val(name);
    $("#hargaku").val(namesat);
    });  
    
 $(document).ready(function () {
    $("#hargaku").val(0);
    $("#jumlah_beli").val(0);
    $("#total_paket").val(0);
    var total = parseInt($("#hargaku").val())*parseInt($("#jumlah_beli").val());

    
       var total = parseInt($("#hargaku").val())*parseInt($("#jumlah_beli").val());
      $("#total_paket").val(total);

      $("#jumlah_beli").keyup(function () {
        if (parseInt($(this).val()) < 0) {
          alert("Jumlah Beli tidak boleh kurang dari '0' !");
          $(this).val("0");
        }
        var total = parseInt($(this).val())*parseInt($("#hargaku").val());
        $("#total_paket").val(total);
      });
      $("#jumlah_beli").click(function () {
        if (parseInt($(this).val()) < 0) {
          alert("jumlah_beli tidak boleh kurang dari '0' !");
          $(this).val("0");
        }
        var total = parseInt($(this).val())*parseInt($("#hargaku").val());
        $("#total_paket").val(total);
      });
    });
     function hitung(){
    var subtotal = document.getElementById('subtotal').value;

    var bayar = document.getElementById('bayar').value;
    
    var kembali = parseInt(bayar) - parseInt(subtotal);
    var kurang = parseInt(subtotal) - parseInt(bayar);
    if ((kembali)>0) {
      document.getElementById('kembali').value = kembali;
      document.getElementById('kurang').value = '0';
    } else{
      document.getElementById('kembali').value = '0';
      document.getElementById('kurang').value = kurang;
    }
  }
    function hitung1(){
    var kurang = document.getElementById('kurang').value;

    var bayar = document.getElementById('bayar').value;
    
    var sisa = parseInt(bayar) - parseInt(kurang);
    if ((sisa)>0) {
      document.getElementById('sisa').value = sisa;
    } else{
      document.getElementById('sisa').value = 0;
    }
  }
   $(document).ready(function(){
          $("#jenis").change(function() {
              var jenis = $("#jenis").val();
              if (jenis == "pengeluaran") {
                  // menghapus attribute readonlye dari textfield
                  $('#kredit').removeAttr('disabled');
                  $('#debit').attr('disabled','true');
                  // menyelipkan attribute readonlye ke dalam textfield
                  // memasukan sebuah nilai / value kedalam textfield
          
              } else if (jenis == "pemasukan") {
                  // menghapus attribute readonlye dari textfield
                  $('#debit').removeAttr('disabled');
                  $('#kredit').attr('disabled','true');
                  // menyelipkan attribute readonlye ke dalam textfield
                  // memasukan sebuah nilai / value kedalam textfield
              } else{
                $('#debit').attr('disabled','true');
                $('#kredit').attr('disabled','true');
              }
          });
      });
    
    </script> 
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>
