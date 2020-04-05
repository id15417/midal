<?php 

session_start();

include '../../inc/koneksi.php';

$id = 0;
$update = false;
$sub_bidang='';

/* Tambah data lokasi  */
	if (isset($_POST['add'])) {

		$lokasi	= $_POST['lokasi'];
		$sql 	= "INSERT INTO sub_bidang (sub_bidang) VALUES ('$lokasi')";
		$result = mysqli_query($conn, $sql);

		$_SESSION['message']  = '<i class="fas fa-check"></i> Data berhasil disimpan!';
        $_SESSION['msg_type'] = "success";

		if ($result) {
			// echo "<script>alert('Data berhasil disimpan!');window.location='lokasi.php'</script>";
			header("location:lokasi.php");
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

	if (isset($_GET['edit'])) {

		$id 	= $_GET['edit'];
		$update = true;
		$sql 	= "SELECT * FROM sub_bidang WHERE id_sub_bidang='$id'";
		$result = mysqli_query($conn, $sql);

		if (count($result)==1) {
            $row       = mysqli_fetch_array($result);
            $sub_bidang = $row['sub_bidang'];
        }
	} elseif (isset($_POST['update'])) {
        $id          = $_POST['sub_bidang'];
        $sub_bidang  = $_POST['lokasi'];

        $sql = "UPDATE sub_bidang SET sub_bidang='$sub_bidang' WHERE id_sub_bidang='$id'";
        $result = mysqli_query($conn, $sql);

        $_SESSION['message']  = '<i class="fas fa-check"></i> Data berhasil diubah!';
        $_SESSION['msg_type'] = "info";

        if ($result) {
            header("location:lokasi.php");
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }
		
	// hapus data lokasi
	if (isset($_GET['delete'])) {

		$id 	= $_GET['delete'];
		$sql 	= "DELETE FROM sub_bidang WHERE id_sub_bidang='$id'";
		$result = mysqli_query($conn, $sql);

		$_SESSION['message']  = '<i class="fas fa-trash"></i> Data berhasil dihapus!';
        $_SESSION['msg_type'] = "danger";

		if ($result) {
			// echo "<script>alert('Data berhasil dihapus!');window.location='lokasi.php'</script>";
			header("location:lokasi.php");
		} else {
			echo "Error deleting record: " . mysqli_error($conn);
		}
	}

?>