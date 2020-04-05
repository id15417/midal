<?php 
    include 'template/header.php';
    include 'template/navbar.php';
?>

<body>

<div class="container">
	<div class="container"> 
	<?php 

		$mysqli = new mysqli('localhost', 'root', '', 'dbpermintaan') or die(mysql_error($mysqli));
		$result = $mysqli->query("SELECT * FROM pegawai ORDER BY id_pegawai DESC") or die($mysqli->error);
		$no=1;
	?>
		<div class="container mt-3">
			<h4>Manajemen Pegawai &raquo; Data Pegawai</h4>
			<hr />
			<p><a class="btn btn-primary btn-sm" href="tambah_pegawai.php" role="button"><i class="fas fa-plus" title="Hapus"> Tambah</i></a></p>
		</div>
		<div class="row justify-content-center">
		  <table id="datatabel" class="table table-striped table-bordered">
		    <thead>
		      <tr align="center">
		        <th>No</th>
		        <th>Nama</th>
		        <th>Jabatan</th>
		        <th>NIP</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php while ($row = $result->fetch_assoc()): ?>
		      <tr>
		        <td align="center"><?php echo $no++; ?></td>
		        <td><?php echo $row['nm_pegawai']; ?></td>
		        <td><?php echo $row['jabatan']; ?></td>
		        <td><?php echo $row['nip']; ?></td>
		        <td align="center">
		        	<a href="control.php?edit_peg=<?php echo $row['id_pegawai']; ?>" class="edit"><i class="fas fa-edit" title="Edit"></i></a>
                    <a href="control.php?delete_peg=<?php echo $row['id_pegawai']; ?>" onclick="return confirm('Yakin data ini akan dihapus?')" class="delete"><i class="fas fa-remove" title="Hapus"></i></a>
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
</body>
</html>