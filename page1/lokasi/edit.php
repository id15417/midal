<?php 
    include 'template/header.php';
    include 'template/navbar-admin.php';
?>

<body>

<div class="container" style="margin-top:80px">
	<div class="container">
		<div class="container mt-3">
			<h4>Manajemen Lokasi &raquo; Edit Lokasi/Ruangan</h4>
        <?php 
          include 'control.php';
          $id    = $_GET['edit_lokasi'];
          $query = "SELECT * FROM sub_bidang WHERE id_sub_bidang='$id'";
          $sql   = mysqli_query($conn, $query);
          $data  = mysqli_fetch_array($sql);
        ?>
        <div class="card">
        <div class="card-body">
		    <form action="" method="POST">
		    <input type="hidden" name="id_sub_bidang" value="<?php echo $data['id_sub_bidang']; ?>">
          <div class="row form-inline">
            <div class="col-md-2" align="right"><b>Lokasi</b></div>
            <input type="text" class="form-control" placeholder="Edit lokasi" name="sub_bidang" value="<?php echo $data['sub_bidang']; ?>" style="width:27%" required>
          </div>
				<br>
				<p style="margin-left: 171px">	
          <a href="javascript:history.go(-1)" class="w3-button w3-small w3-red" role="button"><i class="fas fa-angle-left"></i> Kembali</a>
					<button type="submit" name="edit_lokasi" class="w3-button w3-small w3-blue">Simpan</button>
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