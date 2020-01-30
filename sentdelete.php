<?php 
include('server.php');
 
//getting id of the data from url
$id = $_GET['id'];
 $user = $_SESSION['username']; 
//deleting the row from table
$result = mysqli_query($db, "update messages set to_delete=1 WHERE id=$id");
//redirecting to the display page (index.php in our case)
header("Location:sent.php");
?>