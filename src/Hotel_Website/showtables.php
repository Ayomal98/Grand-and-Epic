<?php include("../Templates/connection.php");
// include("dinein-booking.php");
$number_of_tables = 15;
// $showTablesQuery = "SELECT Table_No,Time,isBooked FROM tables";
// $showBookingsQuery = "SELECT Table_No,Time,Date FROM dinein_booking ";
// $resultBooked = mysqli_query($con, $showBookingsQuery);
// if (mysqli_num_rows($resultBooked) > 0) {
//     while ($row = mysqli_fetch_assoc($resultBooked)) {
//         $table_no = $row['Table_No'];
//         if ($date === $row['Date'] && $timeperiod == $row['Time'])
//             echo "<div class=\"dot not-avb\"><span>$table_no</span></div>";
//     }
// }

// $result = mysqli_query($con, $showTablesQuery);

for ($x = 1; $x <= $number_of_tables; $x++) {
    echo "<div class=\"dot \"><span>$x</span></div>";
}
