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
				<h4>Permintaan &raquo; Edit Permintaan</h4>
				<?php 
	              // include 'proses.php';
	              $id 	 = $_GET['edit'];
	              $query = "SELECT * FROM form_perbaikan
                          INNER JOIN bidang    ON form_perbaikan.id_bidang    = bidang.id_bidang
                          INNER JOIN pegawai    ON form_perbaikan.id_pegawai    = pegawai.id_pegawai
                          INNER JOIN sub_bidang ON form_perbaikan.id_sub_bidang = sub_bidang.id_sub_bidang
                		  WHERE form_perbaikan.id_permintaan = $id";
                  $sql 	 = mysqli_query($conn, $query) or die (mysqli_error($conn));
	              $data  = mysqli_fetch_array($sql);
	            ?>
	            <div class="card">
					<div class="card-body">
				        <form action="proses.php" method="POST">
					        <input type="hidden" name="id_permintaan" value="<?php echo $data['id_permintaan']; ?>">
							<div class="row">
							    <div class="col">
							    	<label> Nama Pegawai</label>
							    	<select name="pegawai" class="form-control" readonly>
							    	  <option value="<?php echo $data['id_pegawai']; ?>"><?php echo $data['nm_pegawai']; ?></option>
							    	</select>
							    </div>
							    <div class="col">
							      <label>Perihal Permintaan</label>
							      <input type="text" class="form-control" value="<?php echo $data['permintaan']; ?>" name="permintaan" readonly>
							    </div>
							</div>
							  <br>
							<div class="row">
							    <div class="col">
							    	<label>Bidang</label>	
							    	<select name="bidang" class="form-control" readonly>
							    	  <option value="<?php echo $data['id_bidang']; ?>"><?php echo $data['nm_bidang']; ?></option>
							    	</select>	
							  	</div>
							    <div class="col">
							    	<label>Lokasi / Ruangan</label>
							    	<select name="sub_bidang" class="form-control" readonly>
							    	  <option value="<?php echo $data['id_sub_bidang']; ?>"><?php echo $data['sub_bidang']; ?></option>
							    	</select>
							  	</div>
							</div>
							<br>
							<div class="row">
							  	<div class="col">
							  		<label>Keterangan Permintaan</label>
									<textarea type="textarea" id="ket" class="form-control" name="ket" required><?php echo $data['ket']; ?></textarea>
								</div>
								<div class="col">
									<label>Tanggal Permintaan</label>
							      	<input type="date" class="form-control" name="tgl" value="<?php echo $data['tgl']; ?>" readonly>
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
							  	<button type="submit" name="edit" class="w3-button w3-small w3-blue"><i class="fas fa-save"></i> Simpan</button>
							</p> 
						</form> 
					</div>
				</div>
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
	</div>
</div> 
</body>
</html>

