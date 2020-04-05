<?php 
    include 'template/header.php';
    include 'template/navbar.php';
?>

<body>

<div class="container">
	<div class="container">
		<div class="container mt-3">
			<h4>Manajemen Pegawai &raquo; Tambah Pegawai</h4>
			<hr />
			  	<?php 
			    	$mysqli = new mysqli('localhost', 'root', '', 'dbpermintaan') or die(mysql_error($mysqli));
			    	$result = $mysqli->query("SELECT * FROM pegawai ORDER BY id_pegawai DESC") or die($mysqli->error);	 
		    	?>
		        <form action="control.php" method="POST">
		        <input type="hidden" name="id_pegawai" value="<?php echo $id_pegawai; ?>">
				  <div class="row">
				    <div class="col">
				      <input type="text" class="form-control" placeholder="Nama Pegawai" name="nm_pegawai" required>
				    </div>
				    <div class="col">
				      <input type="text" class="form-control" placeholder="Jabatan" name="jabatan" required>
				    </div>
				  </div>
				  <br>
				  <div class="row">
				    <div class="col">
				      <input type="text" class="form-control" placeholder="NIP" name="nip" required>
				    </div>
				  </div>
				  <br>
				  <p>
				  	<a href="javascript:history.go(-1)" class="btn btn-danger btn-sm" role="button"><i class="fas fa-angle-left"></i> Kembali</a>
				  	<button type="submit" name="add_pegawai" class="btn btn-primary btn-sm">Simpan</button>  
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