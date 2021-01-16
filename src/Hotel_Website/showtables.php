<!-- This page contains the retrival of tables initially-->

<?php include("../../config/connection.php");
$tableDisplayQuery = "SELECT * FROM tables";  //query to display the table details
$tableResult = mysqli_query($con, $tableDisplayQuery);
$tableParticipant = array();
while ($row = mysqli_fetch_assoc($tableResult)) {     //to display details  of table section result
    $no_Of_Customers = $row["No_Customers"];
    $table_No = $row["Table_No"];
    $tableParticipant += array($table_No => $no_Of_Customers);
    echo "<div>
                <div class=\"dot \">
                    <span>$table_No</span>
                </div>
                <div style=\"margin-left:-40px;\">Guests Allowed : $no_Of_Customers </div>
            </div>";
}
