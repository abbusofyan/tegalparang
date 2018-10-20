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
	<link rel="stylesheet" href="assets/getDataKost.css">
	<link rel="stylesheet" href="assets/input.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/slide-menu.css">
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>

	<script type="text/javascript">
		$(document).ready(function () {
			$("#alamat_kontrakan").change(function () {
				var alamat_kontrakan = $(this).val();
				var dataString = 'alamat_kontrakan=' + alamat_kontrakan;
				$.ajax({
					type: "POST",
					url: "config/getDataPenghuniKontrakan.php",
					data: dataString,
					cache: false,
					success: function (html) {
						$("#tbl_kontrakan").html(html);
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
			<a class="nav-link active" href="detail_penghuni_kontrakan.php">Lihat data penghuni</a>
			<a class="nav-link" href="cek_data_kontrakan.php">Lihat data kontrakan</a>
		</div>

	</div>


	<div class="container">
		<div class="row">
			<h3 class="title">Data Penghuni kontrakan kel. tegal parang</h3>
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
							<label>Pemilik kontrakan :</label>
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
							<select class="form-control" name="kost" id="alamat_kontrakan">
								<option selected value="0">--pilih alamat--</option>
								<?php
include 'config/koneksi.php';
$sql = mysqli_query($conn, "SELECT * FROM kontrakan WHERE nik = '$nik'");
while ($row = mysqli_fetch_assoc($sql)) {
    echo "<option value='" . $row['alamat'] . ", RT" . $row['rt'] . "/RW" . $row['rw'] . "'>" . $row['alamat'] . ", RT" . $row['rt'] . "/RW" . $row['rw'] . "</option>";
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
					<tbody id="tbl_kontrakan">
					</tbody>
				</table>
			</div>
		</div>

		<!-- modal edit penghuni kontrakan -->

		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit data penghuni kontrakan</h5>
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
					type: "post",
					url: "config/modalDataPenghuniKontrakan.php",
					data: 'rowid=' + rowid,
					success: function (data) {
						$('.fetched-data').html(data); //menampilkan data ke dalam modal
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
								$.post('config/hapusDataPenghuniKontrakan.php', {
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
