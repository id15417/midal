<?php 
    include 'template/header.php';
    include 'template/navbar.php';
?>

<body>

<div class="container mt-3">
	<div class="container">
		<div class="content">
			<h4>Permintan &raquo; Detail Permintaan</h4>
			<hr />
			
			<table class="table table-striped table-bordered">
				<tr>
					<th width="20%">NIM</th>
					<td></td>
				</tr>
				<tr>
					<th>NAMA LENGKAP</th>
					<td></td>
				</tr>
				<tr>
					<th>TEMPAT & TANGGAL LAHIR</th>
					<td></td>
				</tr>
				<tr>
					<th>EMAIL</th>
					<td></td>
				</tr>
				<tr>
					<th>JENIS KELAMIN</th>
					<td></td>
				</tr>
				<tr>
					<th>AGAMA</th>
					<td></td>
				</tr>
				<tr>
					<th>JURUSAN</th>
					<td></td>
				</tr>
				<tr>
					<th>SEMESTER</th>
					<td></td>
				</tr>
				<tr>
					<th>TAHUN MASUK</th>
					<td></td>
				</tr>
				<tr>
					<th>ALAMAT</th>
					<td></td>
				</tr>
				<tr>
					<th>STATUS</th>
					<td></td>
				</tr>
			</table>
			
			<a href="javascript:history.go(-1)" class="btn btn-warning"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>
			<a href="edit.php?nim=<?php echo $row['nim']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data</a>
			<a href="profile.php?aksi=delete&nim=<?php echo $row['nim']; ?>" class="btn btn-danger" onclick="return confirm('Yakin?')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus Data</a>
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
</div>

</body>
</html>