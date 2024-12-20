<?php
     
     $dataPoints = array(
         array("label"=> "Food + Drinks", "y"=> 590),
         array("label"=> "Activities and Entertainments", "y"=> 261),
         array("label"=> "Health and Fitness", "y"=> 158),
         array("label"=> "Shopping & Misc", "y"=> 72),
         array("label"=> "Transportation", "y"=> 191),
         array("label"=> "Rent", "y"=> 573),
         array("label"=> "Travel Insurance", "y"=> 126)
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
         exportEnabled: true,
         title:{
             text: "Average Expense Per Day  in Thai Baht"
         },
         subtitles: [{
             text: "Currency Used: Thai Baht (฿)"
         }],
         data: [{
             type: "pie",
             showInLegend: "true",
             legendText: "{label}",
             indexLabelFontSize: 16,
             indexLabel: "{label} - #percent%",
             yValueFormatString: "฿#,##0",
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