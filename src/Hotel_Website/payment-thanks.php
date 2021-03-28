<?php include('../../config/vendor/autoload.php');

include('../../public/includes/id-generator.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
    <title>Payment Successfull</title>
</head>


<body style="background-color: black;color:white">
    <img src="../../public/images/Logo.png" style="margin-left:600px;height:200px;margin-top:40px">
    <div style="text-align: center;font-size:64px;font-weight:bold;margin-top:20px">Thank You!</div>
    <i class="fas fa-check-circle" style="font-size: 150px;color:white;margin-left:700px;margin-top:25px"></i>
    <h3 style="text-align: center;margin-top:20px">Your Booking procedure has been Successfully completed & we are looking forward to having you here.</h3>
</body>

</html>
<?php
include('../../config/connection.php');
if ($_GET['type'] == 'events') {
    $events_ID = $_GET['id'];
    $reservationType = $_GET['type'];
    $getEventDetailsTemp = mysqli_query($con, "SELECT * FROM events_booking_temp WHERE Events_ID='$events_ID'");
    $getAdvancePercentage = mysqli_query($con, "SELECT Advance_Percentage FROM advance_amount_table WHERE Reservation_Type='Events'");
    $rowAdvance = mysqli_fetch_assoc($getAdvancePercentage);
    $advancePercentageValue = $rowAdvance['Advance_Percentage'];
    $reservationID = getID('Reservation', 'R');
    while ($row = mysqli_fetch_assoc($getEventDetailsTemp)) {
        $eventID = getID('events_booking', 'E'); //generating events ID
        $customer_Name = $row["Customer_Name"];
        $customer_Email = $row["Customer_Email"];
        $num_Guests = $row["Num_Guests"];
        $event_Type = $row["Event_Type"];
        $reservation_Date = $row["Reservation_Date"];
        $starting_Time = $row["Starting_Time"];
        $ending_Time = $row["Ending_Time"];
        $timeDuration = date("H", (strtotime($ending_Time) - strtotime($starting_Time)) - 1);
        $mealPackage_ID = $row["MealPackage_ID"];
        $feature_Price = $row["Feature_Price"];
        $location_Price = $row["Location_Price"];
        $totalAmount = $row["Price"];
        $mealPrice = $totalAmount - ($location_Price + $feature_Price);
        $paidAmount = ($totalAmount * $advancePercentageValue) / 100;
        $amountToBePaid = $totalAmount - $paidAmount;
        $paymentStatus = 0;
        $features = $row["Selected_Features"];
        $getFeaturePrice = mysqli_query($con, "SELECT * FROM event_location_features WHERE Event_Type='" . $event_Type . "'");
        $rowFeaturePrice = mysqli_fetch_assoc($getFeaturePrice);
        $dj_price = $rowFeaturePrice['DJ_Price'];
        $decoration_price = $rowFeaturePrice['Decoration_Price'];
        $champaigne_price = $rowFeaturePrice['Champaigne_Price'];
        $paymentSuccessEvent = mysqli_query($con, "INSERT into events_booking(Events_ID,Customer_Name,Customer_Email,Num_Guests,Event_Type,Reservation_Date,Starting_Time,Ending_Time,MealPackage_ID,Total_Amount,Paid_amount,Selected_Features,Location_Price,Meal_Price) VALUES('$eventID','$customer_Name','$customer_Email','$num_Guests','$event_Type','$reservation_Date','$starting_Time','$ending_Time','$mealPackage_ID','$totalAmount','$paidAmount','$features','$location_Price','$mealPrice')");
        $insertToReservationTable = mysqli_query($con, "INSERT into reservation (Reservation_ID,Reservation_Type,Payment_Status,Booking_ID,User_Email,Customer_Name,Amount_Paid,Amount_To_Be_Paid,Reservation_Date) VALUES('$reservationID','$reservationType','$paymentStatus','$eventID','$customer_Name','$customer_Email','$paidAmount','$amountToBePaid','$reservation_Date')");
        if ($paymentSuccessEvent) {
            $html_evt = '<img src=\'../../public/images/Logo.png\' style=\'margin-left:600px;height:100px;margin-top:20px;margin-bottom:10px\'>';
            $html_evt .= '<h1 style=\'text-align:center\'><u>Payment Details</u></h1>';
            $html_evt .= '<p>Dear ' . $customer_Name . ' ,</p>';
            $html_evt .= '<p>Thank you for trusting us on celebrate your special day & giving us the chance provide it even more beautiful.We are Looking Forward to having you.Given below are the brief payment details which you have made. </p>';
            $html_evt .= '<h2>Location Deatils</h2>';
            $html_evt .= '<table><thead><tr><th style=\'border:1px solid black\'>Event Type</th><th style=\'border:1px solid black\'>No Guests</th><th style=\'border:1px solid black\'>Reservation Date</th><th style=\'border:1px solid black\'>Starting Time</th><th style=\'border:1px solid black\'>Ending Time</th><th style=\'border:1px solid black\'>Event Duration</th><th style=\'border:1px solid black\'>Location Price</th></tr></thead>';
            $html_evt .= '<tr><td style=\'border:1px solid black\'>' . $event_Type . '</td><td style=\'border:1px solid black\'>' . $num_Guests . '</td><td style=\'border:1px solid black\'>' . $reservation_Date . '</td><td style=\'border:1px solid black\'>' . $starting_Time . '</td><td style=\'border:1px solid black\'>' . $ending_Time . '</td><td style=\'border:1px solid black\'>' . $timeDuration . ' hours</td><td style=\'border:1px solid black\'>' . $location_Price . '</td></tr>';
            $html_evt .= "</table>";
            $html_evt .= "<h2>Feature Details Details</h1>";
            $html_evt .= '<table><thead><tr><th style=\'border:1px solid black\'>Feature Name </th><th style=\'border:1px solid black\'>Feature Price</th></tr></thead>';
            $featuresArr = unserialize($features);
            foreach ($featuresArr as $feature) {
                $html_evt .= '<tr><td style=\'border:1px solid black\'>' . $feature . '</td>';
                if ($feature == 'DJMusic') {
                    $html_evt .= '<td style=\'border:1px solid black\'>' . $dj_price . '</td></tr>';
                } else if ($feature == 'Decorations') {
                    $html_evt .= '<td style=\'border:1px solid black\'>' . $decoration_price . '</td></tr>';
                } else {
                    $html_evt .= '<td style=\'border:1px solid black\'>' . $champaigne_price . '</td></tr>';
                }
            }
            $html_evt .= '</table>';
            $html_evt .= '<h2>Total Price</h2>';
            $html_evt .= '<table><thead><tr><th style=\'border:1px solid black\'>Location Price</th><th style=\'border:1px solid black\'>Feature Price</th><th style=\'border:1px solid black\'>Meal Price</th><th style=\'border:1px solid black\'>Total Price</th></tr></thead>';
            $html_evt .= '<tr><td style=\'border:1px solid black\'>' . $location_Price . '</td><td style=\'border:1px solid black\'>' . $feature_Price . '</td><td style=\'border:1px solid black\'>' . $mealPrice . '</td><td style=\'border:1px solid black\'>' . $totalAmount . '</td></tr>';
            $html_evt .= '</table>';
            $deleteTempEvtDetails = mysqli_query($con, "DELETE FROM events_booking_temp WHERE Events_ID='$events_ID'");
            if ($deleteTempEvtDetails) {
                $mpdf = new \Mpdf\Mpdf();
                $mpdf->WriteHTML($html_evt);
                $file = time() . '.pdf';
                $mpdf->Output($file, 'D');
            }
        }
    }
} else if ($_GET['type'] == 'staying-in') {
    $stayingInId = $_GET['id'];
    $reservationtype = $_GET['type'];
    $selectTemp = mysqli_query($con, "SELECT * FROM stayingin_booking_temp WHERE StayingIn_ID='$stayingInId'");
    while ($rowStayingIn = mysqli_fetch_assoc($selectTemp)) {
        $stayingInId = getID("stayingin_booking", "S"); //generating stayingin ID
        $reservation_Stay_ID = getID('Reservation', 'R');
        $occupancy = $rowStayingIn['Occupancy'];
        $noOccupants = $rowStayingIn['No_Occupants'];
        $noRooms = $rowStayingIn['No_Rooms'];
        $roomNumbers = ($rowStayingIn['Room_Numbers']);
        $mealSelection = $rowStayingIn['Meal_Selection'];
        $reservationType = $rowStayingIn['Reservation_Type'];
        $checkInDate = $rowStayingIn['CheckIn_Date'];
        $checkOutDate = $rowStayingIn['CheckOut_Date'];
        $dateDifference = strtotime($checkOutDate) - strtotime($checkInDate);
        $duration = round(($dateDifference) / (60 * 60 * 24));
        $checkInTime = $rowStayingIn['CheckIn_Time'];
        $checkOutTime = $rowStayingIn['CheckOut_Time'];
        $roomType = $rowStayingIn['Room_Type'];
        $emailUser = $rowStayingIn['User_Email'];
        $roomPrice = $rowStayingIn['Room_Price'];
        $mealPrice = $rowStayingIn['Meal_Price'];
        $paymentStatus = 0;
        // echo $roomNumbers;
        $totalAmountStayingIn = $mealPrice + $roomPrice;
        $paidAmountStayingIn = $totalAmountStayingIn * 0.2;
        $amountToBePaidStayin = $totalAmountStayingIn - $paidAmountStayingIn;
        $selectName = mysqli_query($con, "SELECT First_Name FROM customer WHERE Email='" . $emailUser . "'");
        $rowName = mysqli_fetch_assoc($selectName);
        $userName = $rowName['First_Name'];
        $paymentSuccessStayingIn = mysqli_query($con, "INSERT into stayingin_booking (StayingIn_ID,Occupancy,No_Occupants,No_Rooms,Room_Numbers,Meal_Selection,Reservation_Type,CheckIn_Date,CheckOut_Date,CheckIn_Time,CheckOut_Time,Room_Type,User_Email,Room_Price,Meal_Price,Paid_Amount,Total_Amount) VALUES('$stayingInId','$occupancy','$noOccupants','$noRooms','" . $roomNumbers . "','$mealSelection','$reservationType','$checkInDate','$checkOutDate','$checkInTime','$checkOutTime','$roomType','$emailUser','$roomPrice','$mealPrice','$paidAmountStayingIn','$totalAmountStayingIn')");
        $insertToReservationTable_Stay = mysqli_query($con, "INSERT into reservation (Reservation_ID,Reservation_Type,Payment_Status,Booking_ID,User_Email,Customer_Name,Amount_Paid,Amount_To_Be_Paid,Reservation_Date) VALUES('$reservation_Stay_ID','$reservationtype','$paymentStatus','$stayingInId','$emailUser','$userName','$paidAmountStayingIn','$amountToBePaidStayin','$checkOutDate')");
        if ($paymentSuccessStayingIn) {
            // $selectStayingInDetails = "SELECT * FROM stayingin_booking WHERE StayingIn_ID='$stayingInId'";
            $html = '<h1 style=\'text-align:center\'>Payment Details</h1>';
            if ($mealSelection == 'Customized') {
                $html .= '<h2>Room Details</h2>';
                $html .= '<table><thead><tr><th style=\'border:1px solid black\'>Room Type</th><th style=\'border:1px solid black\'>No.Rooms</th><th style=\'border:1px solid black\'>Check-In Date</th><th style=\'border:1px solid black\'>Check-Out Date</th><th style=\'border:1px solid black\'>Check-In Time</th><th style=\'border:1px solid black\'>Check-Out Time</th><th style=\'border:1px solid black\'>No.Of Participants</th></tr></thead>';
                $html .= '<tr><td style=\'border:1px solid black\'>' . $roomType . '</td><td style=\'border:1px solid black\'>' . $noRooms . '</td><td style=\'border:1px solid black\'>' . $checkInDate . '</td><td style=\'border:1px solid black\'>' . $checkOutDate . '</td><td style=\'border:1px solid black\'>' . $checkInTime . '</td><td style=\'border:1px solid black\'>' . $checkOutTime . '</td><td style=\'border:1px solid black\'>' . $noOccupants . '</td></tr>';
                $html .= "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td style='border:1px solid black'>Rs." . number_format($totalAmountStayingIn, 2) . "</td></tr>";
                $html .= "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td style='font-weight:bolder'>Total Amount</td></tr>";
                $html .= "</table>";
                $html .= '<h2>Meal Details</h2>';
            } else if ($mealSelection == 'Set-Menu') {

                $html = '<img src=\'../../public/images/Logo.png\' style=\'margin-left:300px;height:100px;margin-top:-50px;margin-bottom:10px\'>';
                $html .= '<h1 style=\'text-align:center\'><u>Payment Details</u></h1>';
                $html .= '<p>Dear ' . $userName . ' ,</p>';
                $html .= '<p>Thank you for trusting us on Selecting as us your holiday destination.We are Looking Forward to having you Again & hopefully you did aslo have great time here.Given below are the brief payment details which you have made. </p>';
                $html .= "<h2 style='text-align:center'>Room Details</h2>";
                $html .= "<table><thead><tr><th style='border:1px solid black'>Room Type</th><th style='border:1px solid black'>Reservation Type</th><th style='border:1px solid black'>No.Rooms</th><th style='border:1px solid black'>Duration</th><th style='border:1px solid black'>Check-In Date</th><th style='border:1px solid black'>Check-Out Date</th><th style='border:1px solid black'>Check-In Time</th><th style='border:1px solid black'>Check-Out Time</th><th style='border:1px solid black'>No.Of Participants</th></tr></thead>";
                $html .= "<tr><<td style='border:1px solid black'> $roomType </td><td style='border:1px solid black'> $reservationType </td><td style='border:1px solid black'>$noRooms </td><td style='border:1px solid black'>$duration Days</td><td style='border:1px solid black'>$checkInDate </td><td style='border:1px solid black'>$checkOutDate </td><td style='border:1px solid black'>$checkInTime</td><td style='border:1px solid black'>$checkOutTime </td><td style='border:1px solid black'>$noOccupants </td></tr>";
                $html .= "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td style='border:1px solid black'>Rs." . number_format($roomPrice, 2) . "</td></tr>";
                $html .= "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><th>Total Room Price</th></tr>";
                $html .= "</table>";
                $html .= "<h2 style='text-align:center'>Meal Details</h2>";
                $selectSetMenuFood = mysqli_query($con, "SELECT * FROM stayingin_setmenu");
                $html .= "<table><thead><tr><th style='border:1px solid black'>Meal Type</th><th style='border:1px solid black'>First Meal</th><th style='border:1px solid black'>Second Meal</th><th style='border:1px solid black'>Third Meal</th><th style='border:1px solid black'>Fourth Meal</th><th style='border:1px solid black'>Fifth Meal</th><th style='border:1px solid black'>Price For Meal</th></tr></thead>";
                while ($rowSetMenuFood = mysqli_fetch_assoc($selectSetMenuFood)) {
                    if ($reservationType == 'Half-board') {
                        if ($rowSetMenuFood["Meal_Type"] == 'Breakfast') {
                            $html .= '<tr><td style="border:1px solid black">' . $rowSetMenuFood['Meal_Type'] . '</td><td style="border:1px solid black">' . $rowSetMenuFood["Meal1"] . '</td><td style="border:1px solid black">' . $rowSetMenuFood["Meal2"] . '</td><td style="border:1px solid black">' . $rowSetMenuFood["Meal3"] . '</td><td style="border:1px solid black">' . $rowSetMenuFood["Meal4"] . '</td><td style="border:1px solid black">' . $rowSetMenuFood["Meal5"] . '</td><td style="border:1px solid black">' . $rowSetMenuFood["Price"] . '</td></tr>';
                        } else if ($rowSetMenuFood["Meal_Type"] == 'Dinner') {
                            $html .= '<tr><td style="border:1px solid black">' . $rowSetMenuFood['Meal_Type'] . '</td><td style="border:1px solid black">' . $rowSetMenuFood["Meal1"] . '</td><td style="border:1px solid black">' . $rowSetMenuFood["Meal2"] . '</td><td style="border:1px solid black">' . $rowSetMenuFood["Meal3"] . '</td><td style="border:1px solid black">' . $rowSetMenuFood["Meal4"] . '</td><td style="border:1px solid black">' . $rowSetMenuFood["Meal5"] . '</td><td style="border:1px solid black">' . $rowSetMenuFood["Price"] . '</td></tr>';
                        }
                    } else if ($reservationType == 'Full-Board') {
                        $html .= '<tr><td style="border:1px solid black">' . $rowSetMenuFood['Meal_Type'] . '</td><td style="border:1px solid black">' . $rowSetMenuFood["Meal1"] . '</td><td style="border:1px solid black">' . $rowSetMenuFood["Meal2"] . '</td><td style="border:1px solid black">' . $rowSetMenuFood["Meal3"] . '</td><td style="border:1px solid black">' . $rowSetMenuFood["Meal4"] . '</td><td style="border:1px solid black">' . $rowSetMenuFood["Meal5"] . '</td><td style="border:1px solid black">' . $rowSetMenuFood["Price"] . '</td></tr>';
                    }
                }
                $html .= "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td style='border:1px solid black'>Rs." . number_format($mealPrice, 2) . "</td></tr>";
                $html .= "<tr><td></td><td></td><td></td><td></td><td></td><td></td><th>Total Meal Price</th></tr>";
                $html .= "</table>";
                $html .= "<h2 style='text-align:center'>Total Payment Details</h2>";
                $html .= '<table style="margin-left:150px"><thead><tr><th style=\'border:1px solid black\'>Booking ID</th><th style=\'border:1px solid black\'>Room Price</th><th style=\'border:1px solid black\'>Meal Price</th><th style=\'border:1px solid black\'>Total Price</th></tr></thead>';
                $html .= '<tr><th style=\'border:1px solid black\'>' . $stayingInId . '</th><th style=\'border:1px solid black\'>Rs.' . number_format($roomPrice, 2) . '</th><th style=\'border:1px solid black\'>Rs.' . number_format($mealPrice, 2) . '</th><th style=\'border:1px solid black\'>Rs.' . number_format($totalAmountStayingIn, 2) . '</th></tr></thead>';
                $html .= "</table>";
            }
            $deleteTempStayDetails =  mysqli_query($con, "DELETE FROM stayingin_booking_temp WHERE StayingIn_ID='" . $stayingInId . "'");
            if ($deleteTempStayDetails) {
                $mpdf = new \Mpdf\Mpdf();
                $mpdf->WriteHTML($html);
                $file = time() . '.pdf';
                $mpdf->Output($file, 'D');
            }
        }
    }
}
?>