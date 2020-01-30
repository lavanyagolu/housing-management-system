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
<a href="adminview.php"><li>HOME</li></a>
<a href="message.php"><li>Message</li></a>
<a href="users.php"><li>Users</li></a>
<a href="agents.php"><li>Agents</li></a>
</ul>
</div>
<div class="booking-details">
<?php
        
// loop through results of database query, displaying them in the table
$user = $_SESSION['username']; 
			$qu = mysqli_query($db, "select * from house_table");
		if (mysqli_num_rows($qu) > 0) {
		          echo '<table border="1" cellpadding="10" align="center">';
echo '<tr><th>House ID</th><th>House Name</th> <th>House Description</th><th>Address</th> <th>City</th><th>State</th>
<th>Zipcode</th>
<th>Bedrooms</th>
<th>Bathrooms</th>
<th>Price</th>
<th>Sqft</th>
<th>Property Type</th>
<th>Date Posted</th>
<th>Employee Name</th>
<th>User Id</th>
<th>Status</th>
</tr>';
			while ($row = mysqli_fetch_array($qu))
{ 
// echo out the contents of each row into a table
echo '<td>' . $row['house_id'] . '</td>';
echo '<td>' . $row['house_name'] . '</td>';
echo '<td>' . $row['house_description'] . '</td>';
echo '<td>' . $row['address'] . '</td>';
echo '<td>' . $row['city'] . '</td>';
echo '<td>' . $row['state'] . '</td>';
echo '<td>' . $row['zipcode'] . '</td>';
echo '<td>' . $row['bedrooms'] . '</td>';
echo '<td>' . $row['bathrooms'] . '</td>';
echo '<td>' . $row['price'] . '</td>';
echo '<td>' . $row['sqft'] . '</td>';
echo '<td>' . $row['property_type'] . '</td>';
echo '<td>' . $row['date_posted'] . '</td>';
echo '<td>' . $row['employee_name'] . '</td>';
echo '<td>' . $row['user_id'] . '</td>';
echo '<td>' . $row['status'] . '</td>';

echo "</tr>";
}
} else {
    echo 'You do not have any Houses to display.';
}

            echo "</table>";
		?>


</table>

</div>

 <!--Main body ends here -->
<!--Footer starts here -->
<br /> <br /> <br /> <br />
 <br /> <br />  <br /> <br />
 <br /> <br /> <br />
  <br />
<br /> <br /> <br /> <br />

  <br />
  <br /> <br /> <br /> <br />
 <br /> <br />  <br /> <br />
 <br /> <br /> <br />
  <br />
<br /> <br /> <br /> <br />

  <br />
  <br /> <br /> <br /> <br />
 <br /> <br />  
<footer  class="footer">
<div class="wrapper">
<p>&copy; <a href="#">HOUSING SYSTEM</a>. All rights reserved 2019. </p>
</div>
</footer>
<!--Footer ends here -->

  </body>
</html>