<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Midal - Monitoring Administrasi Pelayanan Internal</title>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">
  
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="Buttons-1.6.1/css/buttons.bootstrap4.min.css"/>
<!-- w3 CSS iOs style -->
<link rel="stylesheet" href="assets/css/w3.css">
<link rel="stylesheet" href="assets/css/w3-colors-ios.css">

<script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>


<!-- Memanggil jQuery.js -->
<script src="assets/js/jquery-3.2.1.min.js"></script>

<!-- Memanggil Autocomplete.js -->
<script src="assets/js/jquery.autocomplete.min.js"></script>

<style type="text/css">
    body {
        color: #566787;
		background: #f5f5f5;
		font-family: 'Lato', sans-serif;
		font-size: 14px;
	}
	.table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px 0;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {        
		padding-bottom: 15px;
		background: #435d7d;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn-group {
		float: right;
	}
	.table-title .btn {
		color: #fff;
		float: right;
		font-size: 13px;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 60px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
		outline: none !important;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }

    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    
});
</script>

<style>
    .bs-example{
        margin: 20px;
    }
</style>

</head>

<body>

<div class="container">
			<h3 align="center">DETAIL PERMINTAAN</h3>
				<?php 
				  include 'inc/koneksi.php';
				  include 'inc/control.php';
				  include 'inc/config.php';
	              $id 	 = $_GET['detail'];
	              $query = "SELECT * FROM form_perbaikan
                          INNER JOIN bidang        ON form_perbaikan.id_bidang         = bidang.id_bidang
                          INNER JOIN pegawai       ON form_perbaikan.id_pegawai        = pegawai.id_pegawai
                          INNER JOIN sub_bidang    ON form_perbaikan.id_sub_bidang     = sub_bidang.id_sub_bidang
						  WHERE form_perbaikan.id_permintaan = $id
						  ";
                $sql 		= mysqli_query($conn, $query) or die (mysqli_error($conn));
				$data  		= mysqli_fetch_array($sql);
				$tanggal 	= date('Y-m-d', strtotime($data['tgl']));
	            ?>
				<div class="card">
					<div class="card-body">
					<div class="row">
						    <div class="col-sm-2">No. Permintaan </div>
						    <div class="col-sm-4">: <?php echo $data['id_permintaan']; ?></div>
						</div>
						<div class="row mt-3">
						    <div class="col-sm-2">Nama</div>
						    <div class="col-sm-8">: <?php echo $data['nm_pegawai']; ?></div>
						</div>
						<div class="row mt-3">
						    <div class="col-sm-2">Perihal Permintaan</div>
						    <div class="col-sm-4">: <?php echo $data['permintaan']; ?></div>
						</div>
						<div class="row mt-3">
						    <div class="col-sm-2">Bidang</div>
						    <div class="col-sm-4">: <?php echo $data['nm_bidang']; ?></div>
						</div>
						<div class="row mt-3">
						    <div class="col-sm-2">Lokasi / Ruangan</div>
						    <div class="col-sm-4">: <?php echo $data['sub_bidang']; ?></div>
						</div>
		
						<div class="row mt-3">
						    <div class="col-sm-2">Tanggal Permintaan</div>
						    <div class="col-sm-4">: <?php echo tanggal_indo($tanggal, true);; ?></div>
						</div>
						
						<div class="row mt-3">
						    <div class="col-sm-2">Status</div>
						    <div class="col-sm-4">: 
						    	<?php if ($data['status_post']=='1') {?>
		                          <span class="badge badge-success"> SELESAI</span>
		                        <?php } elseif ($data['status_post']=='2') { ?>
		                          <span class="badge badge-primary"> VERIFIKASI</span>
		                        <?php } else { ?>
		                          <span class="badge badge-danger"> PENDING</span>
		                        <?php } ?>
						    </div>
						</div>
						
						<div class="row mt-3">
						    <div class="col-sm-2">Rincian Permintaan</div>
						    <div class="col-sm-4">: <?php echo $data['ket']; ?></div>
						</div>
					</div>
				</div>
				<p>	
					<a href="javascript:history.go(-1)" class="w3-button w3-small w3-red" role="button"><i class="fas fa-angle-left"></i> Kembali</a>
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

