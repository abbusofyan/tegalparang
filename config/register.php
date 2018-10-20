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
