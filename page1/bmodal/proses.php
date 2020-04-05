<?php
session_start();
include '../../inc/koneksi.php';

if (isset($_POST['add'])) {
    
    $pegawai	   = trim(mysqli_real_escape_string($conn,$_POST['pegawai']));
	$sub_bidang    = trim(mysqli_real_escape_string($conn,$_POST['sub_bidang']));
	$kat_perbaikan = trim(mysqli_real_escape_string($conn,$_POST['kat_perbaikan']));
    $bmodal        = trim(mysqli_real_escape_string($conn,$_POST['bmodal']));
    $tgl           = trim(mysqli_real_escape_string($conn,$_POST['tgl']));
    $ket           = trim(mysqli_real_escape_string($conn,$_POST['ket']));
    $statuspost    = trim(mysqli_real_escape_string($conn,$_POST['status_post']));
    
    $sql = "INSERT INTO belanja_modal (id_pegawai, 
                                       id_sub_bidang, 
                                       id_kat_perbaikan, 
                                       bmodal, 
                                       tgl, 
                                       ket, 
                                       status_post) 
            VALUES ('$pegawai', 
                    '$sub_bidang', 
                    '$kat_perbaikan', 
                    '$bmodal', 
                    '$tgl', 
                    '$ket', 
                    '$statuspost')";
                    
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Data berhasil disimpan!');window.location='b_modal.php'</script>";
        // header("location:bidang.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} elseif (isset($_POST['edit'])) {

    $id            = trim(mysqli_real_escape_string($conn,$_POST['id_bmodal']));
    $pegawai	   = trim(mysqli_real_escape_string($conn,$_POST['pegawai']));
	$sub_bidang    = trim(mysqli_real_escape_string($conn,$_POST['sub_bidang']));
	$kat_perbaikan = trim(mysqli_real_escape_string($conn,$_POST['kat_perbaikan']));
    $bmodal        = trim(mysqli_real_escape_string($conn,$_POST['bmodal']));
    $tgl           = trim(mysqli_real_escape_string($conn,$_POST['tgl']));
    $ket           = trim(mysqli_real_escape_string($conn,$_POST['ket']));
    $statuspost    = trim(mysqli_real_escape_string($conn,$_POST['status_post']));

    $sql = "UPDATE belanja_modal 
            SET    id_pegawai		='$pegawai', 
                   id_sub_bidang    ='$sub_bidang', 
                   id_kat_perbaikan ='$kat_perbaikan', 
                   bmodal		    ='$bmodal',  
                   tgl			    ='$tgl',  
                   ket			    ='$ket', 
                   status_post	    ='$statuspost'
            WHERE  id_bmodal        ='$id'";
    $result = mysqli_query($conn, $sql);

    $_SESSION['message']  = '<i class="fas fa-check"></i> Data berhasil diubah!';
    $_SESSION['msg_type'] = "info";

    if ($result) {
        header("location:b_modal.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Delete data belanja modal
if (isset($_GET['id'])) {
    $id 	= $_GET['id'];
    $sql 	= "DELETE FROM belanja_modal WHERE id_bmodal='$id'";
    $result = mysqli_query($conn, $sql);

    $_SESSION['message']  = '<i class="fas fa-trash"></i> Data berhasil dihapus!';
    $_SESSION['msg_type'] = "danger";

    if ($result) {
        header("location:b_modal.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}