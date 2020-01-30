<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8" />
<meta name="author" content="Lavanya Goluguri" />
<meta name="description" content="HOUSING SYSTEM" />
<meta name="keywords" content="Give your key words for SEO" />

<title>HOUSING SYSTEM</title>
<link rel="stylesheet" type="text/css" href="assets/style.css" />
</head>

<body>
  <header class="header">
<div class="wrapper">
<h1>HOUSING SYSTEM</h1>
</div>
</header>
	<br />
    <br />
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
		<div class="input-group">
  	  <label>First Name</label>
  	  <input type="text" name="first_name" value="<?php echo $first_name; ?>">
  	</div>
	<div class="input-group">
  	  <label>Last Name</label>
  	  <input type="text" name="last_name" value="<?php echo $last_name; ?>">
  	</div>
	<div class="input-group">
  	  <label>email</label>
  	  <input type="text" name="email" value="<?php echo $email; ?>">
  	</div>
	<div class="input-group">
  	  <label>phone no</label>
  	  <input type="text" name="ph_no" value="<?php echo $ph_no; ?>">
  	</div>
		<div class="input-group">
  	  <label>address</label>
  	  <input type="text" name="address" value="<?php echo $address; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="user_name" value="<?php echo $user_name; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_seller">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="sellerlogin.php">Sign in</a>
  	</p>
  </form>
  <br/><br />
  <footer  class="footer">
<div class="wrapper">
<p>&copy; <a href="#">HOUSING SYSTEM</a>. All rights reserved 2019. </p>
</div>
</footer>
</body>
</html>