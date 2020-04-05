<?php
include 'inc/koneksi.php';
include 'inc/config.php';
include 'inc/control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home | MIDAL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="Buttons-1.6.1/css/buttons.bootstrap4.min.css"/>
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- Memanggil jQuery.js -->
  <script src="assets/js/jquery-3.2.1.min.js"></script>
  
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
<a class="navbar-brand" href="#">
<img src="img/brand.svg" width="40" height="30" class="d-inline-block align-top" alt="">
    MIDAL
</a>
</a>
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#">HOME </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="login.php">LOGIN</a>
    </li>
  </ul>
</nav>
<div class="container" style="margin-top:75px">
	<p>
	<h4 align="center">DAFTAR PERMINTAAN</h4> 
	</p>
			<div class="card">			    
				<div class="card-body">
				  <table id="datatabel" class="table-sm table-bordered table-striped">
				    <thead>
				      <tr>
				        <th scope="col">No.</th>
			            <th scope="col">NAMA</th>
			            <th scope="col">PERIHAL PERMINTAAN</th>
			            <th scope="col">BIDANG</th>
			            <th scope="col">LOKASI</th>
						<th scope="col">TANGGAL PERMINTAAN</th>
				        <th scope="col">STATUS</th>
				      </tr>
				    </thead>
				    <tbody>
              <?php 
				$no=1;
                $query = "SELECT * FROM form_perbaikan
                          INNER JOIN bidang        ON form_perbaikan.id_bidang         = bidang.id_bidang
                          INNER JOIN pegawai       ON form_perbaikan.id_pegawai        = pegawai.id_pegawai
                          INNER JOIN sub_bidang    ON form_perbaikan.id_sub_bidang     = sub_bidang.id_sub_bidang
						  ORDER BY id_permintaan DESC
						  ";
				$sql = mysqli_query($conn, $query) or die (mysqli_error($conn));
				while ($row = mysqli_fetch_array($sql)) {
				// Ubah tanggal menjadi yyyy-mm-dd
				$tanggal = date('Y-m-d', strtotime($row['tgl']));
				?>
				      <tr>
				        <td align="center"><?php echo $no++; ?>.</td>
			            <td><a href="detail.php?detail=<?php echo $row['id_permintaan']; ?>" class="detail"><?php echo $row['nm_pegawai']; ?></a></td>
			            <td><?php echo $row['permintaan']; ?></td>           
			            <td><?php echo $row['nm_bidang']; ?></td>
			            <td><?php echo $row['sub_bidang']; ?></td>
						<td><?php echo tanggal_indo($tanggal, true); ?></td>
			            <td align="center">
			            	<h6>
			            		<?php if ($row['status_post']=='1') {?>
		                          <span class="badge badge-success"> SELESAI</span>
		                        <?php } elseif ($row['status_post']=='2') { ?>
		                          <span class="badge badge-primary"> PROSES</span>
		                        <?php } else { ?>
		                          <span class="badge badge-danger"> PENDING</span>
		                        <?php } ?>
			            	</h6>
			            </td>
				      </tr>
				    <?php } ?>
				    </tbody>
				  </table>
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

<script type="text/javascript" src="DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="DataTables-1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#datatabel').DataTable();
	} );
</script>
</body>
</html>
