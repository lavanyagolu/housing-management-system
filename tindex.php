<?php
session_start(); 
  if (isset($_SESSION['userid']))
  {
	$userid = $_SESSION['userid'];
  }
  else
  {
  	$userid = 0;
  }
  
  include('config.php');
  
  $cityquery = "SELECT city FROM house_table WHERE status='Active' GROUP BY city";
  $cityresults = mysqli_query($db, $cityquery);

	if(isset($_POST['searchproperties']))
	{
		$condition = $_POST['condition'];
		$price = $_POST['price'];
		$city = $_POST['city'];
		$bedrooms = $_POST['bedrooms'];
		
		$querycond = "status='Active'";
		
		if($condition == "")
			$querycond .= " AND property_type LIKE '%'";
		else
			$querycond .= " AND property_type LIKE '$condition'";
		
		
		if($price == "")
			$querycond .= " AND price > 0";
		elseif($price == "600")
			$querycond .= " AND price > '500'";
		else
			$querycond .= " AND price < '$price'";
		
		
		if($city == "")
			$querycond .= " AND city LIKE '%'";
		else
			$querycond .= " AND city LIKE '$city'";
		
		
		if($bedrooms == "")
			$querycond .= " AND bedrooms > 0";
		elseif($bedrooms == "6")
			$querycond .= " AND bedrooms > '5'";
		else
			$querycond .= " AND bedrooms = '$bedrooms'";
		
		
		  $query = "SELECT * FROM house_table WHERE $querycond";
		  $results = mysqli_query($db, $query);	
	}
	else
	{
	  $query = "SELECT * FROM house_table WHERE status='Active'";
	  $results = mysqli_query($db, $query);	
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
<?php include('menu.php');?>
<br/>
<form action="" method="post">
	<select name="condition">
  	<option value="">New/Pre-Owned</option>
  	<option value="New" <?php if(isset($_POST['condition'])) { echo ($_POST['condition'] == "New" ? "selected='selected'" : ""); }?>>New</option>
 	<option value="Resale" <?php if(isset($_POST['condition'])) { echo ($_POST['condition'] == "Resale" ? "selected='selected'" : ""); }?>>Resale</option>
    </select>
	<select name="price" >
  	<option value ="">Select price range (millions)</option>
  	<option value="100">less 100</option>
 	<option value="200">less 200</option>
    <option value="300">less 300</option>
	<option value="400">less 400</option>
	<option value="500">less 500</option>
	<option value="600">Above 500</option>
	</select>
	<select name="city" >
  	<option value ="">Select City</option>
  	<?php
  		while($cityrow = mysqli_fetch_assoc($cityresults)) {
  			$cityname = $cityrow['city'];
  			echo "<option value='$cityname'>$cityname</option>";
		}
  	?>
	</select>
	<select name="bedrooms" >
  	<option value="">Select by bedrooms</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
  	<option value="5">5</option>
  	<option value="6">Above 5</option>
	</select>
	<input type="submit" name="searchproperties" value="Search"/>
</form>

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

<div class="main">
<div class="wrapper">


		<h3>Properties</h3>
		<!-- Displaying Recently added houses-->
		<div class="clearfix">

		<?php
		if (mysqli_num_rows($results) > 0) { 
	  		while($row = mysqli_fetch_assoc($results)) {
	  			$property_image = $row['property_image'];
	  			$house_name  = $row['house_name'];
	  			$date_posted  = date("m-d-Y", strtotime($row['date_posted']));
	  			$house_name  = $row['city'].", ".$row['state']; 
	  			$house_id = $row['house_id'];
	    		
	    		echo "<div class='houses'> 
				   <img src='$property_image' />
				   <span class='house-title'>$house_name</span><br/>
				   <span class='house-added'>Added on:09/15/2019</span></span><br/>
				   <span class='house-location'>Locaton: Burlington, NC</span><br/>
				   <form method='POST' action='bookhouse.php' style='border: none'>
				   		<input type='hidden' name='houseid' value='$house_id'>
				   		<button type='submit' name='bookhouse' class='btn btn-success'>Book House</button>
				   </form>
				   </a>
				</div>";
	    			
	    	}
		}
		else
		{
			echo "<h4>No Properties Found</h4>";
		}
		?>

		
	</div>

<!--<h3>Recently Added</h3>-->
<!-- Displaying Recently added houses-->
<!--
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
   <button type="button" class="btn-book">Book House</button>
</div>

<div class="houses"> 
   <img src="images/house3.jpg" />
   <span class="house-title">Condo</span><br/>
   <span class="house-added">Added on:8/25/2019</span></span><br/>
   <span class="house-location">Locaton:Morrisville, NC</span><br/>
   <button type="button" class="btn-book">Book House</button>
</div>


<div class="houses"> 
   <img src="images/house4.jpg" />
   <span class="house-title">Villa</span><br/>
   <span class="house-added">Added on:08/20/2019</span></span><br/>
   <span class="house-location">Locaton:Cary, NC </span><br/>
   <button type="button" class="btn-book">Book House</button>
</div>




</div>
-->
<!--<h3>Luxorious Houses</h3>-->
<!-- Displaying Luxorious houses-->
<!--
<div class="clearfix">

<div class="houses"> 
   <img src="images/lhouse1.jpg" />
   <span class="house-title">Single Family Home </span><br/>
   <span class="house-added">Added on:09/15/2019</span></span><br/>
   <span class="house-location">Locaton: Burlington, NC</span><br/>
   <button type="button" class="btn-book">Book House</button>
</div>

<div class="houses"> 
   <img src="images/lhouse2.jpg" />
   <span class="house-title">Town Home</span><br/>
   <span class="house-added">Added on:08/30/2019</span></span><br/>
   <span class="house-location">Locaton:Mackintosh, Burlinton</span><br/>
   <button type="button" class="btn-book">Book House</button>
</div>

<div class="houses"> 
   <img src="images/lhouse3.jpg" />
   <span class="house-title">Condo</span><br/>
   <span class="house-added">Added on:8/25/2019</span></span><br/>
   <span class="house-location">Locaton:Morrisville, NC</span><br/>
   <button type="button" class="btn-book">Book House</button>
</div>


<div class="houses"> 
   <img src="images/lhouse4.jpg" />
   <span class="house-title">Villa</span><br/>
   <span class="house-added">Added on:08/20/2019</span></span><br/>
   <span class="house-location">Locaton:Cary, NC </span><br/>
   <button type="button" class="btn-book">Book House</button>
</div>




</div>
-->
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