<?php 

session_start();
include '../../inc/koneksi.php';

// Tambah Permintaan 
	if (isset($_POST['add'])) {
		
		$bidang		= trim(mysqli_real_escape_string($conn,$_POST['bidang']));
		$pegawai 	= trim(mysqli_real_escape_string($conn,$_POST['pegawai']));
		$sub_bidang = trim(mysqli_real_escape_string($conn,$_POST['sub_bidang']));
		$permintaan = trim(mysqli_real_escape_string($conn,$_POST['permintaan']));
		$tgl 		= trim(mysqli_real_escape_string($conn,$_POST['tgl']));
		$ket		= trim(mysqli_real_escape_string($conn,$_POST['ket']));
		$statuspost	= trim(mysqli_real_escape_string($conn,$_POST['status_post']));

		$sql = "INSERT INTO form_perbaikan (id_bidang, 
											id_pegawai,
											id_sub_bidang,
											permintaan,
											tgl, 
											ket,
											status_post) 
				VALUES ('$bidang', 
						'$pegawai', 
						'$sub_bidang', 
						'$permintaan', 
						'$tgl', 
						'$ket',
						'$statuspost')";

		$result = mysqli_query($conn, $sql);

		if ($result) {
			echo "<script>alert('Data berhasil disimpan!');window.location='permintaan.php'</script>";
			// header("location:bidang.php");
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	} elseif (isset($_POST['edit'])) {

		$id 		= trim(mysqli_real_escape_string($conn,$_POST['id_permintaan']));
		$bidang		= trim(mysqli_real_escape_string($conn,$_POST['bidang']));
		$pegawai	= trim(mysqli_real_escape_string($conn,$_POST['pegawai']));
		$sub_bidang = trim(mysqli_real_escape_string($conn,$_POST['sub_bidang']));
		$permintaan = trim(mysqli_real_escape_string($conn,$_POST['permintaan']));
		$tgl		= trim(mysqli_real_escape_string($conn,$_POST['tgl']));
		$ket		= trim(mysqli_real_escape_string($conn,$_POST['ket']));
		$statuspost	= trim(mysqli_real_escape_string($conn,$_POST['status_post']));

		$sql 	 = "UPDATE form_perbaikan 
					SET    id_pegawai		='$pegawai', 
						   id_sub_bidang	='$sub_bidang', 
						   permintaan		='$permintaan', 
						   tgl				='$tgl', 
						   ket				='$ket', 
						   status_post		='$statuspost'
						   					
					WHERE  id_permintaan	='$id'";
		$result  = mysqli_query($conn, $sql);

		if ($result) {
		    echo "<script>alert('Data berhasil diubah!');window.location='permintaan.php'</script>";
		} else {
		    echo "Error updating record: " . mysqli_error($conn);
		}
	}

	// hapus data permintaan
	if (isset($_GET['id'])) {
		$id 	= $_GET['id'];
		$sql 	= "DELETE FROM form_perbaikan WHERE id_permintaan='$id'";
		$result = mysqli_query($conn, $sql);

		$_SESSION['message']  = '<i class="fas fa-trash"></i> Data berhasil dihapus!';
    	$_SESSION['msg_type'] = "danger";

		if ($result) {
			header("location:permintaan.php");
		} else {
			echo "Error deleting record: " . mysqli_error($conn);
		}
	}
 ?>