<?php 

// Koneksi ke database
include 'inc/koneksi.php';

if (isset($_POST['login'])) {
	
	$user	= $_POST['username'];
	$pass	= md5($_POST['password']);
	$query  = mysqli_query($conn, "SELECT * FROM user WHERE username='$user' and password='$pass'");
	
	if (mysqli_num_rows($query) == 0) {
		echo "<script>alert('Username atau Password yang anda masukkan salah!');document.location.href='index.php'</script>";
	} else {
		$row = mysqli_fetch_assoc($query);
		$_SESSION['user_id']	= $row['id_user'];
		$_SESSION['nama']		= $row['nm_lengkap'];
		$_SESSION['username'] 	= $row['username'];
		$_SESSION['level'] 		= $row['level'];

		if ($row['level'] == "admin") {
			echo "<script>alert('Selamat datang Admin');document.location.href='page1/home.php'</script>";
		}
		else if ($row['level'] == "user") {
			echo "<script>alert('Selamat datang User');document.location.href='page0/home.php'</script>";		}
	}
} else {
	"<script>alert('Login Gagal, Coba lagi!');document.location.href='index.php'</script>";
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
		
	}

		/* edit user */
	if (isset($_GET['user_id'])) {
		$id = $_GET['user_id'];
		$result = $mysqli->query("SELECT * FROM user WHERE id_user=$id") or die($mysqli->error());
		if(count($result)==1){
			$row		= $result->fetch_array();
			$nama 		= $row['nm_lengkap'];
			$username 	= $row['username'];
			$password 	= $row['password'];
			$level	 	= $row['level'];

		}
	}

	if (isset($_POST['update'])) {
		$nama 		= $_POST['nm_lengkap'];
		$username 	= $_POST['username'];
		$password 	= $_POST['password'];
		$level	 	= $_POST['level'];

		$mysqli->query("UPDATE user SET nm_lengkap='$nama', username='$username', password='$password', level='$level' WHERE id_user = $id") or die($mysqli->error);

		$_SESSION['message'] 	= "Data Berhasil Diubah!";
		$_SESSION['msg_type']  	= "warning";

		header("location:user.php");
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

		$nama 	= $_POST['kat_perbaikan'];
		$sql = "INSERT INTO kat_perbaikan (kat_perbaikan) VALUES ('$nama')";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			echo "<script>alert('Data berhasil disimpan!');window.location='jenis.php'</script>";
			// header("location:jenis.php");
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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

	// tambah permintaan perbaikan barang/jasa

	if (isset($_POST['add_permintaan'])) {

		$nama			  = $_POST['pegawai'];
		$alat			  = $_POST['permintaan'];
		$bidang 		  = $_POST['bidang'];
		$lokasi			  = $_POST['lokasi'];
		$perbaikan 		  = $_POST['perbaikan'];
		$kerusakan 		  = $_POST['kerusakan'];
		$pengelola		  = $_POST['pengelola'];
		$nm_pk3			  = $_POST['nm_pk3'];
		$tgl			  = $_POST['tgl']; 
		$ket			  = $_POST['ket'];

		$sql = "INSERT INTO form_perbaikan (nm_pegawai, permintaan, bidang, lokasi, pengelola, nm_pk3, tgl, kerusakan, perbaikan, ket) VALUES ('$nama', '$alat', '$bidang', '$lokasi', '$pengelola', '$nm_pk3', '$tgl', '$kerusakan', '$perbaikan', '$ket')";

		$result = mysqli_query($conn, $sql);

		if ($result) {
			echo "<script>alert('Data berhasil disimpan!');window.location='permintaan.php'</script>";
			// header("location:bidang.php");
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

	// hapus data permintaan
	if (isset($_GET['delete_per'])) {
		$id 	= $_GET['delete_per'];
		$sql 	= "DELETE FROM form_perbaikan WHERE id_permintaan='$id'";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			echo "<script>alert('Data berhasil dihapus!');window.location='permintaan.php'</script>";
		} else {
			echo "Error deleting record: " . mysqli_error($conn);
		}
	}

?> 