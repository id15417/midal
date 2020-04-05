<?php 
    include 'template/header.php';
    include 'template/navbar.php';
?>

<body>

<div class="container">
	<div class="container-fluid">
		<?php 
		    $mysqli = new mysqli('localhost', 'root', '', 'dbpermintaan') or die(mysql_error($mysqli));
		    $result = $mysqli->query("SELECT * FROM form_perbaikan ORDER BY id_permintaan DESC") or die($mysqli_error());
		   	$no=1;
		?>
		<div class="container mt-3">
		<h4>Permintaan &raquo; Data Permintaan</h4>
		<hr />
		<p>
		<div class="btn-group" role="group" aria-label="Basic example">
			<a href="tambah_permintaan.php" class="btn btn-primary btn-sm" role="button"><i class="fas fa-plus"> Tambah</i></a>
		</div>
			<!-- <a href="#exampleModal" class="btn btn-info btn-sm" role="button" class="treeview-item" data-toggle="modal"><i class="icon fa fa-print"></i> PRINT FILTER</a>


  Modal
    <form method="POST" action="report-filter.php" target="_blank" >
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><small>PRINT FILTER DATE</small></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label class="control-label">Star Date</label>
                <input type="date" name="from" id="stayf" value="<?php echo date('Y-m-d'); ?>" class="form-control">
              </div>
              <div class="form-group">
                <label class="control-label">End Date</label>
                <input type="date" name="end" id="stayf" value="<?php echo date('Y-m-d'); ?>" class="form-control">
              </div>                
              <div class="form-group">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit" name="submit" value="proses" onclick="return valid();">Print</button>
              </div>
            </div>
          </div>  
        </div>
      </div>
    </form> -->
	</p>	
		<div class="row justify-content-center">
		  <table id="datatabel" class="table table-striped table-bordered">
		    <thead>
		      <tr align="center">
		        <th>No</th>
		        <th>Nama</th>
		        <!-- <th>Permintaan</th> -->
		        <th>Jenis</th>
		        <!-- <th>Kerusakan</th> -->
		        <th>Bidang</th>
		        <th>Lokasi/Ruangan</th>
		        <th>Pengelola</th>
		        <!-- <th>Nama PK3</th> -->
		        <th>Tanggal</th>
		        <th>Keterangan</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php while ($row = $result->fetch_assoc()): ?>
		      <tr>
		        <td align="center"><?php echo $no++; ?></td>
		        <td><?php echo $row['nm_pegawai']; ?></td>
		        <!-- <td><?php echo $row['permintaan']; ?></td> -->
		        <td><?php echo $row['perbaikan']; ?></td>
		        <!-- <td><?php echo $row['kerusakan']; ?></td> -->
		        <td><?php echo $row['bidang']; ?></td>
		        <td><?php echo $row['lokasi']; ?></td>
		        <td><?php echo $row['pengelola']; ?></td>
		        <!-- <td><?php echo $row['nm_pk3']; ?></td> -->
		        <td><?php echo $row['tgl']; ?></td>
		        <td><?php echo $row['ket']; ?></td>
		        <td align="center">
		        	
		        	<a href="control.php?edit_per=<?php echo $row['id_permintaan']; ?>" class="edit"><i class="fas fa-edit" title="Edit"></i></a>

                    <a href="control.php?delete_per=<?php echo $row['id_permintaan']; ?>" onclick="return confirm('Yakin data ini akan dihapus?')" name="delete_per" class="delete"><i class="fas fa-remove" title="Hapus"></i></a>

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
	           <!--  <div class="col-md-6 text-md-right">
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