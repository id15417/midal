<?php 
include '../../inc/koneksi.php';

/* Tambah data akun */
	if (isset($_POST['add'])) {

		$nama 	= trim(mysqli_real_escape_string($conn,$_POST['kat_perbaikan']));
		$mak 	= trim(mysqli_real_escape_string($conn,$_POST['mak']));
		$sql 	= "INSERT INTO kat_perbaikan (kat_perbaikan, mak) VALUES ('$nama', '$mak')";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			echo "<script>alert('Data berhasil disimpan!');window.location='akun.php'</script>";
			// header("location:jenis.php");
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
	} elseif (isset($_POST['edit'])) {
		$id 	= $_POST['id_kat_perbaikan'];
		$nama 	= trim(mysqli_real_escape_string($conn,$_POST['kat_perbaikan']));
		$mak 	= trim(mysqli_real_escape_string($conn,$_POST['mak']));
		$sql 	= "UPDATE kat_perbaikan SET kat_perbaikan = '$nama', mak='$mak' WHERE id_kat_perbaikan='$id'";
		$result = mysqli_query($conn, $sql);

		if ($result) {
		    echo "<script>alert('Data berhasil diubah!');window.location='akun.php'</script>";
		} else {
		    echo "Error updating record: " . mysqli_error($conn);
		}
	}

	// hapus data bidang
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "DELETE FROM kat_perbaikan WHERE id_kat_perbaikan='$id'";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<script>alert('Data berhasil dihapus!');window.location='akun.php'</script>";
			// header("location:bidang.php");
		} else {
			echo "Error deleting record: " . mysqli_error($conn);
		}
		
	}
?>