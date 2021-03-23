<!DOCTYPE HTML>
<html>
<head>  
<?php
include("../../config/connection.php");
        $dataPoints = array();

        $sql1 = "SELECT * FROM meals WHERE price=350";
        $result1 = $con->query($sql1);
        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                $dataPoints[] = $row;
            }
        } else { } 
      ;
    ?>
<script>
 window.onload = function () {

   var chart = new CanvasJS.Chart("chartContainer", {
  title: {
  text: ""
      },
  axisY: {
  title: ""
      },
   data: [{
type: "line",
   dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
   }]
   });
  chart.render();
 }
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>