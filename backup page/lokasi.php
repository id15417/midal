<?php 
    include 'template/header.php';
    include 'template/navbar.php';
?>

<body>

<div class="container">
	<div class="container">
  		<div class="container mt-3">
		 	<h4>Manajemen Lokasi &raquo; Data Lokasi</h4>
			<hr />
			
		<div class="btn-group" role="group" aria-label="Basic example">
			<a class="btn btn-info btn-sm" href="bidang.php" role="button"><i class="fas fa-bars" title="Data Bidang"> Bidang</i></a>
			<a class="btn btn-primary btn-sm" href="tambah_lokasi.php" role="button"><i class="fas fa-plus" title="Tambah Data Lokasi"> Tambah</i></a>
		</div>	  	
  		<div class="row justify-content-center">
		  <table id="datatabel" class="table table-striped table-bordered">
		    <thead>
		      <tr align="center">
		        <th>No</th>
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
		        <td align="center"><?php echo $no++; ?></td>
		 		<td><?php echo $row['sub_bidang']; ?></td>
		        <td align="center">
		        	<a href="control.php?edit_sub=<?php echo $row['id_sub_bidang']; ?>" class="edit"><i class="fas fa-edit" title="Edit Data"></i></a>
                    <a href="control.php?delete_sub=<?php echo $row['id_sub_bidang']; ?>" onclick="return confirm('Yakin data ini akan dihapus?')" name="delete_sub_bidang" class="delete"><i class="fas fa-remove" title="Hapus Data"></i></a>
		        </td>
		      </tr>
		      <?php } ?>
		    </tbody>
		  </table>
		</div>
		<script src="assets/js/dataTables.bootstrap4.min.js"></script> 
        <script type="text/javascript" src="DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="DataTables-1.10.20/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatabel').DataTable();
            } );
    	</script>
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
</div>

</body>
</html>