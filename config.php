<?php
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'realestate');
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>