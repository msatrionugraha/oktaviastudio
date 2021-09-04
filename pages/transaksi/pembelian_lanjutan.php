<?php
include '././koneksi.php';
$tgl_daftar = date("Y-m-d");
$tgl_id = date("Ymd");
$idbel = $_GET['idbel'];
$namaku = $_GET['namaku'];
$alamatku = $_GET['alamatku'];
$notelp = $_GET['notelp'];
?>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div id="popup1">
        <div class="window1">
            <a href="#" class="close-button" title="Close">X</a>
    <div class="table-responsive">
                                    <table id="dataTables-example" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th class="text-right">Id Paket</th>
                                                <th class="text-right">Nama Paket</th>
                                                <th class="text-right">Harga</th>
                                                <th class="text-right">Keterangan</th>
                                                
                                            </tr>
                                        </thead>
                                    <tbody>
                                    <?php
                                    include 'koneksi.php';
                                    $sql = mysqli_query($koneksi,"select * from paket_oktavia ORDER BY nama_paket ASC");
                                    while ($data = mysqli_fetch_array($sql)) {
                                            ?>
                                    <tr>
                                             <td class="text-right"><a href="#" id ="<?php echo $data['id_paket']?>" class="edit"><?php echo $data['id_paket'];?></a></td>
                                            <td class="text-right"><?php echo $data['nama_paket'];?></td>
                                            <td class="text-right"><?php echo $data['harga'];?></td>
                                            <td class="text-right"><?php echo $data['keterangan'];?></td>
                      
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                        </tbody>
                                    </table>
                                </div>
    <p>
</form>
</div>
</div>
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
                <h3 class="card-title">Masukan Pembelian</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

                  <form method="post" class="form-user">    
                <div class="card-body">
                  <div class="masuk1">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Id Pembelian</label>
                    <input type="text" class="form-control" id="id_beli" name="id_beli" value="<?php echo $idbel;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Pembeli</label>
                    <input type="text" class="form-control" id="nm_beli" name="nama_beli" value="<?php echo $namaku;?>" placeholder="Masukan Nama">
                    <input type="text" hidden="" id="tgl_beli" name="tgl_beli" value="<?php echo $tgl_daftar; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Alamat</label>
                    <input value="<?php echo $alamatku;?>" class="form-control" id="alamat_beli" name="alamat_beli" placeholder="Masukan Alamat"></input>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Nomor Telepon</label>
                    <input type="text" id="no_telp" value="<?php echo $notelp;?>" name="no_telp" class="form-control" placeholder="Masukan Nomor">
                  </div>
                  </div>
                  <div class="masuk3">
                        <div class="form-group">
                    <label for="exampleInputPaket">Pilihan Paket</label>
                    <select class="form-control select2" id="idpaket" name="idpaket" onchange="changeValue(this.value)" style="width: 50%;">
                    <option selected="selected"> Pilih</option>
                    <?php 
                    include '././koneksi.php';
       $sql=mysqli_query($koneksi, "select * from paket_oktavia"); 
       $jsArray = "var prd = new Array();\n";
       while ($data=mysqli_fetch_array($sql)) {
        echo '<option value="'.$data['id_paket'].'">'.$data['id_paket'].'</option> ';
        $jsArray .= "prd['" . $data['id_paket'] . "'] = {nama_paket:'" . addslashes($data['nama_paket']) . "'};\n";
        $jsArray2 .= "prd['" . $data['id_paket'] . "'] = {harga:'" . addslashes($data['harga']) . "'};\n";
       }
      ?>
                  </select>
                  <a href="#popup1" class="btn btn-primary" style=" margin-left:3px; margin-top:10px;"><i class="zmdi zmdi-back"></i>Cari</a>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Paket</label>
                    <input type="text" class="form-control" name="namapaket" id="nama_paket" placeholder="Masukan Nama Paket" readonly="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Harga Paket</label>
                    <input type="text" class="form-control" name="harga" id="hargaku" placeholder="Masukan Harga" readonly="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Jumlah Beli</label>
                    <input type="text" class="form-control" placeholder="Masukan Jumlah" name="jumlah" id="jumlah_beli">
                  </div>
                     <div class="form-group">
                    <label for="exampleInputPassword1">Total</label>
                    <input type="number" class="form-control" placeholder="Total" name="total" id="total_paket" readonly="">
                  </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a class="btn btn-primary" style="color: white;" id="submit">Submit</a>
                  <button type="reset" class="btn btn-danger" onclick="document.location.reload(true)">
                                             Reset
                                        </button>
                </div>
            
            </div>
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
    <div class="tampildata">
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
                                    $sql = mysqli_query($koneksi,"select * from pembelian_det_oktavia where id_beli='$idbel'");
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
      <td><a style="margin-right: 20px; " href="index2.php?page=bayar&no=<?php echo $idbel;?>" title="Bayar" class="btn btn-success">Pembayaran</a>
    <a onclick ="return confirm('Yakin Hapus Data ?')" href="index2.php?page=batal&no=<?php echo $idbel;?>" title="Batal" class="btn btn-danger">Batal Transaksi</a></td>
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
    </div>
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- /.content -->
<!-- ./wrapper -->

<!-- jQuery -->

