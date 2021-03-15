<?php include("../../config/connection.php");
if($stmt = $con->query("SELECT Price,Meals_Name FROM meals")){

    echo "No of records : ".$stmt->num_rows."<br>";
  $php_data_array = Array(); // create PHP array
    echo "<table>
  <tr> <th>Meals_Name</th><th>Price</th></tr>";
  while ($row = $stmt->fetch_row()) {
     echo "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
     $php_data_array[] = $row; // Adding to array
     }
  echo "</table>";
  }else{
  echo $connection->error;
  }
  $php_data_array[] = $row; // Adding to array
  echo json_encode($php_data_array);
  echo "<script>
        var my_2d = ".json_encode($php_data_array)."
</script>";
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawChart);
	  
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Meals_Name');
        data.addColumn('number', 'Price');
		
        for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
       var options = {
          title: 'plus2net.com Sales Profit',
          hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));
        chart.draw(data, options);
       }
	///////////////////////////////
////////////////////////////////////	
</script>