<?php 
$term = $_GET['term'];
// buat database dan table provinsi
$query = "SELECT * FROM pegawai WHERE nm_pegawai LIKE '%$term%' LIMIT 5";
$link = mysqli_connect('localhost', 'root', '', 'dbpermintaan');
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_array($result))
{
    $data[] = array('id'=>$row['id_pegawai'],'label'=>$row['nm_pegawai'],'value'=>$row['nm_pegawai']);
}
echo json_encode($data);
?>