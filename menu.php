<!-- Menu starts here -->
<nav class="menu">
<div class="wrapper">
<ul>
<a href="loginindex.php"><li>HOME</li></a>
<a href="aboutus.php"><li>About Us</li></a>
<a href="#"><li>Houses</li></a>
<a href="contact.php"><li>Contact Us</li></a>
<!--<a href="agentlogin.php"><li>Agent</li></a>
<a href="login.php"><li>Seller</li></a>-->

<?php
  if (isset($_SESSION['userid']))
  {
  		if($_SESSION['user_type'] == "Seller")
  		{
  			echo '<a href="properties.php"><li>Properties</li></a>';
  		}
?>
		<a href="message.php"><li>Message</li></a>
	   <a href="bookhouse.php">Wishlist</a>
	   <a href="index.php">Log Out</a>
<?php
  }
  else
  {
 ?>
  	<a href="login.php"><li>Log In</li></a>
 <?php
  }
?>

</ul>
</div>

<!--Menu ends here -->
</nav>