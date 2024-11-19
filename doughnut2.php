<?php
     
     $dataPoints = array( 
         array("label"=>"Oxygen", "symbol" => "O","y"=>46.6),
         array("label"=>"Silicon", "symbol" => "Si","y"=>27.7),
         array("label"=>"Aluminium", "symbol" => "Al","y"=>13.9),
         array("label"=>"Iron", "symbol" => "Fe","y"=>5),
         array("label"=>"Calcium", "symbol" => "Ca","y"=>3.6),
         array("label"=>"Sodium", "symbol" => "Na","y"=>2.6),
         array("label"=>"Magnesium", "symbol" => "Mg","y"=>2.1),
         array("label"=>"Others", "symbol" => "Others","y"=>1.5),
      
     );
   $link=mysqli_connect("localhost","root","");
     mysqli_select_db($link,"codingstudio");
     
     $test=array();
     $count=0;
     $res=mysqli_query($link,"select*from yearly_plan");
     while($row=mysqli_fetch_array($res))
     {
        $test[$count]["label"]=$row["indicator"];
        $test[$count]["y"]=$row["quartertwo_report"];
        $test[$count]["y"]=$row["uptoqtwo_report"];
        $count=$count+1;
     
     }
      
     ?>
     <!DOCTYPE HTML>
     <html>
     <head>
     <script>
     window.onload = function() {
      
     var chart = new CanvasJS.Chart("chartContainer", {
         theme: "light2",
         animationEnabled: true,
         title: {
             text: "Average Composition of Magma"
         },
         data: [{
             type: "doughnut",
             indexLabel: "{symbol} - {y}",
             yValueFormatString: "#,##0.0\"%\"",
             showInLegend: true,
             legendText: "{label} : {y}",
             dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
         }]
     });
     chart.render();
      
     }
     </script>
     </head>
     <body>
     <div id="chartContainer" style="height: 370px; width: 100%;"></div>
     <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
     </body>
     </html>                              