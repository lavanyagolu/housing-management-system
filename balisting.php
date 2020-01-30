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
</head>

<style>
.dropdown {
  float: left;
  overflow: hidden;
}
</style>

<body>
<header class="header">
<div class="wrapper">
<h1>Buyer's Agent - Active and Closed Listing</h1>
</div>
</header>
<br>
<center>
<form action="balisting.php" method="post">
Please select the houses by their status
<select name="listingstatus">
  <option value="offermade">Offer Made</option>
  <option value="contingent">Contingent</option>
  <option value="closed">Closed</option>
</select>
<input type="submit" value="Search">
</form>
</center>

<h3><br> &nbsp; &nbsp;Active Listing</h3>

<?php
// Below lines will check and Update the Property_tour tables according to the button clicked!
if (isset($_POST['updatestatus'])){
	$listingvalue = $_POST['updatestatus'];
	$query = "UPDATE ba_listing SET Status='$listingvalue' WHERE houseid=". $_POST['updateHouseId'];
	$results = mysqli_query($db, $query);	
}
if (isset($_POST['listingstatus'])){
	$listingvalue = $_POST['listingstatus'];
	$query = "SELECT * FROM ba_listing WHERE Status='$listingvalue'";
	$results = mysqli_query($db, $query);	
}
//Query to dispaly all the active tours from the property_tour table.
if (!isset($_POST['listingstatus'])){
	$query = "SELECT * FROM ba_listing WHERE Status='offermade' OR Status='contingent'";
	$results = mysqli_query($db, $query);
}
if (mysqli_num_rows($results) > 0) {		
	echo "<div class=\"clearfix\">";
	while ($row = mysqli_fetch_assoc($results))
	{
		echo "<div class=\"houses\"> 
   <img src=\"images/house_". $row["houseid"] .".jpg\" />   
   <span class=\"house-added\">Seller's Name: " . $row["Seller_name"] . "</span><br/>   
   <span class=\"house-added\">Buyers's Name: " . $row["Buyer_name"] . "</span><br/>   
   <span class=\"house-added\">Status: " . $row["Status"] . "</span><br/>
   <form action=\"balisting.php\" method=\"post\">
		<select name=\"updatestatus\">
		<option value=\"offermade\">Offer Made</option>
		<option value=\"contingent\">Contingent</option>
		<option value=\"closed\">Closed</option>
		</select>
		<input type=\"submit\" value=\"Update status\">
		<input type=\"hidden\" name=\"updateHouseId\" value=". $row["houseid"] .">
   </form>
   </div>			 
		";
	}	
	echo "</div>";	
}
else {
	echo "&nbsp; &nbsp;There are houses with your selection, Please change another Option or!";
}
echo "&nbsp; &nbsp;<a href=\"buyeragentview.php\">Go back to Buyer Agent's home</a>";	
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