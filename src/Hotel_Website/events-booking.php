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
    $insertEvent = "INSERT into events_booking_temp (Customer_Name,Customer_Email,Num_Guests,Event_Type,Reservation_Date,Starting_Time,Ending_Time,MealPackage_ID,Price) VALUES ('$customerName','$customerEmail','$noOfGuests','$eventType','$eventDate','$startingTime','$endingTime','$mealPackageID',$price)";
    mysqli_query($con, $insertEvent);
    $selectEventID = "SELECT * from events_booking_temp WHERE Customer_Email='$customerEmail' ";
    if ($resultID = mysqli_query($con, $selectEventID)) {
        while ($rowEvent = mysqli_fetch_assoc($resultID)) {
            $eventID = $rowEvent["Events_ID"];
            header('location:meal-selection.php?events_id=' . $eventID . '');
        }
    } else {
        header('location:./HomePage-login.php');
    }
}

if (isset($_POST['Select_Meal'])) {
    $packageID = $_POST['packageID'];
    $eventsID = $_POST['eventsID'];
    $priceSql = "SELECT * from events_booking_temp WHERE Events_ID='$eventsID' ";
    $packagePriceSql = "SELECT price from events_meals_packages WHERE Package_ID='$packageID'";
    $evtExc = mysqli_query($con, $priceSql);
    $priceExc = mysqli_query($con, $packagePriceSql);
    $total = 0;
    while ($row = mysqli_fetch_assoc($evtExc)) {
        $total += $row["Price"];
    }
    while ($row = mysqli_fetch_assoc($priceExc)) {
        $total += $row["price"];
    }
    echo $total;
}
