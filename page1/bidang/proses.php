<?php

session_start();
include '../../inc/koneksi.php';

$id = 0;
$update = false;
$nm_bidang = '';

/* Tambah data bidang */
    if (isset($_POST['add'])) {

        $nama   = $_POST['nm_bidang'];
        $sql    = "INSERT INTO bidang (nm_bidang) VALUES ('$nama')";
        $result = mysqli_query($conn, $sql);

        $_SESSION['message']  = '<i class="fas fa-check"></i> Data berhasil disimpan!';
        $_SESSION['msg_type'] = "success";

        if ($result) {
            // echo "<script>alert('Data berhasil disimpan!');window.location='bidang.php'</script>";
            header("location:bidang.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
    }

    if (isset($_GET['edit'])) {
        $id     = $_GET['edit'];
        $update = true;
        $sql    = "SELECT * FROM bidang WHERE id_bidang='$id'";
        $result = mysqli_query($conn, $sql);

        if (count($result)==1) {
            $row       = mysqli_fetch_array($result);
            $nm_bidang = $row['nm_bidang'];
        }

    } elseif (isset($_POST['update'])) {
        $id         = $_POST['id_bidang'];
        $nm_bidang  = $_POST['nm_bidang'];

        $sql = "UPDATE bidang SET nm_bidang='$nm_bidang' WHERE id_bidang='$id'";
        $result = mysqli_query($conn, $sql);

        $_SESSION['message']  = '<i class="fas fa-check"></i> Data berhasil diubah!';
        $_SESSION['msg_type'] = "info";

        if ($result) {
            header("location:bidang.php");
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }

    // hapus data bidang
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $sql = "DELETE FROM bidang WHERE id_bidang='$id'";

        $_SESSION['message']  = '<i class="fas fa-trash"></i> Data berhasil dihapus!';
        $_SESSION['msg_type'] = "danger";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            // echo "<script>alert('Data berhasil dihapus!');window.location='bidang.php'</script>";
            header("location:bidang.php");
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
        
    }
?>