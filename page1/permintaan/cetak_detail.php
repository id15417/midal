<?php 
    include '../template/header.php';
	include '../template/navbar-admin.php';
	include '../../inc/koneksi.php';
	include '../../inc/config.php';
?>

<body>

<div class="container" style="margin-top:80px">
	<div class="container">
		<div class="container mt-3">
			<h4 align="center">RINCIAN PERMINTAAN</h4>
				<hr />
				<?php 
	              include 'proses.php';
	              $id 	 = $_GET['detail'];
	              $query = "SELECT * FROM form_perbaikan
								INNER JOIN bidang 	  ON form_perbaikan.id_bidang 	  = bidang.id_bidang
								INNER JOIN pegawai 	  ON form_perbaikan.id_pegawai 	  = pegawai.id_pegawai
								INNER JOIN sub_bidang ON form_perbaikan.id_sub_bidang = sub_bidang.id_sub_bidang
								WHERE form_perbaikan.id_permintaan = $id";
								
				  $sql 			= mysqli_query($conn, $query) or die (mysqli_error($conn));
	              $data  		= mysqli_fetch_array($sql);
				  // $harga 		= number_format($data['biaya'],0,",",".");
				  $tanggal 		= date('Y-m-d', strtotime($data['tgl']));
				  // $tgl_verify 	= date('Y-m-d', strtotime($data['tgl_verifikasi']));
				  // $tgl_done 	= date('Y-m-d', strtotime($data['tgl_selesai']));
	            ?>
	            <p style="font-size: 17px;font-family: arial;">Berikut ini rincian permintaan <?php echo $data['permintaan']; ?> an. <?php echo $data['nm_pegawai']; ?> dari <?php echo $data['nm_bidang']; ?> :</p>
				<div class="card" style="font-size: 17px;font-family: arial;">
				<div class="card-header">Nomor Permintaan : <?php echo $data['id_permintaan']; ?></div>
					<div class="card-body">
						<div class="row">
						    <div class="col-sm-2">Nama</div>
						    <div class="col-sm-8">: <?php echo $data['nm_pegawai']; ?></div>
						</div>
						<div class="row mt-3">
						    <div class="col-sm-2">Perihal Permintaan</div>
						    <div class="col-sm-8">: <?php echo $data['permintaan']; ?></div>
						</div>
						<div class="row mt-3">
						    <div class="col-sm-2">Bidang</div>
						    <div class="col-sm-8">: <?php echo $data['nm_bidang']; ?></div>
						</div>
						<div class="row mt-3">
						    <div class="col-sm-2">Lokasi / Ruangan</div>
						    <div class="col-sm-8">: <?php echo $data['sub_bidang']; ?></div>
						</div>
						<!-- <div class="row mt-3">
						    <div class="col-sm-2">Pengelolaan</div>
						    <div class="col-sm-8">: <?php echo $data['pengelola']; ?></div>
						</div>
						<div class="row mt-3">
						    <div class="col-sm-2">Pihak ke-3</div>
						    <div class="col-sm-8">: <?php echo $data['nm_pk3']; ?></div>
						</div>
						<div class="row mt-3">
						    <div class="col-sm-2">Output</div>
						    <div class="col-sm-8">: <?php echo $data['kat_perbaikan']; ?></div>
						</div>
						<div class="row mt-3">
						    <div class="col-sm-2">MAK</div>
						    <div class="col-sm-4">: <?php echo $data['mak']; ?></div>
						</div> -->
						<div class="row mt-3">
						    <div class="col-sm-2">Tanggal Permintaan</div>
						    <div class="col-sm-8">: <?php echo tanggal_indo($tanggal, true); ?></div>
						</div>
						<!-- <div class="row mt-3">
						    <div class="col-sm-2">Tanggal Verifikasi</div>
						    <div class="col-sm-8">: <?php echo tanggal_indo($tgl_verify, true); ?></div>
						</div>
						<div class="row mt-3">
						    <div class="col-sm-2">Tanggal Selesai</div>
						    <div class="col-sm-8">: <?php echo tanggal_indo($tgl_done, true); ?></div>
						</div> -->
						<div class="row mt-3">
						    <div class="col-sm-2">Status</div>
						    <div class="col-sm-8">: 
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
						    <div class="col-sm-2">Status Keterangan</div>
						    <div class="col-sm-8">: <?php echo $data['ket_status']; ?></div>
						</div> -->
						<div class="row mt-3">
						    <div class="col-sm-2">Rincian Permintaan</div>
						    <div class="col-sm-8">: <?php echo $data['ket']; ?></div>
						</div>
					</div>
				<!-- <div class="card-footer">Biaya : Rp. <?php echo $data['biaya']; ?></div> -->
				</div>
		</div>
	</div>
</div> 
<script>
	window.print();
</script>
</body>
</html>

