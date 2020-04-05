<?php 
	include 'control.php';
	
	session_start();
	session_destroy();

	header ("location:index.php");

 ?>