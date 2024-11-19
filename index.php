<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="stylee.css">
</head>
<body background="school2.png" class="body_deg">
     <form action="login.php" method="post">
     	<h2>My App- Login</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name"required><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"required><br>

     	<button type="submit">Login</button>
          <a href="adminsignup.php" class="ca">Create an account</a>
     </form>
</body>
</html>