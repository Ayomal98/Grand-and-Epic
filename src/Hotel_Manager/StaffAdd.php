<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include("../../config/connection.php");
if(isset($_POST['ADD'])){
    
    $empID=$_POST['empID'];
    $empFname=$_POST['empFname'];
    $empSname=$_POST['empSname'];
    $empEmail=$_POST['empEmail'];   
    $rePass=$_POST['empPass'];
    $empPass=md5($_POST['empPass']);    
    $empContact=$_POST['empContact'];
    $empType=$_POST['empType'];
    $userType='Employee';

    $sql="INSERT into employee(Employee_ID,First_Name,Last_Name,Email,Password,Contact_No,User_Role) VALUES ('".$empID."','".$empFname."','".$empSname."','".$empEmail."','".$empPass."','".$empContact."','".$empType."')";
    $sql="INSERT into login_table(Email,Password,User_Type) VALUES ('".$empEmail."','".$empPass."',".$userType."')";
    $query_run = mysqli_query($con,$sql);

    if ($query_run) {
		echo "<script>
		alert('New Employee Has been Added');
		window.location.href='HotelManagerManageStaff.php';
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
           $mail->addAddress($empEmail);     // Add a recipient            

           // Content
           $mail->isHTML(true);                                  // Set email format to HTML
           $mail->Subject = "Account has been Created - Grand & Epic";
           $mail->Body    = "Dear {$empFname}, <p>Welcome to Grand & Epic Family.<p><p>Your data have successfully been added to the Company's System.Here are the Sign-In details.</p><b style=\"margin-left:30px\">Your Password: {$rePass}</b> <br> <b style=\"margin-left:30px\">Your Employee ID: {$empID}</b>";
           $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

           $mail->send();
           echo 'Message has been sent';
       } catch (Exception $e) {
           echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
       }
      } else {
		echo '<script> alert("Data Not Added") </script>';
	}
}
