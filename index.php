<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Aplikasi pendataan rumah kontrakan dan kost kel. Tegal Parang</title>
<link rel="stylesheet" href="assets\style.css">
<link rel="stylesheet" href="assets\materialize\css\materialize.css">
<script src="assets\js\jquery-3.3.1.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
<marquee>
<h3>APLIKASI PENDATAAN KONTRAKAN DAN KOST KEL. TEGAL PARANG</h3>
</marquee>
<div id="login">
	<center><img class="logo" src="assets\logo.png" alt=""></center>
	<div class="row">
		<div class="card-panel">
			<h6>Halaman Login Ketua RT</h6>
			<p style="font-family: 'Anaheim', sans-serif;">
				silahkan login dengan akun anda!
			</p>
			<form action="config/login.php" method="post" onsubmit="return validasi_input(this)">
				<div class="input-field">
					<input type="text" name="username" class="autocomplete">
					<label for="autocomplete-input">Username</label>
				</div>
				<div class="input-field">
					<input type="password" name="password" class="autocomplete">
					<label for="autocomplete-input">Password</label>
				</div>
				<button class="btn" id="btnSubmit" type="submit" name="action">Login <i class="material-icons right">check</i>
				</button>
				<a href="ganti_password.php"> | ganti password</a>
			</form>
		</div>
		<a href="login_kost.php">Login sebagai pemilik kost / kontrakan</a>
	</div>
	</body>
	<script
	  src="https://code.jquery.com/jquery-3.3.1.js"
	  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	  crossorigin="anonymous"></script>
	<script src="assets\materialize\js\materialize.js"></script>
	</html>
