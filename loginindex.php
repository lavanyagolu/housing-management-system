<?php 
  session_start(); 
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
<a href="aboutus.php"><li>About Us</li></a>
<a href="contact.php"><li>Contact Us</li></a>
<a href="message.php"><li>Message</li></a>
   <a style="text-decoration:underline" href="index.php">Log Out</a>
   <a href="#">Welcome <?php  if (isset($_SESSION['username'])) : ?>
    '<?php echo $_SESSION['username']; ?>'
     <?php endif ?></a>


<a href="index1.php"><li>Search</li></a>
</ul>

<br/>

<br/>
<!--Menu ends here -->

<!--Slider starts here -->
<div class="slider">
<div class="wrapper">
<!-- Start WOWSlider.com BODY section -->
<div id="wowslider-container1">
<div class="ws_images"><ul>
		<li><img src="slider/data1/images/lhouse2.jpg" alt="" title="" id="wows1_0"/></li>
		<li><img src="slider/data1/images/lhouse2_0.jpg" alt="" title="" id="wows1_1"/></li>
		<li><img src="slider/data1/images/lhouse3.jpg" alt="" title="" id="wows1_2"/></li>
		<li><img src="slider/data1/images/lhouse4.jpg" alt="" title="" id="wows1_3"/></li>
		<li><img src="slider/data1/images/lhouse5.jpg" alt="" title="" id="wows1_4"/></li>
		<li><img src="slider/data1/images/house1.jpg" alt="" title="" id="wows1_5"/></li>
		<li><img src="slider/data1/images/house2.jpg" alt="" title="" id="wows1_6"/></li>
		<li><img src="slider/data1/images/house3.jpg" alt="" title="" id="wows1_7"/></li>
		<li><img src="slider/data1/images/house4.jpg" alt="" title="" id="wows1_8"/></li>
		<li><a href="http://wowslider.net"><img src="data1/images/house5.jpg" alt="css image gallery" title="" id="wows1_9"/></a></li>
		<li><img src="data1/images/lhouse1.jpg" alt="Housing System" title="Housing System" id="wows1_10"/></li>
	</ul></div>
	<div class="ws_bullets"><div>
		<a href="#" title=""><span><img src="slider/data1/tooltips/lhouse2.jpg" alt=""/>1</span></a>
		<a href="#" title=""><span><img src="slider/data1/tooltips/lhouse2_0.jpg" alt=""/>2</span></a>
		<a href="#" title=""><span><img src="slider/data1/tooltips/lhouse3.jpg" alt=""/>3</span></a>
		<a href="#" title=""><span><img src="slider/data1/tooltips/lhouse4.jpg" alt=""/>4</span></a>
		<a href="#" title=""><span><img src="slider/data1/tooltips/lhouse5.jpg" alt=""/>5</span></a>
		<a href="#" title=""><span><img src="slider/data1/tooltips/house1.jpg" alt=""/>6</span></a>
		<a href="#" title=""><span><img src="slider/data1/tooltips/house2.jpg" alt=""/>7</span></a>
		<a href="#" title=""><span><img src="slider/data1/tooltips/house3.jpg" alt=""/>8</span></a>
		<a href="#" title=""><span><img src="slider/data1/tooltips/house4.jpg" alt=""/>9</span></a>
		<a href="#" title=""><span><img src="slider/data1/tooltips/house5.jpg" alt=""/>10</span></a>
		<a href="#" title="Housing System"><span><img src="data1/tooltips/lhouse1.jpg" alt="Housing System"/>11</span></a>
	</div></div>
<div class="ws_shadow"></div>
</div>	
<script type="text/javascript" src="slider/engine1/wowslider.js"></script>
<script type="text/javascript" src="slider/engine1/script.js"></script>
<!-- End WOWSlider.com BODY section -->

</div>
</div>


<!--Menu ends here -->

<!-- Main Body starts here -->
</nav>
<div class="main">
<div class="wrapper">
<h3>Recently Added</h3>
<!-- Displaying Recently added houses-->
<div class="clearfix">

<div class="houses"> 
   <img src="images/house1.jpg" />
   <span class="house-title">Single Family Home </span><br/>
   <span class="house-added">Added on:09/15/2019</span></span><br/>
   <span class="house-location">Locaton: Burlington, NC</span><br/>
   <a href="book.php"><button type="button" class="btn-book">Book House</button>
   </a>
</div>

<div class="houses"> 
   <img src="images/house2.jpg" />
   <span class="house-title">Town Home</span><br/>
   <span class="house-added">Added on:08/30/2019</span></span><br/>
   <span class="house-location">Locaton:Mackintosh, Burlinton</span><br/>
   <a href="book1.php"><button type="button" class="btn-book">Book House</button>
</div>

<div class="houses"> 
   <img src="images/house3.jpg" />
   <span class="house-title">Condo</span><br/>
   <span class="house-added">Added on:8/25/2019</span></span><br/>
   <span class="house-location">Locaton:Morrisville, NC</span><br/>
   <a href="book2.php"><button type="button" class="btn-book">Book House</button>
</div>


<div class="houses"> 
   <img src="images/house4.jpg" />
   <span class="house-title">Villa</span><br/>
   <span class="house-added">Added on:08/20/2019</span></span><br/>
   <span class="house-location">Locaton:Cary, NC </span><br/>
   <a href="book3.php"><button type="button" class="btn-book">Book House</button>
</div>




</div>
<h3>Luxorious Houses</h3>
<!-- Displaying Luxorious houses-->
<div class="clearfix">

<div class="houses"> 
   <img src="images/house_1.jpg" />
   <span class="house-title">Villa </span><br/>
   <span class="house-added">Added on:09/15/2019</span></span><br/>
   <span class="house-location">Locaton: Burlington, NC</span><br/>
  <a href="book4.php"><button type="button" class="btn-book">Book House</button>
</div>

<div class="houses"> 
   <img src="images/house_3.jpg" />
   <span class="house-title">Estate</span><br/>
   <span class="house-added">Added on:08/30/2019</span></span><br/>
   <span class="house-location">Locaton:Mackintosh, Burlinton</span><br/>
    <a href="book5.php"><button type="button" class="btn-book">Book House</button>
</div>

<div class="houses"> 
   <img src="images/house_4.jpg" />
   <span class="house-title">Modern Home</span><br/>
   <span class="house-added">Added on:8/25/2019</span></span><br/>
   <span class="house-location">Locaton:Morrisville, NC</span><br/>
    <a href="book6.php"><button type="button" class="btn-book">Book House</button>
</div>


<div class="houses"> 
   <img src="images/house_5.jpg" />
   <span class="house-title">Contemporary House</span><br/>
   <span class="house-added">Added on:08/20/2019</span></span><br/>
   <span class="house-location">Locaton:Cary, NC </span><br/>
    <a href="book7.php"><button type="button" class="btn-book">Book House</button>
</div>




</div>
</div>
 </div>
 <!--Main body ends here -->
<!--Footer starts here -->
<footer  class="footer">
<div class="wrapper">
<p>&copy; <a href="#">HOUSING SYSTEM</a>. All rights reserved 2019. </p>
</div>
</footer>
<!--Footer ends here -->

  </body>
</html>