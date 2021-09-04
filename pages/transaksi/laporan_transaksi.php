<?php

    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

include 'koneksi.php';

    date_default_timezone_set('Asia/Jakarta');

    function tgl_indo($tanggal){
        $bulan = array (
            1 =>    'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }

	$tanggal_awal = $_POST['tanggal_awal'];
	$tanggal_akhir = $_POST['tanggal_akhir'];
?>

<div class="page-header">
        <div class="row">
            <div class="col-lg-12" align="center">
                <h2 class="mb-3 line-head" >LAPORAN DATA PENJUALAN PENTHINK</h2>
                <h4 class="mb-3 line-head" >PERIODE</h4>
                <?php echo date("d-m-Y", strtotime($tanggal_awal))." s/d ".date("d-m-Y", strtotime($tanggal_akhir)) ?>
            </div>
        </div>
    </div><br>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table align="center" width="100%" border="1" style="border-collapse: collapse;">
                        <thead>
                            <tr>
                            	<th>No</th>
                                <th>Id Beli</th>
                    <th>Tanggal Beli</th>
                    <th>Nama Pembeli</th>
                    <th>Alamat Pembeli</th>
                    <th>No Telepon</th>
                    <th>Total Beli</th>
                    <th>Kekurangan</th>
                    <th>Tanggal Lunas</th>
                    <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                              include 'konek.php';
                                    $no = 1;
                                    $sql = mysqli_query($koneksi,"select * from pembelian_head_oktavia where tgl_beli between '$tanggal_awal' and '$tanggal_akhir' ORDER BY id_beli DESC");
                                    while ($data = mysqli_fetch_array($sql)) {
                                            ?>

                            <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td align="center"><?php echo $data['id_beli'];?></td>
                                             <td align="center"><?php echo $data['tgl_beli'];?></td>
                                            <td align="center"><?php echo $data['nm_beli'];?></td>
                                            <td align="center"><?php echo $data['alamat_beli'];?></td>
                                            <td align="center"><?php echo $data['no_telp'];?></td>
                                            <td align="center"><?php echo 'Rp. '.number_format($data['sub_bayar']).',-';?></td>
                                            <td align="center"><?php echo 'Rp. '.number_format($data['kurang']).',-';?></td>
                                            <td align="center"><?php echo $data['tgl_lunas'];?></td>
                                            <td align="center"><?php echo $data['keterangan'];?></td>
                            </tr>
                            

                        </tbody>
                        <?php 
                            $subtotal = $subtotal + $data['sub_bayar'];
                            $subtotal1 = $subtotal1 + $data['kurang'];
                                }
                            ?>
                        </tbody>
                        <tr>
                                <td colspan="8" height="30"><center>Jumlah</center></td>
                                <td colspan="2">
        <p><center><?php echo 'Rp. '.number_format($subtotal).',-' ?></center></p>
      </td>
                            </tr>
                            <tr>
                                <td colspan="8" height="30"><center>Jumlah Kekurangan</center></td>
                                <td colspan="2">
        <p><center><?php echo 'Rp. '.number_format($subtotal1).',-' ?></center></p>
      </td>
                            </tr>
                    </table>

                               <table align="center" width="100%" border="1" style="border-collapse: collapse; margin-top: 50px;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id Beli</th>
                                <th>Id Paket</th>
                    <th>Tanggal Beli</th>
                    <th>Nama Paket</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                              include 'konek.php';
                                    $no = 1;
                                    $sql = mysqli_query($koneksi,"select * from pembelian_det_oktavia where tgl_beli between '$tanggal_awal' and '$tanggal_akhir' ORDER BY id_beli DESC");
                                    while ($data = mysqli_fetch_array($sql)) {
                                            ?>

                            <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td align="center"><?php echo $data['id_beli'];?></td>
                                <td align="center"><?php echo $data['id_paket'];?></td>
                                             <td align="center"><?php echo $data['tgl_beli'];?></td>
                                            <td align="center"><?php echo $data['nama_paket'];?></td>
                                            <td align="center"><?php echo 'Rp. '.number_format($data['harga']).',-';?></td>
                                            <td align="center"><?php echo $data['jumlah'];?></td>
                                            <td align="center"><?php echo 'Rp. '.number_format($data['total']).',-';?></td>
                            </tr>
                            

                        </tbody>
                        <?php 
                            $subtotal3 = $subtotal3 + $data['total'];
                                }
                            ?>
                        </tbody>
                        <tr>
                                <td colspan="7" height="30"><center>Jumlah</center></td>
                                <td colspan="2">
        <p><center><?php echo 'Rp. '.number_format($subtotal3).',-' ?></center></p>
      </td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>