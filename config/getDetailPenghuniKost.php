<?php
  include 'koneksi.php';

  if ($_POST['nama_kost']) {
    $nama_kost = $_POST['nama_kost'];
    $explode = explode(' | ', $nama_kost);
    $alamat = $explode[1];
    $nama_kost = $explode[0];
    $query = mysqli_query($conn, "SELECT * FROM penghuni_kost WHERE nama_kost = '$nama_kost' AND alamat LIKE '%%$alamat%'");
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
        $no = $no +1;
      }
    }else{
      echo "Data tidak ditemukan";
    }
  }

 ?>
