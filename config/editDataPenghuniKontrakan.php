<?php

  include 'koneksi.php';

  if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $u_id = $_POST['u_id'];
        $nama_penghuni = $_POST['nama_penghuni'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $ttl = $tempat_lahir . " / " . $tgl_lahir;
        $agama = $_POST['agama'];
        $pekerjaan = $_POST['pekerjaan'];
        $alamat_ktp = $_POST['alamat_ktp'];

        $query = mysqli_query($conn, "UPDATE penghuni_kontrakan SET nama_penghuni = '$nama_penghuni', ttl = '$ttl', agama = '$agama', pekerjaan = '$pekerjaan', alamat_ktp = '$alamat_ktp' WHERE u_id = '$u_id' ");
        if ($query) {
          echo "edit data penghuni kontrakan berhasil";
      }else{
        echo "edit data penghuni kontrakan gagal";
      }
  }
?>
