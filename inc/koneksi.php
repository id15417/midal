<?php
$servername = "localhost";
$username 	= "root";
$password 	= "";
$database	= "dbpermintaan";	

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Melakukan pengecekan koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi gagal ! :" . mysqli_connect_error();
}

?>

