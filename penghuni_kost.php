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
	<link rel="stylesheet" href="assets/css/form-validation.css">
	<link rel="stylesheet" href="assets/css/slide-menu.css">
	<script src="assets\js\jquery-3.3.1.min.js"></script>
	<script src="assets\bootstrap\js\bootstrap.js"></script>
	<script type="text/javascript">
		function hanyaAngka(evt) {
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))

				return false;
			return true;
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function () {
			$("#nama_kost").change(function () {
				var nama_kost = $(this).val();
				var dataString = 'nama_kost=' + nama_kost;
				$.ajax({
					type: "POST",
					url: "config/getNamaKostOnInput.php",
					data: dataString,
					cache: false,
					success: function (html) {
						$("#alamat").html(html);
					}
				});
			});
		});
	</script>
	<script>
		// Example starter JavaScript for disabling form submissions if there are invalid fields
			(function() {
				'use strict';

				window.addEventListener('load', function() {
					// Fetch all the forms we want to apply custom Bootstrap validation styles to
					var forms = document.getElementsByClassName('needs-validation');

					// Loop over them and prevent submission
					var validation = Array.prototype.filter.call(forms, function(form) {
						form.addEventListener('submit', function(event) {
							if (form.checkValidity() === false) {
								event.preventDefault();
								event.stopPropagation();
							}
							form.classList.add('was-validated');
						}, false);
					});
				}, false);
			})();
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
			<a class="nav-link active" href="penghuni_kost.php">Input Data penghuni kost</a>
			<a class="nav-link" href="detail_penghuni_kost.php">Lihat data penghuni</a>
			<a class="nav-link" href="cek_data_kost.php">Lihat data kost</a>
		</div>

	</div>

	<div class="container">
		<div class="row">
			<h3 class="title">Data penghuni kost / kontrakan di Kel. Tegal parang</h3>
			<br>
		</div>
	</div>

	<div id="main">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-12">
					<form method="post" id="frm_input" class="needs-validation" novalidate action="config/input_penghuni_kost.php" enctype="multipart/form-data">
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
						<div class="form-group">
							<div class="form-group">
								<label>Alamat</label>
								<select class='form-control' id="alamat" name='alamat_kost' required>

								</select>
							</div>
						</div>
						<div class="form-group">
							<label>Nama penghuni</label>
							<input type="text" class="form-control" name="nama_penghuni" required>
							<div class="invalid-feedback">
								Field nama penghuni wajib diisi.
							</div>
						</div>
						<div class="form-group">
							<label>NIK</label>
							<input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="nik" required>
							<div class="invalid-feedback">
								Field nik wajib diisi dengan 16 digit angka.
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-6 mb-3">
								<label>Tempat lahir</label>
								<input type="text" name="tempat_lahir" class="form-control" required>
								<div class="invalid-feedback">
									Field tempat lahir wajib diisi.
								</div>
							</div>
							<div class="col-md-3 mb-3">
								<label>Tanggal lahir </label>
								<input type="date" name="tgl_lahir" class="form-control" required>
								<div class="invalid-feedback">
									Field tanggal lahir wajib diisi.
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Agama</label>
							<select class='form-control' name='agama'>
								<option value='islam'>Islam</option>
								<option value='kristen'>Kristen</option>
								<option value='katolik'>Katolik</option>
								<option value='hindu'>Hindu</option>
								<option value='budha'>Budha</option>
							</select>
						</div>
						<label>Jenis kelamin</label>
						<div class="form-group">
							<div class="form-check form-check-inline">
								<input class="form-check-input jkel" type="radio" name="jkel" value="L" checked>
								<label class="form-check-label">Laki-laki</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input jkel" type="radio" name="jkel" value="P">
								<label class="form-check-label">Perempuan</label>
							</div>
						</div>
						<div class="form-group">
							<label>Pekerjaan</label>
							<select class='form-control' name='pekerjaan'>
								<option value='pelajar'>Pelajar</option>
								<option value='karyawan'>Karyawan</option>
								<option value='wiraswasta'>Wiraswasta</option>
								<option value='guru'>Guru</option>
								<option value='lain-lain'>Lain - lain</option>
							</select>
						</div>
						<div class="form-group">
							<label>Alamat sesuai KTP</label>
							<input type="text" class="form-control" name="alamat_penghuni" required>
							<div class="invalid-feedback">
								Field alamat wajib diisi dengan 16 digit angka.
							</div>
						</div>
						<label>Warga negara asing</label>
						<div class="form-group">
							<div class="form-check form-check-inline">
								<input class="form-check-input wna" type="radio" name="wna" id="ya" value="ya" checked>
								<label class="form-check-label">Ya</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input wna" type="radio" name="wna" id="tidak" value="tidak">
								<label class="form-check-label">Tidak</label>
							</div>
						</div>
						<div class="form-group" id="no_pasport">
							<label>No. Pasport</label>
							<input type="text" id="no_pasport" class="form-control" name="no_pasport">
						</div>
						<div class="form-group" id="no_itas">
							<label>No. ITAS IKAP</label>
							<input type="text" id="no_itas" class="form-control" name="no_itas">
						</div>
						<div class="form-group">
							<label>Keterangan</label>
							<input type="text" class="form-control" name="ket">
						</div>
            <div class="form-group" id="no_itas">
							<label>Upload KTP / pas foto penghuni kontrakan :</label>
              <input type="file" name="foto" id="uploadImg" onchange="PreviewImage()" class="form-control"/>
						</div>

            <img src="assets/img/profile.png" id="profilePenghuni" alt="Profile">
						<button type="submit" class="btn btn-primary btn-block">Submit data penghuni</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script src="assets/js/slide-menu.js"></script>
	<script src="assets\js\holder.min.js"></script>
  <script type="text/javascript">
    function PreviewImage() {
      var oFReader = new FileReader();
      oFReader.readAsDataURL(document.getElementById("uploadImg").files[0]);
      oFReader.onload = function (oFREvent) {
        document.getElementById("profilePenghuni").src = oFREvent.target.result;
      };
    };
  </script>
	<script type="text/javascript">
		$(function () {
			$(":radio.wna").click(function () {
				if ($(this).val() == "tidak") {
					$("#no_pasport").hide();
					$("#no_itas").hide();
				} else {
					$("#no_pasport").show();
					$("#no_itas").show();
				}
			});
		});
	</script>
</body>

</html>
