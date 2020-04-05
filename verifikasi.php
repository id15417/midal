<?php 
    include '../template/header.php';
	include '../template/navbar-admin.php';
	include '../../inc/koneksi.php';
	include '../../inc/config.php';
?>

<body>	

<div class="container" style="margin-top:45px">
	  <div class="row justify-content-center">
		<div class="col-md-8">
			<h3 class="text-center text-dark">Tindak Lanjut Permintaan</h3>
			<hr> 
			<?php if (isset($_SESSION['message'])):?>
			<div class="alert alert-<?=$_SESSION['msg_type']?>">
			  <button type="button" class="close" data-dismiss="alert">&times;</button>
			  <?php 
			    echo $_SESSION['message'];
			    unset($_SESSION['message']);
			  ?>
			</div>
		<?php endif; ?>
	  	</div>
	 </div>
		
		<div class="row">
			<div class="card">	
				<!-- <div class="card-header">
					<div class="float-sm-right">	
						<a href="add.php" class="w3-button w3-small w3-green" role="button"><i class="fas fa-plus"></i> Tambah</a>
					</div>
				</div> -->		    
				<div class="card-body">
				  <table id="datatabel" class="table table-hover table-striped">
				    <thead>
				      <tr align="center">
				        <th scope="col">#</th>
			            <th scope="col">PERIHAL PERMINTAAN</th>
			            <th scope="col">OUTPUT</th>
			            <th scope="col">PENGELOLA</th>
			            <th scope="col">TANGGAL VERIFIKASI</th>
				        <th scope="col">TANGGAL SELESAI</th>
				        <th scope="col">URAIAN</th>
			            <th scope="col"><i class="fas fa-gear"></i></th>
				      </tr>
				    </thead>
				    <tbody>
					<?php 
					$no=1;
					$query = "SELECT * FROM verifikasi
							  INNER JOIN form_perbaikan 
							  ON verifikasi.id_permintaan = form_perbaikan.id_permintaan
							  INNER JOIN kat_perbaikan 
							  ON verifikasi.id_kat_perbaikan = kat_perbaikan.id_kat_perbaikan

							  WHERE verifikasi.id_verifikasi = verifikasi.id_verifikasi";			

					$sql = mysqli_query($conn, $query) or die (mysqli_error($conn));
					while ($row = mysqli_fetch_array($sql)) { 
					// Ubah tanggal menjadi yyyy-mm-dd
					$tgl_verify = date('Y-m-d', strtotime($row['tgl_verifikasi']));
					$tgl_done	= date('Y-m-d', strtotime($row['tgl_selesai']));
					?>
				      <tr>
				        <td align="center"><?php echo $no++; ?></td>
			            <td><?php echo $row['permintaan']; ?></a></td>
			            <td><?php echo $row['kat_perbaikan']; ?></td>           
			            <td><?php echo $row['nm_pengelola']; ?></td>
			            <td align="center"><?php echo $tgl_verify; ?></td>
			            <td align="center"><?php echo $tgl_done; ?></td>
			            <td align="center"><?php echo $row['status_keterangan']; ?></td>
				        <td align="center">
				       		<a href="detail.php?detail=<?php echo $row['id_permintaan']; ?>" class="detail"><i class="fas fa-list" title="Detail"></i></a>
				        	<a href="edit.php?edit=<?php echo $row['id_permintaan']; ?>" class="edit"><i class="fas fa-edit" title="Edit"></i></a>

		                    <a href="proses.php?id=<?php echo $row['id_permintaan']; ?>" onclick="return confirm('Yakin data ini akan dihapus?')" name="delete_per" class="delete"><i class="fas fa-trash" title="Hapus"></i></a>
				        </td>
				      </tr>
					 <?php } ?>
				    </tbody>
				  </table>
				</div>
			</div>
		</div>
    	<hr>
	    <footer>
	        <div class="row">
	            <div class="col-md-6">
                	<p>Copyright &copy; 2019-<?php echo date("Y");?> <b>am.doating</b> All rights reserved.</p>
            	</div>
	           <!--  <div class="col-md-6 text-md-right">
	                <a href="#" class="text-dark">Terms of Use</a> 
	                <span class="text-muted mx-2">|</span> 
	                <a href="#" class="text-dark">Privacy Policy</a>
	            </div> -->
	        </div> 
	    </footer>
</div>
<script type="text/javascript" src="../../DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../DataTables-1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#datatabel').DataTable();
	} );
</script>
</body>
</html>