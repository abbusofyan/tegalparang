<?php
include 'koneksi.php';

if ($_POST['pemilik']) {
    $pemilik = $_POST['pemilik'];
    $query = mysqli_query($conn, "SELECT * FROM kontrakan WHERE pemilik = '$pemilik'");
    $total = mysqli_num_rows($query);
    if ($total > 0) {
        $no = 1;
        echo "<option value=''>--alamat kontrakan--</option>";
        while ($row = mysqli_fetch_assoc($query)) {
            echo "<option value='".$row['alamat'].", RT".$row['rt']."/RW".$row['rw']."'>".$row['alamat'].", RT".$row['rt']."/RW".$row['rw']."</option>";
        }
    }
}
