<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "realestate";

	$conn=new mysqli($servername, $username, $password, $db);
	
    if($conn->connect_error)
		die('Connect Error');
?>
