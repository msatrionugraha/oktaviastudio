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
    <form method="POST" action="pages/akomodasi/report_filter.php" target="_blank">      
    <h4 class="modal-title">Pilih Tanggal
    </h4>
   <p style="font-size: 15px; margin-top: 20px;">Tanggal Mulai</p>
   <div class="form-group">
                                                <div class="input-group">
   <div class="input-group-addon">
                                                        <i class="fa fa-calendar-alt"></i>
                                                    </div>
                                                    <input type="date" id="username" name="from" placeholder="Username" class="form-control">
                                                </div>
                                            </div>
                                            <p style="font-size: 15px; margin-top: 10px;">Tanggal Akhir</p>
                                            <div class="form-group">
                                                <div class="input-group">
   <div class="input-group-addon">
                                                        <i class="fa fa-calendar-alt"></i>
                                                    </div>
                                                    <input type="date" id="username" name="end" placeholder="Username" class="form-control">
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
            <h1>Data Akomodasi</h1>
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
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable Akomodasi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="index2.php?page=masukakomo" class="btn btn-primary" style="color: white; margin-bottom: 10px;" id="simpan">+Tambah Data</a>
                <a target="" href="#popup" class="btn btn-success" style="color: white; margin-bottom: 10px;" id="simpan">Laporan</a>
                <a target="_blank" href="pages/import/form_upload_akomodasi.php" class="btn btn-warning" style="color: white; margin-bottom: 10px;" id="simpan">Import</a>
                <table id="dataTables-example" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id Akomodasi</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Jenis</th>
                    <th>Debit</th>
                    <th>Kredit</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                   <?php
                                    include '././koneksi.php';
                                    $no = 1;
                                    $sql = mysqli_query($koneksi,"select * from akomodasi_oktavia");
                                    while ($data = mysqli_fetch_array($sql)) {
                                    
                                    ?>
                                    <tr>
                                            <td><?php echo $data['id_akomo'];?></td>
                                            <td><?php echo $data['keterangan'];?></td>
                                            <td><?php echo $data['tgl_akomo'];?></td>
                                            <td><?php echo $data['jenis'];?></td>
                                            <td><?php echo 'Rp. '.number_format($data['debit']).',-' ?></td>
                                            <td><?php echo 'Rp. '.number_format($data['kredit']).',-' ?></td>
                                            <td>
                                                 <a onclick="return confirm('anda yakin akan menghapus isi ..?')" href="index2.php?page=hapusakomo&no=<?php echo $data['id_akomo'];?>" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</a>
                                              </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                  <tfoot>
                  <tr>
                    <th>Id Akomodasi</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Jenis</th>
                    <th>Debit</th>
                    <th>Kredit</th>
                    <th>Aksi</th>
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
  