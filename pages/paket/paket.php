<?php
session_start();
$idpetugas = $_SESSION['id_petugas'];
include '././koneksi.php';
$tgl_daftar = date("d-m-Y");
$tgl_id = date("Ymd");
?>
<div class="konten">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Paket</h1>
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
                <h3 class="card-title">DataTable Paket</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="index2.php?page=masukpaket" class="btn btn-primary" style="color: white; margin-bottom: 10px;" id="simpan">+Tambah Data</a>
                <a target="_blank" href="pages/paket/report_filter.php" class="btn btn-success" style="color: white; margin-bottom: 10px;" id="simpan">Laporan</ann>
                <a target="_blank" href="pages/import/form_upload_paket.php" class="btn btn-warning" style="color: white; margin-bottom: 10px;" id="simpan">Import</a>
                <a target="_blank" href="download/formpaket.xls" class="btn btn-info" style="color: white; margin-bottom: 10px;" id="simpan">Download Formisian</a>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id Paket</th>
                    <th>Nama Paket</th>
                    <th>Harga Paket</th>
                    <th>Keterangan</th>
                    <th>Tanggal Masuk</th>
                    <th>Petugas Menginput</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                   <?php
                                    include '././koneksi.php';
                                    $no = 1;
                                    $sql = mysqli_query($koneksi,"select * from paket_oktavia");
                                    while ($data = mysqli_fetch_array($sql)) {
                                    
                                    ?>
                                    <tr>
                                            <td><?php echo $data['id_paket'];?></td>
                                            <td><?php echo $data['nama_paket'];?></td>
                                            <td ><?php echo 'Rp. '.number_format($data['harga']).',-';?></td>
                                            <td><?php echo $data['keterangan'];?></td>
                                            <td><?php echo $data['tgl_masuk'];?></td>
                                            <td><?php echo $data['id_petugas'];?></td>
                                            <td><a href="index2.php?page=edit&no=<?php echo $data['id_paket'];?>"  class="btn btn-info"><i class="fa fa-edit"></i>Ubah</a>
                                                 <a onclick="return confirm('anda yakin akan menghapus isi ..?')" href="index2.php?page=hapuspaket&no=<?php echo $data['id_paket'];?>" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</a>
                                              
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                  <tfoot>
                  <tr>
                    <th>Id Paket</th>
                    <th>Nama Paket</th>
                    <th>Harga Paket</th>
                    <th>Keterangan</th>
                    <th>Tanggal Masuk</th>
                    <th>Petugas Menginput</th>
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
  