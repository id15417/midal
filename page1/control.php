<?php 

// Koneksi ke database
include '../inc/koneksi.php'; 

if (isset($_POST['login'])) {
	
	$user	= $_POST['username'];
	$pass	= sha1($_POST['password']);
	$query  = mysqli_query($conn, "SELECT * FROM user WHERE username='$user' and password='$pass'");
	
	if (mysqli_num_rows($query) == 0) {
		echo "<script>alert('Username atau Password yang anda masukkan salah!');document.location.href='index.php'</script>";
	} else {
		$row = mysqli_fetch_assoc($query);
		$_SESSION['username'] 	= $row['username'];
		$_SESSION['level'] 		= $row['level'];

		if ($row['level'] == "admin") {
			echo "<script>alert('Selamat datang Admin');document.location.href='page1/home.php'</script>";
		}
		else if ($row['level'] == "user") {
			echo "<script>alert('Selamat datang User');document.location.href='page0/home.php'</script>";		
		} 
		else {
			echo "<script>alert('Login Gagal, Coba lagi!');document.location.href='index.php'</script>"; 
		}
	} 
} 


// ======================================= Start User =============================================================

	

// =================================== Start Bidang =============================================================

	



// =================================== Start Lokasi =============================================================

	


// =================================== Start Bidang =============================================================

	 

// =================================== Start Pegawai =============================================================

	

// ======================================= Start Permintaan =============================================================

	// Tambah Permintaan 
	if (isset($_POST['add_permintaan'])) {
		// $id_permintaan	  = trim(mysqli_real_escape_string($conn,$_POST['id_permintaan']));
		$id_bidang		  = trim(mysqli_real_escape_string($conn,$_POST['id_bidang']));
		$id_pegawai		  = trim(mysqli_real_escape_string($conn,$_POST['pegawai']));
		$id_sub_bidang 	  = trim(mysqli_real_escape_string($conn,$_POST['id_sub_bidang']));
		$id_kat_perbaikan = trim(mysqli_real_escape_string($conn,$_POST['id_kat_perbaikan']));
		$permintaan 	  = trim(mysqli_real_escape_string($conn,$_POST['permintaan']));
		$pengelola		  = trim(mysqli_real_escape_string($conn,$_POST['pengelola']));
		$nm_pk3		      = trim(mysqli_real_escape_string($conn,$_POST['nm_pk3']));
		$tgl			  = trim(mysqli_real_escape_string($conn,$_POST['tgl']));
		$tgl_verify		  = trim(mysqli_real_escape_string($conn,$_POST['tgl_verifikasi']));
		$tgl_done		  = trim(mysqli_real_escape_string($conn,$_POST['tgl_selesai']));
		$ket_status		  = trim(mysqli_real_escape_string($conn,$_POST['ket_status']));
		$ket			  = trim(mysqli_real_escape_string($conn,$_POST['ket']));
		$status			  = trim(mysqli_real_escape_string($conn,$_POST['status']));
		$biaya			  = trim(mysqli_real_escape_string($conn,$_POST['biaya']));

		$sql = "INSERT INTO form_perbaikan (id_bidang, 
											id_pegawai,
											id_sub_bidang,
											id_kat_perbaikan,
											permintaan,
											pengelola, 
											nm_pk3, 
											tgl, 
											tgl_verifikasi, 
											tgl_selesai, 
											ket_status,  
											ket, 
											status, 
											biaya) 
				VALUES ('$id_bidang', 
						'$id_pegawai', 
						'$id_sub_bidang', 
						'$id_kat_perbaikan', 
						'$permintaan', 
						'$pengelola', 
						'$nm_pk3',
						'$tgl', 
						'$tgl_verify', 
						'$tgl_done', 
						'$ket_status', 
						'$ket',  
						'$status', 
						'$biaya')";

		$result = mysqli_query($conn, $sql);

		if ($result) {
			echo "<script>alert('Data berhasil disimpan!');window.location='permintaan.php'</script>";
			// header("location:bidang.php");
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	} elseif (isset($_POST['edit_permintaan'])) {

		$id_permintaan	  = trim(mysqli_real_escape_string($conn,$_POST['id_permintaan']));
		// $id_bidang		  = trim(mysqli_real_escape_string($conn,$_POST['bidang']));
		// $id_pegawai		  = trim(mysqli_real_escape_string($conn,$_POST['pegawai']));
		// $id_sub_bidang 	  = trim(mysqli_real_escape_string($conn,$_POST['sub_bidang']));
		// $id_kat_perbaikan = trim(mysqli_real_escape_string($conn,$_POST['kat_perbaikan']));
		// $permintaan 	  = trim(mysqli_real_escape_string($conn,$_POST['permintaan']));
		$pengelola		  = trim(mysqli_real_escape_string($conn,$_POST['pengelola']));
		$nm_pk3		      = trim(mysqli_real_escape_string($conn,$_POST['nm_pk3']));
		// $tgl			  = trim(mysqli_real_escape_string($conn,$_POST['tgl']));
		$tgl_verify		  = trim(mysqli_real_escape_string($conn,$_POST['tgl_verifikasi']));
		$tgl_done		  = trim(mysqli_real_escape_string($conn,$_POST['tgl_selesai']));
		$ket_status		  = trim(mysqli_real_escape_string($conn,$_POST['ket_status']));
		// $ket			  = trim(mysqli_real_escape_string($conn,$_POST['ket']));
		$status			  = trim(mysqli_real_escape_string($conn,$_POST['status']));
		$biaya			  = trim(mysqli_real_escape_string($conn,$_POST['biaya']));

		$sql 	= "UPDATE form_perbaikan SET  
											-- id_bidang		='$id_bidang', 
											-- id_pegawai		='$id_pegawai', 
											-- id_sub_bidang	='$id_sub_bidang', 
											-- id_kat_perbaikan ='$id_kat_perbaikan', 
											-- permintaan		='$permintaan', 
											pengelola		='$pengelola', 
											nm_pk3			='$nm_pk3', 
											-- tgl				='$tgl', 
											tgl_verifikasi	='$tgl_verify', 
											tgl_selesai		='$tgl_done', 
											ket_status		='$ket_status', 
											-- ket				='$ket', 
											status			='$status',
											biaya			= $biaya 
										WHERE id_permintaan	='$id_permintaan'";
		$result = mysqli_query($conn, $sql);

		if ($result) {
		    echo "<script>alert('Data berhasil diubah!');window.location='permintaan.php'</script>";
		} else {
		    echo "Error updating record: " . mysqli_error($conn);
		}
	}

	// hapus data permintaan
	if (isset($_GET['delete_per'])) {
		$id 	= $_GET['delete_per'];
		$sql 	= "DELETE FROM form_perbaikan WHERE id_permintaan='$id'";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			echo "<script>alert('Data berhasil dihapus!');window.location='../page1/permintaan.php'</script>";
		} else {
			echo "Error deleting record: " . mysqli_error($conn);
		}
	}

// upload file 
if (isset($_POST['upload'])) {
	$nama_file 	= trim(mysqli_real_escape_string($conn,$_POST['nama_file']));
	$judul_file = trim(mysqli_real_escape_string($conn,$_POST['judul_file'])); 
	$bidang 	= trim(mysqli_real_escape_string($conn,$_POST['bidang']));
	$tgl 		= trim(mysqli_real_escape_string($conn,$_POST['tgl']));

	$sql = "INSERT INTO upload (judul_file, 
								nama_file, 
								bidang, 
								tgl) 
			VALUE ('$judul_file', 
					'$nama_file', 
					'$bidang', 
					'$tgl')";

	$result = mysqli_query($conn, $sql);

	if ($result) {
		echo "<script>alert('Data berhasil disimpan!');window.location='dokumen.php'</script>";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}	

?> 