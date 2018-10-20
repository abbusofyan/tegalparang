<?php
  include 'koneksi.php';

  if ($_POST['u_id']) {
    $u_id = $_POST['u_id'];
    $query = mysqli_query($conn, "SELECT * FROM kontrakan WHERE u_id = '$u_id'");
    $total = mysqli_num_rows($query);
    if ($total > 0) {
      $no = 1;
      while ($row = mysqli_fetch_assoc($query)) {
        ?>
        <div class='form-group'>
          <label>No. Telp</label>
          <input type='text' class='form-control' name='no_telp' value='<?php echo $row['no_telp']; ?>'>
        </div>
        <div class='form-group'>
          <label>Status tanah</label>
          <select class='form-control' name='status_tanah'>
          <option value='<?php echo $row['status_tanah']; ?>'><?php echo $row['status_tanah']; ?></option>
          <option value='garapan negara'>--- edit status tanah ---</option>
            <option value='garapan negara'>Garapan negara</option>
            <option value='SHGB'>Sertifikat Hak Guna Bangunan (SHGB)</option>
            <option value='SHM'>Sertifikat hak milik</option>
          </select>
        </div>
        <label>Izin bangunan : </label>
        <?php
          $checked = "";
          if ($row['no_imb'] == "") {
            echo "
            <div class='form-group'  id='no_imb'>
              <input id='input_no_imb' type='text' class='form-control' value='Tidak memiliki IMB' disabled>
            </div>
            ";
          }else{

            echo "
            <p>Memiliki IMB</p>
            <div class='form-group'  id='no_imb'>
              <label>No. IMB</label>
              <input id='input_no_imb' type='text' class='form-control' value=".$row['no_imb']." disabled>
            </div>";
          }
         ?>

        <label>Izin rumah kontrakan</label>

        <?php
          $checked = "";
          if ($row['no_izin_kontrakan'] == "") {
            echo "
            <div class='form-group'  id='no_imb'>
              <input id='input_no_imb' type='text' class='form-control' value='Tidak memiliki izin kontrakan' disabled>
            </div>
            ";
          }else{

            echo "
            <p>Memiliki Izin rumah kontrakan</p>
            <div class='form-group'  id='no_izin_kontrakan'>
              <label>No. Izin kontrakan</label>
              <input id='input_no_kontrakan' type='text' value=".$row['no_izin_kontrakan']."  class='form-control' disabled>
            </div>";
          }
         ?>


        <div class='form-group'>
          <label>Harga sewa</label>
          <input type='text' class='form-control' value="<?php echo $row['harga_sewa']; ?>" name='harga_sewa'>
        </div>
        <div class='form-group'>
          <label>Fasilitas</label>
          <input type='text' class='form-control' value="<?php echo $row['fasilitas']; ?>" name='fasilitas'>
        </div>
        <div class='form-group'>
          <label>Sisa kamar yang tersedia</label>
          <input type='text' class='form-control' value="<?php echo $row['sisa_kamar']; ?>" name='sisa_kamar'>
        </div>
<?php
      }
    }else{
      echo "Data tidak ditemukan";
    }
  }

 ?>
