<?php
$u_id = $_GET['u_id'];
include 'koneksi.php';
$query = "DELETE FROM penghuni_kost WHERE u_id = '$u_id'";
if (mysqli_query($conn, $query)) {

  echo "<script type='text/javascript'>alert('Data penghuni kost berhasil dihapus');
    window.location = '../detail_penghuni_kost.php';
  </script>";

}else{
  echo "<script type='text/javascript'>alert('hapus data kost gagal');
    window.location = '../detail_penghuni_kost';
  </script>";
}


 ?>
