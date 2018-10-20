<?php
include 'koneksi.php';

$username = $_POST['username'];
$nik = $_POST['nik'];
$password = $_POST['password_baru'];
$query = mysqli_query($conn, "SELECT * FROM rt WHERE username = '$username' AND nik = '$nik'");

if (mysqli_num_rows($query) == 0) {
	echo "<script type='text/javascript'>alert('User tidak ditemukan')
    window.location ='../ganti_password';</script>";
}
else {
	$query = mysqli_query($conn, "UPDATE rt SET password = '$password' WHERE nik = '$nik'");
	echo "<script type='text/javascript'>alert('password berhasil di ubah')
    window.location ='../index';</script>";
}

?>
