<?php
include 'koneksi.php';
$fileName = $_FILES['foto']['name'];
$fileType = $_FILES['foto']['type'];
$fileContent = $_FILES['foto']['tmp_name'];
$u_id = $_POST['u_id'];
$dataUrl = 'data:' . $fileType . ';base64,' . base64_encode($fileContent);
$json = json_encode(array(
  'name' => $fileName,
  'type' => $fileType,
  'dataUrl' => $dataUrl,
  'u_id' => $u_id
));
echo $json;

$foto = "assets/img/penghuni_kost/" . $u_id . $fileName;
$query = mysqli_query($conn, "UPDATE penghuni_kost SET foto = '$foto' WHERE u_id = '$u_id'");
move_uploaded_file($fileContent, "../assets/img/penghuni_kost/" . $u_id . $fileName);
?>
