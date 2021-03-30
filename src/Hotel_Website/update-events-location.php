<?php include('../../config/connection.php');

//entering the event details
if (isset($_POST['update-event-details'])) {
    $existingEventID = $_POST['events_id'];
    $additionalFeatures = $_POST['additional'];
    $noOfGuests = $_POST['number-of-guests'];
    $eventType = $_POST['Reservation-type-events'];
    $eventDate = $_POST['events-reservation-date'];
    $eventDuration = $_POST['event-duration'];
    $startingTime;
    $endingTime = $_POST['ending-time'];
    $timeSlot = $_POST['preferred-timeslot'];
    $locationTotalPrice;
    $featurePrice = 0;
    $startingTimePeriod;

    if ($timeSlot == 'Morning') {
        $startingTime = $_POST['morning-time'];
        $startingTimePeriod = "Morning";
    } else if ($timeSlot == 'Afternoon') {
        $startingTime = $_POST['afternoon-time'];
        $startingTimePeriod = "Afternoon";
    } else {
        $startingTime = $_POST['dinner-time'];
        $startingTimePeriod = "Night";
    }

    //to check whether the existing bookings are already there
    $getBookingsOnDay = mysqli_query($con, " SELECT * FROM events_booking WHERE Reservation_Date='" . $eventDate . "' AND Starting_Time_Period='" . $startingTimePeriod . "' ORDER BY Starting_Time ASC ");
    if (mysqli_num_rows($getBookingsOnDay) > 0) {
        while ($rowAvailability = mysqli_fetch_assoc($getBookingsOnDay)) {
            $startDBTime = date("H:i:s", strtotime($rowAvailability['Starting_Time'])); //converting the time which takes from db to date format
            $startInputTime = date("H:i:s", strtotime($startingTime));
            $endDBTime = date("H:i:s", strtotime($rowAvailability['Ending_Time']));
            $endInputTime = date("H:i:s", strtotime($endingTime));
            if (($startInputTime == $startDBTime) || ($endInputTime == $endDBTime) || ($startInputTime == $endDBTime) || ($endDBTime == $startInputTime)) {
                echo '<script>alert("The timeslot and the date which you have selected is being already take 1")
                            window.location.href="events-booking-form.php"
                        </script>';
            } else if ($startInputTime > $startDBTime && $startInputTime < $endDBTime) {
                echo '<script>alert("The timeslot and the date which you have selected is being already take 2")
                            window.location.href="events-booking-form.php"
                        </script>';
            } else if ($startInputTime > $startDBTime && $endInputTime < $endDBTime) {
                echo '<script>alert("The timeslot and the date which you have selected is being already take 4")
                window.location.href="events-booking-form.php"
            </script>';
            } else {
                //to select the location price and the other features according to the event-type by adding other features
                $selectLocationPrice = mysqli_query($con, "SELECT * FROM event_location_features  WHERE Event_Type='" . $eventType . "'");
                if (mysqli_num_rows($selectLocationPrice) > 0) {
                    while ($rowLocPrice = mysqli_fetch_assoc($selectLocationPrice)) {
                        $locationTotalPrice = $rowLocPrice['Location_Price'] * $eventDuration;
                        foreach ($additionalFeatures as $feature) {
                            if ($feature == 'DJMusic') {
                                $featurePrice += $rowLocPrice['DJ_Price'];
                            } else if ($feature == 'Decorations') {
                                $featurePrice += $rowLocPrice['Decoration_Price'];
                            } else if ($feature == 'ChampaigneTables') {
                                $featurePrice += $rowLocPrice['Champaigne_Price'];
                            }
                        }
                    }
                }
                $locationTotalPrice += $featurePrice;
                $mealPackageID = 0; //inital meal packageID, since its not selected
                $serializedAdditionalFeatures = serialize($additionalFeatures);
                // echo $serializedAdditionalFeatures;
                // $insertEvent = "INSERT into events_booking_temp (Customer_Name,Customer_Email,Num_Guests,Event_Type,Reservation_Date,Starting_Time,Ending_Time,MealPackage_ID,Price,Feature_Price,Location_Price,Selected_Features) VALUES ('$customerName','$customerEmail','$noOfGuests','$eventType','$eventDate','$startingTime','$endingTime','$mealPackageID','$locationTotalPrice','$featurePrice','$locationPrice','" . $serializedAdditionalFeatures . "";
                $getMealPackageID = mysqli_query($con, "SELECT MealPackage_ID FROM events_booking WHERE Events_ID='" . $existingEventID . "'");
                $rowPackageID = mysqli_fetch_assoc($getMealPackageID);
                $packageID = $rowPackageID['MealPackage_ID'];
                $getMealPackagePriceQuery = mysqli_query($con, "SELECT price from events_meal_packages WHERE Package_ID='" . $packageID . "'");
                $rowPackagePrice = mysqli_fetch_assoc($getMealPackagePriceQuery);
                $packagePrice = $rowPackagePrice['price'];
                $updatedMealPrice = $packagePrice * (int)$noOFGuests;
                $updatedTotalPrice = $updatedMealPrice + $locationPrice;
                $updateEvent = "UPDATE events_booking SET Num_Guests='$noOFGuests',Event_Type='$eventType',Reservation_Date='$eventDate',Starting_Time='$startingTime',Ending_Time='$endingTime',Selected_Features='$serializedAdditionalFeatures',Location_Price='$locationPrice',Meal_Price='$updatedMealPrice',Total_Amount='$updatedTotalPrice' WHERE Events_ID='" . $existingEventID . "'";
                $updateEventQuery = mysqli_query($con, $updateEvent);
                if ($updateEventQuery) {
                    echo '<script>alert("Your Booking Details Have Successfully Updated")</script>';
                    header('location:./HomePage-login.php?id=' . $existingEventID . '');
                } else {
                    header('location:./HomePage-login.php?id=' . $existingEventID . '');
                }
            }
        }
    } else {
        //to select the location price and the other features according to the event-type by adding other features
        $selectLocationPrice = mysqli_query($con, "SELECT * FROM event_location_features  WHERE Event_Type='" . $eventType . "'");
        if (mysqli_num_rows($selectLocationPrice) > 0) {
            while ($rowLocPrice = mysqli_fetch_assoc($selectLocationPrice)) {
                $locationTotalPrice = $rowLocPrice['Location_Price'] * $eventDuration;
                $locationPrice = $rowLocPrice['Location_Price'] * $eventDuration;
                foreach ($additionalFeatures as $feature) {
                    if ($feature == 'DJMusic') {
                        $featurePrice += $rowLocPrice['DJ_Price'];
                    } else if ($feature == 'Decorations') {
                        $featurePrice += $rowLocPrice['Decoration_Price'];
                    } else if ($feature == 'ChampaigneTables') {
                        $featurePrice += $rowLocPrice['Champaigne_Price'];
                    }
                }
            }
        }
        $locationTotalPrice += $featurePrice;
        $mealPackageID = 0; //inital meal packageID, since its not selected
        $serializedAdditionalFeatures = serialize($additionalFeatures);
        // echo $serializedAdditionalFeatures;
        // $insertEvent = "INSERT into events_booking_temp (Customer_Name,Customer_Email,Num_Guests,Event_Type,Reservation_Date,Starting_Time,Ending_Time,MealPackage_ID,Price,Feature_Price,Location_Price,Selected_Features) VALUES ('$customerName','$customerEmail','$noOfGuests','$eventType','$eventDate','$startingTime','$endingTime','$mealPackageID','$locationTotalPrice','$featurePrice','$locationPrice','" . $serializedAdditionalFeatures . "";
        $getMealPackageID = mysqli_query($con, "SELECT MealPackage_ID FROM events_booking WHERE Events_ID='" . $existingEventID . "'");
        $rowPackageID = mysqli_fetch_assoc($getMealPackageID);
        $packageID = $rowPackageID['MealPackage_ID'];
        $getMealPackagePriceQuery = mysqli_query($con, "SELECT price from events_meal_packages WHERE Package_ID='" . $packageID . "'");
        $rowPackagePrice = mysqli_fetch_assoc($getMealPackagePriceQuery);
        $packagePrice = $rowPackagePrice['price'];
        $updatedMealPrice = $packagePrice * $noOFGuests;
        $updatedTotalPrice = $updatedMealPrice + $locationPrice;
        $updateEvent = "UPDATE events_booking SET Num_Guests='" . $noOFGuests . "',Event_Type='$eventType',Reservation_Date='$eventDate',Starting_Time='$startingTime',Ending_Time='$endingTime',Selected_Features='$serializedAdditionalFeatures',Location_Price='$locationPrice',Meal_Price='$updatedMealPrice',Total_Amount='$updatedTotalPrice' WHERE Events_ID='" . $existingEventID . "'";
        $updateEventQuery = mysqli_query($con, $updateEvent);
        if ($updateEventQuery) {
            echo '<script>alert("Your Booking Details Have Successfully Updated")</script>';
            header('location:./HomePage-login.php');
        } else {
            header('location:./HomePage-login.php?id=' . $existingEventID . '');
        }
    }
}
