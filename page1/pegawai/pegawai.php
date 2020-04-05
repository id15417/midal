<?php 
    include '../template/header.php';
	include '../template/navbar-admin.php';
	include '../../inc/koneksi.php';
?>

<body>

<div class="container" style="margin-top:80px"> 
	<h4>Manajemen Pegawai &raquo; Data Pegawai</h4>	
		<div class="row">
		<div class="card">
			<div class="card-header">
				<div class="float-sm-right">
					<a class="w3-button w3-small w3-green" href="add.php" role="button"><i class="fas fa-plus" title="Tambah"> Tambah</i></a>
				</div>
			</div>
		<div class="card-body">
			<div class="row justify-content-center">
			  <table id="datatabel" class="table table-hover table-striped">
			    <thead>
			      <tr align="center">
			        <th scope="col">#</th>
			        <th scope="col">Nama</th>
					<th scope="col">Bidang</th>
			        <th scope="col">Jabatan</th>
			        <th scope="col">NIP</th>
			        <th scope="col">Action</th>
			      </tr>
			    </thead>
			    <tbody>
				<?php 
				$no=1;
				$query = "SELECT * FROM pegawai
							INNER JOIN bidang ON pegawai.id_bidang = bidang.id_bidang
							WHERE pegawai.id_pegawai = pegawai.id_pegawai
							ORDER BY id_pegawai DESC";
				$sql = mysqli_query($conn, $query) or die (mysqli_error($conn));
				while ($row = mysqli_fetch_array($sql)) { 
				?>
			      <tr>
			        <td align="center"><?php echo $no++; ?></td>
			        <td><?php echo $row['nm_pegawai']; ?></td>
					<td><?php echo $row['nm_bidang']; ?></td>
			        <td><?php echo $row['jabatan']; ?></td>
			        <td><?php echo $row['nip']; ?></td>
			        <td align="center">
			        	<a href="edit_pegawai.php?edit_pegawai=<?php echo $row['id_pegawai']; ?>" class="edit"><i class="fas fa-edit" title="Edit"></i></a>
	                    <a href="proses.php?delete_peg=<?php echo $row['id_pegawai']; ?>" onclick="return confirm('Yakin data ini akan dihapus?')" class="delete"><i class="fas fa-remove" title="Hapus"></i></a>
			        </td>
			      </tr>
			    <?php } ?>
			    </tbody>
			  </table>
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
<script src="../../assets/js/dataTables.bootstrap4.min.js"></script> 
<script type="text/javascript" src="../../DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../DataTables-1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatabel').DataTable();
    });
</script>
</body>
</html>