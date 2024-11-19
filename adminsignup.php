<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="stylee.css">
</head>
<body>
     <form action="adminsignup-check.php" method="post">
     	<h2>SIGN UP</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Name</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"
                      value="<?php echo $_GET['name']; ?>">
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"required>
          <?php }?>

          <label>User Name</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"
                      value="<?php echo $_GET['uname']; ?>">
          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"required>
          <?php }?>
     	<label>Password</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password" required>

          <label>Re Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Re_Password" required>

        <label>usertype</label>
     	<input type="text" 
                 name="usertype" 
                 placeholder="user or admin"required>

                 <label>phone</label>
     	<input type="phone" 
                 name="phone" 
                 placeholder="phone"required>

                 <label>Email</label>
     	<input type="Email" 
                 name="Email" 
                 placeholder="name@example.com"required>
				 
				  <label>gender</label>
     	<input type="text" 
                 name="gender" 
                 placeholder="male/female"required>

     	<button type="submit">Sign Up</button>
          <a href="index.php" class="ca">Already have an account?</a>
     </form>
</body>
</html>