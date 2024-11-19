<?php 
session_start();
include "db_conn.php";

$date    = make_date();
	
	$id=$_SESSION['id'];
              $sql_2 = "UPDATE users 
                        SET last_logout='$date'
                        WHERE id='$id'";
             mysqli_query($conn,$sql_2);
	
	
session_unset();
session_destroy();

header("Location: index.php");



function make_date(){
	return strftime("%Y-%m-%d %H:%M:%S", time());
  }?>
  <?php function read_date($str){
	   if($str)
		return date('F j, Y, g:i:s a', strtotime($str));
	   else
		return null;
	}