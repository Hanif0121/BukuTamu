<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="login">
<?php 
	if(isset($_GET['login'])){
		if($_GET['login']=="failed"){
			echo "<div class='alert'> Wrong Username and Password !</div>";
		}
	}
	?>
 
  <div class="login-triangle">
</div>
  
  <h2 class="login-header">Log in</h2>

  <form class="login-container" action="login.php" method="POST">
    <p><input type="text" placeholder="Username" name="username"></p>
    <p><input type="password" placeholder="Password" name="password"></p>
    <p><input type="submit" value="Log in"></p>
  </form>
</div>
<br><br>
<h5><Center style="color:#fff;">PT Bakrie Pipe Industries</Center></h5>


</body>
</html>