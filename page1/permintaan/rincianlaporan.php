<body>
<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=laporan.xls");
?>
	<div class="row justify-content-center">
		<?php		   
	       
		?>
		<div class="row justify-content-center">
		    <table id="datatabel" class="table table-striped table-bordered">
		    	<thead>
		    		<tr>
		    			<th>NO.</th>
		    			<th>NO. PERMINTAAN</th>
		    			<th>NAMA</th>
		    			<th>PERIHAL PERMINTAAN</th>
		    			<th>KATEGORI</th>
		    			<th>MAK</th>
		    			<th>BIDANG</th>
		    			<th>LOKASI / RUANGAN</th>
		    			<th>PENGELOLAAN</th>
		    			<th>NAMA PENGELOLA</th>
		    			<th>TANGGAL PERMINTAAN</th>
		    			<th>TANGGAL VERIFIKASI</th>
		    			<th>TANGGAL SELESAI</th>
		    			<th>STATUS</th>
		    			<th>STATUS KETERANGAN</th>
		    			<th>RINCIAN PERMINTAAN</th>
		    			<th>BIAYA</th>
		    		</tr>
		    	</thead>
			<tbody>
				<?php 
				include '../../inc/koneksi.php';
	            include '../../inc/control.php';
	            $query 	= "SELECT * FROM form_perbaikan
                          INNER JOIN bidang        ON form_perbaikan.id_bidang         = bidang.id_bidang
                          INNER JOIN pegawai       ON form_perbaikan.id_pegawai        = pegawai.id_pegawai
                          INNER JOIN sub_bidang    ON form_perbaikan.id_sub_bidang     = sub_bidang.id_sub_bidang
                          INNER JOIN kat_perbaikan ON form_perbaikan.id_kat_perbaikan  = kat_perbaikan.id_kat_perbaikan
                ";
                $sql = mysqli_query($conn, $query) or die (mysqli_error($conn));
				$no=1;
				while ($row = mysqli_fetch_array($sql)) { ?>
				    <tr>
				    	<td><?php echo $no++; ?></td>
				    	<td><?php echo $row['id_permintaan']; ?></td>
				    	<td><?php echo $row['nm_pegawai']; ?></td>
				    	<td><?php echo $row['permintaan']; ?></td>
				    	<td><?php echo $row['kat_perbaikan']; ?></td>
				    	<td><?php echo $row['mak']; ?></td>
				    	<td><?php echo $row['nm_bidang']; ?></td>
				    	<td><?php echo $row['sub_bidang']; ?></td>
				    	<td><?php echo $row['pengelola']; ?></td>
				    	<td><?php echo $row['nm_pk3']; ?></td>
				    	<td><?php echo $row['tgl']; ?></td>
				    	<td><?php echo $row['tgl_verifikasi']; ?></td>
				    	<td><?php echo $row['tgl_selesai']; ?></td>
				    	<td><?php echo $row['status']; ?></td>
				    	<td><?php echo $row['ket_status']; ?></td>
				    	<td><?php echo $row['ket']; ?></td>
				    	<td><?php echo $row['biaya']; ?></td>
				    </tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
    </div>
</body>