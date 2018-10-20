<?php
$err_name = $err_username = $err_email = $err_password = $err_cekPassword = "";
$name = $username = $email = $password = $cekPassword = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
/* checking if request method is post. */
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {


      if (empty($_POST['name'])) {
        $err_name = "Name is required";
      } else {
        $name = test_input($_POST['name']);

                /* checking regex, only letter and spaces can input */
                if(!preg_match("/^[a-zA-Z ]*$/",$name))
                {
                    $err_name = "hanya diizinkan huruf dan spasi";
                }
      }

      if (empty($_POST["username"])) {
        $err_username = "Username is required";
      } else {
		  if(strlen($_POST['username'])<8){
        $err_username= "minimal 8 karakter";
		  }else{
        $username = test_input($_POST["username"]);
        include 'koneksi.php';
        $query = mysqli_query($connect, "SELECT * FROM user WHERE username='$username'");
        $result = mysqli_num_rows($query);
        if ($result>0) {
          $err_username = "username sudah ada";
        }
      }
	  }

      if (empty($_POST["email"])) {
        $err_email ="email is required";
      } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $err_email = "format email tidak valid";
                }
        include 'koneksi.php';
        $query = mysqli_query($connect, "SELECT * FROM user WHERE email='$email'");
        $result = mysqli_num_rows($query);
        if ($result>0) {
          $err_email = "email sudah terdaftar, masukkan email lain.";
        }
      }

      if (empty($_POST["password"])) {
        $err_password = "password is required";
	  }else{
		if(strlen($_POST['password'])<8){
        $err_password= "minimal 8 karakter";
      } else {
        $password = test_input($_POST["password"]);
      }
	  }

      if (empty($_POST["cekPassword"])) {
        $err_cekPassword = "re-type password is required";
      } else {
        $cekPassword = test_input($_POST["cekPassword"]);
        if ($cekPassword != $password) {
          $err_cekPassword = "password tidak cocok";
        }
      }

        if(empty($err_name) && empty($err_username) && empty($err_email) && empty($err_password) && empty($err_cekPassword))
        {   include 'koneksi.php';

            /* creating sql query for input. */
            $query = "INSERT INTO user VALUES ('$name', '$username', '$email', '$password', '3')";

            /* begin mysqli query to database */
            $result = mysqli_query($connect,$query);
            echo "<script type='text/javascript'>alert('register berhasil. silahkan login dengan akun anda')
            window.location = 'index.php';
            </script>";
        }

     }


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="assets\style.css">
    <link rel="stylesheet" href="assets\materialize\css\materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="assets\materialize\js\materialize.min.js"></script>
    <script src="assets\jquery-3.3.1.min.js"></script>
	<script src="assets\sweetalert\dist\sweetalert2.all.min.js"></script>
  </head>
  <body>
<marquee><h3>APLIKASI PENDATAAN KONTRAKAN DAN KOST KEL. TEGAL PARANG</h3></marquee>
    <div id="register" class="col s12">
      <div class="row">
        <div class="card-panel" onload="disabled()">
        <h6>Register sebagai pemilik kost / kontrakan</h6>
        <p style="font-family: 'Anaheim', sans-serif;">Register your account!</p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="input-field">
        <input type="text" name="name">
        <span class="error red-text" style="font-family: 'Muli'; font-size: 10px, sans-serif;">* <?php echo $err_name;?></span>
        <label for="autocomplete-input">Nama (masukkan nama sesuai KTP)</label>
        </div>
      <div class="input-field">
        <input type="text" name="username">
        <span class="error red-text">* <?php echo $err_username; ?></span>
        <label for="autocomplete-input">NIK</label>
        </div>
        <div class="input-field">
        <input type="text" name="email">
        <span class="error red-text">* <?php echo $err_email; ?></span>
        <label for="autocomplete-input">Nama kost</label>
        </div>
        <div class="row">
            <div class="input-field col s6">
              <p>
              <label>
                <input name="group1" type="radio" />
                <span>Yellow</span>
              </label>
            </p>
            </div>
            <div class="input-field col s6">
              <p>
              <label>
                <input name="group1" type="radio" />
                <span>Yellow</span>
              </label>
            </p>
            </div>
        </div>
        <div class="input-field">
        <input type="password" name="password" >
        <span class="error red-text">* <?php echo $err_password; ?></span>
        <label for="autocomplete-input">Password</label>
        </div>
        <div class="input-field">
        <input type="password" name="cekPassword">
        <span class="error red-text">* <?php echo $err_cekPassword; ?></span>
        <label for="autocomplete-input">masukkan ulang password</label>
        </div>
        <button class="btn grey" id="btnSubmit" type="submit" value="submit" name="submit">Submit
          <i class="material-icons left">check</i>
        </button>
        <a href="index.php">
        <button class="btn waves-effect waves-light" type="button" name="action">back
          <i class="material-icons left">keyboard_backspace</i>
        </button></a>
        <p><label>
        <input type="checkbox" id="checkAgree"/>
        <span>saya setuju dengan
          <a onclick="terms()">syarat dan ketentuan yang berlaku</a></span>
      </label></p>
  </form>
</div>
</div>
  </body>
  <script type="text/javascript">
  $(document).ready(function() {
     document.getElementById("btnSubmit").disabled = true;
     $("#checkAgree").on("click", function() {
        var agreementCheck = document.getElementById("checkAgree");
        if(agreementCheck.checked == true) {

           $("#btnSubmit").removeClass("grey");
           $("#btnSubmit").addClass("waves-effect waves-light");
           document.getElementById("btnSubmit").disabled = false;
        } else {

           $("#btnSubmit").removeClass("purple");
           $("#btnSubmit").addClass("grey");
           document.getElementById("btnSubmit").disabled = true;
        }
     });
   });

   function terms(){
    swal({
      title: 'Petunjuk Pengisian Permohonan Pencatatan Perselisihan Hubungan Industrial',
      text: "You won't be able to revert this!",
      width:600,
      html:
      '1. Pastikan Data/Isian yang anda input adalah benar.<br> ' +
      '2. Pada saat pangisian data, anda akan diwajibkan untuk melampirkan file risalah <strong>atau</strong> upaya bipartit telah dilakukan dengan format <strong>JPG, JPEG, atau PDF</strong>.<br> ' +
      'Jika semua file sudah disiapkan, klik OK untuk login dan mulai mengisi form pencatatan.',
  });
  }

  function close(){
    window.location = 'index.php'
  }
  </script>

  <script type ="text/javascript">
  function terms(){
    swal({
      title: 'Syarat dan Ketentuan Pengguna Aplikasi Form Pencatatan Perselisihan Hubungan Industrial Sudin Nakertrans Jaksel',
      text: "You won't be able to revert this!",
      width:600,
      html:
      '1. Yang bersangkutan menyatakan bahwa data yang diisi adalah sebenar-benarnya dan untuk kepentingan yang bersangkutan baik secara langsung ataupun tidak. Bila dikemudian hari terdapat data atau keterangan yang tidak benar maka yang bersangkutan bersedia diproses sesuai dengan ketentuan.<br><br> ' +
      '2. Semua data yang diinput akan digunakan untuk proses pencatatan perselisihan hubungan industrial atau keperluan lain-lain sesuai ketentuan.',
  });
  }

  function close(){
    window.location = 'index.php'
  }
  </script>
</html>
