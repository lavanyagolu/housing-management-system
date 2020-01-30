<?php
session_start(); 
  if (isset($_SESSION['userid']))
  {
	$userid = $_SESSION['userid'];
	if($_SESSION['user_type'] == "Seller")
	{
		header('location: index.php');
	}
  }
  else
  {
  	header('location: logout.php');
  }
  include('config.php');
  
  if(isset($_POST['appointment']) && $_SESSION['user_type'] == "Buyer")
  {
  	$houseid = $_POST['houseid'];
  	
  	$query1 = "SELECT * FROM house_table WHERE house_id='$houseid' AND Status='Active'";
  	$results1 = mysqli_query($db, $query1);
  	if (mysqli_num_rows($results1) > 0) { 
  		
  		while ($row = mysqli_fetch_assoc($results1)) 
		{
			$hid = $row['house_id'];  
		  	$sellerid = $row['user_id'];
		  	$buyerid = $userid;
		  	
		  	$query2 = "SELECT * FROM appointments WHERE BuyerId ='$buyerid' AND SellerId='$sellerid' AND PropertyId='$hid' AND Status='Active'";
		  	$results2 = mysqli_query($db, $query2);
		  	if (mysqli_num_rows($results2) > 0) 
		  	{}
		  	else
		  	{ 
			  	$insertquery = "INSERT INTO appointments (BuyerId, SellerId, PropertyId, Status, CreatedAt) VALUES ('$buyerid', '$sellerid', '$hid', 'Active', NOW())";
				$queryresult = mysqli_query($db, $insertquery);
			}
		}
		
	}
	
  }
  
 $query = "SELECT *, 
 			(SELECT CONCAT(u.first_name,' ',u.last_name) FROM user u WHERE u.id=a.BuyerId) AS BuyerName,
 			(SELECT CONCAT(u.first_name,' ',u.last_name) FROM user u WHERE u.id=a.SellerId) AS SellerName,
 			(SELECT h.house_name FROM house_table h WHERE h.house_id=a.PropertyId) AS PropertyName
  			FROM appointments a WHERE a.Status='Active' AND a.BuyerId='$userid'";
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
		
		
		<h3>Appointments</h3>
		<!-- Displaying Recently added houses-->
		<div class="clearfix">

		<?php
		if (mysqli_num_rows($results) > 0) { 
			echo "<table>
					<th>SNo</th>
					<th>Property Name</th>
					<th>Seller Name</th>
					<th>Appointment created on</th>
					";
			$i = 0;
	  		while($row = mysqli_fetch_assoc($results)) {
	  			
  				$i++;
	  			$PropertyName = $row['PropertyName'];
	  			$SellerName = $row['SellerName'];
	  			$CreatedAt = date('m-d-Y', strtotime($row['CreatedAt']));
	    		
	    		echo "<tr>
	    			<td>$i</td>
	    			<td>$PropertyName</td>
	    			<td>$SellerName</td>
	    			<td>$CreatedAt</td>
	    		</tr>";
	    			
	    	}
	    	echo "</table>";
		}
		else
		{
			echo "No Appointments";
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