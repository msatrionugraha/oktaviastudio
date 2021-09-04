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
            <h1>Data Karyawan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Karyawan</li>
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
                <h3 class="card-title">DataTable karyawan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="index2.php?page=input_karyawan" class="btn btn-primary" style="color: white; margin-bottom: 10px;" id="simpan">+Tambah Data</a>
                <a target="_blank" href="pages/karyawan/report_filter.php" class="btn btn-success" style="color: white; margin-bottom: 10px;" id="simpan">Laporan</a>
                <a target="_blank" href="pages/import/form_upload_karyawan.php" class="btn btn-warning" style="color: white; margin-bottom: 10px;" id="simpan">Import</a>
                <a target="_blank" href="download/formkaryawan.xls" class="btn btn-info" style="color: white; margin-bottom: 10px;" id="simpan">Download Formisian</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                    <th>Id Karyawan</th>
                    <th>Nama Karyawan</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Jabatan</th>
                    <th>Gaji</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                   <?php
                                    include '././koneksi.php';
                                    $no = 1;
                                    $sql = mysqli_query($koneksi,"select * from karyawan_oktavia");
                                    while ($data = mysqli_fetch_array($sql)) {
                                    
                                    ?>
                                    <tr>
                                            <td><?php echo $data['id_karyawan'];?></td>
                                            <td><?php echo $data['nama'];?></td>
                                            <td><?php echo $data['alamat'];?></td>
                                            <td><?php echo $data['no_telp'];?></td>
                                            <td><?php echo $data['jabatan'];?></td>
                                            <td ><?php echo 'Rp. '.number_format($data['gaji']).',-';?></td>
                                            <td><a href="index2.php?page=edit_karyawan&no=<?php echo $data['id_karyawan'];?>"  class="btn btn-info"><i class="fa fa-edit"></i>Ubah</a>
                                                 <a onclick="return confirm('anda yakin akan menghapus isi ..?')" href="index2.php?page=hapus_karyawan&no=<?php echo $data['id_karyawan'];?>" class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</a>
                                              
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                  <tfoot>
                  <tr>
                     <th>Id Karyawan</th>
                    <th>Nama Karyawan</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Jabatan</th>
                    <th>Gaji</th>
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
  