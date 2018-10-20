<?php
	include 'koneksi.php';

	$rt = $_GET['rt'];
	$rw = $_GET['rw'];
	$page = $_GET['page'];

	if(empty($_GET['page']) || $_GET['page'] == "") {
        $page = 1;
    } else {
        $page = $_GET['page'];
	}
	
	$raw      = file_get_contents('http://abu.lineupdev.com/tegalparang/config/getContentKontrakanJson.php?page=' . $page . "&rt=" . $rt . "&rw=" . $rw);
    $data_arr = json_decode($raw, true);

	if($data_arr['results'] != "") {
        for($i = 0; $i < count($data_arr['results']);$i++) {
            echo "
            <tr>
            <td id='no'>".$data_arr['results'][$i]['no']."</td>
            <td id='alamat'>".$data_arr['results'][$i]['alamat']."</td>
            <td id='no'>".$data_arr['results'][$i]['rt']."</td>
            <td id='no'>".$data_arr['results'][$i]['rw']."</td>
            <td id='no'>".$data_arr['results'][$i]['pemilik']."</td>
            <td id='no'>".$data_arr['results'][$i]['nik']."</td>
            <td id='no'>".$data_arr['results'][$i]['no_telp']."</td>
            <td id='status_tanah'>".$data_arr['results'][$i]['status_tanah']."</td>
            <td id='no'>".$data_arr['results'][$i]['no_imb']."</td>
            <td id='no'>" . $data_arr['results'][$i]['no_izin_kontrakan'] . "</td>
            <td id='no'>" . $data_arr['results'][$i]['sistem_sewa'] . "</td>
            <td id='no'>" . $data_arr['results'][$i]['jml_kamar'] . "</td>
            <td id='no'>".$data_arr['results'][$i]['jml_lantai']."</td>
            <td id='no'>".$data_arr['results'][$i]['ket']."</td>
            <td><a href='javascript:void(0)' class='hapus' data-id='".$data_arr['results'][$i]['u_id']."'>
                <button class='btn btn-danger hidden-print' id='".$data_arr['results'][$i]['u_id']."'>Hapus</button></a>
                <a href='#myModal' id='custId' data-toggle='modal' data-id=".$data_arr['results'][$i]['u_id'].">
                <button class='btn btn-success hidden-print' id='".$data_arr['results'][$i]['u_id']."'>Edit</button></a>
            </td>
            </tr>
            ";
        }
    } else {
        echo "data tidak ditemukan";
    }
?>
<script type="text/javascript">
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
</script>
