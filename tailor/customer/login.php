
<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
  <title>Customer Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background: url(../image/bg.jpg) ";>
  <div class="header">
  	<h2>Customer Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Email ID</label>
  		<input type="text" name="email" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
		  <a href="../index.html"  class="btn" style="text-decoration: none;" >HOME </a>
  	</div>
  	<p>
  		Not yet registered? <a href="register.php" style="text-decoration: none;" >Sign up</a>
  	</p>
  </form>
</body>
</html>