<?php

use function PHPSTORM_META\type;

include('../../config/connection.php');
$checkIndateSelected = ($_POST['checkIndateSelected']); //converting 'string' date to timestamp
$checkOutdateSelected = ($_POST['checkOutdateSelected']);
$checkInTimeSelected = ($_POST['checkInTimeSelected']);
// echo gettype($checkIndateSelected);
include('../../config/connection.php');
$roomType = 'Suite Rooms';
$bookedRoomsArr = array();
$selectBookedRooms = mysqli_query($con, "SELECT * FROM stayingin_booking WHERE Room_Type='" . $roomType . " ' AND `CheckIn_Date` >= '" . $checkIndateSelected . "' AND `CheckOut_Date`<='" . $checkOutdateSelected . "'  ");
if (mysqli_num_rows($selectBookedRooms) > 0) {
    while ($bookedRooms = mysqli_fetch_assoc($selectBookedRooms)) {
        array_push($bookedRoomsArr, $bookedRooms['StayingIn_ID']);
    }
}
$getNoRooms = mysqli_query($con, "SELECT * from rooms where Room_Type=' $roomType '");
$noRooms = mysqli_fetch_assoc($getNoRooms);
for ($roomNo = 1; $roomNo <= $noRooms['NoRooms']; $roomNo++) {
    if (in_array($roomNo, $bookedRoomsArr)) {

        echo    '<div class="suite-icon gold main">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span class="suite-icon-label">Room' . $roomNo . '</span>
             </div>';
    } else {
        echo    '<div class="suite-icon">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span class="suite-icon-label">Room' . $roomNo . '</span>
             </div>';
    }
}
