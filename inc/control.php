<?php 

// Koneksi ke database
include 'koneksi.php'; 

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

	/* Tambah data user */
	if (isset($_POST['add_user'])) {

		$nama 		= $_POST['nm_lengkap'];
		$username 	= $_POST['username'];
		$password 	= sha1($_POST['password']);
		$level	 	= $_POST['level'];
		
		$sql = "INSERT INTO user (nm_lengkap, username, password, level) VALUES ('$nama', '$username', '$password', '$level')";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			
			echo "<script>alert('Data berhasil disimpan!');window.location='user.php'</script>";
			// header("location:bidang.php");
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
	} elseif (isset($_POST['edit_user'])) {
		$id 		= $_POST['id_user'];
		$nama 		= trim(mysqli_real_escape_string($conn,$_POST['nm_lengkap']));
		$username 	= trim(mysqli_real_escape_string($conn,$_POST['username']));
		$password 	= sha1(mysqli_real_escape_string($conn,$_POST['password']));
		$level	 	= trim(mysqli_real_escape_string($conn,$_POST['level']));

		$sql 		= "UPDATE user SET nm_lengkap = '$nama', username='$username', password='$password', level='$level' WHERE id_user='$id'";
		$result 	= mysqli_query($conn, $sql);

		if ($result) {
		    echo "<script>alert('Data berhasil diubah!');window.location='user.php'</script>";
		} else {
		    echo "Error updating record: " . mysqli_error($conn);
		}
	}



	// hapus data user
	if (isset($_GET['delete_user'])) {
		$id = $_GET['delete_user'];
		$sql = "DELETE FROM user WHERE id_user='$id'";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			echo "<script>alert('Data berhasil dihapus!');window.location='user.php'</script>";
		} else {
			echo "Error deleting record: " . mysqli_error($conn);
		}
	}

// =================================== Start Bidang =============================================================

	/* Tambah data bidang */
	if (isset($_POST['add_bidang'])) {

		$nama 	= $_POST['nm_bidang'];
		$sql = "INSERT INTO bidang (nm_bidang) VALUES ('$nama')";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			echo "<script>alert('Data berhasil disimpan!');window.location='bidang.php'</script>";
			// header("location:bidang.php");
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
	} elseif (isset($_POST['edit_bidang'])) {
		$id 	= $_POST['id_bidang'];
		$nama 	= trim(mysqli_real_escape_string($conn,$_POST['nm_bidang']));
		$sql 	= "UPDATE bidang SET nm_bidang = '$nama' WHERE id_bidang='$id'";
		$result = mysqli_query($conn, $sql);

		if ($result) {
		    echo "<script>alert('Data berhasil diubah!');window.location='bidang.php'</script>";
		} else {
		    echo "Error updating record: " . mysqli_error($conn);
		}
	} 

	// hapus data bidang
	if (isset($_GET['delete_bidang'])) {
		$id = $_GET['delete_bidang'];
		$sql = "DELETE FROM bidang WHERE id_bidang='$id'";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<script>alert('Data berhasil dihapus!');window.location='bidang.php'</script>";
			// header("location:bidang.php");
		} else {
			echo "Error deleting record: " . mysqli_error($conn);
		}
		
	} 



// =================================== Start Lokasi =============================================================

	/* Tambah data lokasi  */
	if (isset($_POST['add_lokasi'])) {

		$lokasi		= $_POST['lokasi'];

		$sql = "INSERT INTO sub_bidang (sub_bidang) VALUES ('$lokasi')";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			echo "<script>alert('Data berhasil disimpan!');window.location='lokasi.php'</script>";
			// header("location:lokasi.php");
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	} elseif (isset($_POST['edit_lokasi'])) {
		$id 	= $_POST['id_sub_bidang'];
		$nama 	= trim(mysqli_real_escape_string($conn,$_POST['sub_bidang']));
		$sql 	= "UPDATE sub_bidang SET sub_bidang = '$nama' WHERE id_sub_bidang='$id'";
		$result = mysqli_query($conn, $sql);

		if ($result) {
		    echo "<script>alert('Data berhasil diubah!');window.location='lokasi.php'</script>";
		} else {
		    echo "Error updating record: " . mysqli_error($conn);
		}
	}
		

	// hapus data lokasi
	if (isset($_GET['delete_sub'])) {
		$id = $_GET['delete_sub'];
		$sql = "DELETE FROM sub_bidang WHERE id_sub_bidang='$id'";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			echo "<script>alert('Data berhasil dihapus!');window.location='lokasi.php'</script>";
		} else {
			echo "Error deleting record: " . mysqli_error($conn);
		}
	}


// =================================== Start Bidang =============================================================

	/* Tambah data jenis */
	if (isset($_POST['add_jenis'])) {

		$nama 	= trim(mysqli_real_escape_string($conn,$_POST['kat_perbaikan']));
		$mak 	= trim(mysqli_real_escape_string($conn,$_POST['mak']));
		$sql 	= "INSERT INTO kat_perbaikan (kat_perbaikan, mak) VALUES ('$nama', '$mak')";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			echo "<script>alert('Data berhasil disimpan!');window.location='jenis.php'</script>";
			// header("location:jenis.php");
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
	} elseif (isset($_POST['edit_kategori'])) {
		$id 	= $_POST['id_kat_perbaikan'];
		$nama 	= trim(mysqli_real_escape_string($conn,$_POST['kat_perbaikan']));
		$mak 	= trim(mysqli_real_escape_string($conn,$_POST['mak']));
		$sql 	= "UPDATE kat_perbaikan SET kat_perbaikan = '$nama', mak='$mak' WHERE id_kat_perbaikan='$id'";
		$result = mysqli_query($conn, $sql);

		if ($result) {
		    echo "<script>alert('Data berhasil diubah!');window.location='jenis.php'</script>";
		} else {
		    echo "Error updating record: " . mysqli_error($conn);
		}
	}

	// hapus data bidang
	if (isset($_GET['delete_kat'])) {
		$id = $_GET['delete_kat'];
		$sql = "DELETE FROM kat_perbaikan WHERE id_kat_perbaikan='$id'";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<script>alert('Data berhasil dihapus!');window.location='jenis.php'</script>";
			// header("location:bidang.php");
		} else {
			echo "Error deleting record: " . mysqli_error($conn);
		}
		
	} 

// =================================== Start Pegawai =============================================================

	/* Tambah data pegawai */
	if (isset($_POST['add_pegawai'])) {

		$nama 		= $_POST['nm_pegawai'];
		$jabatan 	= $_POST['jabatan'];
		$nip 		= $_POST['nip'];
		
		$sql = "INSERT INTO pegawai (nm_pegawai, jabatan, nip) VALUES ('$nama', '$jabatan', '$nip')";
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

		$sql 	 = "UPDATE pegawai SET nm_pegawai='$nama', jabatan='$jabatan', nip='$nip' WHERE id_pegawai='$id'";
		$result 	= mysqli_query($conn, $sql);

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

// ======================================= Start Permintaan =============================================================


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