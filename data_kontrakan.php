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
	<link rel="stylesheet" href="assets/getDataKost.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/slide-menu.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="assets\js\jquery-3.3.1.min.js"></script>
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
			<a class="nav-link" href="data_penghuni_kontrakan.php">Data Penghuni Konstrakan</a>
			<a class="nav-link" href="data_kost.php">Data Kost</a>
			<a class="nav-link active" href="data_kontrakan.php">Data Kontrakan</a>
		</div>

	</div>

	<div id="main">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="title">Data Rumah Kontrakan di Wilayah Kel. Tegal Parang</h3>
					</br>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<form action="report/report_kontrakan_perbulan.php?bulan=$bulan&tahun=$tahun" method="GET">
						<div class="form-row">
							<div class="form-group">
								<label>Download data :</label>
							</div>
							<div class="form-group col-md-2">
								<select class="form-control" name="bulan" id="bulan">
									<option value="">Pilih bulan</option>
									<option value="01">Januari</option>
									<option value="02">Februari</option>
									<option value="03">Maret</option>
									<option value="04">April</option>
									<option value="05">Mei</option>
									<option value="06">Juni</option>
									<option value="07">Juli</option>
									<option value="08">Agustus</option>
									<option value="09">September</option>
									<option value="10">Oktober</option>
									<option value="11">November</option>
									<option value="12">Desember</option>
								</select>
							</div>
							<div class="form-group col-md-2">
								<select class="form-control" id="tahun" name='tahun'>
									<?php
include 'config/koneksi.php';
$sql = mysqli_query($conn, "SELECT SUBSTRING_INDEX (tanggal,'-',1) FROM kost GROUP BY SUBSTRING_INDEX (tanggal,'-',1)");
while ($tahun = mysqli_fetch_array($sql)) {
    if ($tahun['SUBSTRING_INDEX (tanggal,'-',1)'] == "") {
        continue;
    }
    echo '<option value="' . $tahun['SUBSTRING_INDEX (tanggal,'-',1)'] . '">
						' . $tahun['SUBSTRING_INDEX (tanggal,'-',1)'] . '</option>
						';
}?>
								</select>
							</div>
							<a><button type="submit" class="btn btn-success btn-custom"><i class="fa fa-download"></i></button></a>
							<span id="error"></span>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<form action="report/report_kontrakan_perRT.php?rt=$rt&rw=$rw" method="GET">
						<div class="form-row">
						<select onchange="selectChange(this);" name="" id="" class="form-control">
							<option value="">--pilih</option>
							<option value="RT/RW">RT/RW</option>
							<option value="Izin IMB">Izin IMB</option>
							<option value="Izin Kontrakan">Izin Kontrakan</option>
						</select>
						<script>
							function selectChange(item) {
								switch(item.value) {
									case "RT/RW":
										$('#place_here').html('<div class="form-group">\
								<label>pilih RW :</label>\
							</div>\
							<div class="form-group col-md-2">\
								<select class="form-control" name="rw" id="rw">\
									<option value="">-- pilih RW --</option>\
									<option value="01">01</option>\
									<option value="02">02</option>\
									<option value="03">03</option>\
									<option value="04">04</option>\
									<option value="05">05</option>\
									<option value="06">06</option>\
									<option value="07">07</option>\
									<option value="semuadata">Semua data</option>\
								</select>\
							</div>\
							<div class="form-group">\
								<label>pilih RT:</label>\
							</div>\
							<div class="form-group col-md-2">\
								<select class="form-control" name="rt" id="rt">\
									<option value="semuadata">-- pilih RT --</option>\
									<option value="001">001</option>\
									<option value="002">002</option>\
									<option value="003">003</option>\
									<option value="004">004</option>\
									<option value="005">005</option>\
									<option value="006">006</option>\
									<option value="007">007</option>\
									<option value="008">008</option>\
									<option value="009">009</option>\
									<option value="010">010</option>\
									<option value="011">011</option>\
									<option value="012">012</option>\
									<option value="013">013</option>\
								</select>\
							</div>\
							<div class="form-group">\
								<button type="button" class="btn btn-success" onclick="mButtonSearch(this.value);" value="RT/RW"><i class="fa fa-search"></i></button>\
								<button type="submit" id="download" class="btn btn-success btn-custom"><i class="fa fa-download"></i></button>\
							</div>');


										break;
									case "Izin IMB":
										$('#place_here').html('<div class="form-group">\
                    <div class="radio">\
										<label><input type="radio" name="optradio" value="Berizin">Berizin</label>\
										</div>\
                    </div>\
                    <div class="form-group">\
										<div class="radio">\
										<label><input type="radio" name="optradio" value="Tidak Berizin">Tidak Berizin</label>\
										</div>\
                    <label><input type="hidden" name="imb" value="berizin"></label>\
                    </div>\
										<div class="form-group">\
											<button type="button" class="btn btn-success" onclick="mButtonSearch(this.value);" value="Izin IMB"><i class="fa fa-search"></i></button>\
										  <button type="submit" id="download" class="btn btn-success btn-custom"><i class="fa fa-download"></i></button>\
										</div>\
										')
										break;
									case "Izin Kontrakan":
									$('#place_here').html('<div class="radio">\
										<label><input type="radio" name="optradio" value="Berizin">Berizin</label>\
										</div>\
										<div class="radio">\
										<label><input type="radio" name="optradio" value="Tidak Berizin">Tidak Berizin</label>\
										</div>\
                    <div class="">\
										<label><input type="hidden" name="izin_kontrakan" value="berizin"></label>\
										</div>\
										<div class="form-group">\
											<button type="button" class="btn btn-success" onclick="mButtonSearch(this.value);" value="Izin Kontrakan"><i class="fa fa-search"></i></button>\
										<button type="submit" id="download" class="btn btn-success btn-custom"><i class="fa fa-download"></i></button>\
										</div>\
										')
										break;
								}
							}
						</script>
						</div>
						<div class="form-row" id="place_here">
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="table-responsive">
				<table class="table">
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
								No IMB
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
					<tbody id="tbl_kontrakan"></tbody>
				</table>
			</div>
			<div id="mPagination"></div>

	<!-- modal edit -->


	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit data rumah kontrakan</h5>
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
	<script type="text/javascript">
		$(document).ready(function() {
        $("#tahun").change(function() {
            var tahun = $(this).val();
            var bulan = $("#bulan").val();
            // var dataString = 'tahun='+tahun,'bulan='+bulan;
            $.ajax({
                type: "GET",
                url: "config/getTanggal.php",
                dataType: 'html',
                data: 'bulan=' + bulan + '&tahun=' + tahun,
                cache: false,
                success: function(html) {
                    $("#error").html(html);
                }
            });
        });

        $("#bulan").change(function() {
            var bulan = $(this).val();
            var tahun = $("#tahun").val();
            $.ajax({
                type: "GET",
                url: "config/getTanggal.php",
                dataType: 'html',
                data: 'bulan=' + bulan + '&tahun=' + tahun,
                cache: false,
                success: function(html) {
                    $("#error").html(html);
                }
            });
        });

        // $("#sort").click(function () {
        // 	var rt = $("#rt").val();
        // 	var rw = $("#rw").val();
        // 	$.ajax({
        // 		type: "GET",
        // 		url: "config/getContentKontrakan.php",
        // 		dataType: 'html',
        // 		data: 'rt=' + rt + '&rw=' + rw,
        // 		cache: false,
        // 		success: function (html) {
        // 			$("#tbl_kontrakan").html(html);
        // 		}
        // 	});
        // });

        $('#myModal').on('show.bs.modal', function(e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type: "post",
                url: "config/modalDataKontrakan.php",
                data: 'rowid=' + rowid,
                success: function(data) {
                    $('.fetched-data').html(data); //menampilkan data ke dalam modal
                }
            });
        });

        $('.hapus').click(function(e) {

            e.preventDefault();
            var u_id = $(this).attr('data-id');
            var parent = $(this).parent("td").parent("tr");
            bootbox.dialog({
                message: "Are you sure you want to Delete ?",
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
                            $.post('config/hapusDataKontrakan.php', {
                                    'u_id': u_id
                                })
                                .done(function(response) {
                                    bootbox.alert(response);
                                    parent.fadeOut('slow');
                                })
                                .fail(function() {
                                    bootbox.alert('Something Went Wrog ....');
                                })

                        }
                    }
                }
            });


        });

    });

    function mButtonSearch(value) {

        switch (value) {
            case "RT/RW":
                var rt = $("#rt").val();
                var rw = $("#rw").val();
                $.ajax({
                    type: "GET",
                    url: "config/getContentKontrakan.php",
                    dataType: 'html',
                    data: 'rt=' + rt + '&rw=' + rw + '&page=1',
                    cache: false,
                    success: function(html) {
                        $("#tbl_kontrakan").html(html);
                        getPagination("RT/RW");
                    }
                });
                break;
            case "Izin IMB":
                var value = $("input[name='optradio']:checked").val();
                var context = "imb";
                $.ajax({
                    type: "GET",
                    url: "config/getContentKontrakanIzin.php",
                    dataType: 'html',
                    data: 'context=' + context + '&izin=' + value + '&page=1',
                    cache: false,
                    success: function(html) {
                        $("#tbl_kontrakan").html(html);
                        getPagination("Izin IMB");
                    }
                });
                break;
            case "Izin Kontrakan":
                var value = $("input[name='optradio']:checked").val();
                var context = "kontrakan";
                $.ajax({
                    type: "GET",
                    url: "config/getContentKontrakanIzin.php",
                    dataType: 'html',
                    data: 'context=' + context + '&izin=' + value + '&page=1',
                    cache: false,
                    success: function(html) {
                        $("#tbl_kontrakan").html(html);
                        getPagination("Izin Kontrakan");
                    }
                });
                break;
        }
    }

    function getPagination(value) {
        $('.pagination').remove();
        item_value = value;
        switch (value) {
            case "RT/RW":
                var pageJson = 'http://abu.lineupdev.com/tegalparang/config/getContentKontrakanJson.php';
                var rt = $("#rt").val();
                var rw = $("#rw").val();
                $.getJSON(pageJson, {
                        rt: rt,
                        rw: rw,
                        page: 1
                    })
                    .done(function(data) {
                        buildPagination(data.total_pages, item_value);
                        console.log(data.total_pages);
                    })
                break;
            case "Izin IMB":
                var pageJson = 'http://abu.lineupdev.com/tegalparang/config/getContentKontrakanIzinJson.php';
                var value = $("input[name='optradio']:checked").val();
                var context = "imb";
                $.getJSON(pageJson, {
                        izin: value,
                        context: context,
                        page: 1
                    })
                    .done(function(data) {
                        buildPagination(data.total_pages, item_value);
                        console.log(data.total_pages);
                    })
                break;
            case "Izin Kontrakan":
                var pageJson = 'http://abu.lineupdev.com/tegalparang/config/getContentKontrakanIzinJson.php';
                var value = $("input[name='optradio']:checked").val();
                var context = "kontrakan";
                $.getJSON(pageJson, {
                        izin: value,
                        context: context,
                        page: 1
                    })
                    .done(function(data) {
                        buildPagination(data.total_pages, item_value);
                        console.log(data.total_pages);
                    })
                break;
        }
    }

    function buildPagination(page, item_value) {
        if (page > 1) {
            var html = '';
            html += '<ul class="pagination pagination-m">';
            for (var i = 1; i <= page; i++) {
                html += '<li class="page-item"><a class="page-link" onclick="clickPagination(this);" id="' + item_value + '">' + i + '</a></li>';
            }
            html += '</ul>';

            $('#mPagination').html(html);
        }
    }

    function clickPagination(item) {
        page = item.innerHTML;
        item_value = item.id;
        switch (item_value) {
            case "RT/RW":
                var pageJson = 'http://abu.lineupdev.com/tegalparang/config/getContentKontrakan.php';
                var rt = $("#rt").val();
                var rw = $("#rw").val();
                var dataString = 'rt=' + rt + '&rw=' + rw + '&page=' + page;
                $.ajax({
                    type: "GET",
                    url: "config/getContentKontrakan.php",
                    data: dataString,
                    cache: false,
                    success: function(html) {
                        $("#tbl_kontrakan").html(html);
                    }
                });
                break;
            case "Izin IMB":
                var value = $("input[name='optradio']:checked").val();
                var context = "imb";
                $.ajax({
                    type: "GET",
                    url: "config/getContentKontrakanIzin.php",
                    dataType: 'html',
                    data: 'context=' + context + '&izin=' + value + '&page=' + page,
                    cache: false,
                    success: function(html) {
                        $("#tbl_kontrakan").html(html);

                    }
                });
                break;
            case "Izin Kontrakan":
                var value = $("input[name='optradio']:checked").val();
                var context = "kontrakan";
                $.ajax({
                    type: "GET",
                    url: "config/getContentKontrakanIzin.php",
                    dataType: 'html',
                    data: 'context=' + context + '&izin=' + value + '&page=' + page,
                    cache: false,
                    success: function(html) {
                        $("#tbl_kontrakan").html(html);

                    }
                });
                break;
        }
    }
	</script>
</body>

</html>
