<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/input.css">
    <link rel="stylesheet" href="assets/cari.css">
    <script src="assets\bootstrap\js\jquery-3.3.1.min.js"></script>
    <script src="assets\bootstrap\js\bootstrap.min.js"></script>
    <!-- <script src="https://unpkg.com/ionicons@4.4.2/dist/ionicons.js"></script> -->

  </head>

  <body>

    <div class="header">
      <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-dark">
        <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link text-light" href="#">penghuni<span class="sr-only"></span></a>
            </li>
          </ul>
        </div>
      </nav>
    </div>


    <div class="row">
      <div class="container">
        <h3 class="title">Data kost & kontrakan di Kel. Tegal Parang</h3></br>
      </div>
    </div>

    <div class="row">
      <div class="container">
        <div class="row">
          <?php
    include 'config\koneksi.php';
    $url_image = "assets\img\kost\kostpelangi_0.jpg";
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    $limit = 9;
    $limit_start = ($page - 1) * $limit;
    $query = mysqli_query($conn, "SELECT * FROM kost LIMIT $limit_start, $limit ");
    $no = $limit_start + 1;
    while ($data = mysqli_fetch_assoc($query)) {
      // $image = explode(";", $data['foto']);
      // $url_image = "assets/img/kost/".$image[0];
      echo "
      <div class='col-sm-4 books'>
      <div id='".$data['no']."' class='carousel slide' data-ride='carousel'>
        <div class='carousel-inner'>
          <div class='carousel-item active'>
            <img class='card-img-top' src='".$url_image."' alt='First slide'>
          </div>
          <div class='carousel-item'>
            <img class='card-img-top' src='".$url_image."' alt='Second slide'>
          </div>
        </div>
        <a class='carousel-control-prev' href='#".$data['no']."' role='button' data-slide='prev'>
          <span class='carousel-control-prev-icon' aria-hidden='true'></span>
          <span class='sr-only'>Previous</span>
        </a>
        <a class='carousel-control-next' href='#".$data['no']."' role='button' data-slide='next'>
          <span class='carousel-control-next-icon' aria-hidden='true'></span>
          <span class='sr-only'>Next</span>
        </a>
      </div>
      <div class='card kost'>
      <div class='card-body'>
        <h5 class='card-title'>".$data['nama_kost']."</h5>
        pemilik : ".$data['pemilik']."</br>
        alamat : ".$data['alamat']."</br>
        Telp : ".$data['no_telp']."</br>
      </div>
      </div>
      </div>";
    }
  ?>
  </div>

    </div>
  </div>
  </body>
</html>
