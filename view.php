<?php 
include('server.php');
    if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
		<?php
        
//getting id of the data from url
$id = $_GET['id'];
 $user = $_SESSION['username']; 
//deleting the row from table
$qu = mysqli_query($db, "SELECT * FROM `messages` WHERE id=$id");
mysqli_query($db, "update `messages` set status=0 WHERE `id`=$id and `to`='$user' ");

//redirecting to the display page (index.php in our case)
   
if (mysqli_num_rows($qu) > 0) {
				while ($row = mysqli_fetch_array($qu)) {
echo $row["message"];
//               
//				//	echo '<br/><tr><td>From:'.$row["from"].'</td><td>--</td><td>Message:'.$row["message"].'</td><td>--</td><td>DateTime:'.$row["date"].'</td></tr>';
				}
			}
		?>
