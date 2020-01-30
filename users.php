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
<a href="houses.php"><li>Houses</li></a>
<a href="agents.php"><li>Agents</li></a>
</ul>
</div>
<div class="booking-details">
<?php
        
// loop through results of database query, displaying them in the table
$user = $_SESSION['username']; 
			$qu = mysqli_query($db, "select * from user");
		if (mysqli_num_rows($qu) > 0) {
		          echo '<table border="1" cellpadding="10" align="center">';
echo '<tr><th>ID</th> <th>First Name</th> <th>Last Name</th><th>Email</th><th>Phone number</th><th>Address</th><th>User_name</th> <th>user_type</th></tr>';
			while ($row = mysqli_fetch_array($qu))
{ 
// echo out the contents of each row into a table
echo '<td>' . $row['id'] . '</td>';
echo '<td>' . $row['first_name'] . '</td>';
echo '<td>' . $row['last_name'] . '</td>';
echo '<td>' . $row['email'] . '</td>';
echo '<td>' . $row['ph_no'] . '</td>';
echo '<td>' . $row['address'] . '</td>';
echo '<td>' . $row['user_name'] . '</td>';
echo '<td>' . $row['user_type'] . '</td>';
echo "</tr>";
}
} else {
    echo 'You do not have any users.';
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
<footer  class="footer">
<div class="wrapper">
<p>&copy; <a href="#">HOUSING SYSTEM</a>. All rights reserved 2019. </p>
</div>
</footer>
<!--Footer ends here -->

  </body>
</html>