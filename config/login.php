<?php
  include 'koneksi.php';

  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = mysqli_query($conn, "SELECT * FROM rt WHERE username = '$username' AND password = '$password'");
  if (mysqli_num_rows($query) > 0) {
      $row = mysqli_fetch_assoc($query);
      session_start();
      $_SESSION['user'] = $username;
      $_SESSION['rt'] = $row['rt'];
      $_SESSION['rw'] = $row['rw'];
      header('location: ../kost');
  }else{
  $query2 = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
  if (mysqli_num_rows($query2) > 0) {
      $row = mysqli_fetch_assoc($query2);
      session_start();
      $_SESSION['user'] = $username;
      header('location: ../data_kost');
  }else{
    echo "<script type='text/javascript'>alert('username atau password salah')
    window.location ='../index';</script>";
  }
}
 ?>
