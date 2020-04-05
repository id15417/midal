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
			<h3 class="text-center text-dark">Data Permintaan</h3>
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
				<div class="card-header">
				<div class="float-sm-right">	
					<a href="add.php" class="w3-button w3-small w3-green" role="button"><i class="fas fa-plus"></i> Tambah</a>
				</div>
				</div>		    
				<div class="card-body">
				  <table id="datatabel" class="table table-hover table-striped">
				    <thead>
				      <tr align="center">
				        <th scope="col">#</th>
			            <th scope="col">NAMA</th>
			            <th scope="col">PERIHAL PERMINTAAN</th>
			            <th scope="col">BIDANG</th>
			            <th scope="col">LOKASI</th>
				        <th scope="col">TANGGAL PERMINTAAN</th>
				        <th scope="col">STATUS</th>
			            <th scope="col"><i class="fas fa-gear"></i></th>
				      </tr>
				    </thead>
				    <tbody>
					<?php 
					$no=1;
					$query = "SELECT * FROM form_perbaikan
								INNER JOIN bidang 	  ON form_perbaikan.id_bidang 	  = bidang.id_bidang
								INNER JOIN pegawai 	  ON form_perbaikan.id_pegawai 	  = pegawai.id_pegawai
								INNER JOIN sub_bidang ON form_perbaikan.id_sub_bidang = sub_bidang.id_sub_bidang
								WHERE form_perbaikan.id_permintaan = form_perbaikan.id_permintaan 
								ORDER BY id_permintaan DESC";
					$sql = mysqli_query($conn, $query) or die (mysqli_error($conn));
					while ($row = mysqli_fetch_array($sql)) { 
					// Ubah tanggal menjadi yyyy-mm-dd
					$tanggal = date('Y-m-d', strtotime($row['tgl']));
					?>
				      <tr>
				        <td align="center"><?php echo $no++; ?></td>
			            <td><a href="detail.php?detail=<?php echo $row['id_permintaan']; ?>" class="detail"><?php echo $row['nm_pegawai']; ?></a></td>
			            <td><?php echo $row['permintaan']; ?></td>           
			            <td><?php echo $row['nm_bidang']; ?></td>
			            <td><?php echo $row['sub_bidang']; ?></td>
			            <td align="center"><?php echo tanggal_indo($tanggal, true); ?></td>
			            <td align="center">
			            	<p>
			            		<?php if ($row['status_post']=='1') {?>
		                          <span class="badge badge-success p-2"> SELESAI</span>
		                        <?php } elseif ($row['status_post']=='2') { ?>
		                          <span class="badge badge-primary p-2"> PROSES</span>
		                        <?php } else { ?>
		                          <span class="badge badge-danger p-2"> PENDING</span>
		                        <?php } ?>
			            	</p>
			            </td>
				        <td align="center">
				        	<a href="../verifikasi/verifikasi.php" class="verfikasi"><i class="fas fa-clipboard-check" title="Verifikasi"></i></a>
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