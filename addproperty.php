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
	
try{
  $error = "";
  if(isset($_POST['submit']))
  {
  	$house_name = mysqli_real_escape_string($db, $_POST['house_name']);  
  	$house_description = mysqli_real_escape_string($db, $_POST['house_description']);
  	$address = mysqli_real_escape_string($db, $_POST['address']);
  	$state = mysqli_real_escape_string($db, $_POST['state']);
  	$city = mysqli_real_escape_string($db, $_POST['city']);
  	$zipcode = mysqli_real_escape_string($db, $_POST['zipcode']);
  	$bedrooms = mysqli_real_escape_string($db, $_POST['bedrooms']);
  	$bathrooms = mysqli_real_escape_string($db, $_POST['bathrooms']);
  	$price = mysqli_real_escape_string($db, $_POST['price']);
  	$sqft = mysqli_real_escape_string($db, $_POST['sqft']);
  	$property_type = mysqli_real_escape_string($db, $_POST['property_type']);
  	
  	if(empty($house_name)) 
  	{ 
  		$error = "Please fill Property Name";
  	}
  	elseif(empty($house_description)) 
  	{ 
  		$error = "Please fill Description";
  	}
  	elseif(empty($address)) 
  	{ 
  		$error = "Please fill Address";
  	}
  	elseif(empty($city)) 
  	{ 
  		$error = "Please fill City";
  	}
  	elseif(empty($state)) 
  	{ 
  		$error = "Please fill State";
  	}
  	elseif(empty($zipcode)) 
  	{ 
  		$error = "Please fill Zip Code";
  	}
  	elseif(empty($bedrooms)) 
  	{ 
  		$error = "Please fill No. of Bedrooms ";
  	}
  	elseif(empty($bathrooms)) 
  	{ 
  		$error = "Please fill No. of Bathrooms ";
  	}
  	elseif(empty($price)) 
  	{ 
  		$error = "Please fill Price in millions";
  	}
  	elseif(empty($sqft)) 
  	{ 
  		$error = "Please fill Area in sq ft.";
  	}
  	if($error == "")
  	{
	  	$target_dir = "propertypics/";
		$target_file = $target_dir .time() . '_' . basename($_FILES["pic"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		
		    $check = getimagesize($_FILES["pic"]["tmp_name"]);
		    if($check !== false) 
		    {
		        // Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
				{
				    $error = "Sorry, only JPG, JPEG & PNG files are allowed.";
				}
				else
				{
					if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) 
					{
						$query = "INSERT INTO house_table (house_name, house_description, address, city, state, zipcode, bedrooms, bathrooms, price, sqft, property_type, date_posted, user_id, status, property_image) VALUES ('$house_name', '$house_description', '$address', '$city', '$state', '$zipcode', '$bedrooms', '$bathrooms', '$price', '$sqft', '$property_type', NOW(), '$userid', 'Active', '$target_file')";
					  
		  				$result = mysqli_query($db, $query);
		  				//print_r($result);
		  				$error = "Property added successfully";
						
				    } else {
				        $error = "Sorry, there was an error uploading your file.";
				    }
				}
		    } else {
		        $error = "Invalid pic.";
		    }
	}	
  	
  	
  }

}
catch(Exception $e)
{
	print_r($e);
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
			<a href="properties.php"><p class="btn btn-success">Properties</p></a>
		</div>
		<h3>Add Property</h3>
		<!-- Displaying Recently added houses-->
		<div class="clearfix">

			<form method="post" action="" enctype="multipart/form-data">
			  	<?php 
			  		if($error != "")
			  			echo "<p>".$error."</p>";
			  	?>
				<div class="input-group">
			  	  <label>Property Name</label>
			  	  <input type="text" name="house_name" value="<?php echo (isset($_POST['house_name'] ) ? $_POST['house_name'] : ''); ?>" required="true">
			  	</div>
				<div class="input-group">
			  	  <label>Description</label>
			  	  <textarea name="house_description" required="true"><?php echo (isset($_POST['house_description'] ) ? $_POST['house_description'] : ''); ?></textarea>
			  	</div>
			  	
				<div class="input-group">
			  	  <label>Address</label>
			  	  <input type="text" name="address" value="<?php echo (isset($_POST['address'] ) ? $_POST['address'] : ''); ?>" required="true">
			  	</div>
			  	
				<div class="input-group">
			  	  <label>City</label>
			  	  <input type="text" name="city" value="<?php echo (isset($_POST['city'] ) ? $_POST['city'] : ''); ?>" required="true">
			  	</div>
			  	
				<div class="input-group">
			  	  <label>State</label>
			  	  <input type="text" name="state" value="<?php echo (isset($_POST['state'] ) ? $_POST['state'] : ''); ?>" required="true">
			  	</div>
			  	
				<div class="input-group">
			  	  <label>Zip Code</label>
			  	  <input type="text" name="zipcode" value="<?php echo (isset($_POST['zipcode'] ) ? $_POST['zipcode'] : ''); ?>" required="true">
			  	</div>
			  	
				<div class="input-group">
			  	  <label>Bedrooms</label>
			  	  <input type="text" name="bedrooms" value="<?php echo (isset($_POST['bedrooms'] ) ? $_POST['bedrooms'] : ''); ?>" required="true">
			  	</div>
			  	
				<div class="input-group">
			  	  <label>Bathrooms</label>
			  	  <input type="text" name="bathrooms" value="<?php echo (isset($_POST['bathrooms'] ) ? $_POST['bathrooms'] : ''); ?>" required="true">
			  	</div>
			  	
				<div class="input-group">
			  	  <label>Price (millions)</label>
			  	  <input type="text" name="price" value="<?php echo (isset($_POST['price'] ) ? $_POST['price'] : ''); ?>" required="true">
			  	</div>
			  	
				<div class="input-group">
			  	  <label>Area (sq ft.)</label>
			  	  <input type="text" name="sqft" value="<?php echo (isset($_POST['sqft'] ) ? $_POST['sqft'] : ''); ?>" required="true">
			  	</div>
			  				  	
				<div class="input-group">
			  	  <label>Property Pic</label>
			  	  <input type="file" accept="image/*" name="pic" value="<?php echo (isset($_POST['pic']) ? $_POST['pic'] : ''); ?>" required="true">
			  	</div>
			  	
			  	<div class="input-groups">
			  	  	<label>Property Type : </label>
			  		 <label class="radio-inline"><input type="radio" name="property_type" checked="checked" value="New"> New </label>
			  		 <label class="radio-inline"><input type="radio" name="property_type" value="Resale"> Resale </label>
			  	</div>
			  	<div class="input-group">
			  	  <button type="submit" name="submit" class="btn btn-success">Submit</button>
			  	</div>
		  </form>
			
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