<?php
session_start();
session_destroy();
echo "<script>alert('anda sudah keluar');window.location='index.php'</script>";
?>
