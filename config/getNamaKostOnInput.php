<?php
  include 'koneksi.php';

  if ($_POST['nama_kost']) {
    $nama_kost = $_POST['nama_kost'];
    $query = mysqli_query($conn, "SELECT * FROM kost WHERE nama_kost = '$nama_kost'");
    $total = mysqli_num_rows($query);
    if ($total > 0) {
      $no = 1;
      echo "<option value=''>--alamat kost--</option>";
      while ($row = mysqli_fetch_assoc($query)) {

        echo "<option value='".$row['alamat'].", RT".$row['rt']. "/RW" . $row['rw']."'> ".$row['alamat'].", RT".$row['rt']. "/RW" . $row['rw']."</option>";
      }
    }else{
      echo "Data tidak ditemukan";
    }
  }

 ?>
