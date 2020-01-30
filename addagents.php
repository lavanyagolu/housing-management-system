<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system </title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Housing System </h2>
  </div>
	
  <form method="post" action="addagents.php">
  	<?php include('errors.php'); ?>
    <div class="header">
  	<h2>Agent Registration </h2>
  </div>
	
		<div class="input-group">
  	  <label>Employee Id</label>
  	  <input type="text" name="emp_id" value="<?php echo $emp_id; ?>">
  	</div>
	<div class="input-group">
  	  <label>Employee Name</label>
  	  <input type="text" name="employee_name" value="<?php echo $employee_name; ?>">
  	</div>
	<div class="input-group">
  	  <label>email</label>
  	  <input type="text" name="email_id" value="<?php echo $email_id; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
	  <input type="password" name="password1">
  	</div>
   
  	<div class="input-group">
  	  <button type="submit" class="btn" name="add_agents">Register</button>
  	</div>
  	<p>
  		Finished Registration? <a href="adminview.php">Home</a>
  	</p>
  </form>
</body>
</html>
 