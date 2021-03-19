<?php include('../../config/connection.php');

//entering the event details
if (isset($_POST['event-details'])) {
    $additionalFeatures = $_POST['additional'];
    $customerName = $_POST['customer-name'];
    $customerEmail = $_POST['customer-email'];
    $noOfGuests = $_POST['number-of-guests'];
    $eventType = $_POST['Reservation-type-events'];
    $eventDate = $_POST['events-reservation-date'];
    $eventDuration = $_POST['event-duration'];
    $startingTime;
    $endingTime = $_POST['ending-time'];
    $timeSlot = $_POST['preferred-timeslot'];
    $locationPrice;
    if ($timeSlot == 'Morning') {
        $startingTime = $_POST['morning-time'];
    } else if ($timeSlot == 'Afternoon') {
        $startingTime = $_POST['afternoon-time'];
    } else {
        $startingTime = $_POST['dinner-time'];
    }

    //to select the location price according to the event-type by adding other features
    $selectLocationPrice = mysqli_query($con, "SELECT * FROM event_location_features  WHERE Event_Type='$eventType'");
    if (mysqli_num_rows($selectLocationPrice) > 0) {
        while ($rowLocPrice = mysqli_fetch_assoc($selectLocationPrice)) {
            $locationPrice = $rowLocPrice['Location_Price'] * $eventDuration;
            foreach ($additionalFeatures as $feature) {
                if ($feature == 'DJMusic') {
                    $locationPrice += $rowLocPrice['DJ_Price'];
                } else if ($feature == 'Decorations') {
                    $locationPrice += $rowLocPrice['Decoration_Price'];
                } else if ($feature == 'ChampaigneTables') {
                    $locationPrice += $rowLocPrice['Champaigne_Price'];
                }
            }
        }
    }
    $mealPackageID = 0; //inital meal packageID, since its not selected
    $insertEvent = "INSERT into events_booking_temp (Customer_Name,Customer_Email,Num_Guests,Event_Type,Reservation_Date,Starting_Time,Ending_Time,MealPackage_ID,Price) VALUES ('$customerName','$customerEmail','$noOfGuests','$eventType','$eventDate','$startingTime','$endingTime','$mealPackageID','$locationPrice')";
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

//selecting the mealss
if (isset($_POST['Select_Meal'])) {
    $packageID = $_POST['packageID'];
    $eventsID = $_POST['eventsID'];
    $priceSql = "SELECT * from events_booking_temp WHERE Events_ID='$eventsID' ";
    $packagePriceSql = "SELECT price from events_meals_packages WHERE Package_ID='$packageID'";
    $evtExc = mysqli_query($con, $priceSql);
    $priceExc = mysqli_query($con, $packagePriceSql);
    $totalPrice = 0;
    $noOFGuests = 0;
    while ($row = mysqli_fetch_assoc($evtExc)) {
        $noOFGuests = $row["Num_Guests"];
        $totalPrice += $row["Price"];
    }
    while ($row = mysqli_fetch_assoc($priceExc)) {
        $totalPrice += $row["price"] * $noOFGuests;
    }
    $updateTotalPrice = "UPDATE events_booking_temp SET MealPackage_ID='" . $packageID . "',Price='$totalPrice' WHERE Events_ID='$eventsID' ";
    if (mysqli_query($con, $updateTotalPrice)) {
        echo '<script>console.log(' . $packageID . ')</script>';
        header('location:meal-selection.php?events_id=' . $eventsID . '');
    } else {
        echo "Not updated";
    }
}
