 <?php
include 'koneksi.php';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  // ambil data file
  $username = $_POST['username'];
  $namaFile = $_FILES['foto']['name'];
  $query = mysqli_query($conn, "SELECT * FROM rt WHERE username = '$username'");
  $row = mysqli_fetch_assoc($query);
  $rt = $row['rt'];
  $rw = $row['rw'];

  $foto = "assets/img/profile/" . $rt . $rw . $namaFile;
  $upload = move_uploaded_file($_FILES['foto']['tmp_name'], "../assets/img/profile/" . $rt . $rw . $namaFile);
  $query = mysqli_query($conn, "UPDATE rt SET foto='$foto' WHERE username='$username'");
  if ($query) {
    echo "<script>alert('ganti foto profile berhasil')
          window.location = '../ganti_foto.php';</script>";
  }else{
    echo "<script>alert('ganti foto profile gagal')
          window.location = '../ganti_foto.php';</script>";
  }

}
?>
