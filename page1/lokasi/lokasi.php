<?php 
    include '../template/header.php';
    include '../template/navbar-admin.php';
    include 'proses.php';
?>

<body>

<div class="container">
	<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<h3 class="text-center text-dark">Manajemen Lokasi/Ruangan</h3>
			<hr> 
		</div>
	</div>
	<?php if (isset($_SESSION['message'])): ?>
		<div class="alert alert-<?=$_SESSION['msg_type']?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php 
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>
		  <div class="row">
		  	<div class="col-md-4">
			  <h4 class="text-center text-info">Tambah Data</h4>
			    <div class="card">
				<div class="card-body">
				<form action="proses.php" method="POST">
					<div class="form-group">
						<label>Nama Lokasi / Ruangan</label>
						<input type="hidden" name="sub_bidang" value="<?php echo $id; ?>">
						<input type="text" name="lokasi" value="<?php echo $sub_bidang; ?>" class="form-control" placeholder="Enter Lokasi/Ruangan" required>
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
		  		<h4 class="text-center text-info">Data Lokasi / Ruangan</h4>
				<div class="card">
					<div class="card-header">
						<div class="float-sm-right">
						    <div class="btn-group" role="group" aria-label="Basic example">
							    <a class="w3-button w3-small w3-indigo" href="../bidang/bidang.php" role="button"><i class="fas fa-bars" title="Data Lokasi"></i> Bidang</a>
						    </div>
						</div>
					</div>
					<div class="card-body">
				  		<div class="row justify-content-center">
						  <div class="container-fluid">
						  <table id="datatabel" class="table table-striped table-hover">
						    <thead>
						      <tr>
						        <th>#</th>
						        <th>Lokasi/Ruangan</th>
						        <th>Action</th>
						      </tr>
						    </thead>
						    <?php 
								$mysqli = new mysqli('localhost', 'root', '', 'dbpermintaan') or die(mysql_error($mysqli));
								$result = $mysqli->query("SELECT * FROM sub_bidang ORDER BY id_sub_bidang DESC") or die($mysqli->error);
								$no = 1;
							?>
						    <tbody>
						  	<?php 
						  	while ($row = $result->fetch_assoc()) { ?>
						      <tr>
						        <td><?php echo $no++; ?></td>
						 		<td><?php echo $row['sub_bidang']; ?></td>
						        <td>
						        	<a href="lokasi.php?edit=<?php echo $row['id_sub_bidang']; ?>" class="edit"><i class="fas fa-edit" name="edit" title="Edit Data"></i></a>
				                    <a href="proses.php?delete=<?php echo $row['id_sub_bidang']; ?>" onclick="return confirm('Yakin data ini akan dihapus?')" name="delete" class="delete"><i class="fas fa-remove" title="Hapus Data"></i></a>
						        </td>
						      </tr>
						      <?php } ?>
						    </tbody>
						  </table>
						 </div>
						</div>
					</div>
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
            <!-- <div class="col-md-6 text-md-right">
                <a href="#" class="text-dark">Terms of Use</a> 
                <span class="text-muted mx-2">|</span> 
                <a href="#" class="text-dark">Privacy Policy</a>
            </div> -->
        </div>
    </footer>
   </div>
<script src="../../assets/js/dataTables.bootstrap4.min.js"></script> 
<script type="text/javascript" src="../../DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../DataTables-1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatabel').DataTable();
    } );
</script>

</body>
</html>