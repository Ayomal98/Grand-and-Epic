<?php
include('../../config/connection.php');

//
if (isset($_POST['Next'])) {
    $occupancy = $_POST['occupancy-select'];
    $reservationType = $_POST['reservation-type'];
    $noKids = (int)$_POST['No-Kids'];
    $noAdults = (int) $_POST['No-Adults'];
    $checkInTime = $_POST['check-in-time'];
    $checkOutTime = $_POST['check-out-time'];
    $checkInDate = $_POST['check-in-Date'];
    $checkOutDate = $_POST['check-out-Date'];
    $roomNumber = $_POST['room-number'];
    $mealSelection = $_POST['meal-selection'];
    $emailUser = $_POST['emailUser'];
    $noRooms = 1;
    $noOccupants = $noKids + $noAdults;
    $insertRoomDetails = mysqli_query($con, "INSERT into stayingin_booking_temp (Occupancy,No_Occupants,No_Rooms,Meal_Selection,Reservation_Type,CheckIn_Date,CheckOut_Date,CheckIn_Time,CheckOut_Time,User_Email) VALUES('$occupancy','$noOccupants','$noRooms','$mealSelection','$reservationType','$checkInDate','$checkOutDate','$checkInTime','$checkOutTime','$emailUser')");

    if ($insertRoomDetails < 0) {
        echo 'Data has not been entered';
    } else {
        $stayingIn_ID;
        $selectTempBookingID = mysqli_query($con, "SELECT StayingIn_ID FROM stayingin_booking_temp WHERE User_Email='$emailUser'");
        while ($row = mysqli_fetch_assoc($selectTempBookingID)) {
            $stayingIn_ID = $row['StayingIn_ID'];
        }
        header('location:stayingin-user-payment.php?temp_id=' . $stayingIn_ID . '');
    }
}
if (isset($_POST['BOOK_SUITE'])) {
}
