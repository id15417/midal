<?php 
	include '../template/header.php'; 
  	include '../template/navbar.php';
	include '../../inc/koneksi.php';
?>

<body>

<div class="container" style="margin-top:80px">
	<div class="container">
		<div class="container mt-3">
				<h4>Permintaan &raquo; Edit Permintaan</h4>
				<hr />
				<?php 
	              include 'proses.php';
	              $id 	 = $_GET['edit'];
	              $query = "SELECT * FROM form_perbaikan
                          INNER JOIN bidang     ON form_perbaikan.id_bidang     = bidang.id_bidang
                          INNER JOIN pegawai    ON form_perbaikan.id_pegawai    = pegawai.id_pegawai
                          INNER JOIN sub_bidang ON form_perbaikan.id_sub_bidang = sub_bidang.id_sub_bidang
                		  WHERE form_perbaikan.id_permintaan = $id";
                  $sql = mysqli_query($conn, $query) or die (mysqli_error($conn));
	              $data  = mysqli_fetch_array($sql);
	            ?>
	            <div class="card">
					<div class="card-body">
				        <form action="" method="POST">
					        <input type="hidden" name="id_permintaan" value="<?php echo $data['id_permintaan']; ?>">
							<div class="row">
							    <div class="col">
							    	<label> Nama Pegawai</label>
							    	<input type="text" class="form-control"  value="<?php echo $data['id_pegawai']; ?>" name="pegawai" readonly>
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
							    	<input type="text" class="form-control" value="<?php echo $data['id_bidang']; ?>" name="bidang" readonly>	
							  	</div>
							    <div class="col">
							    	<label>Lokasi / Ruangan</label>
							    	<input type="text" class="form-control" value="<?php echo $data['id_sub_bidang']; ?>" name="sub_bidang" readonly>		
							  	</div>
							</div>
							<br>
							<div class="row">
							  	<div class="col">
							  		<label>Keterangan Permintaan</label>
									<textarea type="textarea" id="ket" class="form-control" placeholder="Keterangan Permintaan" name="ket" readonly><?php echo $data['ket']; ?></textarea>
								</div>
								<div class="col">
									<label>Tanggal Permintaan</label>
							      	<input type="date" class="form-control" placeholder="Tanggal" name="tgl" value="<?php echo $data['tgl']; ?>" readonly>
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

