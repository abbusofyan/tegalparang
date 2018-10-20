<?php
  include 'koneksi.php';

  if ($_POST['nik']) {
    $nik = $_POST['nik'];
    if ($nik < 16) {
      echo "<p>panjang NIK kurang</p>";
    }elseif ($nik > 16) {
      echo "<p>panjang NIK lebih</p>";
    }
  }

 ?>
