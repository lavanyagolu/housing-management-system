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
<a href="index.php"><li>HOME</li></a>
<a href="aboutus.php"><li>About Us</li></a>
<a href="contact.php"><li>Contact Us</li></a>
<a href="agentlogin.php"><li>Agent</li></a>
<a href="sellerlogin.php"><li>Seller</li></a>
<a href="login1.php"><li>Log In</li></a>
</ul>

<br/>
<form action="categorysearch.php" method="post">
	<select name="condition">
  	<option value="cond">New/Pre-Owned</option>
  	<option value="new">New</option>
 	<option value="used">Resale</option>
    </select>
	<select name="price" >
  	<option value ="price">Select price range</option>
  	<option value="1">100000</option>
 	<option value="2">100000-200000</option>
    <option value="3">200000-500000</option>
	<option value="4">500000- 1 millon</option>
	<option value="5">Above 1 million"</option>
	</select>
	<select name="city" >
  	<option value ="city">Select City</option>
	<option value="winston-salem">winston-salem</option>
	<option value="Burlington">Burlington</option>
  	<option value="Greensboro">Greensboro</option>
	<option value="Raleigh">Raleigh</option>
	<option value="Durham">Durham</option>
	<option value="Chapel hill">Chapel hill</option>
	<option value="Charlotte">Charlotte</option>
	<option value="Cary">Cary </option>
	</select>
	<select name="bedrooms" >
  	<option value ="pr">Select by bedrooms</option>
	<option value="1">1</option>
	<option value="2">2-3</option>
	<option value="3">4-5</option>-5</option>
  	<option value="4">6 and above </option>
	</select>
	<input type="submit" value="Search"/>
</form>
</div>
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
   <a href="login1.php"><button type="button" class="btn-book">Book House</button>
   </a>
</div>

<div class="houses"> 
   <img src="images/house2.jpg" />
   <span class="house-title">Town Home</span><br/>
   <span class="house-added">Added on:08/30/2019</span></span><br/>
   <span class="house-location">Locaton:Mackintosh, Burlinton</span><br/>
   <a href="login1.php"><button type="button" class="btn-book">Book House</button>
</div>

<div class="houses"> 
   <img src="images/house3.jpg" />
   <span class="house-title">Condo</span><br/>
   <span class="house-added">Added on:8/25/2019</span></span><br/>
   <span class="house-location">Locaton:Morrisville, NC</span><br/>
   <a href="login1.php"><button type="button" class="btn-book">Book House</button>
</div>


<div class="houses"> 
   <img src="images/house4.jpg" />
   <span class="house-title">Villa</span><br/>
   <span class="house-added">Added on:08/20/2019</span></span><br/>
   <span class="house-location">Locaton:Cary, NC </span><br/>
   <a href="login1.php"><button type="button" class="btn-book">Book House</button>
</div>




</div>
<h3>Luxorious Houses</h3>
<!-- Displaying Luxorious houses-->
<div class="clearfix">

<div class="houses"> 
   <img src="images/house_2.jpg" />
   <span class="house-title">Single Family Home </span><br/>
   <span class="house-added">Added on:09/15/2019</span></span><br/>
   <span class="house-location">Locaton: Burlington, NC</span><br/>
   <a href="login1.php"><button type="button" class="btn-book">Book House</button>
</div>

<div class="houses"> 
   <img src="images/house_3.jpg" />
   <span class="house-title">Town Home</span><br/>
   <span class="house-added">Added on:08/30/2019</span></span><br/>
   <span class="house-location">Locaton:Mackintosh, Burlinton</span><br/>
   <a href="login1.php"><button type="button" class="btn-book">Book House</button>
</div>

<div class="houses"> 
   <img src="images/house_4.jpg" />
   <span class="house-title">Villa</span><br/>
   <span class="house-added">Added on:8/25/2019</span></span><br/>
   <span class="house-location">Locaton:Morrisville, NC</span><br/>
  <a href="login1.php"><button type="button" class="btn-book">Book House</button>
</div>


<div class="houses"> 
   <img src="images/house_5.jpg" />
   <span class="house-title">Villa</span><br/>
   <span class="house-added">Added on:08/20/2019</span></span><br/>
   <span class="house-location">Locaton:Cary, NC </span><br/>
  <a href="login1.php"><button type="button" class="btn-book">Book House</button>
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