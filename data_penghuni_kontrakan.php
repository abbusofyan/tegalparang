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
	<link rel="stylesheet" href="assets/getDataPenghuni.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/slide-menu.css">
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	 crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>

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
			<a class="nav-link" href="data_penghuni_kost.php">Data Penghuni Kost</a>
			<a class="nav-link active" href="data_penghuni_kontrakan.php">Data Penghuni Kontrakan</a>
			<a class="nav-link" href="data_kost.php">Data Kost</a>
			<a class="nav-link" href="data_kontrakan.php">Data Kontrakan</a>
		</div>

	</div>

	<div id="main">
		<div class="container">
			<div class="row">
				<h3 class="title">Data Penghuni kontrakan kel. tegal parang</h3>
				</br>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-sm-12">
					<form class="pemilik-kontrakan" method="get" id="frm_input" action="report/report_penghuni_kontrakan.php?pemilik=$pemilik&alamat=$alamat"
					 enctype="multipart/form-data">
						<div class="form-group">
							<label>Pemilik kontrakan :</label>
							<select class="form-control" name="pemilik" id="pemilik">
								<option selected value="0">--pilih pemilik kontrakan--</option>
								<?php
include 'config/koneksi.php';
$sql = mysqli_query($conn, "SELECT * FROM kontrakan GROUP BY nik");
while ($row = mysqli_fetch_assoc($sql)) {
    echo '<option value="' . $row['pemilik'] . '">
						' . $row['pemilik'] . '</option>
						';
}?>
							</select>
						</div>
						<div class="form-group alamat-kontrakan">
							<label>Alamat kontrakan :</label>
							<select class="form-control" name="alamat_kontrakan" id="alamat_kontrakan">
							</select>
						</div>
						<a href="report/report_penghuni_kontrakan.php?pemilik=$pemilik&alamat_kontrakan=$alamat_kontrakan"><button type="submit"
							 class="btn btn-success"><i class="fa fa-search"></i>download</button></a>

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
			<div id="mPagination"></div>
		</div>
	</div>
	<!-- modal edit -->

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

	<script src="assets/js/slide-menu.js"></script>
	<script src="assets\bootstrap\js\bootstrap.js"></script>
	<script src="assets/js/main.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$("#pemilik").change(function () {
				var pemilik = $(this).val();
				var dataString = 'pemilik=' + pemilik;
				$.ajax({
					type: "POST",
					url: "config/getAlamatKontrakan.php",
					data: dataString,
					cache: false,
					success: function (html) {
						$("#alamat_kontrakan").html(html);
					}
				});
			});

			$("#alamat_kontrakan").change(function () {
				$('.pagination').remove();
				var alamat_kontrakan = $(this).val();
				var dataString = 'alamat_kontrakan=' + alamat_kontrakan;
				$.ajax({
					type: "POST",
					url: "config/getDataPenghuniKontrakan.php",
					data: dataString,
					cache: false,
					success: function (html) {
						$("#tbl_kontrakan").html(html);
						getPagination();
					}
				});
			});

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

		function getPagination() {
			var pageJson = 'http://abu.lineupdev.com/tegalparang/config/getDataPenghuniKontrakanJson.php?page=';
			var alamat_kontrakan = $('#alamat_kontrakan').val();
			$.getJSON(pageJson, {
				alamat_kontrakan: alamat_kontrakan,
				page: 1
			})
			.done(function(data) {
				buildPagination(data.total_pages);
			})
		}

		function buildPagination(page) {
			if(page > 1) {
				var html  = '';
				html += '<ul class="pagination pagination-m">';
				for(var i = 1; i <= page; i++) {
					html += '<li class="page-item"><a class="page-link" onclick="clickPagination(this);">'+i+'</a></li>';
				}
				html += '</ul>';

				$('#mPagination').append(html);
			}
		}

		function clickPagination(item) {
			page = item.innerHTML;

			var alamat_kontrakan = $('#alamat_kontrakan').val();
			var dataString = 'alamat_kontrakan=' + alamat_kontrakan + '&page=' + page;
			$.ajax({
				type: "POST",
				url: "config/getDataPenghuniKontrakan.php",
				data: dataString,
				cache: false,
				success: function (html) {
					console.log(html);
					$("#tbl_kontrakan").html(html);
				}
			});
		}
	</script>
</body>

</html>
