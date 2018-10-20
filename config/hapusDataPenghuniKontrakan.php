<?php

$u_id = $_REQUEST['u_id'];
include 'koneksi.php';
$query = "DELETE FROM penghuni_kontrakan WHERE u_id = '$u_id'";
if (mysqli_query($conn, $query)) {
  echo "Data penghuni kontrakan behasil di hapus";
}else{
  echo "<script type='text/javascript'>alert('hapus data kost gagal');
    window.location = '../data_penghuni_kontrakan';
  </script>";
}


 ?>
