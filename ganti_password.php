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
			<h6>Ganti password</h6>
			<form action="config/ganti_password.php" method="post">
				<div class="input-field">
					<input type="text" id="autocomplete-input" name="username" class="autocomplete">
					<label for="autocomplete-input">Username</label>
				</div>
				<div class="input-field">
					<input type="text" id="autocomplete-input" name="nik" class="autocomplete">
					<label for="autocomplete-input">NIK</label>
				</div>
				<div class="input-field">
					<input type="text" id="autocomplete-input" name="password_baru" class="autocomplete">
					<label for="autocomplete-input">password baru</label>
				</div>
				<button class="btn" id="btnSubmit" type="submit" name="action">Ok <i class="material-icons right">check</i>
				</button>
				<a href="index.php">
				<button class="btn waves-effect waves-light" type="button" name="action">back <i class="material-icons left">keyboard_backspace</i>
				</button></a>
			</form>
		</div>
	</div>
	</body>
	<script src="assets\materialize\js\materialize.js"></script>
	</html>
