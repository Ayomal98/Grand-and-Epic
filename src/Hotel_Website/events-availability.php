<?php
include('../../config/connection.php');
$dateSelected = $_POST['dateSelected'];
$datearray = $_POST['datearray'];
$timeSlot = $_POST['timeslot'];
$morningTime = $_POST['morningTime'];
$afternoonTime = $_POST['afternoonTime'];
$nightTime = $_POST['nightTime'];

//find the existing bookings on that day
$monthNum  = $datearray[1]; // to get the month number from array
$day = $datearray[2];
echo $timeSlot;
$monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
$getBookingsOnDay = "SELECT * FROM events_booking WHERE Reservation_Date=' $dateSelected ' ";

$exceceuteSearch = mysqli_query($con, $getBookingsOnDay);
if (mysqli_num_rows($exceceuteSearch) > 0) {
    echo '<div><i class="fas fa-times-circle" style="position:absolute;top:5%;left:90%;color:black;font-size:20px;cursor:pointer" onclick="closeAvailability()"></i></div>
        <div style="text-align: center;"><span style="color: black;font-weight:bolder;font-size:16px;position:absolute;top:12%;left:25%">' . $day . ' ' . $monthName . ' Booked Events </span></div>
        <table border="1px solid black" style="background-color: black;position:absolute;top:28%;left:10%;border-radius:5px;">
            <thead>
                <tr>
                    <th style="padding:5px">Starting Time</th>
                    <th style="padding:5px">Ending Time</th>
                    <th style="padding:5px">Availability</th>
                </tr>
            </thead>
            <tbody>';
    while ($row = mysqli_fetch_assoc($exceceuteSearch)) {
        echo '
                            <tr>
                                <td style="padding: 5px;">' . $row['Starting_Time'] . '</td>
                                <td style="padding: 5px;">' . $row['Ending_Time'] . '</td>
                                <td style="padding: 5px 10px;"><i class="fa fa-times" aria-hidden="true"></i>
                                </td>
                            </tr>';
    }
    echo ' </tbody>
                    </table>
                    <div style="color: black;position:absolute;right:8%;top:84%;margin-bottom:10px"><i class="fa fa-times"><span style="margin-left: 10px;">Not Available</span></i></div>
                </div> ';
} else {
    echo '<h3 style="color:black">No Bookings on ' . $dateSelected . '</h3>';
}
