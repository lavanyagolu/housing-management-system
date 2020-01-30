<?php
session_start(); 
  if (isset($_SESSION['userid']))
  {
	$userid = $_SESSION['userid'];
	if($_SESSION['user_type'] == "Buyer")
	{
		header('location: logout.php');
	}
  }
  else
  {
  	header('location: logout.php');
  }
  include('config.php');
  
  $query = "SELECT * FROM house_table WHERE user_id='$userid' AND status='Active'";
  $results = mysqli_query($db, $query);
  	
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
<link rel="stylesheet" type="text/css" href="style.css">
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

<br/>
<!--Menu ends here -->


<!--Menu ends here -->

<!-- Main Body starts here -->

<div class="main">
	<div class="wrapper">
		
		<div class="float-right">
			<a href="addproperty.php"><p class="btn btn-success">Add Property</p></a>
		</div>
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
		?>

		
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