<?php

  include 'koneksi.php';

  function randomString($length)
    {
        $char        = "1234567890abcdefghijklmnopqrstuvwxyz";
        $char_length = strlen($char);

        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $char[rand(0, $char_length - 1)];
        }

        return $randomString;
    }
    $u_id = randomString(6);
    $query_uid = "SELECT u_id FROM kost";
    $res = mysqli_query($conn, $query_uid);
    while ($data = mysqli_fetch_assoc($res)) {
      while ($data['u_id'] == $u_id) {
        $u_id = randomString(6);
      }
    }
// generate random string with length 16.
  $u_id = randomString(6);

  $pemilik = "";
  $alamat_kost = "";
  $nama_penghuni = "";
  $nik = "";
  $ttl = "";
  $agama = "";
  $jkel = "";
  $pekerjaan = "";
  $alamat_penghuni = "";

  if($_SERVER['REQUEST_METHOD'] == "POST")
    {
  $nama_kost = $_POST['nama_kost'];
  $pemilik = $_POST['pemilik'];
  $alamat_kost = $_POST['alamat_kost'];
  $nama_penghuni = $_POST['nama_penghuni'];
  $nik = $_POST['nik'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tgl_lahir = $_POST['tgl_lahir'];
  $ttl = $tempat_lahir . " / " . $tgl_lahir;
  $agama = $_POST['agama'];
  $jkel = $_POST['jkel'];
  $pekerjaan = $_POST['pekerjaan'];
  $alamat_penghuni = $_POST['alamat_penghuni'];
  $wna = $_POST['wna'];
  if ($wna == "tidak") {
    $no_pasport = "";
    $no_itas = "";
  }else{
    $no_pasport = $_POST['no_pasport'];
    $no_itas = $_POST['no_itas'];
  }
  $ket = $_POST['ket'];
  $namaFile = $_FILES['foto']['name'];
  $foto = "assets/img/penghuni_kost/" . $u_id . $namaFile;
  $upload = move_uploaded_file($_FILES['foto']['tmp_name'], "../assets/img/penghuni_kost/" . $u_id . $namaFile);

  $query = "INSERT INTO penghuni_kost (u_id, nama_kost, nama_pemilik, alamat, nik_penghuni, nama_penghuni, ttl, agama, j_kel, pekerjaan, alamat_ktp, wna, no_pasport, no_itas, ket, foto)
  VALUES ('$u_id', '$nama_kost', '$pemilik', '$alamat_kost', '$nik', '$nama_penghuni', '$ttl', '$agama', '$jkel', '$pekerjaan', '$alamat_penghuni', '$wna', '$no_pasport', '$no_itas', '$ket', '$foto')";

  if (mysqli_query($conn, $query)) {
      echo "<script type='text/javascript'>alert('Input data berhasil')
      window.location = '../penghuni_kost';
			</script>";
  }else{
    echo "input gagal";
  }

}
?>
