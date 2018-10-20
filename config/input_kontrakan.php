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
      $query_uid = "SELECT u_id FROM kontrakan";
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
  $izin_imb = $_POST['izin_imb'];
  if ($izin_imb == "tidak") {
    $no_imb = "";
  }else{
    $no_imb = $_POST['no_imb'];
  }
  $izin_kontrakan = $_POST['izin_kontrakan'];
  if ($izin_kontrakan == "tidak") {
    $no_izin_kontrakan = "";
  }else{
    $no_izin_kontrakan = $_POST['no_izin_kontrakan'];
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
            $file_name = "kontrakan " . $pemilik . "_" . $i . "." . $file_format;

            /* upload ke ftp */
            move_uploaded_file($_FILES['files']['tmp_name'][$i], "../assets/img/kontrakan/" . $file_name);

            array_push($arr_, $file_name);
        }

        $files  = implode(";", $arr_);

  $query = "INSERT INTO kontrakan (u_id, alamat, rt ,rw, pemilik, nik, no_telp, status_tanah, no_imb, no_izin_kontrakan, sistem_sewa, jml_kamar, jml_lantai, foto, ket, tanggal)
  VALUES ('$id', '$alamat', '$rt', '$rw', '$pemilik', '$nik', '$telp', '$status', '$no_imb', '$no_izin_kontrakan', '$sistem', '$jml_kamar', '$jml_lantai', '$files', '$ket', '$tanggal')";

  if (mysqli_query($conn, $query)) {
      echo "<script type='text/javascript'>alert('Input data kost berhasil')
      window.location = '../kontrakan';
			</script>";
  }else{
    echo "<script type='text/javascript'>alert('Input data kontrakan gagal')
    window.location = '../kontrakan';
    </script>";
  }

}
?>
