<?php

    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

include '../../koneksi.php';

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
<script >
    window.print()
</script>
<div class="page-header">
        <div class="row">
            <div class="col-lg-12" align="center">
                <h2 class="mb-3 line-head" >LAPORAN DATA AKOMODASI PENTHINK</h2>
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
                                 <th>Id Akomodasi</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Jenis</th>
                    <th>Debit</th>
                    <th>Kredit</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                              include 'konek.php';
                                    $no = 1;
                                    $sql = mysqli_query($koneksi,"select * from akomodasi where tgl_akomo between '$tanggal_awal' and '$tanggal_akhir' ORDER BY id_akomo DESC");
                                    while ($data = mysqli_fetch_array($sql)) {
                                            ?>

                            <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td align="center"><?php echo $data['id_akomo'];?></td>
                                            <td align="center"><?php echo $data['keterangan'];?></td>
                                            <td align="center"><?php echo $data['tgl_akomo'];?></td>
                                            <td align="center"><?php echo $data['jenis'];?></td>
                                           <td align="center"><?php echo 'Rp. '.number_format($data['debit']).',-' ?></td>
                                            <td align="center"><?php echo 'Rp. '.number_format($data['kredit']).',-' ?></td>
                            </tr>
                            

                        </tbody>
                        <?php 
                            $subtotal = $subtotal + $data['debit'];
                            $subtotal1 = $subtotal1 + $data['kredit'];
                                }
                            ?>
                        </tbody>
                        <tr>
                                <td colspan="5" height="30"><center>Jumlah Debit</center></td>
                                <td colspan="1">
        <p><center><?php echo 'Rp. '.number_format($subtotal).',-' ?></center></p>
      </td>
      <td></td>
                            </tr>
                            <tr>
                                <td colspan="5" height="30"><center>Jumlah Kredit</center></td>
                                <td></td>
                                <td colspan="1">
        <p><center><?php echo 'Rp. '.number_format($subtotal1).',-' ?></center></p>
      </td>
                            </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>