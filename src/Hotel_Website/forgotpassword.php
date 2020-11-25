<?php
include("../../config/connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../config/PHPMailer/src/Exception.php';
require '../../config/PHPMailer/src/PHPMailer.php';
require '../../config/PHPMailer/src/SMTP.php';

if (isset($_POST["resendEmail"])) {

    $emailaddress = $_POST["email"];
    $usertype = $_POST["User-Type"];
    if ($usertype == 'Customer') {
        $customercode = uniqid(true);
        $query = "INSERT into reset_password_customer (code,email) VALUES ('$customercode','$emailaddress')";
        mysqli_query($con, $query);
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
            $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetPassword.php?customercode=$customercode";
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = "Reset Password";
            $mail->Body    = "<h1>You requested a password reset</h1>
                              Click here to reset your password '$url'";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        echo "<script>window.location.href='index.php'</script>";
        exit();
    } elseif ($usertype == 'Employee') {
        $employeecode = uniqid(true);
        $query = "INSERT into reset_password_employee (code,email) VALUES ('$employeecode','$emailaddress')";
        mysqli_query($con, $query);
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
            $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetPassword.php?employeecode=$employeecode";
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = "Reset Password";
            $mail->Body    = "<h1>You requested a password reset</h1>
                              Click <a href='$url'";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        echo "<script>window.location.href='index.php'</script>";
        exit();
    }
    mysqli_query($con, $query);
    if (!$query) {
        exit("Could not generate code");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password Form</title>
</head>

<body>
    <div class="bg-modal-forgot-password">
        <div class="forgot-password-form">
            <div class="close" onclick="closeForgotForm()">+</div>
            <img src="../../public/Images/forgot-password.png" alt="" class="customer-logo-forgot-password">
            <h2 class="login-heading">Forgot Password</h2>
            <form method="post" id="forgot-passwrod-form">
                <div class="user-selection">
                    <label for="User type">User Type</label>
                    <select name="User-Type" id="" class="user-type" required>
                        <option value="Customer" selected>Customer</option>>
                        <option value="Employee">Staff</option>
                    </select>
                </div>
                <input type="text" name="email" placeholder="Enter Your Email" class="inputs" id="login-customer-email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                <input type="submit" name="resendEmail" value="Send Reset Email" class="forgot-btn" onclick="showForogotMessage()">
            </form>
        </div>
    </div>
</body>

</html>