<?php

  include 'koneksi.php';

  if($_SERVER['REQUEST_METHOD'] == "POST") {
      if(empty($_POST['page']) || $_POST['page'] == "") {
          $page = 1;
      } else {
          $page = $_POST['page'];
      }

      $raw = file_get_contents('http://abu.lineupdev.com/tegalparang/config/getDataPenghuniKostJson.php?page=' . $page . "&nama_kost=" . urlencode($_POST['nama_kost']));
      $data_arr = json_decode($raw, true);

      if($data_arr['results'] != "") {
        for($i = 0; $i < count($data_arr['results']);$i++) {
            echo "
            <tr id=".$data_arr['results'][$i]['u_id'].">
              <td>" . $data_arr['results'][$i]['no'] . "</td>
              <td id='no'>" . $data_arr['results'][$i]['nik_penghuni'] . "</td>
              <td id='no'>" . $data_arr['results'][$i]['nama_penghuni'] . "</td>
              <td id='no'>" . $data_arr['results'][$i]['ttl'] . "</td>
              <td id='no'>" . $data_arr['results'][$i]['agama'] . "</td>
              <td id='no'>" . $data_arr['results'][$i]['j_kel'] . "</td>
              <td id='no'>" . $data_arr['results'][$i]['pekerjaan'] . "</td>
              <td id='no'>" . $data_arr['results'][$i]['alamat_ktp'] . "</td>
              <td id='no'><img id='profilePenghuni' src='".$data_arr['results'][$i]['foto']."'></td>
              <td><a href='javascript:void(0)' class='hapus' data-id='".$data_arr['results'][$i]['u_id']."'>
              <button class='btn btn-danger hidden-print' id='".$data_arr['results'][$i]['u_id']."'>Hapus</button></a>
              <a href='#myModal' id='custId' data-toggle='modal' data-id=".$data_arr['results'][$i]['u_id'].">
              <button class='btn btn-success hidden-print' id='".$data_arr['results'][$i]['u_id']."'>Edit</button></a>
                  </td>
            </tr>";
          }
      } else {
          echo 'data tidak ditemukan';
      }
  }
 ?>

 <script type="text/javascript">
 $('.hapus').click(function(e) {

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
                   $.post('config/hapusDataPenghuniKost.php', {
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
