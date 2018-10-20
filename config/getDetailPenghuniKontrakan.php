<?php
include 'koneksi.php';

if ($_POST['alamat_kontrakan']) {
  $alamat_kontrakan = $_POST['alamat_kontrakan'];
  $query = mysqli_query($conn, "SELECT * FROM penghuni_kontrakan WHERE alamat = '$alamat_kontrakan'");
  $total = mysqli_num_rows($query);
  if ($total > 0) {
    $no = 1;
    while ($row = mysqli_fetch_assoc($query)) {

      echo "
        <tr>
          <td>" . $no . "</td>
          <td id='no'>" . $row['nik_penghuni'] . "</td>
          <td id='no'>" . $row['nama_penghuni'] . "</td>
          <td id='no'>" . $row['ttl'] . "</td>
          <td id='no'>" . $row['agama'] . "</td>
          <td id='no'>" . $row['j_kel'] . "</td>
          <td id='no'>" . $row['pekerjaan'] . "</td>
          <td id='no'>" . $row['alamat_ktp'] . "</td>
          <td><a href='javascript:void(0)' class='hapus' data-id='".$row['u_id']."'>
          <button class='btn btn-danger hidden-print' id='".$row['u_id']."'>Hapus</button></a>
          <a href='#myModal' id='custId' data-toggle='modal' data-id=".$row['u_id'].">
    		  <button class='btn btn-success hidden-print' id='".$row['u_id']."'>Edit</button></a>
      		</td>
        </tr>";
      $no = $no + 1;
    }
  }else{
    echo "Data tidak ditemukan";
  }
}

?>
