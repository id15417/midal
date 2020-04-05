<?php 
    include '../template/header.php';
	include '../template/navbar.php';
	include '../../inc/koneksi.php';
?>

<body>

<div class="container" style="margin-top:80px">
	<div class="container">
			<div class="container mt-3">
				<h4>Belanja Modal &raquo; Tambah Belanja Modal</h4>
				<div class="card">
					<div class="card-body">
					    <form action="proses.php" method="POST">
							<div class="row form-inline">
								<div class="col-md-2" align="right"> <b>Tanggal</b></div>
								<input type="date" class="form-control" placeholder="Tanggal" name="tgl" value="<?=date('Y-m-d')?>" required>
							</div>
							<br>
					    	<div class="row form-inline">
							  	<div class="col-md-2" align="right"> <b>Nama</b></div>
							  	<select name="pegawai" class="custom-select" style="width:35%">
								    <option selected>Pilih </option>
									<?php 
									$query = "SELECT * FROM pegawai 
											  INNER JOIN bidang ON pegawai.id_bidang = bidang.id_bidang
											  WHERE nm_bidang LIKE '%pengujian%'
											  ORDER BY id_pegawai DESC";	  
									$sql = mysqli_query($conn, $query) or die (mysqli_error($conn));
									if (mysqli_num_rows($sql) !='') {
										while ($row = mysqli_fetch_array($sql)){ 
										?>
										<option value="<?php echo $row['id_pegawai']; ?>"><?php echo $row['nm_pegawai']; ?></option>
										<?php 
										}
									} else {
										?>
											<option>Tidak ada data pegawai</option>
										<?php 
									}
									?>
								</select>
							  	<!-- <input type="text" class="form-control" placeholder="Enter Name" style="width:30%"> -->
							</div>
							<br>
							<div class="row form-inline">
							  	<div class="col-md-2" align="right"> <b>Permintaan Belanja</b></div>
							  	<input type="text" class="form-control" placeholder="Enter Permintaan Belanja" name="bmodal" style="width:35%">
						  	</div>
						  	<br>
							<div class="row form-inline">	
								<div class="col-md-2" align="right"> <b>Lokasi</b></div>	
								<select name="sub_bidang" class="form-control" style="width:35%" required>
									<option value="">Pilih </option>					   
									<?php 
									$query 	= "SELECT * FROM sub_bidang
											   WHERE sub_bidang LIKE 'laboratorium%'
											   ORDER BY id_sub_bidang DESC";
									$sql 	= mysqli_query($conn, $query) or die (mysqli_error($conn));
									while ($row = mysqli_fetch_array($sql)){ 
									?> 					   
									<option value="<?php echo $row['id_sub_bidang']; ?>"><?php echo $row['sub_bidang']; ?></option>
									<?php } ?>
								</select>		
							</div>
							<br>
						  	<div class="row form-inline">
							  	<div class="col-md-2" align="right"> <b>Akun Belanja Modal</b></div>
								<select name="kat_perbaikan" class="custom-select" style="width:35%">
								    <option selected>Pilih Akun</option>
									<?php 
									$no=1;
									$query = "SELECT * FROM kat_perbaikan 
											  WHERE mak LIKE '3165.012%' 
											  ORDER BY id_kat_perbaikan DESC";	  
									$sql = mysqli_query($conn, $query) or die (mysqli_error($conn));
									while ($row = mysqli_fetch_array($sql)){ 
									?>
								    	<option value="<?php echo $row['id_kat_perbaikan']; ?>"><?php echo $row['kat_perbaikan']; ?></option>
					    			<?php } ?>
								</select>
						  	</div>
						  	<br>
						  	<!-- <div class="row form-inline">
							  	<div class="col-md-2" align="right"> <b>Status</b></div>
							  	<select name="status" class="custom-select" style="width:35%">
								    <option value="2">Verifikasi</option>
								    <option value="1">Selesai</option>
								</select>
						  	</div> -->
							<br>
							<div class="row form-inline">
								<div class="col-md-2" align="right" float="top"> <b>Keterangan</div>
								<textarea type="textarea" class="form-control" placeholder="Keterangan" name="ket" style="width:200%" required></textarea>
							</div>
							<br>
							<p style="margin-left: 160px">
								<a href="javascript:history.go(-1)" class="w3-button w3-small w3-red" role="button"><i class="fas fa-angle-left"></i> Kembali</a> 
								<button type="submit" name="add_bmodal" class="w3-button w3-small w3-blue"><i class="fas fa-save"></i> Simpan</button>
							</p>
							</div>
						</div>
						</form>		
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
</script>
</body>
</html>

