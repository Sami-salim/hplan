<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>admin_home.php</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
<nav class="admin_home-nav">
     <li> <a href="control.php">Control</a><li>
     <li><a href="change-password.php">Change Password</a><li>
     <li><a href="logout.php">Logout</a><li>
     <li><a href="adminsignup.php">signup</a></li>
     
</nav>
     
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>