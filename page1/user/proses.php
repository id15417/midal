<?php 

session_start();
include '../../inc/koneksi.php';



$update = false;

/* Tambah data user */
	if (isset($_POST['add'])) {

		$nama 		= $_POST['nm_lengkap'];
		$username 	= $_POST['username'];
		$password 	= sha1($_POST['password']);
		$level	 	= $_POST['level'];
		
		$sql = "INSERT INTO user (nm_lengkap, username, password, level) VALUES ('$nama', '$username', '$password', '$level')";
		$result = mysqli_query($conn, $sql);

		$_SESSION['message']  = '<i class="fas fa-check"></i> Data berhasil disimpan!';
        $_SESSION['msg_type'] = "success";

		if ($result) {
			
			// echo "<script>alert('Data berhasil disimpan!');window.location='user.php'</script>";
			header("location:user.php");
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
	} 

	if (isset($_GET['edit'])) {

		$id 		= $_GET['edit'];
		$update 	= true;
		$sql 		= "SELECT * FROM user WHERE id_user='$id'";
		$result 	= mysqli_query($conn, $sql);

		if (count($result)==1) {
            $row        = mysqli_fetch_array($result);
            $nama 		= $row['nm_lengkap'];
			$username  	= $row['username'];
			$password 	= $row['password'];
			$level	 	= $row['level'];
        }
	} elseif (isset($_POST['update'])) {
        $id         = $_POST['id_user'];
        $nama 		= $_POST['nm_lengkap'];
		$username 	= $_POST['username'];
		$password 	= sha1($_POST['password']);
		$level	 	= $_POST['level'];

        $sql = "UPDATE user SET nm_lengkap='$nama', username='$username', password='$password', level='$level' WHERE id_user='$id'";
        $result = mysqli_query($conn, $sql);

        $_SESSION['message']  = '<i class="fas fa-check"></i> Data berhasil diubah!';
        $_SESSION['msg_type'] = "info";

        if ($result) {
            header("location:user.php");
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }

	// hapus data user
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "DELETE FROM user WHERE id_user='$id'";
		$result = mysqli_query($conn, $sql);

		$_SESSION['message']  = '<i class="fas fa-trash"></i> Data berhasil dihapus!';
        $_SESSION['msg_type'] = "danger";

		if ($result) {
			// echo "<script>alert('Data berhasil dihapus!');window.location='user.php'</script>";
			header("location:user.php");
		} else {
			echo "Error deleting record: " . mysqli_error($conn);
		}
	}
?>