<?php
include '././koneksi.php';
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
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Id Pembelian</label>
                    <input type="text" class="form-control" id="id_beli" name="id_beli" value="<?php echo $kode_otomatis;?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Pembeli</label>
                    <input type="text" class="form-control" id="nm_beli" name="nama_beli" placeholder="Masukan Nama">
                    <input type="text" hidden="" id="tgl_beli" name="tgl_beli" value="<?php echo $tgl_daftar; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Alamat</label>
                    <textarea class="form-control" id="alamat_beli" name="alamat_beli" placeholder="Masukan Alamat"></textarea>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Nomor Telepon</label>
                    <input type="text" id="no_telp" name="no_telp" class="form-control" placeholder="Masukan Nomor">
                  </div>
                  <div class="masuk2">
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
</form>
                <div class="card-footer">
                  <a class="btn btn-primary" style="color: white;" id="submit">Submit</a>
                  <button type="reset" class="btn btn-danger" onclick="document.location.reload(true)">
                                             Reset
                                        </button>
                </div>
            </div>
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
        
    </div>
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- /.content -->
<!-- ./wrapper -->

<!-- jQuery -->