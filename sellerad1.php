<?php 
session_start();
//require 'datalogin.php';
//require 'server.php';
//session_start(); 

//if (!isset($_SESSION['username'])) {
  //	$_SESSION['msg'] = "You must log in first";
  //	header('location: login.php');
  //}
  //if (isset($_GET['logout'])) {
  //	session_destroy();
  //	unset($_SESSION['username']);
  //	header("location: login.php");
  //}
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8" />
<meta name="author" content="Lavanya Goluguri" />
<meta name="description" content="HOUSING SYSTEM" />
<meta name="keywords" content="Give your key words for SEO" />

<style>
</style>

<title>HOUSING SYSTEM</title>
<!-- ADDING CSS HERE -->
<link rel="stylesheet" type="text/css" href="assets/style.css" />
</head>

<body>
<!-- Header starts here -->
<header class="header">
    <div class="wrapper">
    <h1>HOUSING SYSTEM</h1>
    </div>
</header>
<!--Header ends here -->
<!-- Menu starts here -->
<nav class="menu">
    <div class="wrapper">
        <ul>
            <a href="sellerview.php"><li>HOME</li></a>
            <a href="message.php"><li>Message</li></a>
            <a style="text-decoration:underline" href="index.php">Log Out</a>
            <a href="#">Welcome <?php  if (isset($_SESSION['username'])) : ?>
            <?php echo $_SESSION['username']; ?>
            <?php endif ?></a>
        </ul>
    </div>
<!--Menu ends here -->
<?php
  // Create database connection
  $db = mysqli_connect('localhost','root','','realestate');

  // Initialize message variable
  $msg = "";
  
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
	  
	  for($i=0; $i<count($_FILES['image']['name']);$i++)
	  {
		  $image = $_FILES['image']['name'][$i];
  	      $image_text = mysqli_real_escape_string($db, $_POST['image_text']);
          $target = "images/".basename($image);
		  $sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
  	      mysqli_query($db, $sql);
		  if (move_uploaded_file($_FILES['image']['tmp_name'][$i], $target)) {
  		  $msg = "Image uploaded successfully";
  	       }
		   else{
  		   $msg = "Failed to upload image";
		   }
  	  }
	 
  }
 //$result = mysqli_query($db, "SELECT * FROM images"); 
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
</style>
</head>
<body>
<div id="content">
  //<?php
   // while ($row = mysqli_fetch_array($result)) {
    //  echo "<div id='img_div'>";
    //  	echo "<img src='images/".$row['image']."' >";
    //  	echo "<p>".$row['image_text']."</p>";
    //  echo "</div>";
    //}
  //?>
  <form method="POST" action="sellerad1.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image[]"  multiple>
	</div>
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text" 
      	placeholder="Describe the House , enter intersting details..."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
</div>
</body>
</html>
<!--Main body ends here -->
<!--Footer starts here -->
<br>
<br>
<br>
<footer class="footer">
<div class="wrapper">
<p>&copy; <a href="#">HOUSING SYSTEM</a>. All rights reserved 2019. </p>
</div>
</footer>
<!--Footer ends here -->

</body>
</html>