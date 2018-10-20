<?php

    header('Content-Type: application/json');

    include 'koneksi.php';

    $nama_kost = $_GET['nama_kost'];
    $page= (int)$_GET['page'];

    $explode = explode(' | ', $nama_kost);
    $alamat = $explode[1];
    $nama_kost = $explode[0];

    $halaman = 10;
    $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;
    $total = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM penghuni_kost WHERE nama_kost = '$nama_kost' AND alamat LIKE '%%$alamat%'"));
    $pages = ceil($total/$halaman);

    $query = mysqli_query($conn, "SELECT * FROM penghuni_kost WHERE nama_kost = '$nama_kost' AND alamat LIKE '%%$alamat%' LIMIT $mulai, $halaman");

    $num = 1;
    while($data = mysqli_fetch_assoc($query)) {
        extract($data);
        if($num == 10) {
            $num = $page_dec;
            $page_dec = (int)$_GET['page'];
        } else {
            $page_dec = (int)$_GET['page'] - 1;
        }

        $arr = array(
            "no" => $page_dec . $num,
            "u_id" => $u_id,
            "nik_penghuni" => $nik_penghuni,
            "nama_penghuni" => $nama_penghuni,
            "ttl" => $ttl,
            "agama" => $agama,
            "j_kel" => $j_kel,
            "pekerjaan" => $pekerjaan,
            "alamat_ktp" => $alamat_ktp,
            "foto" => $foto
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
