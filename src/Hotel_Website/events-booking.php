<?php include('../../config/connection.php');
$additionalFeatures = implode(',', $_POST['additional']);
if (isset($_POST['payment'])) {
    $customerName = $_POST['customer-name'];
    $customerEmail = $_POST['customer-email'];
    $noOfGuests = $_POST['number-of-guests'];
    $eventType = $_POST['Reservation-type-events'];
    $eventDate = $_POST['events-reservation-date'];
    $startingTime = $_POST['starting-time'];
    $endingTime = $_POST['ending-time'];
    $mealPackageID = 2;
    $price = 10;
    $insertEvent = "INSERT into events_booking (Customer_Name,Customer_Email,Num_Guests,Event_Type,Reservation_Date,Starting_Time,Ending_Time,MealPackage_ID,Price) VALUES ('$customerName','$customerEmail','$noOfGuests','$eventType','$eventDate','$startingTime','$endingTime','$mealPackageID',$price)";
    mysqli_query($con, $insertEvent);
}
