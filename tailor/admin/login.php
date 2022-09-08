<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <link rel="stylesheet" type="text/css" href="style.css"/>
  <!-- <link rel="stylesheet" type="text/css" href="../../form.css" /> -->
 <style>
  body {
 background-image: url("bg.jpg");
    }
</style>
</head>
<body >
  <div class="header" >
  	<h2>Admin Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button> 
		
		<a href="../index.html"  class="btn" style="text-decoration: none;" >HOME </a>
  	</div>
  	
  </form>
</body>
</html>