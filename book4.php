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
<nav class="menu">
<div class="wrapper">
<ul>
<a href="loginindex.php"><li>HOME</li></a>
<a href="aboutus.php"><li>About Us</li></a>
<a href="contact.php"><li>Contact Us</li></a>
</ul>
</div>
<!-- ADDING CSS HERE -->
<link rel="stylesheet" type="text/css" href="assets/style.css" />
<!-- Start WOWSlider.com HEAD section -->
<link rel="stylesheet" type="text/css" href="slider/engine1/style.css" />
<script type="text/javascript" src="slider/engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->
</head>

<body>
</nav>
</nav>
<div class="main">
<div class="wrapper">
<div class="book-house">
<h3>Villa</h3>
<!-- Header starts here -->
<header class="header">
<div class="wrapper">
<!-- Start WOWSlider.com BODY section -->
<div id="wowslider-container1">
<div class="ws_images"><ul>
		<li><img src="slider/data1/images/house_1.jpg" alt="house_1" title="house_1" id="wows1_0"/></li>
		<li><img src="slider/data1/images/bedroom.jpg" alt="bedroom" title="bedroom" id="wows1_1"/></li>
		<li><img src="slider/data1/images/hall.jpg" alt="hall" title="hall" id="wows1_2"/></li>
		<li><img src="slider/data1/images/kitchen.jpg" alt="kitchen" title="kitchen" id="wows1_3"/></li>
		<li><img src="slider/data1/images/plan.jpg" alt="plan" title="plan" id="wows1_5"/></li>
	</ul></div>
	<div class="ws_bullets"><div>
		<a href="#" title="house_1"><span><img src="slider/data1/tooltips/house_1.jpg" alt="house_1"/>1</span></a>
		<a href="#" title="bedroom"><span><img src="slider/data1/tooltips/bedroom.jpg" alt="bedroom"/>2</span></a>
		<a href="#" title="hall"><span><img src="slider/data1/tooltips/hall.jpg" alt="hall"/>3</span></a>
		<a href="#" title="kitchen"><span><img src="slider/data1/tooltips/kitchen.jpg" alt="kitchen"/>4</span></a>
		<a href="#" title="plan"><span><img src="slider/data1/tooltips/plan.jpg" alt="plan"/>6</span></a>
	</div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">responsive slider</a> by WOWSlider.com v8.8</div>
<div class="ws_shadow"></div>
</div>	
<script type="text/javascript" src="slider/engine1/wowslider.js"></script>
<script type="text/javascript" src="slider/engine1/script.js"></script>
<!-- End WOWSlider.com BODY section -->
<!-- End WOWSlider.com BODY section -->
</div>
</header>
<!-- House details here-->
 <img src = "images/house_1.jpg"  />
  
   <span class="house-added">Added on:09/15/2019</span><br/>
   <span class="house-location">Locaton: Burlington, NC</span><br/>
   <span class="house-price">Price $600000</span>
   <p>
   The Villa is a wonderfully flexible plan with a large task room ideal for hobby or home office space, and a ground floor flex room that can be used as a formal living room or study. The upstairs loft is perfect for a media room. The beautiful kitchen features a large center island with breakfast bar for quick, casual meals. Enhance your living space and add a sunroom for a comfortable retreat filled with natural light.
   
<br/>Type:Villa<br />
Year built:2019<br />
Parking:6 spaces<br />
Lot: 10000 sqft <br />
Price/sqft:$100<br/>
 
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