<!-- This page contains the retrival of tables initially-->

<?php include("../../config/connection.php");
$tableDisplayQuery = "SELECT * FROM tables";  //query to display the table details
$tableResult = mysqli_query($con, $tableDisplayQuery);
while ($row = mysqli_fetch_assoc($tableResult)) {     //to display details  of table section result
    $no_Of_Customers = $row["No_Customers"];
    $table_No = $row["Table_No"];
    echo "<div>
            <div class=\"dot \">
                <span>$table_No</span>
            </div>
            <div style=\"margin-left:-40px\">Customers Allowed : $no_Of_Customers </div>
          </div>";
}
