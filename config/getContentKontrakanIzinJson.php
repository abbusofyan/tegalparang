<?php

    header('Content-Type: application/json');

    include 'koneksi.php';

    $context = $_GET['context'];
    $izin    = $_GET['izin'];
    $page    = $_GET['page'];

    $halaman = 10;
    $mulai   = ($page > 1) ? ($page * $halaman) - $halaman : 0;

    if ($izin == "Berizin") {
        if ($context == "imb") {
            $total = "SELECT * FROM kontrakan WHERE no_imb != ''";
            $query = "SELECT * FROM kontrakan WHERE no_imb != '' LIMIT $mulai, $halaman";
        } else if ($context == "kontrakan") {
            $total = "SELECT * FROM kontrakan WHERE no_izin_kontrakan != ''";
            $query = "SELECT * FROM kontrakan WHERE no_izin_kontrakan != '' LIMIT $mulai, $halaman";
        }
    } else if ($izin == "Tidak Berizin") {
        if ($context == "imb") {
            $total = "SELECT * FROM kontrakan WHERE no_imb = ''";
            $query = "SELECT * FROM kontrakan WHERE no_imb = '' LIMIT $mulai, $halaman";
        } else if ($context == "kontrakan") {
            $total = "SELECT * FROM kontrakan WHERE no_izin_kontrakan = ''";
            $query = "SELECT * FROM kontrakan WHERE no_izin_kontrakan = '' LIMIT $mulai, $halaman";
        }
    }

    $total = mysqli_num_rows(mysqli_query($conn, $total));
    $query = mysqli_query($conn, $query);
    $pages = ceil($total / $halaman);
    $num   = 1;

    while ($data = mysqli_fetch_assoc($query)) {
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
            "alamat" => $alamat,
            "rt" => $rt,
            "rw" => $rw,
            "pemilik" => $pemilik,
            "nik" => $nik,
            "no_telp" => $no_telp,
            "status_tanah" => $status_tanah,
            "no_imb" => $no_imb,
            "no_izin_kontrakan" => $no_izin_kontrakan,
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