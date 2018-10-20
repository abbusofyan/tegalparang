<?php
include 'koneksi.php';
if ($_GET['tahun']) {
  $bulan = $_GET['bulan'];
  $tahun = $_GET['tahun'];
  $hasil = $tahun . '-' . $bulan;
  $query = "SELECT SUBSTRING_INDEX (tanggal,'-',2) FROM kost GROUP BY SUBSTRING_INDEX (tanggal,'-',2)";
  $results = mysqli_query($conn, $query);
  $total = mysqli_num_rows($results);

  while ($data = mysqli_fetch_array($results)) {
    $hasil = $tahun . '-' . $bulan;
    if ($data['SUBSTRING_INDEX (tanggal,' - ',1)'] != $hasil) {
      // echo "data tidak ditemukan";
      continue;
    } else {
      echo "data ditemukan";
      break;
    }

  }
}
?>