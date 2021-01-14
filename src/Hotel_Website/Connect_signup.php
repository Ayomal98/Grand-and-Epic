<!--contains the query for the customer signup -->
<?php include("../../config/connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['Submit'])) {
  $firstName = $_POST['firstname'];
  $lastName = $_POST['lastname'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $tpN = $_POST['contactNum'];
  $userType = 'Customer';
  $sql = "INSERT INTO customer (First_Name,Last_Name,Email,Password,Contact_No) VALUES ('" . $firstName . "','" . $lastName . "','" . $email . "','" . $password . "','" . $tpN . "')";
  $login_sql = "INSERT INTO login_table(Email,Password,User_Type) VALUES('$email','$password','$userType')"; //insert query for the login
  mysqli_query($con, $login_sql);
  if ($con->query($sql) === TRUE) {
    echo "<script>
            alert('Your Account has been successfully created');
            window.location.href='./index.php';
          </script>";
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
      $mail->addAddress($email);     // Add a recipient            // Name is optional

      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Account has been created';
      $mail->Body    = 'Welcome to the Grand & Epic Family';
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      echo 'Message has been sent';
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }
}
?>