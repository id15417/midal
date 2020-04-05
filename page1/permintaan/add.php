<?php 
    include '../template/header.php';
	include '../template/navbar-admin.php';
	include '../../inc/koneksi.php';
	include '../../inc/config.php';
?>

<body>

<div class="container" style="margin-top:80px">
	<div class="container">
		<div class="container mt-3">
			<h4>Permintaan &raquo; Tambah Permintaan</h4>
			<div class="card">
			<div class="card-body">
		    <form action="proses.php" method="POST">
				  <div class="row">
				    <div class="col">
				    	<label>Nama Pegawai</label>
				      	<select name="pegawai" class="form-control" required>
					    	<option value="">Pilih Nama </option>
							<?php 
							$query = "SELECT * FROM pegawai";	  
							$sql = mysqli_query($conn, $query) or die (mysqli_error($conn));
							while ($row = mysqli_fetch_array($sql)){
							?> 					   
					    		<option value="<?php echo $row['id_pegawai']; ?>"><?php echo $row['nm_pegawai']; ?></option>
					    	<?php } ?>
					    </select>	
				    </div>
				    <div class="col">
				    	<label>Perihal Permintaan</label>
				      <input type="text" class="form-control" placeholder="Enter Perihal" name="permintaan" required>
				    </div>
				  </div>
				  <br>
				  <div class="row">
				    <div class="col">	
				    	<label>Bidang</label>
					    <select name="bidang" id="bidang" class="form-control" required>
					    	<option value="">Pilih </option>
							<?php 
							$query = "SELECT * FROM bidang";	  
							$sql = mysqli_query($conn, $query) or die (mysqli_error($conn));
							while ($row = mysqli_fetch_array($sql)){
							?> 					   
					    		<option value="<?php echo $row['id_bidang']; ?>"><?php echo $row['nm_bidang']; ?></option>
					    	<?php } ?>
					    </select>	
				  	</div>
				    <div class="col">
				    	<label>Lokasi / Ruangan</label>	
					    <select name="sub_bidang" class="form-control" required>
					    		<option value="">Pilih Lokasi/Ruangan</option>					   
								<?php 
								$query 	= "SELECT * FROM sub_bidang";
								$sql 	= mysqli_query($conn, $query) or die (mysqli_error($conn));
								while ($row = mysqli_fetch_array($sql)){ 
								?> 					   
					    		<option value="<?php echo $row['id_sub_bidang']; ?>"><?php echo $row['sub_bidang']; ?></option>
								<?php } ?>
					    </select>	
				  	</div>
				  </div>
				  <br>
				<div class="row">
				  	<div class="col">
				  		<label>Keterangan Permintaan</label>
						<textarea type="textarea" class="form-control" placeholder="Enter Keterangan Permintaan" name="ket" required></textarea>
					</div>
					<div class="col">
						<label>Tanggal Permintaan</label>
				      	<input type="date" class="form-control" placeholder="Tanggal" value="<?=date('Y-m-d')?>" name="tgl" required>
				    </div>
				</div>
				<br>
				<div class="row">
					<div class="col">
					<label>Tindak Lanjut</label>
						<select name="status_post" class="form-control" required>
							<?php 
							if ($data['status_post']=="0") 
								echo "<option value='0' selected>Pending</option>";
							else echo "<option value='0'>Pending</option>";
							if ($data['status_post']=="2") 
								echo "<option value='2' selected>Proses</option>";
							else echo "<option value='2'>Proses</option>";
							if ($data['status_post']=="1") 
								echo "<option value='1' selected>Selesai</option>";
							else echo "<option value='1'>Selesai</option>"; 
							?>			   
						</select>
					</div>
					<div class="col">
					</div>
				</div>
				<br>
				<p>
				  	<a href="javascript:history.go(-1)" class="w3-button w3-small w3-red" role="button"><i class="fas fa-angle-left"></i> Kembali</a>
				  	<button type="submit" name="add" class="w3-button w3-small w3-blue"><i class="fas fa-save"></i> Simpan</button>
				</p> 
			</form>
		</div>
		</div> 
	    <script src="assets/js/bootstrap-datepicker.js"></script>
	    <hr>
	    <footer>
	        <div class="row">
	            <div class="col-md-6">
	                <p>Copyright &copy; 2019-<?php echo date("Y");?> <b>am.doating</b> All rights reserved.</p>
	            </div>
	            <div class="col-md-6 text-md-right">
	                <a href="#" class="text-dark">Terms of Use</a> 
	                <span class="text-muted mx-2">|</span> 
	                <a href="#" class="text-dark">Privacy Policy</a>
	            </div>
	        </div>
	    </footer>
	</div>
</div>
<!-- JavaScript -->
<script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js"></script>
</body>
</html>

