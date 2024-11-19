<?php 

require 'lang.php';

?>
<?php 
//session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>admin_home.php</title>
	<link rel="stylesheet" type="text/css" href="stylee.css">
	
<html>
	<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
		<meta charset="utf-8" />
	
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script	src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
	
</head>

<header class=header>
	<div>
	   <div>
	   
            <h1><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<div>
			<h1><a href="#"><?= __('Admin Dashbord')?></a></h1>
			 </div>
			 <strong><?php echo date("F j, Y, g:i a");?></strong><div><br><br><h1>
			 
			        <div><h4><a href="#"><?= __('Language')?></a></h4></div>
					<div class="dropdown-content hide">
				                   <a href="admin_home.php?lang=en">English</a>/
				                   <a href="admin_home.php?lang=or">Oromiffaa</a>/
				                   <a href="admin_home.php?lang=am">አማርኛ</a>/
				                   <a href="admin_home.php?lang=ha">ሀረሪ</a>/
			               </div>
		       </div>
      </div>
       </div>
	   

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
<h1><a href="#"></a></h1>
<p> </p> 



	<div class="container">
			<h3 class="text-center mt-4 mb-3"><?= __('Planing Monitoring And Evaluation System')?></a></h3></div><br>
  <center> 
<nav class="admin_home-nav">
 <h3> <a href="control.php">Control</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     <a href="change-password.php">Change Password</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     <a href="logout.php">Logout</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
     <a href="adminsignup.php">signup</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<h3>
     
		    
</nav></center>
	<body>
		<div class="card">
				<strong><div class="card-header"><?= __('service delivery Survey')?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					
				<div class="card-body">
					<div class="form-group">
						<h3 class="mb-4"><?= __('The Over all regional service delivery status in 2024?')?></h3>
						
	</div>  
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
					<div class="card mt-4">
						<div class="card-header"><?= __('Pie Chart')?></div>
						<div class="card-body">
							<div class="chart-container pie-chart">
								<canvas id="pie_chart"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mt-4">
						<div class="card-header"><?= __('Doughnut Chart')?></div>
						<div class="card-body">
							<div class="chart-container pie-chart">
								<canvas id="doughnut_chart"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mt-4 mb-4">
						<div class="card-header"><?= __('Bar Chart')?> </div>
						<div class="card-body">
							<div class="chart-container pie-chart">
								<canvas id="bar_chart"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	
	</body>
</html>

<script>
	
$(document).ready(function(){

	$('#submit_data').click(function(){

		var language = $('input[name=programming_language]:checked').val();

		$.ajax({
			url:"data.php",
			method:"POST",
			data:{action:'insert', language:language},
			beforeSend:function()
			{
				$('#submit_data').attr('disabled', 'disabled');
			},
			success:function(data)
			{
				$('#submit_data').attr('disabled', false);

				$('#programming_language_1').prop('checked', 'checked');

				$('#programming_language_2').prop('checked', false);

				$('#programming_language_3').prop('checked', false);

				alert("Your Feedback has been send...");

				makechart();
			}
		})

	});

	makechart();

	function makechart()
	{
		$.ajax({
			url:"data.php",
			method:"POST",
			data:{action:'fetch'},
			dataType:"JSON",
			success:function(data)
			{
				var language = [];
				var total = [];
				var color = [];

				for(var count = 0; count < data.length; count++)
				{
					language.push(data[count].language);
					total.push(data[count].total);
					color.push(data[count].color);
				}

				var chart_data = {
					labels:language,
					datasets:[
						{
							label:'Vote',
							backgroundColor:color,
							color:'#fff',
							data:total
						}
					]
				};

				var options = {
					responsive:true,
					scales:{
						yAxes:[{
							ticks:{
								min:0
							}
						}]
					}
				};

				var group_chart1 = $('#pie_chart');

				var graph1 = new Chart(group_chart1, {
					type:"pie",
					data:chart_data
				});

				var group_chart2 = $('#doughnut_chart');

				var graph2 = new Chart(group_chart2, {
					type:"doughnut",
					data:chart_data
				});

				var group_chart3 = $('#bar_chart');

				var graph3 = new Chart(group_chart3, {
					type:'bar',
					data:chart_data,
					options:options
				});
			}
		})
	}

});

</script>

  
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
  
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>