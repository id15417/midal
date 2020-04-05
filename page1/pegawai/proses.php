<?php 
include '../../inc/koneksi.php';

/* Tambah data pegawai */
	if (isset($_POST['add'])) {

		$nama 	 = trim(mysqli_real_escape_string($conn,$_POST['nm_pegawai']));
		$jabatan = trim(mysqli_real_escape_string($conn,$_POST['jabatan']));
		$nip 	 = trim(mysqli_real_escape_string($conn,$_POST['nip']));
		$bidang	 = trim(mysqli_real_escape_string($conn,$_POST['bidang']));
		
		$sql = "INSERT INTO pegawai (id_bidang, nm_pegawai, jabatan, nip) VALUES ('$bidang', '$nama', '$jabatan', '$nip')";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			echo "<script>alert('Data berhasil disimpan!');window.location='pegawai.php'</script>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	} elseif (isset($_POST['edit_pegawai'])) {
		$id 	 = trim(mysqli_real_escape_string($conn,$_POST['id_pegawai']));
		$nama 	 = trim(mysqli_real_escape_string($conn,$_POST['nm_pegawai']));
		$jabatan = trim(mysqli_real_escape_string($conn,$_POST['jabatan']));
		$nip 	 = trim(mysqli_real_escape_string($conn,$_POST['nip']));
		$bidang	 = trim(mysqli_real_escape_string($conn,$_POST['bidang']));

		$sql 	 = "UPDATE pegawai 	SET id_bidang 	='$bidang', 
									    nm_pegawai	='$nama', 
									    jabatan		='$jabatan', 
									    nip 		='$nip' 
								   	WHERE id_pegawai='$id'";
		$result  = mysqli_query($conn, $sql);

		if ($result) {
		    echo "<script>alert('Data berhasil diubah!');window.location='pegawai.php'</script>";
		} else {
		    echo "Error updating record: " . mysqli_error($conn);
		}
	}

		// hapus data pegawai
	if (isset($_GET['delete_peg'])) {
		$id = $_GET['delete_peg'];
		$sql = "DELETE FROM pegawai WHERE id_pegawai='$id'";
		$result = mysqli_query($conn,$sql);

		if ($result) {
			echo "<script>alert('Data berhasil dihapus!');window.location='pegawai.php'</script>";
		} else {
			echo "Error deleting record: " . mysqli_error($conn);
		}
	} 
?>