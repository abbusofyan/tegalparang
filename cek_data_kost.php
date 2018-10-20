<?php
include 'config/koneksi.php';
session_start();
if (empty($_SESSION['nik'])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Aplikasi pendataan rumah kontrakan dan kost kel. Tegal Parang</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/input.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/slide-menu.css">
	<script src="assets\js\jquery-3.3.1.min.js"></script>
	<script src="assets\bootstrap\js\bootstrap.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$("#nama_kost").change(function () {
				var nama_kost = $(this).val();
				var dataString = 'nama_kost=' + nama_kost;
				$.ajax({
					type: "POST",
					url: "config/getNamaKostOnCek.php",
					data: dataString,
					cache: false,
					success: function (html) {
						$("#alamat").html(html);
					}
				});
			});

			$("#alamat").change(function () {
				var u_id = $(this).val();
				var dataString = 'u_id=' + u_id;
				$.ajax({
					type: "POST",
					url: "config/getDetailKost.php",
					data: dataString,
					cache: false,
					success: function (html) {
						$("#detail").html(html);
					}
				});
			});


		});
	</script>
</head>

<body>
	<div class="header">
		<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-dark">
			<span class="open-slide">
				<a href="#" onclick="openSlideMenu()">
					<svg width="30" height="30" style="margin-top: 13px;">
						<path d="M0,5 30,5" stroke="#fff" stroke-width="5" />
						<path d="M0,14 30,14" stroke="#fff" stroke-width="5" />
						<path d="M0,23 30,23" stroke="#fff" stroke-width="5" />
					</svg>
				</a>
			</span>
				<a class="btn-logout" href="config/logout.php"><button class="btn btn-danger" type="submit">
						Logout <ion-icon name="log-out"></ion-icon></button></a>
		</nav>

		<div id="side-menu" class="side-nav">
			<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
			<a class="nav-link" href="penghuni_kost.php">Input Data penghuni kost</a>
			<a class="nav-link" href="detail_penghuni_kost.php">Lihat data penghuni</a>
			<a class="nav-link active" href="cek_data_kost.php">Lihat data kost</a>
		</div>

	</div>

	<div class="container">
		<div class="row">
			<h3 class="title">Detail Kost</h3>
			<br>
		</div>
	</div>

	<div id="main">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-12">
					<form method="POST" id="frm_input" action="config/updateKost.php">
						<div class="form-group">
							<label>Pemilik kost :</label>
							<?php
include 'config/koneksi.php';
$query = mysqli_query($conn, "SELECT * FROM kost WHERE nik = '" . $_SESSION['nik'] . "'");
$row = mysqli_fetch_assoc($query);
echo "<input type='text' name='pemilik' class='form-control' value='" . $row['pemilik'] . "'>
					";?>
						</div>
						<div class="form-group">
							<label>Nama kost :</label>
							<select class="form-control" name="nama_kost" id="nama_kost">
								<option value=''>--pilih kost--</option>
								<?php
$query2 = mysqli_query($conn, "SELECT * FROM kost WHERE nik = " . $_SESSION['nik'] . " GROUP BY nama_kost");
while ($row = mysqli_fetch_assoc($query2)) {
    echo "<option value='" . $row['nama_kost'] . "'>
						" . $row['nama_kost'] . "</option>
						";
}?>
							</select>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Alamat</label>
								<select class="form-control" name="alamat" id="alamat">

								</select>
							</div>
						</div>
						<div id="detail">

						</div>
						<button type='submit' class='btn btn-primary'>Update</button>
					</form>
				</div>
			</div>
		</div>

	</div>

	<script src="assets/js/slide-menu.js"></script>
</body>

</html>