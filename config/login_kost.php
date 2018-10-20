<?php
  include 'koneksi.php';

  $nik = $_POST['nik'];

  $query = mysqli_query($conn, "SELECT * FROM kost WHERE nik = '$nik'");
  if (mysqli_num_rows($query) > 0){
    session_start();
    $_SESSION['nik'] = $nik;
    header('location: ../penghuni_kost');
  }else{
    $query2 = mysqli_query($conn, "SELECT * FROM kontrakan WHERE nik = '$nik'");
    if (mysqli_num_rows($query2) > 0) {
      session_start();
      $_SESSION['nik'] = $nik;
      header('location: ../penghuni_kontrakan');
    }else{
      echo "<script type='text/javascript'>alert('NIK anda belum terdaftar. Silahkan menghubungi ketua RT setempat')
    	window.location ='../login_kost';</script>";
    }
  }


 ?>
