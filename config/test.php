<?php 
	include 'koneksi.php';
	if($_POST['rowid']){
		echo "this is modal";
		$id = $_POST['rowid'];
      echo $id;
      $query = mysqli_query($conn, "SELECT * FROM penghuni_kost WHERE u_id = '$id'");
      while ($baris = mysqli_fetch_assoc($query)) {
        ?>
        <form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
            <div class="form-group">
                <label>Nama Siswa</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $result['nama']; ?>">
            </div>
            <div class="form-group">
                <label>Umur</label>
                <input type="text" class="form-control" name="umur" value="<?php echo $result['umur']; ?>">
            </div>
              <button class="btn btn-primary" type="submit">Update</button>
        </form>     
        <?php } }
?>
