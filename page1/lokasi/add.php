<?php 
    include '../template/header.php';
    include '../template/navbar-admin.php';
?>

<body>

<div class="container" style="margin-top:80px">
	<div class="container">
		<div class="container mt-3">
			<h4>Manajemen Lokasi &raquo; Tambah Lokasi/Ruangan</h4>
            <div class="card">
             <div class="card-body"> 
		        <form action="control.php" method="POST">
		        <input type="hidden" name="sub_bidang" value="<?php echo $id_sub_bidang; ?>">
                 <div class="row form-inline">
                  <div class="col-md-2" align="right"><b>Lokasi</b></div>
                  <input type="text" class="form-control" placeholder="Enter lokasi" name="lokasi" style="width:27%" required>
                 </div>
				 <br>
				 <p style="margin-left: 160px">	
                  <a href="javascript:history.go(-1)" class="w3-button w3-small w3-red" role="button"><i class="fas fa-angle-left"></i> Kembali</a>
				  <button type="submit" name="add_lokasi" class="w3-button w3-small w3-blue"><i class="fas fa-save"></i> Simpan</button>
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