<?php 
    include '../template/header.php';
	include '../template/navbar-admin.php';
	include '../../inc/koneksi.php';
?>

<body>

<div class="container" style="margin-top:80px">
	<div class="container">
			<div class="container col-lg-8">
				<h4>Belanja Modal &raquo; Ubah Data</h4>
				<?php 
	              $id 	 = $_GET['edit'];
	              $query = "SELECT * FROM belanja_modal
                          INNER JOIN pegawai     	ON belanja_modal.id_pegawai    = pegawai.id_pegawai
                          INNER JOIN sub_bidang 	ON belanja_modal.id_sub_bidang = sub_bidang.id_sub_bidang
                          INNER JOIN kat_perbaikan 	ON belanja_modal.id_kat_perbaikan = kat_perbaikan.id_kat_perbaikan
                          WHERE belanja_modal.id_bmodal = $id";
                  $sql 	 = mysqli_query($conn, $query) or die (mysqli_error($conn));
	              $data  = mysqli_fetch_array($sql);
	            ?>
				<div class="card">
					<div class="card-body">
					    <form action="proses.php" method="POST">
							<div class="row form-inline">
								<input type="hidden" name="id_bmodal" value="<?php echo $data['id_bmodal']; ?>">
								<div class="col-md-3" align="right"> <b>Tanggal</b></div>
								<input type="date" class="form-control" name="tgl" value="<?php echo $data['tgl']; ?>" readonly>
							</div>
							<br>
					    	<div class="row form-inline">
							  	<div class="col-md-3" align="right"> <b>Nama</b></div>
							  	<select name="pegawai" class="form-control" style="width:54%" readonly>
								    <option value="<?php echo $data['id_pegawai']; ?>"><?php echo $data['nm_pegawai']; ?></option>
								</select>
							  	<!-- <input type="text" class="form-control" placeholder="Enter Name" style="width:30%"> -->
							</div>
							<br>
							<div class="row form-inline">
							  	<div class="col-md-3" align="right"> <b>Permintaan</b></div>
							  	<input type="text" class="form-control" value="<?php echo $data['bmodal']; ?>" name="bmodal" style="width:54%" readonly>
						  	</div>
						  	<br>
							<div class="row form-inline">	
								<div class="col-md-3" align="right"> <b>Lokasi</b></div>	
								<select name="sub_bidang" class="form-control" style="width:54%" readonly>
									<option value="<?php echo $data['id_sub_bidang']; ?>"><?php echo $data['sub_bidang']; ?></option>
								</select>		
							</div>
							<br>
						  	<div class="row form-inline">
							  	<div class="col-md-3" align="right"> <b>Akun </b></div>
								<select name="kat_perbaikan" class="form-control" style="width:54%" readonly>
								    <option value="<?php echo $data['id_kat_perbaikan']; ?>"><?php echo $data['kat_perbaikan']; ?></option>
								</select>
						  	</div>
							<br>
							<div class="row form-inline">
								<div class="col-md-3" align="right" float="top"> <b>Keterangan</div>
								<textarea type="textarea" class="form-control" name="ket" style="width:200%" required><?php echo $data['ket']; ?></textarea>
							</div>
							<br>
							<div class="row form-inline">
							<div class="col-md-3" align="right"> Tindak Lanjut</div>
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
							<br>
							<p style="margin-left: 160px">
								<a href="javascript:history.go(-1)" class="w3-button w3-small w3-red" role="button"><i class="fas fa-angle-left"></i> Kembali</a> 
								<button type="submit" name="edit" class="w3-button w3-small w3-blue"><i class="fas fa-save"></i> Simpan</button>
							</p>
							</div>
						</form>
					</div>
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
</script>
</body>
</html>

