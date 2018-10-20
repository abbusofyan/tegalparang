<?php
	include 'koneksi.php';
	if($_POST['rowid']){
		$id = $_POST['rowid'];
      $query = mysqli_query($conn, "SELECT * FROM kost WHERE u_id = '$id'");
      while ($row = mysqli_fetch_assoc($query)) {
        $jalan = $row['alamat'];
        $rt = $row['rt'];
        $rw = $row['rw'];
        $alamat = $jalan . ", RT" . $rt . " RW" . $rw;
        ?>
        <form method="post">
            <input type="hidden" name="u_id" value="<?php echo $row['u_id']; ?>">
            <div class="form-group">
                <label>Nama kost</label>
                <input type="text" id="nama_kost" class="form-control" name="nama_kost" value="<?php echo $row['nama_kost']; ?>">
            </div>
            <div class="form-group">
                <label>Pemilik</label>
                <input type="text" class="form-control" name="pemilik" value="<?php echo $row['pemilik']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>NIK pemilik</label>
                <input type="text" class="form-control" name="nik_pemilik" value="<?php echo $row['nik']; ?>" readonly>
            </div>
			<div class="form-row">
                        <div class="col-md-6 mb-3">
                        <label>Alamat</label>
                        <input type="text" name="tempat_lahir" value="<?php echo $row['alamat']; ?>" class="form-control" required readonly>
                        </div>
                        <div class="col-md-2 mb-2">
                        <label>RT </label>
                        <input type="text" name="rt" value="<?php echo $row['rt']; ?>" class="form-control" required readonly>
                        </div>
                        <div class="col-md-2 mb-2">
                        <label>RW </label>
                        <input type="text" name="rw" value="<?php echo $row['rw']; ?>" class="form-control" required readonly>
                        </div>
                    </div>

			        <div class="form-group">
                <label>No telp</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo $row['no_telp'] ?>">
            </div>
						<div class="form-group">
    					<label>Status tanah</label>
    					<select class="form-control" id="status" name="status">
                <option value="<?php echo $row['status_tanah']; ?>"><?php echo $row['status_tanah']; ?></option>
                <option value="">---- sistem sewa ----</option>
    						<option value="Garapan negara">Garapan neraga</option>
    						<option value="SHGB">Sertifikat hak guna bangunan</option>
    						<option value="Sertifikat hak milik">Sertifikat hak milik</option>
    					</select>
    				</div>
            <label>Izin bangunan</label>
    				<div class="form-group">
    					<div class="form-check form-check-inline">
    						<input class="form-check-input izin_imb" type="radio" name="izin_imb" value="ya" checked>
    						<label class="form-check-label">Memiliki IMB</label>
    					</div>
    					<div class="form-check form-check-inline">
    						<input class="form-check-input izin_imb" type="radio" name="izin_imb" value="tidak">
    						<label class="form-check-label">Tidak memiliki IMB</label>
    					</div>
    				</div>
    				<div class="form-group"  id="no_imb">
    					<label>No. IMB</label>
    					<input id="input_no_imb" type="text" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="masukkan no IMB" value="<?php echo $row['no_imb']; ?>" name="no_imb">
    				</div>
    				<label>Izin rumah kost</label>
    				<div class="form-group">
    					<div class="form-check form-check-inline">
    						<input class="form-check-input izin_kost" type="radio" name="izin_kost" value="ya" checked>
    						<label class="form-check-label">Memilik izin</label>
    					</div>
    					<div class="form-check form-check-inline">
    						<input class="form-check-input izin_kost" type="radio" name="izin_kost" value="tidak">
    						<label class="form-check-label">Tidak memiliki izin</label>
    					</div>
    				</div>
    				<div class="form-group" id="no_izin_kost">
    					<label>No. izin kost</label>
    					<input id="input_no_izin_kost" type="text" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="masukkan no. izin kost" value="<?php echo $row['no_izin_kost']; ?>" name="no_izin_kost">
    				</div>
    				<div class="form-group">
    					<label>Sistem sewa</label>
    					<select class="form-control" id="sistem_sewa" name="sistem_sewa">
                <option value="<?php echo $row['sistem_sewa']; ?>"><?php echo $row['sistem_sewa']; ?></option>
                <option value="">---- sistem sewa ----</option>
    						<option value="harian">Harian</option>
    						<option value="bulanan">Bulanan</option>
    						<option value="bulanan">Tahunan</option>
    					</select>
    				</div>
						<a href='javascript:void(0)' class='update' data-id='<?php echo $row['u_id']; ?>'>
						<button class='btn btn-primary hidden-print' id='<?php echo $row['u_id']; ?>'>Update</button></a>
        </form>

        <script type="text/javascript">
      	$( document ).ready(function() {

      		$("#input_no_izin_kost").show().prop('required', true);
      		$("#input_no_imb").show().prop('required', true);

      		$(":radio.izin_imb").change(function () {
      			var input = $(this).next();
      			if ($(this).val() == "tidak") {
      				$("#no_imb").hide();
      				$("#input_no_imb").removeAttr('required');
      			} else {
      				$("#no_imb").show();
      				$("#input_no_imb").prop('required', true);
      			}
      		});

      		$(":radio.izin_kost").change(function () {
      			var input = $(this).next();
      			if ($(this).val() == "tidak") {
      				$("#no_izin_kost").hide();
      				$("#input_no_izin_kost").removeAttr('required');
      			} else {
      				$("#no_izin_kost").show();
      				$("#input_no_izin_kost").prop('required', true);
      			}
      		});

					$("#status").change(function(){
						var status = $("#status").val();
						console.log(status);
					});

					$('.update').click(function (e) {

						e.preventDefault();
						var u_id = $(this).attr('data-id');
						var parent = $(this).parent("td").parent("tr");
						var nama_kost = $("#nama_kost").val();
						var no_telp = $("#no_telp").val();
						var status = $("#status").val();
						var no_imb = $("#input_no_imb").val();
						var no_izin_kost = $("#input_no_izin_kost").val();
						var sistem_sewa = $("#sistem_sewa").val();
						bootbox.dialog({
							message: "Anda yakin ingin mengupdate data?",
							title: "<i class='glyphicon glyphicon-trash'></i>",
							buttons: {
								success: {
									label: "No",
									className: "btn-success",
									callback: function () {
										$('.bootbox').modal('hide');
									}
								},
								danger: {
									label: "Update!",
									className: "btn-primary",
									callback: function () {
										$.post('config/editDataKost.php', {
												u_id: u_id,
												nama_kost: nama_kost,
												no_telp: no_telp,
												status: status,
												no_imb: no_imb,
												no_izin_kost: no_izin_kost,
												sistem_sewa: sistem_sewa
											})
											.done(function (response) {
												if(!alert(response)){window.location.reload();}

											})
											.fail(function () {
												bootbox.alert('Something Went Wrog ....');
											})

									}
								}
							}
						});


					});

      });
      	</script>
        <?php } }
?>
