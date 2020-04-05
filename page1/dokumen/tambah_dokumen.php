<?php 
    include '../template/header.php';
	include '../template/navbar-admin.php'; 
	include '../../inc/koneksi.php';
?>

<body>

<div class="container" style="margin-top:80px">
	<div class="container">
			<div class="container mt-3">
				<h4>Laporan &raquo; Tambah Dokumen</h4>
				<div class="card">
					<div class="card-body">
					    <form action="control.php" method="POST" enctype="multipart/form-data">
							<div class="row form-inline">
							  	<div class="col-md-2" align="right"><b>TANGGAL</b></div>
							  	<input type="text" class="form-control" name="tgl" value="<?=date('Y-m-d')?>" disabled>
						  	</div>
						  	<br>	
						  	<div class="row form-inline">
						  		<div class="col-md-2" align="right"> <b>JUDUL</b></div>
							  	<input type="text" name="judul_file" class="form-control" placeholder="Enter" style="width:35%">
						  	</div>
							<br>
						  	<div class="row form-inline">
							  	<div class="col-md-2" align="right"><b>NAMA FILE</b></div>
							  	<input type="textarea" name="nama_file" class="form-control" placeholder="Enter" style="width:35%">
						  	</div>
						  	<br>
						  	<div class="row form-inline">	
						  	<div class="col-md-2" align="right"> <b>BIDANG</b></div>
						    <select name="bidang" id="bidang" class="form-control" style="width:35%" required>
						    	<option value="">Pilih </option>
								<?php 
									$query = "SELECT * FROM bidang";
									$sql = mysqli_query($conn, $query) or die (mysqli_error($conn));
									while ($row = mysqli_fetch_array($sql)){ 
						    	?> 					   
						    	<option value="<?php echo $row['nm_bidang']; ?>"><?php echo $row['nm_bidang']; ?></option>
						    	<?php } ?>
						    </select>
				  			</div>
						  	<br>
						  	<div class="row form-inline">
						  		<div class="col-md-2" align="right"><b>UPLOAD FILE</b></div>
						  		<input type="file" id="myFile" name="myfile" id="myfile">
						  	</div>	  	
						</form>
					</div>
					<p style="margin-left: 190px">
						<a href="javascript:history.go(-1)" class="w3-button w3-small w3-red" role="button"><i class="fas fa-angle-left"></i> Kembali</a> 
						<input type="submit" name="upload" value="Upload" class="w3-button w3-small w3-blue">
					</p> 
				</div>
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

