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
<script type="text/javascript">
function PopupCenter(url, w, h) {
    // Fixes dual-screen position                         Most browsers      Firefox
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : window.screenX;
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : window.screenY;

    var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    var systemZoom = width / window.screen.availWidth;
var left = (width - w) / 2 / systemZoom + dualScreenLeft
var top = (height - h) / 2 / systemZoom + dualScreenTop
    var newWindow = window.open(url, '', 'scrollbars=yes, width=' + w / systemZoom + ', height=' + h / systemZoom + ', top=' + top + ', left=' + left);

    // Puts focus on the newWindow
    if (window.focus) newWindow.focus();
}
</script>
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
<?php
  		if($_SESSION['user_type'] == "Seller")
  		{
  			echo '<a href="sellerview.php"><li>Home</li></a>';
  		}
        elseif($_SESSION['user_type'] == "Buyer")
  		{   
  			echo '<a href="loginindex.php"><li>Home</li></a>';
  		}
        elseif($_SESSION['user_type'] == "admin")
  		{   
  			echo '<a href="adminview.php"><li>Home</li></a>';
  		}
        elseif($_SESSION['user_type'] == "bagent")
  		{   
  			echo '<a href="buyeragentview.php"><li>Home</li></a>';
  		}
        elseif($_SESSION['user_type'] == "sagent")
  		{   
  			echo '<a href="selleragentview.php"><li>Home</li></a>';
  		}
?>
<a href="aboutus.php"><li>About Us</li></a>
<a href="contact.php"><li>Contact Us</li></a>
   <a style="text-decoration:underline" href="index.php">Log Out</a>
</ul>
<br />
<br />
<br />
<ul>

<a href="sent.php"><li>Sent</li></a>
<a href="compose.php"><li>Compose</li></a>

</ul>
<br/>

</div>
<br/>
<!--Menu ends here -->

<!--Slider starts here -->
<div class="slider">
<div class="wrapper">
		<?php
        
        

// loop through results of database query, displaying them in the table
$user = $_SESSION['username']; 
			$qu = mysqli_query($db, "SELECT * FROM `messages` WHERE `to`='$user' and `from_delete`='0'");
		if (mysqli_num_rows($qu) > 0) {
		          echo '<table border="1" cellpadding="10">';
echo '<tr><th>From</th> <th>Subject</th> <th>Date</th></tr>';
			while ($row = mysqli_fetch_array($qu))
{ if ($row['from_delete']==0)
{
// echo out the contents of each row into a table
echo '<tr style="'.($row['status'] ? 'font-weight:bold;' : '').'">';
echo '<td>' . $row['from'] . '</td>';
echo '<td>' . $row['Subject'] . '</td>';
echo '<td>' . $row['date'] . '</td>';
//echo '<td><a href="?page_id=1174&MI=' . $row['id'] . '">View</a> </td>';
//echo '<td><a href="view.php?id=' . $row['id'] . '">View</a> | <a href="inboxdelete.php?id=' . $row['id'] . '" onClick="return confirm(\'Are you sure you want to delete?\')">Delete</a></td>';
echo '<td><a href=""  onClick="PopupCenter(\'view.php?id=' . $row['id'] . '\',\'500\',\'300\')">Message</a> | <a href="inboxdelete.php?id=' . $row['id'] . '" onClick="return confirm(\'Are you sure you want to delete?\')">Delete</a></td>';
echo "</tr>";
}
}
} else {
    echo 'You do not have any messages.';
}
//    
//                  
//echo '<table border="1">
//  <tr>
//    <th>Form</th>
//    <th>Message</th>
//    <th>Date&Time</th>
//  </tr>';
//
//$user = $_SESSION['username']; 
//			$qu = mysqli_query($db, "SELECT * FROM `messages` WHERE `to`='$user'");
//			if (mysqli_num_rows($qu) > 0) {
//				while ($row = mysqli_fetch_array($qu)) {
//echo "<tr>";
//echo "<td>" .$row["from"]."</td>";
//echo "<td>" .$row["message"]. "</td>";
//echo "<td>" .$row["date"]."</td>";
//echo "</tr>";
//               
//				//	echo '<br/><tr><td>From:'.$row["from"].'</td><td>--</td><td>Message:'.$row["message"].'</td><td>--</td><td>DateTime:'.$row["date"].'</td></tr>';
//				}
//			}
            echo "</table>";
		?>


</div>
</div>
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

<footer  class="footer">
<div class="wrapper">
<p>&copy; <a href="#">HOUSING SYSTEM</a>. All rights reserved 2019. </p>
</div>
</footer>
<!--Footer ends here -->

  </body>
</html>