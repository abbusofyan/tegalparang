<?php
$u_id = $_GET['u_id'];
include 'koneksi.php';
$query = "DELETE FROM penghuni_kontrakan WHERE u_id = '$u_id'";
if (mysqli_query($conn, $query)) {
  echo "<script type='text/javascript'>alert('Data penghuni kontrakan berhaisl dihapus');
    window.location = '../detail_penghuni_kontrakan.php';
  </script>";
}else{
  echo "<script type='text/javascript'>alert('hapus data kost gagal');
    window.location = '../detail_penghuni_kontrakan';
  </script>";
}


 ?>
