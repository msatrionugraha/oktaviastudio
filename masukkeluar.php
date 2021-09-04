<?php
session_start();
$idpetugas = $_SESSION['id_petugas'];
include '././koneksi.php';
$tgl_daftar = date("d-m-Y");
$tgl_id = date("Ymd");
?>
<div id="popup">
        <div class="window">
            <a href="#" class="close-button" title="Close">X</a>
    <form method="POST" action="pages/pembukuan/laporan_masukkeluar.php" target="_blank">      
    <h4 class="modal-title">Pilih Tanggal
    </h4>
   <p style="font-size: 15px; margin-top: 20px;">Tanggal Mulai</p>
   <div class="form-group">
                                                <div class="input-group">
   <div class="input-group-addon">
                                                        <i class="fa fa-calendar-alt"></i>
                                                    </div>
                                                    <input type="date" id="username" name="tanggal_awal" placeholder="Username" class="form-control">
                                                </div>
                                            </div>
                                            <p style="font-size: 15px; margin-top: 10px;">Tanggal Akhir</p>
                                            <div class="form-group">
                                                <div class="input-group">
   <div class="input-group-addon">
                                                        <i class="fa fa-calendar-alt"></i>
                                                    </div>
                                                    <input type="date" id="username" name="tanggal_akhir" placeholder="Username" class="form-control">
                                                </div>
                                            </div>
    <p>
    <button class="btn btn-info" type="submit" name="submit" value="proses" style="width: 70px; font-size: 14px;" onclick="return valid();">Cari
    </button>
</form>
</div>
</div>
<div class="konten">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pemasukan dan Pengeluaran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Masuk - Keluar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable Pemasukan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a target="" href="#popup" class="btn btn-success" style="color: white; margin-bottom: 10px;" id="simpan">Laporan</a>
                <table id="dataTables-example" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id Payment</th>
                    <th>Id Beli</th>
                    <th>Tanggal Payment</th>
                    <th>Bayar</th>
                    <th>Kembalian</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php
                                    include '././koneksi.php';
                                    $no = 1;
                                    $sql = mysqli_query($koneksi,"select * from payment order by tgl_payment desc");
                                    while ($data = mysqli_fetch_array($sql)) {
                                    
                                    ?>
                                    <tr>
                                            <td><?php echo $data['id_payment'];?></td>
                                            <td><?php echo $data['id_beli'];?></td>
                                            <td><?php echo $data['tgl_payment'];?></td>
                                           <td align="center"><?php echo 'Rp. '.number_format($data['bayar']).',-' ?></td>
                                            <td align="center"><?php echo 'Rp. '.number_format($data['kembali']).',-' ?></td>
                                              
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                  <tfoot>
                  <tr>
              <th>Id Payment</th>
                    <th>Id Beli</th>
                    <th>Tanggal Payment</th>
                    <th>Bayar</th>
                    <th>Kembalian</th>
                  </tr>
                  </tfoot>
                </table>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    </div>
  