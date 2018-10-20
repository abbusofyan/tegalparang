<?php

  include 'koneksi.php';

  function detectUploadedFiles($file_name)
    {
        $arr_name = explode(".", $file_name);

        return end($arr_name);
    }

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
      $id = randomString(6);
      $query_uid = "SELECT u_id FROM kost";
      $res = mysqli_query($conn, $query_uid);
      while ($data = mysqli_fetch_assoc($res)) {
        while ($data['u_id'] == $id) {
          $id = randomString(6);
        }
      }
  // generate random string with length 16.
    $id = randomString(6);
  if($_SERVER['REQUEST_METHOD'] == "POST")
    {

  $pemilik = $_POST['pemilik'];
  $nama_kost = $_POST['nama_kost'];
  if ($nama_kost == "") {
    $nama_kost = "Kost " . $pemilik;
  }
  $izin_imb = $_POST['izin_imb'];
  if ($izin_imb == "tidak") {
    $no_imb = "";
  }else{
    $no_imb = $_POST['no_imb'];
  }
  $izin_kost = $_POST['izin_kost'];
  if ($izin_kost == "tidak") {
    $no_izin_kost = "";
  }else{
    $no_izin_kost = $_POST['no_izin_kost'];
  }
  $alamat = $_POST['alamat'];
  $rt = $_POST['rt'];
  $rw = $_POST['rw'];
  $nik = $_POST['nik'];
  $telp = $_POST['telp'];
  $status = $_POST['status_tanah'];
  $sistem = $_POST['sistem_sewa'];
  $jml_kamar = $_POST['jml_kamar'];
  $jml_lantai = $_POST['jml_lantai'];
  $ket = $_POST['ket'];
  $tanggal = date("Y-m-d");
  $total = count($_FILES['files']['tmp_name']);


        $arr_ = array();

        for($i = 0; $i < $total; $i++)
        {
            $file_format = detectUploadedFiles($_FILES['files']['name'][$i]);

            /* menentukan nama file */
            $file_name = $nama_kost . "_" . $i . "." . $file_format;

            /* upload ke ftp */
            move_uploaded_file($_FILES['files']['tmp_name'][$i], "../assets/img/kost/" . $file_name);

            array_push($arr_, $file_name);
        }

        $files  = implode(";", $arr_);

  $query = "INSERT INTO kost (u_id, nama_kost, alamat, rt ,rw, pemilik, nik, no_telp, status_tanah, no_imb, no_izin_kost, sistem_sewa, jml_kamar, jml_lantai, foto, ket, tanggal)
  VALUES ('$id', '$nama_kost', '$alamat', '$rt', '$rw', '$pemilik', '$nik', '$telp', '$status', '$no_imb', '$no_izin_kost', '$sistem', '$jml_kamar', '$jml_lantai', '$files', '$ket', '$tanggal')";

  if (mysqli_query($conn, $query)) {
      echo "<script type='text/javascript'>alert('Input data kost berhasil')
      window.location = '../kost';
			</script>";
  }else{
    echo "<script type='text/javascript'>alert('Input data kost gagal')
    window.location = '../kost';
    </script>";
  }

}
?>
