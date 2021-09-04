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
    <form method="POST" action="pages/transaksi/report_filter.php" target="_blank">      
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
            <h1>Data Panjualan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Paket</li>
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
                <h3 class="card-title">DataTable Penjualan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="tampilku">
        
                <a href="index2.php?page=transaksi" class="btn btn-primary" style="color: white; margin-bottom: 10px;" id="simpan">+Tambah Data</a>
                <a  href="#popup" class="btn btn-success" style="color: white; margin-bottom: 10px;" id="simpan">Laporan</a>
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id Beli</th>
                    <th>Tanggal Beli</th>
                    <th>Nama Pembeli</th>
                    <th>Alamat Pembeli</th>
                    <th>No Telepon</th>
                    <th>Total Beli</th>
                    <th>Kekurangan</th>
                    <th>Tanggal Lunas</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                   <?php
                                    include '././koneksi.php';
                                    $no = 1;
                                    $sql = mysqli_query($koneksi,"select * from pembelian_head_oktavia order by id_beli asc");
                                    while ($data = mysqli_fetch_array($sql)) {
                                    $idku = $data['id_beli'];
                                    $kur = $data['kurang'];
                                    $liat = $data['keterangan'];
                                    ?>
                                    <tr>
                                      <td>
                                            <?php if ($liat == 'Belum Selesai' && $kur>0) {
                                              ?>
                                            <font style="color: red;"><?php echo $data['id_beli'];?></font>
                                            <?php 
                                            }else if($liat == 'Selesai' && $kur>0){
                                              ?>
                                              <font style="color: orange;"><?php echo $data['id_beli'];?></font>
                                            <?php 

                                            }else if($liat == 'Belum Selesai' && $kur<=0){
                                              ?>
                                              <font style="color: blue;"><?php echo $data['id_beli'];?></font>
                                              <?php
                                            }else if($liat == 'Selesai' && $kur<=0){
                                              ?>
                                              <font style="color: black;"><?php echo $data['id_beli'];?></font>
                                              <?php
                                            }
                                            ?>                                         
                                            <td><?php echo $data['tgl_beli'];?></td>
                                            <td><?php echo $data['nm_beli'];?></td>
                                            <td><?php echo $data['alamat_beli'];?></td>
                                            <td><?php echo $data['no_telp'];?></td>
                                            <td ><?php echo 'Rp. '.number_format($data['sub_bayar']).',-';?></td>
                                            <td ><?php echo 'Rp. '.number_format($data['kurang']).',-';?></td>
                                            <td><?php echo $data['tgl_lunas'];?></td>
                                            <td><?php echo $data['keterangan'];?></td>
                                            <td>
                                              <?php
                                              
                                              if ($liat == 'Selesai' && $kur<=0) {
                                              ?>
                                              <a href="index2.php?page=info&no=<?php echo $data['id_beli'];?>" class="btn btn-warning btn-sm"><i class="fa fa-trash"></i>Info</a>
                                            <?php 
                                          }else if($liat == 'Belum Selesai' && $kur<=0) {

                                              ?>
                                              <a href="index2.php?page=sukses&no=<?php echo $data['id_beli'];?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>Selesai</a>
                                              <a href="index2.php?page=info&no=<?php echo $data['id_beli'];?>" class="btn btn-warning btn-sm"><i class="fa fa-trash"></i>Info</a>
                                              <?php
                                            }else if($liat == 'Belum Selesai' && $kur>0){
                                              ?>
                                              <a href="index2.php?page=info&no=<?php echo $data['id_beli'];?>" class="btn btn-warning btn-sm"><i class="fa fa-trash"></i>Info</a>
                                              <a href="index2.php?page=lunas&no=<?php echo $data['id_beli'];?>" class="btn btn-warning btn-sm"><i class="fa fa-save"></i>Bayar</a>
                                            <?php
                                            }
                                              
                                              ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                  <tfoot>
                  <tr>
                 <th>Id Beli</th>
                    <th>Tanggal Beli</th>
                    <th>Nama Pembeli</th>
                    <th>Alamat Pembeli</th>
                    <th>No Telepon</th>
                    <th>Total Beli</th>
                    <th>Kekurangan</th>
                    <th>Tanggal Lunas</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
                </div>
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
  