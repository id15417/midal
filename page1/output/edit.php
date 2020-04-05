<?php 
    include '../template/header.php';
    include '../template/navbar-admin.php';
    include '../../inc/koneksi.php';
?>

<body>

<div class="container" style="margin-top:80px">
	<div class="container">
		<div class="container mt-3">
			<h4> Manajemen Akun &raquo; Ubah Akun</h4>
			<hr />
			  	<?php 
			  		include 'proses.php';
			  		$id = $_GET['edit'];
			  		$query = "SELECT * FROM kat_perbaikan WHERE id_kat_perbaikan='$id'";
			  		$sql = mysqli_query($conn, $query);
			  		$data = mysqli_fetch_array($sql);
			  	 ?>
		        <form action="" method="POST">
				<div class="row">
					<div class="col">
						<input type="hidden" name="id_kat_perbaikan" value="<?php echo $data['id_kat_perbaikan']; ?>">
						<input type="text" class="form-control" placeholder="Kategori" value="<?php echo $data['kat_perbaikan']; ?>" name="kat_perbaikan" required>
					</div>
					<div class="col">
						<input type="text" class="form-control" placeholder="MAK" value="<?php echo $data['mak']; ?>" name="mak" required>
					</div>
				</div>
				<br>
				<p>	
					<a href="javascript:history.go(-1)" class="btn btn-secondary btn-sm" role="button"><i class="fas fa-angle-left"></i> Kembali</a>
					<button type="submit" name="edit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
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