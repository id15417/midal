<?php 
    include '../template/header.php';
	include '../template/navbar-admin.php';
	include '../../inc/koneksi.php';
?>

<body>

<div class="container" style="margin-top:80px">
	<div class="container">
		<div class="container mt-3">
			<h4>Manajemen User &raquo; Tambah User</h4>
			  	<?php 
			    	$mysqli = new mysqli('localhost', 'root', '', 'dbpermintaan') or die(mysql_error($mysqli));
			    	$result = $mysqli->query("SELECT * FROM pegawai ORDER BY id_pegawai ASC") or die($mysqli->error);
		    	?>
		    	<div class="card">
					<div class="card-body">
				        <form action="control.php" method="POST">
				        <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
						    <div class="row form-inline">
						      <div class="col-md-2" align="right"><b>Nama</b></div>
						      <select name="nm_lengkap" class="form-control" required>					   
							    	<option value="">Pilih</option>
									<?php 
									$query 	= "SELECT * FROM pegawai";
									$sql 	= mysqli_query($conn, $query) or die (mysqli_error($conn));
									while ($row = mysqli_fetch_array($sql)){ 
									?>
							    		<option value="<?php echo $row['nm_pegawai']; ?>"><?php echo $row['nm_pegawai']; ?> </option>
							    	<?php } ?>
							    </select>
						    </div>
						  	<br>
						  	<div class="row form-inline">
						      	<div class="col-md-2" align="right"><b>Username</b></div>
						      	<input type="text" class="form-control" placeholder="Enter username" name="username" style="width:29%" required>
						    </div>
						  	<br>
						    <div class="row form-inline">
						    	<div class="col-md-2" align="right"><b>Password</b></div>
						      	<input type="password" class="form-control" placeholder="Enter password" name="password" style="width:29%" required>
						    </div>
						    <br>
						    <div class="row form-inline">
						    	<div class="col-md-2" align="right"><b>Role</b></div>	
							    <select name="level" class="form-control" required>					   
							    	<option value="">Pilih</option>
							    	<option value="admin">Administrator </option>
							    	<option value="user">User </option>
							    </select>	
						  	</div>
						  <br>
						  <p style="margin-left: 171px">
						  	<a href="javascript:history.go(-1)" class="w3-button w3-small w3-red" role="button"><i class="fas fa-angle-left"></i> Kembali</a>
						  	<button type="submit" name="add" class="w3-button w3-small w3-blue">Simpan</button>
						  </p> 
						</form>
					</div>
				</div>
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

</body>
</html>