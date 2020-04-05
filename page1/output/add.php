<?php 
    include '../template/header.php';
	include '../template/navbar-admin.php';
	include '../../inc//koneksi.php';
?>

<body>

<div class="container" style="margin-top:80px">
	<div class="container col-lg-8">
		<div class="container">
			<h4>Output Anggaran &raquo; Tambah Output</h4>
		    	<div class="card">
				<div class="card-body">
		        <form action="proses.php" method="POST">
					<div class="row form-inline">	
						<div class="col-lg-3" align="right"><b>Nama Anggaran</b></div>
						<input type="text" class="form-control" placeholder="Enter Akun" name="kat_perbaikan" style="width:30%" required>
					</div>
					<br>
					<div class="row form-inline">
						<div class="col-lg-3" align="right"><b>MAK</b></div>
						<input type="text" class="form-control" placeholder="Enter MAK" name="mak" style="width:30%" required>
						
					</div>
					<br>
					<p style="margin-left: 157px">	
						<a href="javascript:history.go(-1)" class="w3-button w3-small w3-red" role="button"><i class="fas fa-angle-left"></i> Kembali</a>
						<button type="submit" name="add" class="w3-button w3-small w3-blue"><i class="fas fa-save"></i> Simpan</button>
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