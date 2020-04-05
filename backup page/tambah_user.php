<?php 
    include 'template/header.php';
    include 'template/navbar.php';
?>

<body>

<div class="container">
	<div class="container">
		<div class="container mt-3">
			<h4>Manajemen User &raquo; Tambah User</h4>
			<hr />
			  	<?php 
			    	$mysqli = new mysqli('localhost', 'root', '', 'dbpermintaan') or die(mysql_error($mysqli));
			    	$result = $mysqli->query("SELECT * FROM pegawai ORDER BY id_pegawai ASC") or die($mysqli->error);
		    	?>
		        <form action="control.php" method="POST">
		        <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
				  <div class="row">
				    <div class="col">
				      <!-- <input type="text" class="form-control" placeholder="Nama lengkap" name="nm_lengkap" required> -->
				      <select name="nm_lengkap" class="form-control" required>					   
					    	<option value="">Nama</option>
					    	<?php while ($row = $result->fetch_assoc()): ?>
					    		<option value="<?php echo $row['nm_pegawai']; ?>"><?php echo $row['nm_pegawai']; ?> </option>
					    	<?php endwhile; ?>
					    </select>
				    </div>
				    <div class="col">
				      <input type="text" class="form-control" placeholder="Username" name="username" required>
				    </div>
				  </div>
				  <br>
				  <div class="row">
				    <div class="col">
				      <input type="password" class="form-control" placeholder="Password" name="password" required>
				    </div>
				    <div class="col">	
					    <select name="level" class="form-control" required>					   
					    		<option value="">Level</option>
					    		<option value="admin">Admin </option>
					    		<option value="user">User </option>
					    </select>	
				  	</div>
				  </div>
				  <br>
				  <p>
				  	<a href="javascript:history.go(-1)" class="btn btn-danger btn-sm" role="button"><i class="fas fa-angle-left"></i> Kembali</a>
				  	<button type="submit" name="add_user" class="btn btn-primary btn-sm">Simpan</button>
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

</body>
</html>