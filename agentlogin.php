<?php include('server.php') ?>



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
</div>
<!--Menu ends here -->
<!-- Main Body starts here -->
</nav>
<div class="main">
<div class="wrapper">
<a href="index.php"><li>HOME</li></a>
<!-- Client booking details entry-->
<div class="booking-details">

  
  <form method="post" action="agentlogin.php">
  	<?php include('errors.php'); ?>
      <h2>Login</h2>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_agent">Login</button>
  	</div>
	</form>

</div>

</div>
 </div>
 <br /> <br /> <br /> <br />
 <br /> <br />  <br /> <br />
 <br /> <br /> <br />
  <br />

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