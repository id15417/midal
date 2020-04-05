<?php 
    include 'template/header.php';
    include 'template/navbar.php';
?>

<body>
<div class="container">
	<div class="container-fluid">
 		  	<?php 

		    	$mysqli = new mysqli('localhost', 'root', '', 'dbpermintaan') or die(mysql_error($mysqli));
		    	$result = $mysqli->query("SELECT * FROM kat_perbaikan ORDER BY id_kat_perbaikan DESC") or die($mysqli->error);
		    	$no=1;
		    ?>
        <div class="container mt-3">
        	<h4> Manajemen Jenis Perbaikan &raquo; Data Jenis Perbaikan</h4>
			<hr />
		<p><a href="tambah_jenis.php" class="btn btn-primary btn-sm" role="button"><i class="fas fa-plus"> Tambah</i></a></p>
        <div class="row justify-content-center">
		  <table id="datatabel" class="table table-striped table-bordered">
		  	<thead>
		      <tr align="center">
		        <th>No</th>
		        <th>Jenis Perbaikan</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php while ($row = $result->fetch_assoc()): ?>
		      <tr>
		        <td align="center"><?php echo $no++; ?></td>
		        <td><?php echo $row['kat_perbaikan']; ?></td>
		        <td align="center">
		        	<a href="control.php?edit_kat=<?php echo $row['id_kat_perbaikan']; ?>" class="edit"><i class="fas fa-edit" title="Edit"></i></a>
                    <a href="control.php?delete_kat=<?php echo $row['id_kat_perbaikan']; ?>" onclick="return confirm('Yakin data ini akan dihapus?')" name="delete_kat" class="delete"><i class="fas fa-remove" title="Hapus"></i></a>
		        </td>
		      </tr>
		    <?php endwhile; ?>
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
            <div class="col-md-6 text-md-right">
                <a href="#" class="text-dark">Terms of Use</a> 
                <span class="text-muted mx-2">|</span> 
                <a href="#" class="text-dark">Privacy Policy</a>
            </div>
        </div>
    </footer>
</div>
</div>
</body>
</html>
