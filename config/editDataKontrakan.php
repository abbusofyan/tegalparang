<?php

  include 'koneksi.php';

  if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $u_id = $_REQUEST['u_id'];
        $no_telp = $_REQUEST['no_telp'];
        $status_tanah = $_REQUEST['status'];
        $no_imb = $_REQUEST['no_imb'];
        $no_izin_kontrakan = $_REQUEST['no_izin_kontrakan'];
        $sistem_sewa = $_REQUEST['sistem_sewa'];

        $query = mysqli_query($conn, "UPDATE kontrakan SET no_telp = '$no_telp', status_tanah = '$status_tanah', no_imb = '$no_imb', no_izin_kontrakan = '$no_izin_kontrakan', sistem_sewa = '$sistem_sewa' WHERE u_id = '$u_id' ");
        if ($query) {
          echo "edit data kontrakan berhasil";
      }else{
        echo "edit data kontrakan gagal";
      }
  }
?>
