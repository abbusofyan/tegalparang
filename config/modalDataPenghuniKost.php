<?php
	include 'koneksi.php';
	if($_POST['rowid']){
		$id = $_POST['rowid'];
      $query = mysqli_query($conn, "SELECT * FROM penghuni_kost WHERE u_id = '$id'");
      while ($row = mysqli_fetch_assoc($query)) {
        if ($row['j_kel'] == "L") {
          $jkel = "laki - laki";
        }else{
          $jkel = "perempuan";
        }
		$ttl_arr = explode(' / ', $row['ttl']);
		$tempat_lahir = $ttl_arr[0];
		$tgl_lahir = $ttl_arr[1];
        ?>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" id="u_id" name="u_id" value="<?php echo $row['u_id']; ?>">
            <div class="form-group">
                <label>NIK</label>
                <input type="text" class="form-control" name="nik" value="<?php echo $row['nik_penghuni']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Nama penghuni</label>
                <input type="text" id="nama_penghuni" class="form-control" name="nama_penghuni" value="<?php echo $row['nama_penghuni']; ?>">
            </div>
			<div class="form-row">
                        <div class="col-md-6 mb-3">
                        <label>Tempat lahir</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?php echo $tempat_lahir; ?>" class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                        <label>Tanggal lahir </label>
                        <input type="date" id="tgl_lahir" name="tgl_lahir" value="<?php echo $tgl_lahir; ?>" class="form-control">
                        </div>
                    </div>
			<div class="form-group">
					<label>Agama</label>
					<select class='form-control' id="agama" name='agama'>
						<option value="<?php echo $row['agama']; ?>"><?php echo $row['agama']; ?></option>
						<option value=''>----- pilih agama -----</option>
						<option value='islam'>Islam</option>
						<option value='kristen'>Kristen</option>
						<option value='katolik'>Katolik</option>
						<option value='hindu'>Hindu</option>
						<option value='budha'>Budha</option>
					</select>
				</div>
			<div class="form-group">
                <label>Jenis kelamin</label>
                <input type="text" class="form-control" name="jkel" value="<?php echo $jkel ?>" readonly>
            </div>
						<div class="form-group">
							<label>Pekerjaan</label>
							<select class='form-control' id="pekerjaan" name='pekerjaan'>
								<option value="<?php echo $row['pekerjaan']; ?>"><?php echo $row['pekerjaan']; ?></option>
								<option value=''>----- pilih pekerjaan -----</option>
								<option value='karyawan'>Karyawan</option>
								<option value='wiraswasta'>Wiraswasta</option>
								<option value='guru'>Guru</option>
								<option value='lain-lain'>Lain - lain</option>
							</select>
						</div>
			<div class="form-group">
                <label>Alamat KTP</label>
                <input type="text" id="alamat_ktp" class="form-control" name="alamat_ktp" value="<?php echo $row['alamat_ktp']; ?>">
            </div>
						<div class="form-group" id="no_itas">
							<label>Upload KTP / pas foto penghuni kontrakan :</label>
							<input type="file" name="foto" value="" id="foto" onchange="PreviewImage()" class="form-control"/>
						</div>

						<img src="<?php echo $row['foto']; ?>" id="profilePenghuni" class="editProfile" alt="Profile">

						<a href='javascript:void(0)' class='update' data-id='<?php echo $row['u_id']; ?>'>
						<button class='btn btn-primary hidden-print' id='<?php echo $row['u_id']; ?>'>Update</button></a>
        </form>
        <?php
			}
		}
?>

<script type="text/javascript">
	function PreviewImage() {
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("foto").files[0]);
		oFReader.onload = function (oFREvent) {
			document.getElementsByClassName("editProfile")[0].src = oFREvent.target.result;
		};
	};
</script>

<script type="text/javascript">
document.querySelector('#foto').addEventListener('change', function(e) {
  var file = this.files[0];
	var u_id = document.getElementById("u_id").value;
  var fd = new FormData();
  fd.append("foto", file);
	fd.append("u_id", u_id);
  // These extra params aren't necessary but show that you can include other data.
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'config/ganti_foto_penghuni_kost.php', true);

  xhr.upload.onprogress = function(e) {
    if (e.lengthComputable) {
      var percentComplete = (e.loaded / e.total) * 100;
      console.log(percentComplete + '% uploaded');
    }
  };
  xhr.onload = function() {
    if (this.status == 200) {
      var resp = JSON.parse(this.response);
      console.log('Server got:', resp);
      var image = document.createElement('img');
      image.src = resp.dataUrl;
      document.body.appendChild(image);
    };
  };
  xhr.send(fd);
}, false);
</script>


<script type="text/javascript">
$( document ).ready(function() {
	$('.update').click(function (e) {

		e.preventDefault();
		var u_id = $(this).attr('data-id');
		var parent = $(this).parent("td").parent("tr");
		var nama_penghuni = $("#nama_penghuni").val();
		var tempat_lahir = $("#tempat_lahir").val();
		var tgl_lahir = $("#tgl_lahir").val();
		var agama = $("#agama").val();
		var pekerjaan = $("#pekerjaan").val();
		var alamat_ktp = $("#alamat_ktp").val();
		bootbox.dialog({
			message: "Anda yakin ingin mengupdate data?",
			title: "<i class='glyphicon glyphicon-trash'></i>",
			buttons: {
				success: {
					label: "No",
					className: "btn-danger",
					callback: function () {
					$('.bootbox').modal('hide');
					}
				},
				danger: {
					label: "Update!",
					className: "btn-primary",
					callback: function () {
						$.post('config/editDataPenghuniKost.php', {
								u_id: u_id,
								nama_penghuni: nama_penghuni,
								tempat_lahir: tempat_lahir,
								tgl_lahir: tgl_lahir,
								agama: agama,
								pekerjaan: pekerjaan,
								alamat_ktp: alamat_ktp
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
