<?php 
    header('Content-Type: application/json');

    include 'koneksi.php';
    $rt = $_GET['rt'];
    $rw = $_GET['rw'];
    $page = $_GET['page'];

    $halaman = 10;
    $mulai   = ($page > 1) ? ($page * $halaman) - $halaman : 0;

    if($rw == "semuadata") {
        $total = "SELECT * FROM kost";
        $query = "SELECT * FROM kost LIMIT $mulai, $halaman";
    } else {
        $total = "SELECT * FROM kost WHERE rt = '$rt' AND rw='$rw'";
        $query = "SELECT * FROM kost WHERE rt = '$rt' AND rw='$rw' LIMIT $mulai, $halaman";
    }

    $total = mysqli_num_rows(mysqli_query($conn, $total));
    $query = mysqli_query($conn, $query);
    $pages = ceil($total / $halaman);
    $num   = 1;

    while($data = mysqli_fetch_assoc($query)) {
        extract($data);

        if ($num == 10) {
            $num      = $page_dec;
            $page_dec = (int) $_GET['page'];
        } else {
            $page_dec = (int) $_GET['page'] - 1;
        }
        
        $arr = array(
            "no" => $page_dec . $num,
            "u_id" => $u_id,
            "nama_kost" => $nama_kost,
            "alamat" => $alamat,
            "rt" => $rt,
            "rw" => $rw,
            "pemilik" => $pemilik,
            "nik" => $nik,
            "no_telp" => $no_telp,
            "status_tanah" => $status_tanah,
            "no_imb" => $no_imb,
            "no_izin_kost" => $no_izin_kost,
            "sistem_sewa" => $sistem_sewa,
            "jml_kamar" => $jml_kamar,
            "jml_lantai" => $jml_lantai,
            "ket" => $ket
        );
        
        $num++;
        
        $result_arr[] = $arr;
    }

    $json = array(
        "page" => $page,
        "total_results" => $total,
        "total_pages" => $pages,
        "results" => $result_arr
    );

    echo json_encode($json);

    mysqli_close($conn);
?>