<?php
     
     $dataPoints1 = array(
         array("label"=> "2010", "y"=> 36.12),
         array("label"=> "2011", "y"=> 34.87),
         array("label"=> "2012", "y"=> 40.30),
         array("label"=> "2013", "y"=> 35.30),
         array("label"=> "2014", "y"=> 39.50),
         array("label"=> "2015", "y"=> 50.82),
         array("label"=> "2016", "y"=> 74.70)
     );
     $dataPoints2 = array(
         array("label"=> "2010", "y"=> 64.61),
         array("label"=> "2011", "y"=> 70.55),
         array("label"=> "2012", "y"=> 72.50),
         array("label"=> "2013", "y"=> 81.30),
         array("label"=> "2014", "y"=> 63.60),
         array("label"=> "2015", "y"=> 69.38),
         array("label"=> "2016", "y"=> 98.70)
     );
     $link=mysqli_connect("localhost","root","");
     mysqli_select_db($link,"codingstudio");
     
     $test=array();
     $count=0;
     $res=mysqli_query($link,"select*from yearly_plan");
     while($row=mysqli_fetch_array($res))
   {
            $test[$count]["label"]=$row["indicator"];
            $test[$count]["y"]=$row["quarterone_report"];
            $count=$count+1;
           
     }
     
         
     ?>
     <!DOCTYPE HTML>
     <html>
     <head>  
     <script>
     window.onload = function () {
      
     var chart = new CanvasJS.Chart("chartContainer", {
         animationEnabled: true,
         theme: "light2",
         title:{
             text: "Average Amount Spent on Real and Artificial X-Mas Trees in U.S."
         },
         axisY:{
             includeZero: true
         },
         legend:{
             cursor: "pointer",
             verticalAlign: "center",
             horizontalAlign: "right",
             itemclick: toggleDataSeries
         },
         data: [{
             type: "column",
             name: "Real Trees",
             indexLabel: "{y}",
             yValueFormatString: "$#0.##",
             showInLegend: true,
             dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
         },{
             type: "column",
             name: "Artificial Trees",
             indexLabel: "{y}",
             yValueFormatString: "$#0.##",
             showInLegend: true,
             dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
         }]
     });
     chart.render();
      
     function toggleDataSeries(e){
         if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
             e.dataSeries.visible = false;
         }
         else{
             e.dataSeries.visible = true;
         }
         chart.render();
     }
      
     }
     </script>
     </head>
     <body>
     <div id="chartContainer" style="height: 370px; width: 100%;"></div>
     <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
     </body>
     </html>                              