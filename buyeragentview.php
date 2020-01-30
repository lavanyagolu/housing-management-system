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
<a href="buyeragentview.php"><li>Home</li></a>
<a href="propertytours.php"><li>Property Tours</li></a>
<a href="educatebuyer.html"><li>Educate Buyer</li></a>
<a href="balisting.php"><li>Active and Closed listing</li></a>
<a href="message.php"><li>Message</li></a>
<a style="text-decoration:underline" href="index.php">Log Out</a>
<a href="#">Welcome <?php  if (isset($_SESSION['username'])) : ?>
  '<?php echo $_SESSION['username']; ?>'
  <?php endif ?></a>

</ul>

<br/>

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
  <br /><br /> 
<footer  class="footer">
<div class="wrapper">
<p>&copy; <a href="#">HOUSING SYSTEM</a>. All rights reserved 2019. </p>
</div>
</footer>
<!--Footer ends here -->

  </body>
</html>