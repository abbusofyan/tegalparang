<?php
$u_id = $_REQUEST['u_id'];
include 'koneksi.php';
$query = "DELETE FROM kontrakan WHERE u_id = '$u_id'";
if (mysqli_query($conn, $query)) {
  echo "Data kontrakan behasil dihapus";
}


 ?>
