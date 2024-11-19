<?php 

require 'lang.php';

?>

<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
	<title>Languages</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<style>
	<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
		<meta charset="utf-8" />
	
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script	src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
	</head>

		body{
			font-family: tahoma;
		}
		header{
			display: flex;
			padding: 5px;
			justify-content: center;
			align-items: center;
			margin-top:5px;
		}

		header div{
			padding: 10px;
			
		}

		.dropdown{
			position: relative;
		}

		.dropdown-content{
			position: absolute;
			margin-top:10px;
			background-color: white;
			border: solid thin #aaa;
			padding: 10px;
		}

		.hide{
			display: none;
		}

		section{
			padding: 0px;
			max-width: 600px;
			margin:auto;
		}

	</style>

	<header class=header>
	<div>
	   <div>
            <h2><br><br>
			&nbsp&nbsp&nbsp&nbsp<a href="#"><?= __('Admin Dashbord')?></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			<div class="logout">
<a href="home.php"><?= __('Home')?></a>
</div>
			</h2><br><br><br><br><br><br>
			
       </div>
	

 <asside>

<ul>
   <li>
  
		<div>
		<li><a href="adminhome.php"><?= __('User Management')?></a></li>
		<li><a href="#"><?= __('sectoral category')?></a></li>
		<li><a href="planingD.php"><?= __('plan D')?></a></li>
		
		<li><a href="#"><?= __('Qone Report D')?></a></li>
		<li><a href="#"><?= __('Qtwo Report D')?></a></li>
		<li><a href="#"><?= __('Qthree Report D')?></a></li>
		<li><a href="#"><?= __('Qfour Report D')?></a></li>
		<li><a href="#"><?= __('plan C')?></a></li>
		<li><a href="#"><?= __('Qone Report C')?></a></li>
		<li><a href="#"><?= __('Qtwo Report C')?></a></li>
		<li><a href="#"><?= __('Qthree Report C')?></a></li>
		<li><a href="#"><?= __('Qfour Report C')?></a></li>
		<li><a href="#"><?= __('plan A')?></a></li>
		<li><a href="#"><?= __('Qone Report A')?></a></li>
		<li><a href="#"><?= __('Qtwo Report A')?></a></li>
		<li><a href="#"><?= __('Qthree Report A')?></a></li>
		<li><a href="#"><?= __('Qfour Report A')?></a></li>
		<li><a href="#"><?= __('plan S')?></a></li>
		<li><a href="#"><?= __('Qone Report S')?></a></li>
		<li><a href="#"><?= __('Qtwo Report S')?></a></li>
		<li><a href="#"><?= __('Qthree Report S')?></a></li>
		<li><a href="#"><?= __('Qfour Report S')?></a></li>
  <li>

</ul>
</asside>



<div class="content">
	
</html>
  
	
	
	
	<?php
	function tableExists($table){
  global $db;
  $table_exit = $db->query('SHOW TABLES FROM '.DB_NAME.' LIKE "'.$db->escape($table).'"');
      if($table_exit) {
        if($db->num_rows($table_exit) > 0)
              return true;
         else
              return false;
      }
  }
  ?>
<?php

function count_by_id($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(id) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}
?>
<?php
function count_id(){
  static $count = 1;
  return $count++;
}
?>
<?php
function remove_junk($str){
  $str = nl2br($str);
  $str = htmlspecialchars(strip_tags($str, ENT_QUOTES));
  return $str;
}
?>
</header>
<body>
	<section>
		
<div>

<!DOCTYPE HTML>
<br><br><br><br>

	<div class="container">
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<h2 class="text-center mt-4 mb-3"><?= __('Planing Monitoring And Evaluasion System')?></a></h2></div><br>

	<body>
	
</div>
	</section>
</body>

<script>
	
	var dropdowns = document.querySelectorAll(".dropdown");

	for (var i = 0; i < dropdowns.length; i++) {
		
		dropdowns[i].addEventListener('click',function(e){

			for (var x = 0; x < dropdowns.length; x++) {
				dropdowns[x].querySelector(".dropdown-content").classList.add("hide");
			}

			e.currentTarget.querySelector(".dropdown-content").classList.toggle("hide");
		});
	}

</script>
</html>