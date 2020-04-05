<?php 
    include 'template/header.php';
    include 'template/navbar.php';
?>

<body>

<div class="container">
	<div class="container">
		<?php 
		    $mysqli = new mysqli('localhost', 'root', '', 'dbpermintaan') or die(mysql_error($mysqli));
		    $result = $mysqli->query("SELECT * FROM bidang ORDER BY id_bidang DESC") or die($mysqli->error);
		    $no=1;
		?>
        <div class="container mt-3">
            <h4>Manajemen Bidang &raquo; Data Bidang</h4>
			<hr />
        <p>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn btn btn-info btn-sm" href="lokasi.php" role="button"><i class="fas fa-bars" title="Data Lokasi"> Lokasi</i></a>
                <a class="btn btn-primary btn-sm" href="tambah_bidang.php" role="button"><i class="fas fa-plus" title="Tambah Data Bidang"> Tambah</i></a>
            </div>
          </p>
        </div>
        <div class="row justify-content-center">
		  <table id="datatabel" class="table table-striped table-bordered">
		    <thead>
		      <tr>
		        <th>No</th>
		        <th>Nama Bidang</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php while ($row = $result->fetch_assoc()): ?>
		      <tr>
		        <td><?php echo $no++; ?></td>
		        <td><?php echo $row['nm_bidang']; ?></td>
		        <td>
		        	<a href="control.php?edit_bidang=<?php echo $row['id_bidang']; ?>" class="edit"><i class="fas fa-edit" title="Edit Data"></i></a>
                    <a href="control.php?delete_bidang=<?php echo $row['id_bidang']; ?>" onclick="return confirm('Yakin data ini akan dihapus?')" name="delete_bidang" class="delete"><i class="fas fa-remove" title="Hapus Data"></i></a>
		        </td>
		      </tr>
		    <?php endwhile; ?>
		    </tbody>
		  </table>
		</div>
		<!-- <script>
			$(document).ready(function(){
			  $("#myInput").on("keyup", function() {
			    var value = $(this).val().toLowerCase();
			    $("#myTable tr").filter(function() {
			      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			    });
			  });
			});
		</script> -->
    
    <script src="assets/js/dataTables.bootstrap4.min.js"></script> 
    <script type="text/javascript" src="DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="DataTables-1.10.20/js/dataTables.bootstrap4.min.js"></script>
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
</div>

</body>
</html>