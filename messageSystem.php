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
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8" />
<meta name="author" content="Lavanya Goluguri" />
<meta name="description" content="HOUSING SYSTEM" />
<meta name="keywords" content="Give your key words for SEO" />

<title>HOUSING SYSTEM</title>
<!-- ADDING CSS HERE -->
<link rel="stylesheet" type="text/css" href="assets/style.css" />
<!-- Start WOWSlider.com HEAD section -->
<link rel="stylesheet" type="text/css" href="slider/engine1/style.css" />
<script type="text/javascript" src="slider/engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->
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
<a href="loginindex.php"><li>HOME</li></a>
   <a style="text-decoration:underline" href="index.php">Log Out</a>
</ul>
<br />
<br />
<br />
<ul>

<a href="inbox.php"><li>Inbox</li></a>
<a href="sent.php"><li>Sent</li></a>
<a href="compose.php"><li>Compose</li></a>


</ul>
<br/>

</div>
<br/>
<!--Menu ends here -->

<!--Slider starts here -->
<div class="slider">
<div class="wrapper">
<?php
	if (isSet($_POST['sendMessage'])) {
		if (isSet($_POST['to']) && $_POST['to'] != '' && isSet($_POST['subject']) && $_POST['subject'] != ''&& isSet($_POST['message']) && $_POST['message'] != '') {
			$to = $_POST['to'];
			$from = $_SESSION['username']; 
            $subject = $_POST['subject']; 
			$message = $_POST['message'];
			$q = mysqli_query($db, "INSERT INTO `messages` VALUES (NULL,'$subject','$message', '$to', '$from',Now(),0,0,0)");
			if ($q) {
				echo 'Message sent.';
			}else
				echo 'Failed to send message.';
		}
        else
        echo 'Please enter all fields.';
	}
?>
</div>
</div>
<div class="ws_shadow"></div>
</div>	
<script type="text/javascript" src="slider/engine1/wowslider.js"></script>
<script type="text/javascript" src="slider/engine1/script.js"></script>
<!-- End WOWSlider.com BODY section -->

</div>
</div>


<!--Menu ends here -->




</div>
</div>
 </div>
 <!--Main body ends here -->
<!--Footer starts here -->
<br /> <br /> <br /> <br />
 <br /> <br />  <br /> <br />
 <br /> <br /> <br />
  <br />
  <br /> <br /> <br /> <br />
 <br /> <br />  <br /> <br />
 <br /> <br /> <br />
  <br />
<br /> <br /> <br /> <br />

  <br />
  <br /> <br /> <br /> <br />
 <br /> <br />  
  

<footer  class="footer">
<div class="wrapper">
<p>&copy; <a href="#">HOUSING SYSTEM</a>. All rights reserved 2019. </p>
</div>
</footer>
<!--Footer ends here -->

  </body>
</html>