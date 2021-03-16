<?php
include('../../config/connection.php');
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
    $noRooms = 1;
    $noOccupants = $noKids + $noAdults;
    echo $noOccupants;
    $insertRoomDetails = mysqli_query($con, "INSERT into stayingin_booking (Occupancy,No_Occupants,No_Rooms,Meal_Selection,Reservation_Type,CheckIn_Date,CheckOut_Date,CheckIn_Time,CheckOut_Time) VALUES('$occupancy','$noOccupants','$noRooms','$mealSelection','$reservationType','$checkInDate','$checkOutDate','$checkInTime','$checkOutTime')");
    if ($insertRoomDetails < 0) {
        echo 'Data has not been entered';
    } else {
        echo 'Data has been entered';
    }
}
