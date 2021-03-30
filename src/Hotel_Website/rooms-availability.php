<?php

use function PHPSTORM_META\type;

include('../../config/connection.php');
$checkIndateSelected = ($_POST['checkIndateSelected']); //converting 'string' date to timestamp
$checkOutdateSelected = ($_POST['checkOutdateSelected']);
$checkInTimeSelected = ($_POST['checkInTimeSelected']);
$checkOutTimeSelected = ($_POST['checkOutTimeSelected']);
$roomType = $_POST['roomtype'];
// echo gettype($checkIndateSelected);
include('../../config/connection.php');
$bookedRoomsArr = array(); //to contain unserialized arr values
$bookedRooms = array();
$selectBookedRooms = mysqli_query($con, "SELECT * FROM stayingin_booking WHERE Room_Type='" . $roomType . " ' AND `CheckIn_Date` >= '" . $checkIndateSelected . "' AND `CheckOut_Date` <='" . $checkOutdateSelected . "'"); //query to get all the booking between checkin date and check out date
$selectBookedRoomsChkOut = mysqli_query($con, "SELECT * FROM stayingin_booking WHERE Room_Type='" . $roomType . " ' AND `CheckIn_Date` <= '" . $checkIndateSelected . "' AND `CheckOut_Date` <='" . $checkOutdateSelected . "'"); //query to get all the booking where the inputed checkin date is as same as reserved checkout date
$selectBookedRoomsChkIn = mysqli_query($con, "SELECT * FROM stayingin_booking WHERE Room_Type='" . $roomType . " ' AND `CheckIn_Date` <= '" . $checkIndateSelected . "' AND `CheckOut_Date` >='" . $checkOutdateSelected . "'"); //query to get all the booking between checkin date and check out date
// $selectBookedRoomsChkInMiddle = mysqli_query($con, "SELECT * FROM stayingin_booking WHERE Room_Type='" . $roomType . " ' AND `CheckIn_Date` < '" . $checkIndateSelected . "' AND `CheckOut_Date` <='" . $checkOutdateSelected . "'"); //query to get all the booking between checkin date and check out date
$selectBookedRoomsChkoutMiddle = mysqli_query($con, "SELECT * FROM stayingin_booking WHERE Room_Type='" . $roomType . " ' AND `CheckIn_Date` >= '" . $checkIndateSelected . "' AND `CheckOut_Date` >='" . $checkOutdateSelected . "'"); //query to get all the booking between checkin date and check out date

if (mysqli_num_rows($selectBookedRooms) > 0) {
    while ($bookedRooms = mysqli_fetch_assoc($selectBookedRooms)) {
        array_push($bookedRoomsArr, unserialize($bookedRooms['Room_Numbers']));
    }
}

if (mysqli_num_rows($selectBookedRoomsChkOut) > 0) {
    while ($rowchkOut = mysqli_fetch_assoc($selectBookedRoomsChkOut)) {
        if ((date("H:i:s", strtotime($checkInTimeSelected)) < date("H:i:s", strtotime($rowchkOut['CheckOut_Time'])))) {
            array_push($bookedRoomsArr, unserialize($rowchkOut['Room_Numbers']));
        }
    }
}
if (mysqli_num_rows($selectBookedRoomsChkIn) > 0) {
    while ($rowchkIn = mysqli_fetch_assoc($selectBookedRoomsChkIn)) {
        if ((date("H:i:s", strtotime($checkOutTimeSelected)) > date("H:i:s", strtotime($rowchkIn['CheckIn_Time'])))) {
            array_push($bookedRoomsArr, unserialize($rowchkIn['Room_Numbers']));
        }
    }
}
if (mysqli_num_rows($selectBookedRoomsChkoutMiddle) > 0) {
    while ($rowchkOutMiddle = mysqli_fetch_assoc($selectBookedRoomsChkIn)) {
        array_push($bookedRoomsArr, unserialize($rowchkOutMiddle['Room_Numbers']));
    }
}
// if (mysqli_num_rows($selectBookedRoomsChkIn) > 0) {
//     while ($rowchkIn = mysqli_fetch_assoc($selectBookedRoomsChkIn)) {
//         if ((date("H:i:s", strtotime($checkOutTimeSelected)) > date("H:i:s", strtotime($rowchkIn['CheckIn_Time'])))) {
//             array_push($bookedRoomsArr, unserialize($rowchkIn['Room_Numbers']));
//         }
//     }
// }
foreach ($bookedRoomsArr as $Rooms) {
    foreach ($Rooms as $Room) {
        $bookedRooms[] = $Room;
    }
}


// print_r($bookedRooms);
$getNoRooms = mysqli_query($con, "SELECT * from rooms where Room_Type=' $roomType '");
$noRooms = mysqli_fetch_assoc($getNoRooms);
for ($roomNo = 1; $roomNo <= $noRooms['NoRooms']; $roomNo++) {
    if (in_array($roomNo, $bookedRooms)) {
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
