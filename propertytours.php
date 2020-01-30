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
<html>
<head>

<title>HOUSING SYSTEM</title>
<!-- ADDING CSS HERE -->
<link rel="stylesheet" type="text/css" href="assets/style.css" />
<!-- Start WOWSlider.com HEAD section -->
<link rel="stylesheet" type="text/css" href="slider/engine1/style.css" />
<script type="text/javascript" src="slider/engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.collapsible {
  background-color: #777;
  color: #ffc107;
  cursor: pointer;
  padding:7px;
  padding-left: 5%;
  width:75%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}
.active, .collapsible:hover {
  background-color: #555;
}
.content {
  padding: 10px;
  margin: 15px;
  width: 90%;
  display: none;  
  text-align: left;
  border: none;
  overflow: hidden;
  background-color: #f1f1f1;
}
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}
.editbutton {
  background-color: whitesmoke; 
  color: black; 
  border: 2px solid #008CBA;
}
.editbutton:hover {
  background-color: #008CBA;
  color: white;
  z-index: 9;
}
</style>
</head>

<body>
<header class="header">
<div class="wrapper">
<h1>Buyer's Agent - Property Tours</h1>
</div>
</header>
<br>
<center>
<form action="propertytours.php" method="post">
Please select the houses by their status
<select name="propertystatus">
  <option value="active">Active</option>
  <option value="completed">Completed</option>
  <option value="cancelled">Cancelled</option>
</select>
<input type="submit" value="Search">
</form>
</center>

<h3><br> &nbsp; &nbsp;Property Tours List</h3>

<?php
// Below lines will check and Update the Property_tour tables according to the button clicked!
if (isset($_POST['canceltour'])){
	$cancelquery = "UPDATE property_tour SET Status='cancelled' WHERE Tour_id=". $_POST['tourId'];
	mysqli_query($db, $cancelquery);
}
if (isset($_POST['completetour'])){
	$completequery = "UPDATE property_tour SET Status='completed' WHERE Tour_id=". $_POST['tourId'];
	mysqli_query($db, $completequery);
}
if (isset($_POST['propertystatus'])){
	$statusvalue = $_POST['propertystatus'];
	$query = "SELECT * FROM property_tour WHERE Status='$statusvalue'";
	$results = mysqli_query($db, $query);	
}
//Query to dispaly all the active tours from the property_tour table.
if (!isset($_POST['propertystatus'])){
	$query = "SELECT * FROM property_tour WHERE Status='active'";
	$results = mysqli_query($db, $query);
}
if (mysqli_num_rows($results) > 0) {		
	echo "<div class=\"clearfix\">";
	while ($row = mysqli_fetch_assoc($results)){
		echo "<div class=\"houses\"> 
		<img src=\"images/house_". $row["Tour_id"] .".jpg\" />
		<span class=\"house-title\">Address: " . $row["Address"] . "</span><br/>
		<span class=\"house-title\">Time: " . $row["Tour_time"] . "</span><br/>
		<span class=\"house-title\">Tour Status: " . $row["Status"] . "</span><br/>
		<span class=\"house-added\">Seller's Name: " . $row["Seller_name"] . "</span><br/>
		<span class=\"house-location\">Seller's contact: ". $row["Seller_contact"] . "</span><br/>
		<span class=\"house-added\">Buyers's Name: " . $row["Buyer_name"] . "</span><br/>
		<span class=\"house-location\">Buyers's contact: " . $row["Buyer_contact"] . "</span><br/>   
		<span class=\"house-location\">Notes: " . $row["Notes"] . "</span><br/>";
		if($row["Status"] == 'active')
			echo "
			<form method=\"post\" action=\"propertytours.php\">
			<input type=\"submit\" value=\"Cancel Tour\" class=\"btn\" name=\"canceltour\">  
			<input type=\"hidden\" name=\"tourId\" value=". $row["Tour_id"] .">
			</form>
			<form method=\"post\" action=\"propertytours.php\">
			<input type=\"submit\" value=\"Complete Tour\" class=\"btn\" name=\"completetour\">  
			<input type=\"hidden\" name=\"tourId\" value=". $row["Tour_id"] .">
			</form>";
		echo "</div>";
	}	
	echo "</div>";	
}
else {
	echo "&nbsp; &nbsp;There are not active tours!";
}
echo "&nbsp; &nbsp;<a href=\"buyeragentview.php\">Go back to Buyer Agent home</a>";	
?>

<?php
if (isset($_POST['canceltour']) || isset($_POST['completetour'])){
	?>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
		swal("", "Updated the Tour Successfully!", "success");
	</script><?php
}?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>

<script>
var coll = document.getElementsByClassName("collapsible");
var i;
for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
function displaySuccess() {
  swal("", "Cancelled the Tour Successfully!", "success");
}
function displayWarning() {
  swal("", "Work in progress, Please come back soon!", "warning"); /* From:  https://sweetalert.js.org/guides/  */
}
</script>

<p><br /></p>
<!--Main body ends here -->
<!--Footer starts here -->
<br />  
  
<footer  class="footer">
<div class="wrapper">
<p>&copy; <a href="#">HOUSING SYSTEM</a>. All rights reserved 2019. </p>
</div>
</footer>
<!--Footer ends here -->

</body>
</html>