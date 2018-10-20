<?php
  include 'koneksi.php';

  if ($_POST['pemilik']) {
    $pemilik = $_POST['pemilik'];
    $query = mysqli_query($conn, "SELECT * FROM kost WHERE pemilik = '$pemilik'");
    while ($row = mysqli_fetch_assoc($query)) {
      echo "<input type='text' name='alamat_kost' class='form-control' value='".$row['alamat']."'>";
    }
  }

 ?>
