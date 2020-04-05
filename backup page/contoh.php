<body>
 
	<h2>Tampil Data Kategori</h2>
	<?php
	$sql = mysql_query("SELECT * FROM kategori ORDER BY kategori_nama ASC");
	if(mysql_num_rows($sql) != 0){
		echo '<ul>';
		while($row = mysql_fetch_assoc($sql)){
			$kat_id = $row['kategori_id'];
			$sql2 = mysql_query("SELECT * FROM sub_kategori WHERE kategori_id='$kat_id'");
 
			echo '<li>'.$row['kategori_nama'];
				echo '<ul>';
					while($row2 = mysql_fetch_assoc($sql2)){
						echo '<li>'.$row2['sub_nama'].'</li>';
					}
				echo '</ul>';
			echo '</li>';
		}
		echo '</ul>';
	}
	?>
 
</body>