<?php
include 'config/koneksi.php';
session_start();
if (empty($_SESSION['user'])) {
    header("location:index.php");
}
?>

<?php
  include 'config/koneksi.php';
  $username = $_SESSION['user'];
  $query = mysqli_query($conn, "SELECT * FROM rt WHERE username = '$username'");
  $row = mysqli_fetch_assoc($query);
    if ($row['foto'] == "") {
      $foto = "assets/img/profile.png";
    }else{
      $foto = $row['foto'];
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
	<script type="text/javascript">
		function hanyaAngka(evt) {
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))

				return false;
			return true;
		}
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
      <a href="#"></a> <img src="<?php echo $foto; ?>" class="profile-pic" id="profileMenu" alt="Profile"> 
			<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
			<a class="nav-link" href="kost.php">Input data rumah kost</a>
			<a class="nav-link active" href="kontrakan.php">Input data rumah kontrakan</a>
			<a class="nav-link" href="lihat_data.php">Lihat data</a>
      <a class="nav-link" href="ganti_foto.php">Ganti foto</a>
		</div>

	</div>
	<div class="container">
		<div class="row">
			<h3 class="title">Input data rumah kontrakan di Kel. Tegal parang</h3>
			<br>
		</div>
	</div>

	<div id="main">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<form class="needs-validation" novalidate method="post" id="frm_input" action="config/input_kontrakan.php" enctype="multipart/form-data">
						<div class="form-group">
							<label>Pemilik</label>
							<input type="text" class="form-control" name="pemilik" required>
							<div class="invalid-feedback">
								Field pemilik harus diisi
							</div>
						</div>
						<div class="form-group">
							<label>NIK pemilik</label>
							<input type="text" class="form-control" onkeypress="return hanyaAngka(event)" id="nik" name="nik" required>
							<div class="invalid-feedback">
								Field nik harus diisi dengan 16 digit angka.
							</div>
							<span id="filter"></span>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Alamat</label>
								<input type="text" class="form-control" name="alamat" required>
								<div class="invalid-feedback">
									Field alamat wajib diisi.
								</div>
							</div>
							<div class="form-group col-md-2">
								<label>RT</label>
								<input type="text" class="form-control" name="rt" value="<?php echo $_SESSION['rt']; ?>" readonly>
							</div>
							<div class="form-group col-md-2">
								<label for="inputState">RW</label>
								<input type="text" class="form-control" name="rw" value="<?php echo $_SESSION['rw']; ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label>No. Telp</label>
							<input type="text" class="form-control" name="telp">
						</div>
						<div class="form-group">
							<label>Status tanah</label>
							<select class='form-control' name='status_tanah'>
								<option value='garapan negara'>Garapan negara</option>
								<option value='SHGB'>Sertifikat Hak Guna Bangunan (SHGB)</option>
								<option value='SHM'>Sertifikat hak milik</option>
							</select>
						</div>
						<label>Izin bangunan</label>
						<div class="form-group">
							<div class="form-check form-check-inline">
								<input class="form-check-input izin_imb" type="radio" name="izin_imb" value="ya" checked>
								<label class="form-check-label">Memiliki IMB</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input izin_imb" type="radio" name="izin_imb" value="tidak">
								<label class="form-check-label">Tidak memiliki IMB</label>
							</div>
						</div>
						<div class="form-group" id="no_imb">
							<label>No. IMB</label>
							<input id="input_no_imb" type="text" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="masukkan no IMB"
							 name="no_imb">
						</div>
						<label>Izin rumah kontrakan</label>
						<div class="form-group">
							<div class="form-check form-check-inline">
								<input class="form-check-input izin_kontrakan" type="radio" name="izin_kontrakan" value="ya" checked>
								<label class="form-check-label">Memilik izin</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input izin_kontrakan" type="radio" name="izin_kontrakan" value="tidak">
								<label class="form-check-label">Tidak memiliki izin</label>
							</div>
						</div>
						<div class="form-group" id="no_izin_kontrakan">
							<label>No. izin kontrakan</label>
							<input id="input_no_izin_kontrakan" type="text" onkeypress="return hanyaAngka(event)" class="form-control"
							 placeholder="masukkan no. izin kontrakan" name="no_izin_kontrakan" id="no_izin_kontrakan">
						</div>
						<div class="form-group">
							<label>Sistem sewa</label>
							<select class="form-control" name="sistem_sewa">
								<option value="harian">Harian</option>
								<option value="bulanan">Bulanan</option>
								<option value="bulanan">Tahunan</option>
							</select>
						</div>
						<div class="form-group">
							<label>Jumlah kamar</label>
							<select class="form-control" name="jml_kamar">
								<option value="1-5">1 - 5</option>
								<option value="5-10">6 - 10</option>
								<option value="11-20">11 - 20</option>
								<option value=">20">>20</option>
							</select>
						</div>
						<div class="form-group">
							<label>Jumlah lantai</label>
							<select class="form-control" name="jml_lantai">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>
						<div class="form-group">
							<label>Keterangan</label>
							<input type="text" class="form-control" name="ket">
						</div>
						<div class="form-group">
							<label>upload foto rumah kontrakan</label>
							<input type="file" id="uploadImage" accept="image/*" name='files[]' onchange="PreviewImage();" class="form-control-file"
							 multiple>
						</div>
						<img id="uploadPreview" src="" style="width:150px; height:150px;" /></br></br>
						<button class="btn btn-primary btn-lg btn-block mb-4 mt-3" type="submit">Submit data kontrakan</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script src="assets/js/slide-menu.js"></script>
	<script src="assets\bootstrap\js\bootstrap.js"></script>
	<script src="assets\js\holder.min.js"></script>
	<script type="text/javascript">
		function PreviewImage() {
			var oFReader = new FileReader();
			oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
			oFReader.onload = function (oFREvent) {
				document.getElementById("uploadPreview").src = oFREvent.target.result;
			};
		};
	</script>
	<script type="text/javascript">
		$(document).ready(function () {

			$("#input_no_izin_kontrakan").show().prop('required', true);
			$("#input_no_imb").show().prop('required', true);

			$(":radio.izin_imb").change(function () {
				var input = $(this).next();
				if ($(this).val() == "tidak") {
					$("#no_imb").hide();
					$("#input_no_imb").removeAttr('required');
				} else {
					$("#no_imb").show();
					$("#input_no_imb").prop('required', true);
				}
			});

			$(":radio.izin_kontrakan").change(function () {
				var input = $(this).next();
				if ($(this).val() == "tidak") {
					$("#no_izin_kontrakan").hide();
					$("#input_no_izin_kontrakan").removeAttr('required');
				} else {
					$("#no_izin_kontrakan").show();
					$("#input_no_izin_kontrakan").prop('required', true);
				}
			});
		});
	</script>
</body>

</html>
