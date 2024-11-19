<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Change password</title>
	<link rel="stylesheet" type="text/css" href="stylee.css">
</head>
<body>
<form action="change-p.php" method="post">
     	<h2>Change password</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>
     	<label>Old Password</label>
     	<input type="Password" 
               name="op" 
               placeholder="Old Password"required>
               <br>

     	<label>New Password</label>
     	<input type="password" 
               name="np" 
               placeholder="New Password"required>
               <br>

         <label>Confirm New Password</label>
     	 <input type="password" 
                name="c_np" 
                placeholder="Confirm New Password"required>
                <br>

     	<button type="submit">CHANGE</button>
          <a href="logout.php" class="ca">Logout</a>
     </form>

</body>    
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>