<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successfull</title>
</head>

<body>
    Your Payment has been Successfully completed & we are looking forward to having you here
    <?php echo $_GET['type']; ?>
    <?php echo $_GET['id']; ?>
    <?php
    include('../../config/connection.php');
    if ($_GET['type'] == 'events') {
        $events_ID = $_GET['id'];
        $getEventDetailsTemp = mysqli_query($con, "SELECT * FROM events_booking_temp WHERE Events_ID='$events_ID'");
        while ($row = mysqli_fetch_assoc($getEventDetailsTemp)) {
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
            $paymentSuccess = mysqli_query($con, "INSERT into events_booking(Customer_Name,Customer_Email,Num_Guests,Event_Type,Reservation_Date,Starting_Time,Ending_Time,MealPackage_ID,Total_Amount,Paid_amount) VALUES('$customer_Name','$customer_Email','$num_Guests','$event_Type','$reservation_Date','$starting_Time','$ending_Time','$mealPackage_ID','$totalAmount','$paidAmount')");
            if ($paymentSuccess) {
                $deleteTempEvtDetails = mysqli_query($con, "DELETE * FROM events_booking_temp WHERE Events_ID='$events_ID'");
            }
        }
    }
    ?>
</body>

</html>