 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row" >
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                                            include 'koneksi.php';
                                            $sql1 = mysqli_query($koneksi,"select * from pembelian_head_oktavia");
                                            while ($data1 = mysqli_fetch_array($sql1)) {
                                                $totharga1 = $data1['sub_bayar'];
                                                $totbarang1 += $totharga1;
                                                }    
                                                $jum = mysqli_num_rows($sql1);
                                            ?>
                                            <?php
                                            include 'koneksi.php';
                                            $sql1 = mysqli_query($koneksi,"select * from payment");
                                            while ($data1 = mysqli_fetch_array($sql1)) {
                                                $totpay = $data1['bayar'];
                                                $totpayment += $totpay;
                                                }                                             
                                            ?>
                                            <?php
                                            include 'koneksi.php';
                                            $sql1 = mysqli_query($koneksi,"select * from akomodasi_oktavia");
                                            while ($data1 = mysqli_fetch_array($sql1)) {
                                                $totkred = $data1['kredit'];
                                                $totkredit += $totkred;
                                                $totdeb = $data1['debit'];
                                                $totdebit += $totdeb;
                                                }                                             
                                            ?>
                                              <?php
                                            include 'koneksi.php';
                                            $sql1 = mysqli_query($koneksi,"select * from karyawan");
                                            while ($data1 = mysqli_fetch_array($sql1)) {
                                                $totgaj = $data1['gaji'];
                                                $totgaji += $totgaj;
                                                }                                             
                                            ?>
                                            <?php
                                            include 'koneksi.php';
                                            $sql1 = mysqli_query($koneksi,"select * from saldo");
                                            while ($data1 = mysqli_fetch_array($sql1)) {
                                                $totsaldo = $data1['saldoku'];
                                                }                                             
                                                $totmas = $totdebit + $totpayment;
                                                $totkel  = $totkredit + $totgaji;
                                                $sisa = $totmas - $totkel;
                                            ?>
                                            <?php
                                            include 'koneksi.php';
                                            $sqlku = mysqli_query($koneksi,"select * from karyawan_oktavia");
                                            $kar = mysqli_num_rows($sqlku);
                                            
                                            ?>
                <?php
                                            include 'koneksi.php';
                                            $sql1 = mysqli_query($koneksi,"select * from pembelian_head");
                                            $data = mysqli_num_rows($sql1);
                                            ?>
                <h2><?php echo 'Rp. '.number_format($totmas).',-'  ?></h2>

                <p>Pemasukan</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Info Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h2><?php echo 'Rp. '.number_format($totmas).',-'  ?></h2>

                <p>Jumlah Terjual</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="index2.php?page=akomo" class="small-box-footer">Info Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h2><?php echo $kar;?></h2>

                <p>Karyawan</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="index2.php?page=akomo" class="small-box-footer">Info Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h2><?php echo $jum;?></h2>

                <p>Penjualan</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="index2.php?page=pembayaran" class="small-box-footer">Info Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
          <!-- ./col -->
        <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <!-- /.card -->

           
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    </div>
              <!-- /.card-header -->
              
        <!-- /.row -->
        <!-- Main row -->
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
