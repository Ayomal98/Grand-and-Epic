<?php include('../../config/connection.php');
if (isset($_POST['event-details'])) {
    $additionalFeatures = implode(',', $_POST['additional']);
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
    if (mysqli_query($con, $insertEvent)) {
        $selectEventID = "SELECT Events_ID from events_booking WHERE Customer_Email='$customerEmail' AND Reservation_Date='$eventDate' AND Starting_Time='$startingTime' AND Ending_Time='$endingTime' ";
        $resultID = mysqli_query($con, $selectEventID);
        while ($row = mysqli_fetch_assoc($resultID) > 0) {
            $eventsID = $row["Events_ID"];
            $_SESSION['Event_ID'] = $eventsID;
            header('location:meal-selection.php');
        }
    }
}

if (isset($_POST['Package One'])) {
    echo '<script>alert("Clicked")</script>';
}
