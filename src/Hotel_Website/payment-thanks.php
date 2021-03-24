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
    <?php
    include('../../config/connection.php');
    if ($_GET['type'] == 'events') {
        $events_ID = $_GET['id'];
        $reservationType = $_GET['type'];
        $getEventDetailsTemp = mysqli_query($con, "SELECT * FROM events_booking_temp WHERE Events_ID='$events_ID'");
        $reservationID = getID('Reservation', 'R');
        while ($row = mysqli_fetch_assoc($getEventDetailsTemp)) {
            $eventID = getID('events_booking', 'E');
            $customer_Name = $row["Customer_Name"];
            $customer_Email = $row["Customer_Email"];
            $num_Guests = $row["Num_Guests"];
            $event_Type = $row["Event_Type"];
            $reservation_Date = $row["Reservation_Date"];
            $starting_Time = $row["Starting_Time"];
            $ending_Time = $row["Ending_Time"];
            $mealPackage_ID = $row["MealPackage_ID"];
            $totalAmount = $row["Price"];
            $paidAmount = $row["Price"] * 0.2;
            $amountToBePaid = $totalAmount - $paidAmount;
            $paymentStatus = 0;
            $paymentSuccessEvent = mysqli_query($con, "INSERT into events_booking(Events_ID,Customer_Name,Customer_Email,Num_Guests,Event_Type,Reservation_Date,Starting_Time,Ending_Time,MealPackage_ID,Total_Amount,Paid_amount) VALUES('$eventID','$customer_Name','$customer_Email','$num_Guests','$event_Type','$reservation_Date','$starting_Time','$ending_Time','$mealPackage_ID','$totalAmount','$paidAmount')");
            $insertToReservationTable = mysqli_query($con, "INSERT into reservation (Reservation_ID,Reservation_Type,Payment_Status,Booking_ID,Customer_Name,Amount_Paid,Amount_To_Be_Paid,Reservation_Date) VALUES('$reservationID','$reservationType','$paymentStatus','$eventID','$customer_Name','$paidAmount','$amountToBePaid','$reservation_Date')");
            if ($paymentSuccessEvent) {
                $deleteTempEvtDetails = mysqli_query($con, "DELETE FROM events_booking_temp WHERE Events_ID='$events_ID'");
            }
        }
    } else if ($_GET['type'] == 'staying-in') {
        $stayingInId = $_GET['id'];
        $reservationType = $_GET['type'];
        $selectTemp = mysqli_query($con, "SELECT * FROM stayingin_booking_temp WHERE StayingIn_ID='$stayingInId'");
        while ($rowStayingIn = mysqli_fetch_assoc($selectTemp)) {
            $stayingInId = getID("stayingin_booking", "S");
            $reservation_Stay_ID = getID('Reservation', 'R');
            $occupancy = $rowStayingIn['Occupancy'];
            $noOccupants = $rowStayingIn['No_Occupants'];
            $noRooms = $rowStayingIn['No_Rooms'];
            $roomNumbers = ($rowStayingIn['Room_Numbers']);
            $mealSelection = $rowStayingIn['Meal_Selection'];
            $reservationType = $rowStayingIn['Reservation_Type'];
            $checkInDate = $rowStayingIn['CheckIn_Date'];
            $checkOutDate = $rowStayingIn['CheckOut_Date'];
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
            $insertToReservationTable_Stay = mysqli_query($con, "INSERT into reservation (Reservation_ID,Reservation_Type,Payment_Status,Booking_ID,Customer_Name,Amount_Paid,Amount_To_Be_Paid,Reservation_Date) VALUES('$reservation_Stay_ID','$reservationType','$paymentStatus','$stayingInId','$userName','$paidAmountStayingIn','$amountToBePaidStayin','$checkInDate')");
            if ($paymentSuccessStayingIn) {
                $selectStayingInDetails = "SELECT * FROM stayingin_booking";
                $html = '<h1 style=\'text-align:center\'>Payment Details</h1>';
                if ($roomType == 'Suite Rooms' && $mealSelection = 'Customized') {
                    $html .= '<h2>Room Details Suites</h2>';
                    $html .= '<table><thead><tr><th style=\'border:1px solid black\'>Room Type</th><th style=\'border:1px solid black\'>No.Rooms</th><th style=\'border:1px solid black\'>Check-In Date</th><th style=\'border:1px solid black\'>Check-Out Date</th><th style=\'border:1px solid black\'>Check-In Time</th><th style=\'border:1px solid black\'>Check-Out Time</th><th style=\'border:1px solid black\'>No.Of Participants</th></tr></thead>';
                    $html .= '<tr><td style=\'border:1px solid black\'>' . $roomType . '</td><td style=\'border:1px solid black\'>' . $noRooms . '</td><td style=\'border:1px solid black\'>' . $checkInDate . '</td><td style=\'border:1px solid black\'>' . $checkOutDate . '</td><td style=\'border:1px solid black\'>' . $checkInTime . '</td><td style=\'border:1px solid black\'>' . $checkOutTime . '</td><td style=\'border:1px solid black\'>' . $noOccupants . '</td></tr>';
                    $html .= "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td style='border:1px solid black'>Rs." . number_format($totalAmountStayingIn, 2) . "</td></tr>";
                    $html .= "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td style='font-weight:bolder'>Total Amount</td></tr>";
                    $html .= "</table>";
                    $html .= '<h2>Meal Details</h2>';
                } else {
                    $html .= "<h2>Room Details Heading</h2><table style='border:1px solid black'><thead><tr><th style='border:1px solid black'>Room Type</th><th style='border:1px solid black'>Occupancy of Room Type</th><th style='border:1px solid black'>No.Rooms</th><th style='border:1px solid black'>Check-In Date</th><th style='border:1px solid black'>Check-Out Date</th><th style='border:1px solid black'>Check-In Time</th><th style='border:1px solid black'>Check-Out Time</th><th style='border:1px solid black'>No.Of Participants</th></tr></thead>";
                    $html .= "<tr><td style='border:1px solid black'>' . $roomType . '</td><td style='border:1px solid black'>' . $noRooms . '</td><td style='border:1px solid black'>' . $occupancy . '</td><td style='border:1px solid black'>' . $checkInDate . '</td><td style='border:1px solid black'>' . $checkOutDate . '</td><td style='border:1px solid black'>' . $checkInTime . '</td><td style='border:1px solid black'>' . $checkOutTime . '</td><td style='border:1px solid black'>' . $noOccupants . '</td></tr>";
                    $html .= "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td style='border:1px solid black'>Rs." . number_format($totalAmountStayingIn, 2) . "</td></tr>";
                }
                $deleteTempStayDetails =  "DELETE FROM stayingin_booking_temp WHERE StayingIn_ID='$stayingInId'";
                $excecuteDeleteStayTemp = mysqli_query($con, $deleteTempStayDetails);
                $mpdf = new \Mpdf\Mpdf();
                $mpdf->WriteHTML($html);
                $file = time() . '.pdf';
                $mpdf->Output($file, 'D');
            }
        }
    }
    ?>
</body>

</html>