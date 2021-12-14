<?php
	$conn = new mysqli("localhost","root","","edueasydb");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}
?>