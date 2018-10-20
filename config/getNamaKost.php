<?php
  include 'koneksi.php';

  if ($_POST['pemilik']) {
    $pemilik = $_POST['pemilik'];
    $query = mysqli_query($conn, "SELECT * FROM kost WHERE pemilik = '$pemilik'");
    $total = mysqli_num_rows($query);
    if ($total > 0) {
      $no = 1;
      echo "<option value=''>--pilih kost--</option>";
      while ($row = mysqli_fetch_assoc($query)) {

        echo "<option value='".$row['nama_kost']." | ".$row['alamat'].", RT".$row['rt']. "/RW" . $row['rw']."'>".$row['nama_kost']." | ".$row['alamat'].", RT".$row['rt']. "/RW" . $row['rw']."</option>";
      }
    }else{
      echo "Data tidak ditemukan";
    }
  }

 ?>
