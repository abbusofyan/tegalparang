
<?php
include 'config/koneksi.php';
session_start();
if (empty($_SESSION['user'])) {
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
</head>

<body onload="previewImage()">
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
			<a class="nav-link" href="kost.php">Input data rumah kost</a>
			<a class="nav-link" href="kontrakan.php">Input data rumah kontrakan</a>
			<a class="nav-link" href="lihat_data.php">Lihat data</a>
			<a class="nav-link active" href="ganti_foto.php">Ganti foto</a>
		</div>

	</div>

	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<h3 class="title">Ganti foto </h3>
			</div>
			<div class="col-sm-12 col-md-4">
				<img src="assets/img/profile.png" class="profile-pic" id="profilePic" alt="Profile">
			</div>
			<div class="col-sm-12 col-md-8">
        <?php
          include 'config/koneksi.php';
          $username = $_SESSION['user'];
         ?>
        <form class="" action="config/ganti_foto.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="username" value="<?php echo $username; ?>" />
          <p class="lead text-info-pic mb-4">Select an image file on your computer (1MB max)</p>
          <input type="file" name="foto" id="uploadImg" onchange="PreviewImage()" class="btn btn-primary mr-4"/>
          <button type="submit" class="btn btn-primary">OK</button>
        </form>
			</div>
		</div>
	</div>


  <script type="text/javascript">
    function PreviewImage() {
      var oFReader = new FileReader();
      oFReader.readAsDataURL(document.getElementById("uploadImg").files[0]);
      oFReader.onload = function (oFREvent) {
        document.getElementById("profilePic").src = oFREvent.target.result;
      };
    };
  </script>




</body>

</html>

<!-- <script>
  function uploadImg() {
    var x = document.getElementById('uploadImg');
    var txt = '';
    if ('files' in x) {
      if (x.files.length == 0) {
        txt = 'Select One files';
      } else {
        for (var i = 0; i < x.files.length; i++) {
          txt += "<br><strong>" + (i + 1) + ". file</strong><br>";
          var file = x.files[i];
          if ('name' in file) {
            txt += "name: " + file.name + "<br>";
          }
          if ('size' in file) {
            txt += "size: " + file.size + " bytes <br>";
          }
        }
      }
    } else {
      if (x.value == "") {
        txt += "Select one or more files.";
      } else {
        txt += "The files property is not supported by your browser!";
        txt += "<br>The path of the selected file: " + x.value; // If the browser does not support the files property, it will return the path of the selected file instead.
      }
    }
    document.getElementById("uploadImg").innerHTML = txt;
  }
</script> -->
