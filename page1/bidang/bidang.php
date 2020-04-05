<?php 
    include '../template/header.php';
    include '../template/navbar-admin.php';
    include '../../inc/koneksi.php';
    include 'proses.php';
?>

<body>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<h3 class="text-center text-dark">Manajemen Data Bidang</h3>
			<hr> 
		</div>
	</div>	
	<?php if (isset($_SESSION['message'])):?>
		<div class="alert alert-<?=$_SESSION['msg_type']?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php 
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif; ?>
		<div class="row">
			<div class="col-md-4">
			  <h4 class="text-center text-info">Tambah Data</h4>
			    <div class="card">
				<div class="card-body">
				<form action="proses.php" method="POST">
					<div class="form-group">
					<label>Nama Bidang / Bagian</label>
						<input type="hidden" name="id_bidang" value="<?php echo $id; ?>">
						<input type="text" class="form-control" value="<?php echo $nm_bidang; ?>" placeholder="Enter bidang" name="nm_bidang" required>
					</div>
					<div class="form-group">
					<?php  
					if ($update == true):
					?>
						<button type="submit" name="update" class="w3-button w3-cyan btn-block"><i class="fas fa-save"></i> Ubah</button>
					<?php else: ?>
						<button type="submit" name="add" class="w3-button w3-blue btn-block"><i class="fas fa-save"></i> Simpan</button>
					<?php endif; ?>
					</div>
				</form>
				</div>
			  </div>
			</div>
			
			<div class="col-md-8">
				<h4 class="text-center text-info">Data Bidang</h4>
				<div class="card">
					<div class="card-header">
					    <div class="float-sm-right">
					      	<div class="btn-group" role="group" aria-label="Basic example">
						        <a class="w3-button w3-small w3-indigo" href="../lokasi/lokasi.php" role="button"><i class="fas fa-bars" title="Data Lokasi"></i> Lokasi</a>
					      	</div>
					     </div>
				    </div> 
					<div class="card-body">	
					    <div class="row justify-content-center">
					        <div class="container-fluid">
							  <table id="datatabel" class="table table-hover table-striped"> 
							    <thead>
							      <tr>
							        <th>#</th>
							        <th>Nama Bidang / Bagian</th>
							        <th>Action</th>
							      </tr>
							    </thead>
							    <tbody>
							    <?php
							    $result = mysqli_query($conn, "SELECT * FROM bidang ORDER BY id_bidang DESC");
								$no=1;
							    if (mysqli_num_rows($result) > 0) {
							    	while ($row = mysqli_fetch_assoc($result)) { ?>
							    
							      <tr>
							        <td><?php echo $no++; ?></td>
							        <td><?php echo $row['nm_bidang']; ?></td>
							        <td>
							        	<a href="bidang.php?edit=<?php echo $row['id_bidang']; ?>" name="edit" class="edit"><i class="fas fa-edit" title="Edit Data"></i></a>
					                    <a href="proses.php?delete=<?php echo $row['id_bidang']; ?>" onclick="return confirm('Yakin data ini akan dihapus?')" name="delete" class="delete"><i class="fas fa-remove" title="Hapus Data"></i></a>
							        </td>
							      </tr>
							    <?php 
							    	}
							    } /*else {
							    	echo "<tr>Tidak ada data dalam tabel!</tr>";
							    }*/
							    ?>
							    </tbody>
							  </table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    <script src="../../assets/js/dataTables.bootstrap4.min.js"></script> 
    <script type="text/javascript" src="../../DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../DataTables-1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatabel').DataTable();
        } );
    </script>
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