<?php
session_start(); 
  if (isset($_SESSION['userid']))
  {
	$userid = $_SESSION['userid'];
  }
  else
  {
  	header('location: logout.php');
  }
  include('config.php');
  
  if(isset($_POST['bookhouse']))
  {
  	$houseid = $_POST['houseid'];
  	
  	$query1 = "SELECT * FROM bookhouse WHERE UserId ='$userid' AND HouseId='$houseid' AND Status='Active'";
  	$results1 = mysqli_query($db, $query1);
  	if (mysqli_num_rows($results1) > 0) { 
  		$query2 = "UPDATE bookhouse SET Status='Active' WHERE UserId ='$userid' AND HouseId='$houseid'";
  		$results2 = mysqli_query($db, $query2);
	}
	else
	{
		$query3 = "INSERT INTO bookhouse (UserId, HouseId, Status, CreatedAt) VALUES ('$userid', '$houseid', 'Active', NOW())";
		$results3 = mysqli_query($db, $query3);
	}
  }
  
 $query = "SELECT * FROM bookhouse b, house_table h WHERE b.UserId ='$userid' AND b.HouseId = h.house_id AND b.Status='Active'";
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
				   <!--<form method='POST' action='bookhouse.php' style='border: none'>
				   		<input type='hidden' name='houseid' value='$house_id'>
				   		<button type='submit' name='submit' class='btn btn-success'>Book House</button>
				   </form>-->
				   		<a href='propertydetails.php?hid=$house_id'><button type='button' name='view' class='btn btn-success'>View Details</button></a>
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