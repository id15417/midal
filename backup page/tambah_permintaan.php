<?php 

    include 'template/header.php';
    include 'template/navbar.php';

?>

<body>

<div class="container">
	<div class="container">
		<div class="container mt-3">
			<h4>Permintaan &raquo; Tambah Permintaan</h4>
				<hr />
		        <form action="control.php" method="POST">
		        <?php 
			    	$mysqli = new mysqli('localhost', 'root', '', 'dbpermintaan') or die(mysql_error($mysqli));
			    	$result = $mysqli->query("SELECT * FROM pegawai ORDER BY id_pegawai DESC") or die($mysqli->error);
		    	?>
				  <div class="row">
				    <div class="col">
				      <select name="pegawai" class="form-control" required>
					    	<option value="">Nama </option>
					    	<?php while ($row = $result->fetch_assoc()): ?> 					   
					    		<option value="<?php echo $row['nm_pegawai']; ?>"><?php echo $row['nm_pegawai']; ?></option>
					    	<?php endwhile; ?>
					    </select>	
				    </div>
				    <div class="col">
				      <input type="text" class="form-control" placeholder="Permintaan" name="permintaan" required>
				    </div>
				  </div>
				  <br>
				  	<?php 

				    	$mysqli = new mysqli('localhost', 'root', '', 'dbpermintaan') or die(mysql_error($mysqli));
				    	$result = $mysqli->query("SELECT * FROM bidang ORDER BY id_bidang ASC") or die($mysqli->error);
			 
		    		?>
				  <div class="row">
				    <div class="col">	
					    <select name="bidang" class="form-control" required>
					    	<option value="">Pilih Bidang </option>
					    	<?php while ($row = $result->fetch_assoc()): ?> 					   
					    		<option value="<?php echo $row['nm_bidang']; ?>"><?php echo $row['nm_bidang']; ?></option>
					    	<?php endwhile; ?>
					    </select>	
				  	</div>
				  	<?php 

				    	$mysqli = new mysqli('localhost', 'root', '', 'dbpermintaan') or die(mysql_error($mysqli));
				    	$result = $mysqli->query("SELECT * FROM sub_bidang ORDER BY id_sub_bidang DESC") or die($mysqli->error);
			 
		    		?>
				    <div class="col">	
					    <select name="lokasi" class="form-control" required>
					    		<option value="">Pilih Lokasi/Ruangan</option>					   
					    		<?php while ($row = $result->fetch_assoc()): ?> 					   
					    		<option value="<?php echo $row['sub_bidang']; ?>"><?php echo $row['sub_bidang']; ?></option>
					    	<?php endwhile; ?>
					    </select>	
				  	</div>
				  </div>
				  <br>
				  <div class="row">
				  	<?php 

				    	$mysqli = new mysqli('localhost', 'root', '', 'dbpermintaan') or die(mysql_error($mysqli));
				    	$result = $mysqli->query("SELECT * FROM kat_perbaikan ORDER BY id_kat_perbaikan ASC") or die($mysqli->error);
			 
		    		?>
				    <div class="col">	
					    <select name="perbaikan" class="form-control" required>
					    		<option value="">Jenis </option>					   
					    	<?php while ($row = $result->fetch_assoc()): ?> 					   
					    		<option value="<?php echo $row['kat_perbaikan']; ?>"><?php echo $row['kat_perbaikan']; ?></option>
					    	<?php endwhile; ?>
					    </select>	
				  	</div>
				  	<div class="col">
				      <input type="text" class="form-control" placeholder="Kerusakan" name="kerusakan" required>
				    </div>
				  </div>
				  <br>
				   <div class="row">
				    <div class="col">
				      	<select name="pengelola" class="form-control" required>
					    	<option value="">Pilih</option>					   					   
					    	<option value="swa kelola">Swa Kelola</option>
					    	<option value="pk3">PK3</option>
					    </select>
				    </div>
				    <div class="col">
				      	<input type="text" class="form-control" placeholder=PK3 name="nm_pk3" required>
				      	<p>Isikan '-' <br> Jika bukan PK3</p>
				    </div>
				  </div>
				  <br>
				  <div class="row">
					<div class="col">
					    <textarea type="textarea" class="form-control" placeholder="Keterangan" name="ket" required></textarea>
					    <p>Isikan '-' <br> Keterangan diisi oleh administrator</p>
					</div>
					
				    <div class="col">
				      <input type="date" class="form-control" placeholder="Tanggal" name="tgl" value="<?=date('Y-m-d')?>" required>
				    </div>
				  </div>
				  <br>
				  <p>
				  	<a href="javascript:history.go(-1)" class="btn btn-danger btn-sm" role="button"><i class="fas fa-angle-left"></i> Kembali</a>
				  	<button type="submit" name="add_permintaan" class="btn btn-primary btn-sm">Simpan</button>
				   
				  </p> 
				</form>
		</div>
    </div> 

    <script src="assets/js/bootstrap-datepicker.js"></script>
	
    <hr>
    <footer>
        <div class="row">
            <div class="col-md-6">
                <p>Copyright &copy; 2019-<?php echo date("Y");?> am.doating</p>
            </div>
            <div class="col-md-6 text-md-right">
                <a href="#" class="text-dark">Terms of Use</a> 
                <span class="text-muted mx-2">|</span> 
                <a href="#" class="text-dark">Privacy Policy</a>
            </div>
        </div>
    </footer>
</div>
</body>
</html>

