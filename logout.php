<?php
	session_start();
	// remove all session variables
	session_unset();

	// destroy the session
	session_destroy(); 
	
	header('location: login.php');
?>
<!-- Menu starts here -->
<nav class="menu">
<div class="wrapper">
<ul>
<a href="index.php"><li>HOME</li></a>
<a href="aboutus.php"><li>About Us</li></a>
<a href="contact.php"><li>Contact Us</li></a>
<!--<a href="agentlogin.php"><li>Agent</li></a>
<a href="login.php"><li>Seller</li></a>-->

<?php
  if (isset($_SESSION['username']))
  {
?>
		<a href="message.php"><li>Message</li></a>
	   <a href="logout.php">Log Out</a>
	   <a href="#">Welcome 
	    <?php echo $_SESSION['username']; ?>
	    </a>
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