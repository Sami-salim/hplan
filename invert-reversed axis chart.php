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
	animationEnabled: true,
	exportEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Depth of Ocean at Different Levels"
	},
	axisY: {
		title: "Depth (in meters)",
		suffix: " m",
		reversed: true
	},
	axisX2: {
		tickThickness: 0,
		labelAngle: 0
	},
	data: [{
		type: "column",
		axisXType: "secondary",
		yValueFormatString: "#,##0 meters",
		dataPoints: [
			{ y: 300, label: "Continental Shelf" },
			{ y: 3000, label: "Continental Slope" },
			{ y: 4000, label: "Continental Rise" },
			{ y: 6000, label: "Abyssal Plain", indexLabel: "Deepest" },
			{ y: 4400, label: "Sea Mount" }
		]
	}]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
<script src="../../canvasjs.min.js"></script>
</body>
</html>