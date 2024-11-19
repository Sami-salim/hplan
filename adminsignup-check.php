<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);
    $u_type= validate($_POST['usertype']);
    $Email= validate($_POST['Email']);
    $phone= validate($_POST['phone']);
	$gender= validate($_POST['gender']);
	$date = make_date();

	$user_data = 'uname='. $uname. '&name='. $name;


	if (empty($uname)) {
		header("Location: adminsignup.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: adminsignup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: adminsignup.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($name)){
        header("Location: adminsignup.php?error=Name is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: adminsignup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM users WHERE user_name='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: adminsignup.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO users(user_name, password, name,usertype,Email,phone,last_login,signup_date,gender) VALUES('$uname', '$pass', '$name','$u_type','$Email','$phone','$date','$date','$gender')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: adminsignup.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: adminsignup.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: adminsignup.php");
	exit();
}

  
 function make_date(){
	return strftime("%Y-%m-%d %H:%M:%S", time());
  }?>
  <?php function read_date($str){
	   if($str)
		return date('F j, Y, g:i:s a', strtotime($str));
	   else
		return null;
	}