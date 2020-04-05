<?php 
    include '../template/header.php';
	include '../template/navbar-admin.php';
	include '../../inc/koneksi.php';
	include '../../inc/config.php';
?>

<body>

<div class="container text-dark" style="margin-top:45px">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<h4 class="text-center text-dark">Tindak Lanjut Permintaan</h4>
			<hr> 
		</div>
	</div>	
	<?php 
	// include 'proses.php';
	$id    	= $_GET['detail'];
	$query 	= "	SELECT * FROM form_perbaikan
				INNER JOIN bidang 	  ON form_perbaikan.id_bidang 	  = bidang.id_bidang
				INNER JOIN pegawai 	  ON form_perbaikan.id_pegawai 	  = pegawai.id_pegawai
				INNER JOIN sub_bidang ON form_perbaikan.id_sub_bidang = sub_bidang.id_sub_bidang
				WHERE form_perbaikan.id_permintaan = $id";			

	$sql 			= mysqli_query($conn, $query) or die (mysqli_error($conn));
	$data  			= mysqli_fetch_array($sql);
	// $harga 		= number_format($data['biaya'],0,",",".");
	$tanggal 		= date('Y-m-d', strtotime($data['tgl']));

	?>
	<div class="row">
		<div class="col-md-6">
			<h4 class="text-center text-dark">Data Permintaan</h4>
			<div class="card">
				<div class="card-body">
					<div class="row">
					  <div class="col-sm-4" align="right">No</div>
					  <div class="col-md-8"><?php echo $data['id_permintaan']; ?></div>
					</div>
					<div class="row mt-3">
						<div class="col-sm-4" align="right">Nama</div>
						<div class="col-md-8"><?php echo $data['nm_pegawai']; ?></div>
					</div>
					<div class="row mt-3">
						<div class="col-md-4" align="right">Perihal Permintaan</div>
						<div class="col-sm-8"><?php echo $data['permintaan']; ?></div>
					</div>
					<div class="row mt-3">
						<div class="col-sm-4" align="right">Bidang</div>
						<div class="col-md-8"><?php echo $data['nm_bidang']; ?></div>
					</div>
					<div class="row mt-3">
						<div class="col-sm-4" align="right">Ruangan</div>
						<div class="col-md-8"><?php echo $data['sub_bidang']; ?></div>
					</div>
					<div class="row mt-3">
						<div class="col-sm-4" align="right">Tanggal</div>
						<div class="col-md-8"><?php echo tanggal_indo($tanggal, true); ?></div>
					</div>
					<div class="row mt-3">
						<div class="col-sm-4" align="right">Status</div>
						<div class="col-md-8">
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
						<div class="col-sm-4" align="right">Rincian Permintaan</div>
						<div class="col-md-8"><?php echo $data['ket']; ?></div>
					</div>
				</div>
			</div>
		</div>
		<?php 

		$id    	= $_GET['detail'];
		$query 	= "	SELECT * FROM verifikasi
					INNER JOIN form_perbaikan ON verifikasi.id_permintaan = form_perbaikan.id_permintaan
					INNER JOIN kat_perbaikan ON verifikasi.id_kat_perbaikan = kat_perbaikan.id_kat_perbaikan

					WHERE verifikasi.id_verifikasi = $id";			

		$sql 	= mysqli_query($conn, $query) or die (mysqli_error($conn));
		$row  	= mysqli_fetch_array($sql);
		?>
		<div class="col-md-6">
			<h4 class="text-center text-dark">Pratinjau</h4>
			<div class="card">
				<div class="card-body">
					<div class="row">
					  <div class="col-sm-4" align="right">No</div>
					  <div class="col-md-8"><?php echo $row['id_permintaan']; ?></div>
					</div>
					<div class="row mt-3">
						<div class="col-sm-4" align="right">Nama</div>
						<div class="col-md-8"><?php echo $row['kat_perbaikan']; ?></div>
					</div>
					<div class="row mt-3">
						<div class="col-md-4" align="right">Perihal Permintaan</div>
						<div class="col-sm-8"><?php echo $row['permintaan']; ?></div>
					</div>
					<div class="row mt-3">
						<div class="col-sm-4" align="right">Bidang</div>
						<div class="col-md-8"><?php echo $row['nm_bidang']; ?></div>
					</div>
					<div class="row mt-3">
						<div class="col-sm-4" align="right">Ruangan</div>
						<div class="col-md-8"><?php echo $row['sub_bidang']; ?></div>
					</div>
					<div class="row mt-3">
						<div class="col-sm-4" align="right">Tanggal</div>
						<div class="col-md-8"><?php echo tanggal_indo($tanggal, true); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <p>
		<a href="javascript:history.go(-1)" class="w3-button w3-small w3-red" role="button"><i class="fas fa-angle-left"></i> Kembali</a>
		<a href="edit.php?edit=<?php echo $data['id_permintaan']; ?>" class="w3-button w3-small w3-indigo" role="button"><i class="fas fa-edit"></i> Edit</a>
		<a href="proses.php?id=<?php echo $data['id_permintaan']; ?>" onclick="return confirm('Yakin data ini akan dihapus?')" class="w3-button w3-small w3-yellow" role="button"><i class="fas fa-trash"></i> Hapus</a>
		<a href="cetak_detail.php?detail=<?php echo $data['id_permintaan']; ?>" target="_blank" class="w3-button w3-small w3-teal" role="button"><i class="fas fa-print"></i> Cetak</a>			  	
	</p> -->
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
</body>
</html>

