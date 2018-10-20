<?php
  include 'koneksi.php';

  if ($_POST['pemilik']) {
    $pemilik = $_POST['pemilik'];
    $query = mysqli_query($conn, "SELECT * FROM kost WHERE nama_pemilik = '$pemilik'");
    $total = mysqli_num_rows($query);
    if ($total > 0) {
      $no = 1;
      while ($row = mysqli_fetch_assoc($query)) {

        echo "
        <tr>
          <td>".$no."</td>
          <td id='no'>".$row['nik_penghuni']."</td>
          <td id='no'>".$row['nama_penghuni']."</td>
          <td id='no'>".$row['ttl']."</td>
          <td id='no'>".$row['agama']."</td>
          <td id='no'>".$row['j_kel']."</td>
          <td id='no'>".$row['pekerjaan']."</td>
          <td id='no'>".$row['alamat_ktp']."</td>
          <td><a href='edit_data?no_pencatatan='.$row['no_pencatatan'].'' target='_blank'>
              <button class='btn btn-success hidden-print' id=''.$row['no_pencatatan'].''>Edit</button></a>
          </td>
        </tr>";
        $no = $no +1;
      }
    }
  }

 ?>
