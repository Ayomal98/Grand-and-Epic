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
?>

