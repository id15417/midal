<?php
include '../../inc/koneksi.php';

if (isset($_POST['add_bmodal'])) {
    $id_pegawai		    = trim(mysqli_real_escape_string($conn,$_POST['pegawai']));
	$id_sub_bidang 	    = trim(mysqli_real_escape_string($conn,$_POST['sub_bidang']));
	$id_kat_perbaikan   = trim(mysqli_real_escape_string($conn,$_POST['kat_perbaikan']));
    $bmodal             = trim(mysqli_real_escape_string($conn,$_POST['bmodal']));
    $tgl                = trim(mysqli_real_escape_string($conn,$_POST['tgl']));
    $ket                = trim(mysqli_real_escape_string($conn,$_POST['ket']));
    
    $sql = "INSERT INTO belanja_modal (id_pegawai, 
                                       id_sub_bidang, 
                                       id_kat_perbaikan, 
                                       bmodal, 
                                       tgl, 
                                       ket) 
            VALUES ('$id_pegawai', 
                    '$id_sub_bidang', 
                    '$id_kat_perbaikan', 
                    '$bmodal', 
                    '$tgl', 
                    '$ket')";
                    
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Data berhasil disimpan!');window.location='b_modal.php'</script>";
        // header("location:bidang.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} elseif (isset($_POST['edit'])) {

    $id_pegawai		    = trim(mysqli_real_escape_string($conn,$_POST['pegawai']));
	$id_sub_bidang 	    = trim(mysqli_real_escape_string($conn,$_POST['sub_bidang']));
	$id_kat_perbaikan   = trim(mysqli_real_escape_string($conn,$_POST['kat_perbaikan']));
    $bmodal             = trim(mysqli_real_escape_string($conn,$_POST['bmodal']));
    $tgl                = trim(mysqli_real_escape_string($conn,$_POST['tgl']));
    $ket                = trim(mysqli_real_escape_string($conn,$_POST['ket']));
    $status             = trim(mysqli_real_escape_string($conn,$_POST['status']));

    $sql 	= "UPDATE form_perbaikan SET  
                                        id_bidang		='$id_bidang', 
                                        id_pegawai		='$id_pegawai', 
                                        id_sub_bidang	='$id_sub_bidang', 
                                        id_kat_perbaikan='$id_kat_perbaikan', 
                                        permintaan		='$permintaan', 
                                        pengelola		='$pengelola', 
                                        nm_pk3			='$nm_pk3', 
                                        tgl				='$tgl', 
                                        tgl_verifikasi	='$tgl_verify', 
                                        tgl_selesai		='$tgl_done', 
                                        ket_status		='$ket_status', 
                                        ket				='$ket', 
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

// Delete data belanja modal
if (isset($_GET['id'])) {
    $id 	= $_GET['id'];
    $sql 	= "DELETE FROM belanja_modal WHERE id_bmodal='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus!');window.location='../b_modal.php'</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}