<?php 
    include '../template/header.php';
	include '../template/navbar-admin.php';
	include '../../inc/koneksi.php';
?>

<body>
<div class="container" style="margin-top:80px">
	<div class="container col-lg-10">
		<h4>Manajemen Akun &raquo; Data Akun</h4>
		<div class="row">
			<div class="card">
				<div class="card-header">
					<div class="float-sm-right">
						<a href="add.php" class="w3-button w3-small w3-green" role="button"><i class="fas fa-plus"> Tambah</i></a>
					</div>
				</div>
				<div class="card-body">
			        <div class="row justify-content-center">
					  <table id="datatabel" class="table table-bordered table-striped">
					  	<thead>
					      <tr align="center">
					        <th>#</th>
					        <th>AKUN</th>
					        <th>MAK</th>
					        <th>Action</th>
					      </tr>
					    </thead>
					    <tbody>
						<?php 
						$no=1;
						$query = "SELECT * FROM kat_perbaikan  
								  ORDER BY id_kat_perbaikan DESC
								  ";
						$sql = mysqli_query($conn, $query) or die (mysqli_error($conn));
						while ($row = mysqli_fetch_array($sql)) { 
						?>
					      <tr>
					        <td align="center"><?php echo $no++; ?></td>
					        <td><?php echo $row['kat_perbaikan']; ?></td>
					        <td><?php echo $row['mak']; ?></td>
					        <td align="center">
					        	<a href="edit.php?edit=<?php echo $row['id_kat_perbaikan']; ?>" class="edit"><i class="fas fa-edit" title="Edit"></i></a>
			                    <a href="proses.php?id=<?php echo $row['id_kat_perbaikan']; ?>" onclick="return confirm('Yakin data ini akan dihapus?')" name="id" class="delete"><i class="fas fa-remove" title="Hapus"></i></a>
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
<hr>
<footer>
    <div class="row">
        <div class="col-md-6">
            <p>Copyright &copy; 2019-<?php echo date("Y");?> <b>am.doating</b> All rights reserved.</p>
        </div>
        <div class="col-md-6 text-md-right">
            <a href="#" class="text-dark">Terms of Use</a> 
            <span class="text-muted mx-2">|</span> 
            <a href="#" class="text-dark">Privacy Policy</a>
        </div>
   </div>
</footer>
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
</body>
</html>
