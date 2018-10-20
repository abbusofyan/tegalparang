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
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="assets\bootstrap\js\bootstrap.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$("#alamat").change(function () {
				var u_id = $(this).val();
				var dataString = 'u_id=' + u_id;
				$.ajax({
					type: "POST",
					url: "config/getDetailKontrakan.php",
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
			<a class="nav-link" href="penghuni_kontrakan.php">Input Data penghuni kontrakan</a>
			<a class="nav-link" href="detail_penghuni_kontrakan.php">Lihat data penghuni</a>
			<a class="nav-link active" href="cek_data_kontrakan.php">Lihat data kontrakan</a>
		</div>

	</div>

	<div class="container">
		<div class="row">
			<h3 class="title">Detail Kontrakan</h3>
			<br>
		</div>
	</div>

	<div id="main">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-12">
					<form method="POST" id="frm_input" action="config/updateKontrakan.php">
						<div class="form-group">
							<label>Pemilik kost :</label>
							<?php
include 'config/koneksi.php';
$nik = $_SESSION['nik'];
$sql = mysqli_query($conn, "SELECT * FROM kontrakan WHERE nik = '$nik' GROUP BY nik");
while ($row = mysqli_fetch_assoc($sql)) {
    echo '<input type="text" class="form-control" value="' . $row['pemilik'] . '" name="pemilik" disabled>';
}?>
						</div>
						<div class="form-group">
							<label>Alamat kontrakan :</label>
							<select class="form-control" name="alamat" id="alamat">
								<option selected value="0">--pilih alamat--</option>
								<?php
include 'config/koneksi.php';
$sql = mysqli_query($conn, "SELECT * FROM kontrakan WHERE nik = '$nik'");
while ($row = mysqli_fetch_assoc($sql)) {
    echo "<option value='" . $row['u_id'] . "'>" . $row['alamat'] . ", RT" . $row['rt'] . "/RW" . $row['rw'] . "</option>";
}?>
							</select>
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
