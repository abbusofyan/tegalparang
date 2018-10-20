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
	<link rel="stylesheet" href="assets/getDataKost.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/slide-menu.css">
	<script src="assets\js\jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>


	<script type="text/javascript">
		$(document).ready(function () {
			$("#nama_kost").change(function () {
				var nama_kost = $(this).val();
				var dataString = 'nama_kost=' + nama_kost;
				$.ajax({
					type: "POST",
					url: "config/getDataPenghuniKost.php",
					data: dataString,
					cache: false,
					success: function (html) {
						$("#tbl_kost").html(html);
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
			<a class="nav-link active" href="detail_penghuni_kost.php">Lihat data penghuni</a>
			<a class="nav-link" href="cek_data_kost.php">Lihat data kost</a>
		</div>

	</div>


	<div class="container">
		<div class="row">
			<h3 class="title">Data Penghuni kost kel. tegal parang</h3>
			</br>
		</div>
	</div>

	<div id="main">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-sm-12">
					<form class="pemilik-kost" method="get" action="report/report_penghuni_kost.php?nama_kost=$nama_kost&alamat=$alamat"
					 id="frm_input">
						<div class="form-group">
							<label>Pemilik kost :</label>
							<?php
include 'config/koneksi.php';
$nik = $_SESSION['nik'];
$sql = mysqli_query($conn, "SELECT * FROM kost WHERE nik = '$nik' GROUP BY nik");
while ($row = mysqli_fetch_assoc($sql)) {
    echo '<input type="text" class="form-control" value="' . $row['pemilik'] . '" name="penghuni" disabled>';
}?>
						</div>
						<div class="form-group">
							<label>Nama kost :</label>
							<select class="form-control" name="kost" id="nama_kost">
								<option selected value="0">--pilih kost--</option>
								<?php
include 'config/koneksi.php';
$sql = mysqli_query($conn, "SELECT * FROM kost WHERE nik = '$nik'");
while ($row = mysqli_fetch_assoc($sql)) {
    echo "<option value='" . $row['nama_kost'] . " | " . $row['alamat'] . ", RT" . $row['rt'] . "/RW" . $row['rw'] . "'>" . $row['nama_kost'] . " | " . $row['alamat'] . ", RT" . $row['rt'] . "/RW" . $row['rw'] . "</option>";
}?>
							</select>
						</div>
						<!-- <a href="report/report_penghuni_kost.php?nama_kost=$nama_kost&pemilik=$pemilik"><button type="submit" class="btn btn-success"><i class="fa fa-search"></i>download</button></a> -->
					</form>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>
								No
							</th>
							<th>
								NIK
							</th>
							<th>
								Nama
							</th>
							<th>
								Tempat, tgl lahir
							</th>
							<th>
								Agama
							</th>
							<th>
								Jenis kelamin
							</th>
							<th>
								Pekerjaan
							</th>
							<th>
								Alamat KTP
							</th>
              <th>
								Foto
							</th>
							<th>
								Action
							</th>
						</tr>
					</thead>
					<tbody id="tbl_kost">
					</tbody>
				</table>
			</div>
		</div>
	</div>

  <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit data penghuni kost</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

	<script src="assets/js/slide-menu.js"></script>
	<script src="assets\bootstrap\js\bootstrap.js"></script>
	<script src="assets/js/main.js"></script>
  <script type="text/javascript">
	$(document).ready(function () {

		$('#myModal').on('show.bs.modal', function (e) {
					var rowid = $(e.relatedTarget).data('id');
					//menggunakan fungsi ajax untuk pengambilan data
					$.ajax({
							type : "post",
							url : "config/modalDataPenghuniKost.php",
							data :  'rowid='+ rowid,
							success : function(data){
							$('.fetched-data').html(data);//menampilkan data ke dalam modal
							}
					});
			 });

       $(".hapus").click(function () {
         e.preventDefault();
         var u_id = $(this).attr('data-id');
         var parent = $(this).parent("td").parent("tr");
         bootbox.dialog({
           message: "Anda yakin ingin menghapus data ? ",
           buttons: {
             success: {
               label: "no",
               className: "btn-success",
               callback: function () {
                 $('.bootbox').modal('hide');
               }
             },
             danger: {
               label: "Delete !",
               className: "btn-danger",
               callback: function () {
                 $.post('config/hapusDataPenghuniKost.php', {
                     'u_id': u_id
                   })
                   .done(function (response) {
                     bootbox.alert(response);
                     parent.fadeOut('slow');
                   })
                   .fail(function () {
                     bootbox.alert('ummm.. sepertinya ada yang salah!');
                   })
               }
             }
           }
         });
       });

	});
	</script>
</body>

</html>
