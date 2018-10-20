<?php

  include 'koneksi.php';

  if($_SERVER['REQUEST_METHOD'] == "POST")
    {
 $u_id = $_POST['alamat'];
        $telp = $_POST['no_telp'];
        $status = $_POST['status_tanah'];
        $harga_sewa = $_POST['harga_sewa'];
        $fasilitas = $_POST['fasilitas'];
        $sisa_kamar = $_POST['sisa_kamar'];

        $query = "UPDATE kost SET no_telp = '$telp', status_tanah = '$status', harga_sewa = '$harga_sewa', fasilitas = '$fasilitas', sisa_kamar = '$sisa_kamar' WHERE u_id = '$u_id'";

        if (mysqli_query($conn, $query)) {
          echo "<script type='text/javascript'>alert('Data berhasil di update')
          window.location = '../cek_data_kost';
          </script>";
        }else{
          echo "Update data kost gagal";
        }

}
?>
