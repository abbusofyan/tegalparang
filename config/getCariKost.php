<?php
include 'koneksi.php';

if ($_POST['rw']) {
  $rw = $_POST['rw'];
	$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
	$limit = 5;
	$limit_start = ($page - 1) * $limit;
	$query = mysqli_query($conn, "SELECT * FROM kost WHERE rw = '$rw' LIMIT $limit_start, $limit ");
	$no = $limit_start + 1;
	while ($data = mysqli_fetch_assoc($query)) {
		$rt = $data['rt'];
		$rw = $data['rw'];
		$alamat = $data['alamat'] . " RT" . $rt . " RW" . $rw . " kel. tegal parang";
		$image = explode(';', $data['foto']);
		$jumlah = count($image);
		echo "
<div class='col-sm-4'>
<div id='" . $data['no'] . "' class='carousel slide' data-ride='carousel'>
<div class='carousel-inner'>";
		for ($i = 0; $i < $jumlah; $i++) {
			$url_image = "assets/img/kost/" . $image[$i];
			if ($i == 0) {
				$active = "active";
			}
			else {
				$active = "";
			}

			echo "
  <div class='carousel-item $active'>
    <img class='card-img-top' src='" . $url_image . "'>
  </div>
";
		}

		echo "
</div>
<a class='carousel-control-prev' href='#" . $data['no'] . "' role='button' data-slide='prev'>
<span class='carousel-control-prev-icon' aria-hidden='true'></span>
<span class='sr-only'>Previous</span>
</a>
<a class='carousel-control-next' href='#" . $data['no'] . "' role='button' data-slide='next'>
<span class='carousel-control-next-icon' aria-hidden='true'></span>
<span class='sr-only'>Next</span>
</a>
</div>
<div class='card kost'>
<div class='card-body'>
<h5 class='card-title'>" . $data['nama_kost'] . "</h5>
pemilik : " . $data['pemilik'] . "</br>
alamat : " . $alamat . "</br>
Telp : " . $data['no_telp'] . "</br>
</div>
</div>
</div>
";
	}
  echo "Data tidak ditemukan. silahkan cari berdasarkan RW lain";
}

?>
