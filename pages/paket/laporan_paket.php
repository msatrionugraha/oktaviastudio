<?php

    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

include 'konek.php';

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

<script>
     window.print()
</script>

<div class="page-header">
        <div class="row">
            <div class="col-lg-12" align="center">
                <h2 class="mb-3 line-head" >LAPORAN DATA PAKET PENTHINK</h2>
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
                    <th>Id Paket</th>
                    <th>Nama Paket</th>
                    <th>Harga Paket</th>
                    <th>Keterangan</th>
                    <th>Tanggal Masuk</th>
                    <th>Petugas Menginput</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                              include '../../koneksi.php';
                                    $no = 1;
                                    $sql = mysqli_query($koneksi,"select * from paket ORDER BY nama_paket DESC");
                                    while ($data = mysqli_fetch_array($sql)) {
                                            ?>

                            <tr>
                                <td align="center"><?php echo $no++; ?></td>
                           <td><?php echo $data['id_paket'];?></td>
                                            <td><?php echo $data['nama_paket'];?></td>
                                            <td><?php echo 'Rp. '.number_format($data['harga']).',-'?></td>
                                            <td><?php echo $data['keterangan'];?></td>
                                            <td><?php echo $data['tgl_masuk'];?></td>
                                            <td><?php echo $data['id_petugas'];?></td>
                            </tr>
                            <?php 
                              
                                }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>