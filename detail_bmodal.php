<?php 
    include '../template/header.php';
	include '../template/navbar-admin.php';
	include '../../inc/koneksi.php';
	include '../../inc/config.php';
?>

<body>

<div class="container text-dark" style="margin-top:80px">
			<h4>Permintaan &raquo; Detail Permintaan</h4>
				<?php 
	              $id 	 = $_GET['detail'];
	              $query = "SELECT * FROM belanja_modal
				  INNER JOIN pegawai 	  	ON belanja_modal.id_pegawai 	 	= pegawai.id_pegawai
				  INNER JOIN sub_bidang 	ON belanja_modal.id_sub_bidang 		= sub_bidang.id_sub_bidang
				  INNER JOIN kat_perbaikan 	ON belanja_modal.id_kat_perbaikan 	= kat_perbaikan.id_kat_perbaikan
				  WHERE belanja_modal.id_bmodal = $id";
				  $sql 			= mysqli_query($conn, $query) or die (mysqli_error($conn));
	              $data  		= mysqli_fetch_array($sql);
				  // $harga 		= number_format($data['biaya'],0,",",".");
				  $tanggal 		= date('Y-m-d', strtotime($data['tgl']));
				  // $tgl_verify 	= date('Y-m-d', strtotime($data['tgl_verifikasi']));
				  // $tgl_done 	= date('Y-m-d', strtotime($data['tgl_selesai']));
	            ?>
				<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-sm-2" align="right">Nomor Permintaan</div>
						<div class="col-sm-8"><?php echo $data['id_bmodal']; ?></div>
					</div>
				</div>
					<div class="card-body">
						<div class="row">
						    <div class="col-sm-2" align="right">Nama</div>
						    <div class="col-sm-8"><?php echo $data['nm_pegawai']; ?></div>
						</div>
						<div class="row mt-3">
						    <div class="col-sm-2" align="right">Perihal Permintaan</div>
						    <div class="col-sm-4"><?php echo $data['bmodal']; ?></div>
						</div>
						<div class="row mt-3">
						    <div class="col-sm-2" align="right">Lokasi / Ruangan</div>
						    <div class="col-sm-4"><?php echo $data['sub_bidang']; ?></div>
						</div>
						<!-- <div class="row mt-3">
						    <div class="col-sm-2" align="right">Pengelolaan</div>
						    <div class="col-sm-4">: <?php echo $data['pengelola']; ?></div>
						</div> 
						<div class="row mt-3">
						    <div class="col-sm-2" align="right">Nama Pengelola</div>
						    <div class="col-sm-4">: <?php echo $data['nm_pk3']; ?></div>
						</div> -->
						<div class="row mt-3">
						    <div class="col-sm-2" align="right">Output</div>
							<div class="col-lg-8"><?php echo $data['kat_perbaikan']; ?></div>
						</div>
						<div class="row mt-3">
						    <div class="col-sm-2" align="right">MAK</div>
							<div class="col-lg-4"><?php echo $data['mak']; ?></div>
						</div>
						<div class="row mt-3">
						    <div class="col-sm-2" align="right">Tanggal Permintaan</div>
						    <div class="col-sm-4"><?php echo tanggal_indo($tanggal, true); ?></div>
						</div>
						<!-- <div class="row mt-3">
						    <div class="col-sm-2" align="right">Tanggal Verifikasi</div>
						    <div class="col-sm-4">: <?php echo tanggal_indo($tgl_verify, true); ?></div>
						</div>
						<div class="row mt-3">
						    <div class="col-sm-2" align="right">Tanggal Selesai</div>
						    <div class="col-sm-4">: <?php echo tanggal_indo($tgl_done, true); ?></div>
						</div> -->
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
						<!-- <div class="row mt-3">
						    <div class="col-sm-2" align="right">Status Keterangan</div>
						    <div class="col-sm-4"><?php echo $data['ket']; ?></div>
						</div> -->
						<div class="row mt-3">
						    <div class="col-sm-2" align="right">Rincian Permintaan</div>
						    <div class="col-sm-4"><?php echo $data['ket']; ?></div>
						</div>
						<!-- <div class="row mt-3">
							<div class="col-sm-2" align="right">Biaya</div>
							<div class="col-sm-4"> : Rp. <?php echo $harga; ?></div>
						</div> -->
					</div>
				</div>
				<p>
				  	<a href="javascript:history.go(-1)" class="w3-button w3-small w3-red" role="button"><i class="fas fa-angle-left"></i> Kembali</a>
				  	<a href="edit.php?edit=<?php echo $data['id_bmodal']; ?>" class="w3-button w3-small w3-indigo" role="button"><i class="fas fa-edit"></i> Edit</a>
				  	<a href="bmodal/proses.php?id=<?php echo $data['id_bmodal']; ?>" onclick="return confirm('Yakin data ini akan dihapus?')" class="w3-button w3-small w3-yellow" role="button"><i class="fas fa-trash"></i> Hapus</a>
				  	<a href="cetak_detail_bmodal.php?cetak=<?php echo $data['id_bmodal']; ?>" target="_blank" class="w3-button w3-small w3-teal" role="button"><i class="fas fa-print"></i> Cetak</a>			  	
				</p>
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

