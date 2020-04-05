<?php 
    include '../template/header.php'; 
  	include '../template/navbar.php';
	include '../../inc/koneksi.php';
	include '../../inc/config.php';
?>

<body>

<div class="container" style="margin-top:80px">
	<div class="container">
		<div class="container mt-3">
			<h4>Permintaan &raquo; Detail Permintaan</h4>
				<hr />
				<?php 
	              include 'proses.php';
	              $id = $_GET['detail'];
	              $query = "SELECT * FROM form_perbaikan
                          INNER JOIN bidang     ON form_perbaikan.id_bidang    = bidang.id_bidang
                          INNER JOIN pegawai    ON form_perbaikan.id_pegawai   = pegawai.id_pegawai
                          INNER JOIN sub_bidang ON form_perbaikan.id_sub_bidang= sub_bidang.id_sub_bidang	  
                		  WHERE form_perbaikan.id_permintaan = $id";
                  $sql 		  = mysqli_query($conn, $query) or die (mysqli_error($conn));
				  $data  	  = mysqli_fetch_array($sql);
				  $tanggal 	  = date('Y-m-d', strtotime($data['tgl']));
	            ?>
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-2" align="right">Nomor Permintaan</div>
							<div class="col-sm-8"><?php echo $data['id_permintaan']; ?></div>
						</div>
						<div class="row mt-3">
						    <div class="col-sm-2" align="right">Nama</div>
						    <div class="col-sm-8"><?php echo $data['nm_pegawai']; ?></div>
						</div>
						<div class="row mt-3">
						    <div class="col-sm-2" align="right">Perihal Permintaan</div>
						    <div class="col-sm-4"><?php echo $data['permintaan']; ?></div>
						</div>
						<div class="row mt-3">
						    <div class="col-sm-2" align="right">Bidang</div>
						    <div class="col-sm-4"><?php echo $data['nm_bidang']; ?></div>
						</div>
						<div class="row mt-3">
						    <div class="col-sm-2" align="right">Lokasi / Ruangan</div>
						    <div class="col-sm-4"><?php echo $data['sub_bidang']; ?></div>
						</div>
						<div class="row mt-3">
						    <div class="col-sm-2" align="right">Tanggal Permintaan</div>
						    <div class="col-sm-4"><?php echo tanggal_indo($tanggal, true); ?></div>
						</div>
						
						<div class="row mt-3">
						    <div class="col-sm-2" align="right">Status</div>
						    <div class="col-sm-4"> 
						    	<?php if ($data['status_post']=='1') {?>
		                        	<span class="badge badge-success"> SELESAI</span>
		                      	<?php } elseif ($data['status_post']=='2') { ?>
		                        	<span class="badge badge-primary"> PROSES</span>
		                      	<?php } else { ?>
		                        	<span class="badge badge-danger"> PENDING</span>
		                      	<?php } ?>
						    </div>
						</div>
						<div class="row mt-3">
						    <div class="col-sm-2" align="right">Rincian Permintaan</div>
						    <div class="col-sm-4"><?php echo $data['ket']; ?></div>
						</div>
					</div>
					<p style="margin-left: 20px">
				  	<a href="javascript:history.go(-1)" class="w3-button w3-small w3-red" role="button"><i class="fas fa-angle-left"></i> Kembali</a>
				  	<a href="edit.php?edit=<?php echo $data['id_permintaan']; ?>" class="w3-button w3-small w3-teal" role="button"><i class="fas fa-edit"></i> Edit</a>			  	
				</p>
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
</body>
</html>

