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
			<h3 class="text-center text-dark">Manajemen Data User</h3>
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
				        <input type="hidden" name="id_user" value="<?php echo $id; ?>">
						    <div class="form-group">
						      <label>Nama Pegawai</label>
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
						  	<label>Username</label>
						  	<div class="form-group">
						      	<input type="text" class="form-control" value="<?php echo $username; ?>" placeholder="Enter username" name="username" required>
						    </div>
						  	
						    <div class="form-group">
						    	<label>Password</label>
						      	<input type="text" class="form-control" value="<?php echo $password; ?>" placeholder="Enter password" name="password" required>
						    </div>
						    
						    <div class="form-group">
						    	<label>Role</label>	
							    <select name="level" class="form-control" required>					   
							    	<option value="">Pilih</option>
							    	<?php 
			                         if ($level=="admin") 
			                            echo "<option value='admin' selected>Administrator</option>";
			                         else echo "<option value='admin'>Administrator</option>";
			                         if ($level=="user") 
			                            echo "<option value='user' selected>User</option>";
			                         else echo "<option value='user'>User</option>";
			                        ?>
							    </select>	
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
			<h4 class="text-center text-info">Data User</h4>
			<div class="card">
				<div class="card-body">	
			        <div class="row justify-content-center">
					  <div class="container-fluid">
					  <table id="datatabel" class="table table-hover table-striped">
					  	<thead>
					      <tr>
					        <th>#</th>
					        <th>Nama </th>
					        <th>Username </th>
					        <!-- <th scope="col">Password </th> -->
					        <th>Level </th>
					        <th>Action</th>
					      </tr>
					    </thead>
					    <tbody>
						<?php 
						$no=1;
						$query = "SELECT * FROM user ORDER BY id_user DESC";	  
						$sql = mysqli_query($conn, $query) or die (mysqli_error($conn));
						while ($row = mysqli_fetch_array($sql)) {  
						?>
					      <tr>
					        <td><?php echo $no++; ?></td>
					        <td><?php echo $row['nm_lengkap']; ?></td>
					        <td><?php echo $row['username']; ?></td>
					        <!-- <td align="center"><?php echo $row['password']; ?></td> -->
					        <td><?php echo $row['level']; ?></td>
					        <td>
					        	<a href="user.php?edit=<?php echo $row['id_user']; ?>" name="edit" class="edit"><i class="fas fa-edit" title="Edit"></i></a>
			                    <a href="proses.php?id=<?php echo $row['id_user']; ?>" onclick="return confirm('Yakin data ini akan dihapus?')" name="delete_user" class="delete"><i class="fas fa-remove" title="Hapus"></i></a>
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
