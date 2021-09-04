<?php
$cariid = mysqli_query($koneksi, "SELECT max(id_beli) from pembelian_head_oktavia") or die (mysqli_error());
      $dataid = mysqli_fetch_array($cariid);
      if ($dataid) {
       $idbaru = substr($dataid[0], 11);
       $idku = $idbaru+1;
       if ($idku<10) {
        $kode_otomatis = "TRS".$tgl_id."000".$idku;
       }else if($idku>=10 && $idku<100){
        $kode_otomatis = "TRS".$tgl_id."00".$idku;
      }else if($idku>=100 && $idku<1000){
        $kode_otomatis = "TRS".$tgl_id."0".$idku;
       }else {
       $kode_otomatis = "TRS$tgl_id$idku";
      }
  }
?>