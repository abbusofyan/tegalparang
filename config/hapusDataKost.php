<?php
$u_id = $_REQUEST['u_id'];
include 'koneksi.php';
$query = "DELETE FROM kost WHERE u_id = '$u_id'";
if (mysqli_query($conn, $query)) {
  echo "Data kost berhasil di hapus";
}


 ?>
