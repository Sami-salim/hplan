<?php
   
     $dataPoints = array(
         array("x"=> 10, "y"=> 41),
         array("x"=> 20, "y"=> 35, "indexLabel"=> "Lowest"),
         array("x"=> 30, "y"=> 50),
         array("x"=> 40, "y"=> 45),
         array("x"=> 50, "y"=> 52),
         array("x"=> 60, "y"=> 68),
         array("x"=> 70, "y"=> 38),
         array("x"=> 80, "y"=> 71, "indexLabel"=> "Highest"),
         array("x"=> 90, "y"=> 52),
         array("x"=> 100, "y"=> 60),
         array("x"=> 110, "y"=> 36),
         array("x"=> 120, "y"=> 49),
         array("x"=> 130, "y"=> 41)
     );
     $link=mysqli_connect("localhost","root","");
     mysqli_select_db($link,"codingstudio");
     
     $test=array();
     $count=0;
     $res=mysqli_query($link,"select*from yearly_plan");
     while($row=mysqli_fetch_array($res))
     {
        $test[$count]["label"]=$row["indicator"];
        $test[$count]["y"]=$row["quarterone"];
        $count=$count+1;{
            {
                $test[$count]["label"]=$row["indicator"];
                $test[$count]["y"]=$row["quarterone_report"];
                $count=$count+1;
             
             }
        }
     
     }
     ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Temperature of Each Boiler"
	},
	axisY: {
		title: "Temperature (°C)",
		suffix: " °C"
	},
	data: [{
		type: "column",	
		yValueFormatString: "#,### °C",
		indexLabel: "{y}",
		dataPoints: [
			{ label: "boiler1", y: 206 },
			{ label: "boiler2", y: 163 },
			{ label: "boiler3", y: 154 },
			{ label: "boiler4", y: 176 },
			{ label: "boiler5", y: 184 },
			{ label: "boiler6", y: 122 }
		]
	}]
});

function updateChart() {
	var boilerColor, deltaY, yVal;
	var dps = chart.options.data[0].dataPoints;
	for (var i = 0; i < dps.length; i++) {
		deltaY = Math.round(2 + Math.random() *(-2-2));
		yVal = deltaY + dps[i].y > 0 ? dps[i].y + deltaY : 0;
		boilerColor = yVal > 200 ? "#FF2500" : yVal >= 170 ? "#FF6000" : yVal < 170 ? "#6B8E23 " : null;
		dps[i] = {label: "Boiler "+(i+1) , y: yVal, color: boilerColor};
	}
	chart.options.data[0].dataPoints = dps; 
	chart.render();
};
updateChart();

setInterval(function() {updateChart()}, 500);

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
<script src="../../canvasjs.min.js"></script>
</body>
</html>