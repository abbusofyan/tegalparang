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
	<link rel="stylesheet" href="assets/getDataKost.css">
	<link rel="stylesheet" href="assets/input.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/form-validation.css">
	<link rel="stylesheet" href="assets/css/slide-menu.css">
	<script src="assets\js\jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js"></script>

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
			<a class="nav-link" href="kontrakan.php">Input data rumah kontrakan</a>
			<a class="nav-link active" href="lihat_data.php">Lihat data</a>
      <a class="nav-link" href="ganti_foto.php">Ganti foto</a>
		</div>

	</div>

	<div class="container">
		<div class="row">
			<h3 class="title">Lihat data kost / kontrakan di Kel. Tegal parang</h3>
			<br>
		</div>
	</div>

<div id="main">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<form action="report/report_kost_perRT.php?rt=$rt&rw=$rw" data-target="#download" method="GET">

						<label>Pilih data :</label>
						<div class="form-group">
							<div class="form-check form-check-inline">
								<input class="form-check-input pilih-data" type="radio" name="pilih-data" value="kost">
								<label class="form-check-label">Data rumah kost</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input pilih-data" type="radio" name="pilih-data" value="kontrakan">
								<label class="form-check-label">Data rumah kontrakan</label>
							</div>
						</div>
				</form>
				</div>
		</div>
	</div>

	<div class="container">
		<div class="table-responsive">
			<table class="table table-kost">
				<thead>
					<tr>
						<th id='no'>
							No
						</th>
						<th>
							Nama kost
						</th>
						<th>
							Alamat
						</th>
						<th>
							RT
						</th>
						<th>
							RW
						</th>
						<th>
							Pemilik
						</th>
						<th>
							NIK
						</th>
						<th>
							No. Telp
						</th>
						<th>
							Status tanah
						</th>
						<th>
							Izin IMB
						</th>
						<th>
							No IMB
						</th>
						<th>
							Izin rumah kost
						</th>
						<th>
							No izin kost
						</th>
						<th>
							Sistem sewa
						</th>
						<th>
							Jumlah kamar / pintu
						</th>
						<th>
							Jumlah lantai
						</th>
						<th>
							Ket
						</th>
						<th>
							action
						</th>
					</tr>
				</thead>
				<tbody id="tbl_kost">
					<?php
include 'config/koneksi.php';
$rt = $_SESSION['rt'];
$rw = $_SESSION['rw'];
$query = mysqli_query($conn, "SELECT * FROM kost WHERE rt = $rt AND rw = $rw");
$no = 1;
while ($row = mysqli_fetch_assoc($query)) {
    if ($row['no_imb'] == "") {
        $izin_imb = html_entity_decode('&#10006;');
    } else {
        $izin_imb = html_entity_decode('&#10004;');
    }
    if ($row['no_izin_kost'] == "") {
        $izin_kost = html_entity_decode('&#10006;');
    } else {
        $izin_kost = html_entity_decode('&#10004;');
    }
    echo "<tr>
		<td id='no'>
			" . $no . "
		</td>
		<td id='no'>
			" . $row['nama_kost'] . "
		</td>
		<td id='alamat'>
			" . $row['alamat'] . "
		</td>
		<td id='no'>
			" . $row['rt'] . "
		</td>
		<td id='no'>
			" . $row['rw'] . "
		</td>
		<td id='no'>
			" . $row['pemilik'] . "
		</td>
		<td id='no'>
			" . $row['nik'] . "
		</td>
		<td id='no'>
			" . $row['no_telp'] . "
		</td>
		<td id='status_tanah'>
			" . $row['status_tanah'] . "
		</td>
		<td id='no'>
			" . $izin_imb . "
		</td>
		<td id='no'>
			" . $row['no_imb'] . "
		</td>
		<td id='no'>
			" . $izin_kost . "
		</td>
		<td id='no'>
			" . $row['no_izin_kost'] . "
		</td>
		<td id='no'>
			" . $row['sistem_sewa'] . "
		</td>
		<td id='no'>
			" . $row['jml_kamar'] . "
		</td>
		<td id='no'>
			" . $row['jml_lantai'] . "
		</td>
		<td id='no'>
			" . $row['ket'] . "
		</td>
		<td><a href='javascript:void(0)' class='hapus' data-id='" . $row['u_id'] . "'>
    <button class='btn btn-danger hidden-print' id='" . $row['u_id'] . "'>Hapus</button></a>
		<a href='#myModal' id='custId' data-toggle='modal' data-id=" . $row['u_id'] . ">
		<button class='btn btn-success hidden-print' id='" . $row['u_id'] . "'>Edit</button></a>
		</td>
	</tr>
	";
    $no++;
}?>
				</tbody>
			</table>

	<!-- table data kontrakan -->

	<table class="table table-kontrakan">
		<thead>
			<tr>
				<th id='no'>
					No
				</th>
				<th>
					Alamat
				</th>
				<th>
					RT
				</th>
				<th>
					RW
				</th>
				<th>
					Pemilik
				</th>
				<th>
					NIK
				</th>
				<th>
					No. Telp
				</th>
				<th>
					Status tanah
				</th>
				<th>
					Izin IMB
				</th>
				<th>
					No IMB
				</th>
				<th>
					Izin rumah kontrakan
				</th>
				<th>
					No izin kontrakan
				</th>
				<th>
					Sistem sewa
				</th>
				<th>
					Jumlah kamar / pintu
				</th>
				<th>
					Jumlah lantai
				</th>
				<th>
					Ket
				</th>
				<th>
					action
				</th>
			</tr>
		</thead>
		<tbody id="tbl_kontrakan">
			<?php
include 'config/koneksi.php';
$rt = $_SESSION['rt'];
$rw = $_SESSION['rw'];
$query = mysqli_query($conn, "SELECT * FROM kontrakan WHERE rt = $rt AND rw = $rw");
$no = 1;
while ($row = mysqli_fetch_assoc($query)) {
    if ($row['no_imb'] == "") {
        $izin_imb = html_entity_decode('&#10006;');
    } else {
        $izin_imb = html_entity_decode('&#10004;');
    }
    if ($row['no_izin_kontrakan'] == "") {
        $izin_kontrakan = html_entity_decode('&#10006;');
    } else {
        $izin_kontrakan = html_entity_decode('&#10004;');
    }
    echo "<tr>
<td id='no'>
	" . $no . "
</td>
<td id='alamat'>
	" . $row['alamat'] . "
</td>
<td id='no'>
	" . $row['rt'] . "
</td>
<td id='no'>
	" . $row['rw'] . "
</td>
<td id='no'>
	" . $row['pemilik'] . "
</td>
<td id='no'>
	" . $row['nik'] . "
</td>
<td id='no'>
	" . $row['no_telp'] . "
</td>
<td id='status_tanah'>
	" . $row['status_tanah'] . "
</td>
<td id='no'>
	" . $izin_imb . "
</td>
<td id='no'>
	" . $row['no_imb'] . "
</td>
<td id='no'>
	" . $izin_kontrakan . "
</td>
<td id='no'>
	" . $row['no_izin_kontrakan'] . "
</td>
<td id='no'>
	" . $row['sistem_sewa'] . "
</td>
<td id='no'>
	" . $row['jml_kamar'] . "
</td>
<td id='no'>
	" . $row['jml_lantai'] . "
</td>
<td id='no'>
	" . $row['ket'] . "
</td>
<td><a href='javascript:void(0)' class='hapus' data-id='" . $row['u_id'] . "'>
<button class='btn btn-danger hidden-print'>Hapus</button></a>
<a href='#myModal' id='custId' data-toggle='modal' data-id=" . $row['u_id'] . ">
<button class='btn btn-success hidden-print' id='" . $row['u_id'] . "'>Edit</button></a>
</td>
</tr>
";
    $no++;
}?>
		</tbody>
	</table>


		</div>
	</div>

	<!--  -->

	<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
								<div class="modal-header">
										<h5 class="modal-title">Edit data</h5>
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
	$( document ).ready(function() {
		$(".table-kost").hide();
		$(".table-kontrakan").hide();

	$(":radio.pilih-data").click(function(){
		if($(this).val() == "kontrakan"){
			$(".table-kost").hide();
			$(".table-kontrakan").show();
		}else{
			$(".table-kost").show();
			$(".table-kontrakan").hide();
		}
	});

	$('#myModal').on('show.bs.modal', function (e) {
				var rowid = $(e.relatedTarget).data('id');
				//menggunakan fungsi ajax untuk pengambilan data
				var radioValue = $("input[name='pilih-data']:checked").val();
				if (radioValue == "kost") {
					var link = "config/modalDataKost.php";
				}else{
					var link = "config/modalDataKontrakan.php";
				}
				$.ajax({
						type : "post",
						url : link,
						data :  {rowid: rowid},
						success : function(data){
						$('.fetched-data').html(data);//menampilkan data ke dalam modal
						}
				});
		 });

		 $('.hapus').click(function(e) {
			 var radioValue = $("input[name='pilih-data']:checked").val();
			 if (radioValue == "kost") {
				 var link = "config/hapusDataKost.php";
			 }else{
				 var link = "config/hapusDataKontrakan.php";
			 }

 			 e.preventDefault();
 			 var u_id = $(this).attr('data-id');
 			 var parent = $(this).parent("td").parent("tr");
 			 bootbox.dialog({
 					message: "Anda yakin ingin menghapus data ?",
 					title: "<i class='glyphicon glyphicon-trash'></i>",
 					buttons: {
 							success: {
 									label: "No",
 									className: "btn-success",
 									callback: function() {
 											$('.bootbox').modal('hide');
 									}
 							},
 							danger: {
 									label: "Delete!",
 									className: "btn-danger",
 									callback: function() {
 										 $.post(link, {
 													'u_id': u_id
 													 })
 													.done(function(response) {
 															bootbox.alert(response);
 															parent.fadeOut('slow');
															console.log(link);
 													})
 													.fail(function() {
 															bootbox.alert('Hapus data gagal ....');
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
