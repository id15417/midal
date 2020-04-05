<?php
    include "koneksi.php";
   
   	$id = $_POST['id_bidang']
    $mysql_query="select * from sub_bidang where id_bidang='$id'";
    $q=mysql_query($mysql_query);
    while($row=mysqli_fetch_array($q)){
?>
        <option value="<?php echo $row["id_sub_bidang"]; ?>"><?php echo $row["sub_bidang"]; ?></option><br>
   
    <?php
    }
	?>