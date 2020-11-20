<!-- This page contains about the actual booking(insert query) for the dinein-booking -->
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include("../../config/connection.php");


$boolTrue = TRUE;
$boolFalse = False;
$timeperiod = '';
$date;
if (isset($_POST['confirm-book-btn'])) {
    $customername = mysqli_real_escape_String($con, $_POST['customer-name']);
    $emailaddress = mysqli_real_escape_String($con, $_POST['customer-email']);
    $numguests = mysqli_real_escape_string($con, $_POST['number-of-guests']);
    $mealperiod = mysqli_real_escape_string($con, $_POST['Meal-Period']);
    $tableno = mysqli_real_escape_string($con, $_POST['table-no']);

    if ($mealperiod == 'Breakfast') {
        $timeperiod = mysqli_real_escape_string($con, $_POST['breakfast-times']);
    } elseif ($mealperiod == 'Lunch') {
        $timeperiod = mysqli_real_escape_string($con, $_POST['lunch-times']);
    } else {
        $timeperiod = mysqli_real_escape_string($con, $_POST['dinner-times']);
    }
    $date = mysqli_real_escape_string($con, $_POST['Dine-in-date']);
    $query = "INSERT INTO dinein_booking (Table_No,Customer_email,Customer_Name,Num_Guests,Meal_Period,Date,Time) VALUES ('" . $tableno . "','$emailaddress','" . $customername . "','" . $numguests . "','" . $mealperiod . "','" . $date . "','" . $timeperiod . "') ";
    $insertTablesQuery = "INSERT INTO tables (Table_No,Time,Date,isBooked) VALUES ('" . $tableno . "','" . $timeperiod . "','" . $date . "','" . $boolTrue . "')";
    mysqli_query($con, $insertTablesQuery);
    if ($con->query($query) === TRUE) {

        echo "<script>
            alert('Your booking has been successfully completed');
            window.location.href='HomePage-login.php';
            </script>";
        //sending the reservation confirmation mail to the customer
        require '../../config/PHPMailer/src/Exception.php';
        require '../../config/PHPMailer/src/PHPMailer.php';
        require '../../config/PHPMailer/src/SMTP.php';
        $mail = new PHPMailer(true);

        try {
            //Server settings

            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'grandandepic20@gmail.com';                     // SMTP username
            $mail->Password   = 'grand&epicIs05';                               // SMTP password
            $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('grandandepic20@gmail.com', 'Grand & Epic');
            $mail->addAddress($emailaddress);     // Add a recipient            

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = "Reservation Successfull";
            $mail->Body    = "Dear Mr.{$customername}, <br><p>Your reservation has been successfully completed.Here are the reservation details.</p><b style=\"margin-left:30px\">Table No: {$tableno}</b> <br> <b style=\"margin-left:30px\">Date: {$date}</b> <br><b style=\"margin-left:30px\"> Time: {$timeperiod} </b>";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error: " . $query . "<br>" . $con->error;
    }
}
?>