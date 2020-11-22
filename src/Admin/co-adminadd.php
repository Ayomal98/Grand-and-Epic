<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include("../../config/connection.php");
if (isset($_POST['ADD'])) {
    $empID=$_POST['empID'];
    $empFname = $_POST['empFname'];
    $empSname = $_POST['empSname'];
    $empEmail = $_POST['empEmail'];
    $empPass = md5($_POST['empPass']);
    $empContact = $_POST['empContact'];
    $userrole = 'Hotel Manager';

    $sql = "INSERT into employee (Employee_ID,First_Name,Last_Name,Email,Password,Contact_No,User_Role) VALUES ('" . $empID . "','" . $empFname . "','" . $empSname . "','" . $empEmail . "','" . $empPass . "','" . $empContact . "','" . $userrole . "')";
    $query_run = mysqli_query($con,$sql);

    if ($query_run) {
	echo "<script>
		alert('Hotel Manager Has been Added');
		window.location.href='AdminManageCoAdmins.php';
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
           $mail->Port       = 587; 
                                         // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

           //Recipients
           $mail->setFrom('grandandepic20@gmail.com', 'Grand & Epic');
           $mail->addAddress($empEmail);     // Add a recipient  
                  

           // Content
           $mail->isHTML(true);                                  // Set email format to HTML
           $mail->Subject = "Added";
           $mail->Body    = "Dear Mr.{$empFname}, <br><p>Your reservation has been successfully completed.Here are the reservation details.</p><b style=\"margin-left:30px\">Your Password </b> <br> <b style=\"margin-left:30px\">Your Employee ID: {$empID}</b>";
           $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
          
           $mail->send();
           
           echo '<script> alert("Message sent. Mailer Error: {$mail->ErrorInfo}") </script>';
       } catch (Exception $e) {
        echo '<script> alert("Message could not be sent. Mailer Error: {$mail->ErrorInfo}") </script>';
       }
      } else {
        echo "<script> alert('Data Not Added. Enter a valid ID') ;
        window.location.href='AdminManageCoAdmins.php';
        </script>";
	}
}
?>  
