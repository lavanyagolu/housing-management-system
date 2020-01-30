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
<a href="aboutus.php"><li>About Us</li></a>
<a href="contact.php"><li>Contact Us</li></a>
</ul>
</div>
<!--Menu ends here -->
<!-- Main Body starts here -->
</nav>
<div class="main">
<div class="wrapper">
<div class="book-house">
<h3>Single Family Hampton Home</h3>
<!-- House details here-->
 <img src = "images/house3.jpg"  />
  
   <span class="house-added">Added on:08/25/2019</span><br/>
   <span class="house-location">Locaton: Morrisville, NC</span><br/>
   <span class="house-price">Price $200000</span>
   <p>
   The Condo is a wonderfully flexible plan with a large task room ideal for hobby or home office space, and a ground floor flex room that can be used as a formal living room or study. The upstairs loft is perfect for a media room. The beautiful kitchen features a large center island with breakfast bar for quick, casual meals. Enhance your living space and add a sunroom for a comfortable retreat filled with natural light.
   
<br/>Type:Condo<br />
Year built:2019<br />
Parking:1 spaces<br />
Lot: 2900 sqft <br />
Price/sqft:$50<br/>
 
To Book the tour for this house please contact Buyer Agent<br/>
<div class="input-group">
      <a href="compose.php"><button type="button" class="btn-book">Contact Buyer Agent</button>
  	</div>
      </p>
</div>






</div>
 </div>

  </body>
</html>