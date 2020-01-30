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
  
        
//getting id of the data from url
$id = $_GET['hid'];
if(!is_numeric($id))
	header('location: index.php');

//deleting the row from table
$qu = mysqli_query($db, "SELECT * FROM house_table WHERE house_id=$id AND status='Active'");

//redirecting to the display page (index.php in our case)
if(mysqli_num_rows($qu) > 0) 
{
		while ($row = mysqli_fetch_assoc($qu)) 
		{
			$hid = $row['house_id'];  
			$house_name = $row['house_name'];  
		  	$house_description = $row['house_description'];
		  	$address = $row['address'];
		  	$state = $row['state'];
		  	$city = $row['city'];
		  	$zipcode = $row['zipcode'];
		  	$bedrooms = $row['bedrooms'];
		  	$bathrooms = $row['bathrooms'];
		  	$price = $row['price'];
		  	$sqft = $row['sqft'];
		  	$property_type = $row['property_type'];
		  	$property_image = $row['property_image'];
		  	$agentid = $row['user_id'];
		}
	}
	else
	{
		//header('location: login.php');
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
<link rel="stylesheet" type="text/css" href="style.css" />
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

	
	<!-- Displaying Recently added houses-->
	<div class="clearfix">
		<div class="col-md-12">
			<div class="col-md-2">&nbsp;</div>
			<div class="col-md-4">
				<img src="<?php echo $property_image; ?>" class="img-responsive">
			</div>
			<div class="col-md-6">&nbsp;</div>
		</div>	
		<div class="col-md-12">
			<div class="col-md-2">
				<h4>Property Name : </h4>
			</div>
			<div class="col-md-4">
				<h4><?php echo $house_name; ?></h4>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-2">
				<h4>Address : </h4>
			</div>
			<div class="col-md-4">
				<h4><?php echo $address; ?></h4>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-2">
				<h4>City : </h4>
			</div>
			<div class="col-md-4">
				<h4><?php echo $city; ?></h4>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-2">
				<h4>State : </h4>
			</div>
			<div class="col-md-4">
				<h4><?php echo $state; ?></h4>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-2">
				<h4>Zip Code : </h4>
			</div>
			<div class="col-md-4">
				<h4><?php echo $zipcode; ?></h4>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-2">
				<h4>Bedrooms : </h4>
			</div>
			<div class="col-md-4">
				<h4><?php echo $bedrooms; ?></h4>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-2">
				<h4>Bathrooms : </h4>
			</div>
			<div class="col-md-4">
				<h4><?php echo $bathrooms; ?></h4>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-2">
				<h4>Property Type : </h4>
			</div>
			<div class="col-md-4">
				<h4><?php echo $property_type; ?></h4>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-2">
				<h4>Area (sq ft.) : </h4>
			</div>
			<div class="col-md-4">
				<h4><?php echo $sqft; ?></h4>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-2">
				<h4>Price (millions) : </h4>
			</div>
			<div class="col-md-4">
				<h4><?php echo $price; ?></h4>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-2">
				<h4>Description : </h4>
			</div>
			<div class="col-md-4">
				<h4 style="text-align: justify"><?php echo $house_description; ?></h4>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-2">
				&nbsp;
			</div>
			<div class="col-md-2">
				<form method='POST' action='bookhouse.php' style='border: none'>
			   		<input type='hidden' name='houseid' value='<?php echo $hid; ?>'>
			   		<button type='submit' name='bookhouse' class='btn btn-success'>Add to wishlist</button>
			   	</form>
			</div>
			<?php
				if($_SESSION['user_type'] == "Buyer")
				{
			?>
			<div class="col-md-2">
				<form method='POST' action='appointment.php' style='border: none'>
			   		<input type='hidden' name='houseid' value='<?php echo $hid; ?>'>
			   		<button type='submit' name='appointment' class='btn btn-success'>Book Appointment</button>
			   	</form>
			</div>
			<?php } ?>
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