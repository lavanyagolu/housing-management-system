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
<?php
  		if($_SESSION['user_type'] == "Seller")
  		{
  			echo '<a href="sellerview.php"><li>Home</li></a>';
  		}
        elseif($_SESSION['user_type'] == "Buyer")
  		{   
  			echo '<a href="loginindex.php"><li>Home</li></a>';
  		}
        elseif($_SESSION['user_type'] == "admin")
  		{   
  			echo '<a href="adminview.php"><li>Home</li></a>';
  		}
        elseif($_SESSION['user_type'] == "bagent")
  		{   
  			echo '<a href="buyeragentview.php"><li>Home</li></a>';
  		}
        elseif($_SESSION['user_type'] == "sagent")
  		{   
  			echo '<a href="selleragentview.php"><li>Home</li></a>';
  		}
?>
   <a style="text-decoration:underline" href="index.php">Log Out</a>
</ul>
<br />
<br />
<br />
<ul>

<a href="inbox.php"><li>Inbox</li></a>
<a href="sent.php"><li>Sent</li></a>

</ul>
<br/>

</div>
<br/>
<!--Menu ends here -->

<!--Slider starts here -->
<div class="input-group">
	<h1>Send Message:</h1>
		<form action='messageSystem.php' method='POST'>
		<table>
			<tbody>
				<tr>
					<td>To: </td><td><input type='text' name='to' /></td>
				</tr>
              
   	             <tr>
					<td>Subject: </td><td><input type='text' name='subject' /></td>
				</tr>
                 
				<tr>
					<td>Message: </td><td><input type='text' name='message' /></td>
				</tr>
                
				<tr>
               
					<td></td><td><input type='submit' value='Send' name='sendMessage' /></td>
				</tr>
			</tbody>
		</table>
		</form>
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

<footer  class="footer">
<div class="wrapper">
<p>&copy; <a href="#">HOUSING SYSTEM</a>. All rights reserved 2019. </p>
</div>
</footer>
<!--Footer ends here -->

  </body>
</html>