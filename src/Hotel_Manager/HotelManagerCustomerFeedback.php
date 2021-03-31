<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include("../../public/includes/session.php");
include("../../config/connection.php");
checkSession();

if (!isset($_SESSION['First_Name'])) {
	header('Location:../Hotel_Website/HomePage-login.php');
}

if (isset($_POST['Accept'])) {
	$feedbackID = $_POST['Feedback_ID'];
	$date = $_POST['Date'];
	$customerEmail = $_POST['user_email'];
	$feedback = $_POST['feedback'];
	$status = 1;
	$feedbackReply = mysqli_query($con, "UPDATE customer_feedback SET Status='$status' WHERE Feedback_ID='$feedbackID'");
	if ($feedbackReply) {
		echo "<script>
		alert('Customer Feedback Has been sent');
		window.location.href='HotelManagerCustomerFeedback.php';
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
			$mail->addAddress($customerEmail);     // Add a recipient            

			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = "Customer Feedback Accepted";
			$mail->Body    = $feedback;
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();


			echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	} else {
		echo '<script> alert("Feedback not delivered!") </script>';
	}
}
?>
<html>

<head>
	<link rel="stylesheet" href="../../public/css/employee.css">
	<title>
		Hotel Manager View Customer Feedback
	</title>
	<script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body bgcolor="black">

	<center>
		<img src="../../public/images/Logo.png" width="20%">

		<span class="far fa-caret-square-down" style="color:white;font-size:30px;position:absolute;right:0px;top:20px;" onclick="funcUserDetails()"></span>
		<!--<br><span style="position:absolute;top:100px;right:40px;font-size:20px;color:white"></span>-->
		<div id="user-detail-container">
			<span class="fa fa-window-close" style="margin-left:130px;" onclick="funcCloseUserDetails()"></span>
			<p style="margin-top: 2px; color:black">
				<?php
				echo "Logged in as " . $_SESSION['First_Name'] . "(Staff)</P>";
				?>
				<hr style="color:teal">
				<a href="../Hotel_Website/logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:-7px;margin-left:85px;padding:0px;background-color:black;color:white;border-radius:5px;cursor:pointer"></a>
		</div>
	</center>
	<div class="sidenav">
		<button class="dropdown-btn">
			<font size="4 px">Customer Feedback</font>
			<i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-container">
			<a href="HotelManagerDashboard.php">
				<font size="4 px">Dashboard</font>
			</a>
			<a href="HotelManagerManageStaff.php">
				<font size="4 px">Manage Staff</font>
			</a>
			<a href="ManagerBookingDetails.php">
				<font size="4 px">Booking Details</font>
			</a>
			<a href="HotelManagerPromotions.php">
				<font size="4 px">Promotions</font>
			</a>
			<a href="HotelManagerManageRoom.php">
				<font size="4 px">Manage Rooms</font>
			</a>
		</div>
	</div>

	<div class="top-right">
		<table width="100%">
			<tr>
				<td>
				</td>
				<td>
					<img src="../../public/images/ayomal.png" height="80px">
				</td>
			</tr>
		</table>
	</div>
	<script>
		/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
		var dropdown = document.getElementsByClassName("dropdown-btn");
		var i;

		for (i = 0; i < dropdown.length; i++) {
			dropdown[i].addEventListener("click", function() {
				this.classList.toggle("active");
				var dropdownContent = this.nextElementSibling;
				if (dropdownContent.style.display === "block") {
					dropdownContent.style.display = "none";
				} else {
					dropdownContent.style.display = "block";
				}
			});
		}
	</script>
	<!-- to generate today date  -->
	<?php
	date_default_timezone_set('Asia/Colombo');
	$date = date('Y-m-d', time());
	echo '    <span id="" style="position:relative;top:-220px;width: 300px;margin-left: 500px;color:white;font-size:35px">Customer Feedbacks on ' . $date . '</span>    ';
	?>
	<!-- view customer feedback records  -->
	<?php
	include('../../config/connection.php');
	$tempStatus = 0;
	$selectCustomerFeedback = mysqli_query($con, "SELECT * FROM customer_feedback WHERE Status='" . $tempStatus . "' ");
	if (mysqli_num_rows($selectCustomerFeedback) > 0) {
		echo '<table style="color:white;border:1px solid white;margin-left:12%;margin-top:-100px;width: 80%;">
            <thead>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Reservation Id</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Feedback ID</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Staff Rate</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Feedback Rate</th>
               
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Feedback Status</th>
            </thead>';

		while ($rowResDetails = mysqli_fetch_assoc($selectCustomerFeedback)) {
			$id = $rowResDetails['Feedback_ID'];
			echo '<tbody>
                    <tr>
                        <td style="border: 1px solid white;padding: 5px;">' . $rowResDetails['Reservation_ID'] . '</td>
                        <td style="border: 1px solid white;padding: 5px;">' . $rowResDetails['Feedback_ID'] . '</td>
                        <td style="border: 1px solid white;padding: 5px;">' . $rowResDetails['Staff_Rate'] . '</td>
                        <td style="border: 1px solid white;padding: 5px;">' . $rowResDetails['Website_Rate'] . '</td>
                        <td style="border: 1px solid white;padding: 5px;"><a href="HotelManagerCustomerFeedback.php?id=' . $id . '">Feedback</a></td>
                    </tr>';
		}
		echo '</table>';
	}

	?>


	<!-- filter feedback  -->
	<?php if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$selectDetails = mysqli_query($con, "SELECT * FROM customer_feedback WHERE Feedback_ID='$id'");
		$rowUserDetails = mysqli_fetch_assoc($selectDetails);
	?>
		<form action="" method="POST" style="border:1px solid white;width:1000px;height:400px;display: flex;flex-direction: column;padding:10px 35px;margin-left: 170px;margin-top:50px;">
			<label style="color:white;font-size: 35px;text-align: center;font-weight: bolder;">Feedback</label>
			<label for="Date" style="color:white;margin-top:30px;font-size: 20px;">Feedback for staff</label>
			<input type="hidden" name="Date" value="<?php echo $date ?>">
			<input type="hidden" name="Feedback_ID" value="<?php echo $id ?>">
			<input type="text" name="Feedback_Satff" id="" value="<?php echo $rowUserDetails['Feedback_Staff'] ?>">
			<label for="Date" style="color:white;font-size: 20px;margin-top:20px;">Feedback for Website</label>
			<input type="text" rows="5" name="Feedback_Website" id="" value="<?php echo $rowUserDetails['Feedback_Website'] ?>">
			<input type='hidden' name='user_email' value="<?php echo $rowUserDetails['User_Email'] ?>">
			<label for="Date" style="color:white;font-size: 20px;margin-top:20px;">Reply</label>
			<input type="text" name='feedback' placeholder="Reply">
			<input type="submit" name="Accept" value="Send Reply" style="border-radius: 10px;width: 200px;padding: 10px;font-size:15px;background-color: blue;color:white;border:none;cursor: pointer;margin-left:30px;margin-top:25px;">
		</form>
	<?php
	} else {
	} ?>



	<script>
		function funcUserDetails() {
			document.getElementById('user-detail-container').style.display = "block";
		}

		function funcCloseUserDetails() {
			document.getElementById('user-detail-container').style.display = "none";
		}
	</script>

</body>

</html>