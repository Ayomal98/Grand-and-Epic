<?php

include("../../public/includes/session.php");
include('../../public/includes/id-generator.php');

checkSession();
if (!isset($_SESSION['First_Name'])) {
    header('Location:../Hotel_Website/HomePage-login.php');
}

if (isset($_POST['View'])) {
    $feedback_ID = $_POST['Feedback_ID'];
    $feedstaff = $_POST['Feedback_Staff'];
    $staffrate = $_POST['Staff_Rate'];
    $feedweb = $_POST['Feedback_Website'];
    $webrate = $_POST['Website_Rate'];
    $status = 1;
    $amountToBePaid = 0;
    $payment_ID = getID('paid_confirmations', 'P');
    $updatePaymentStatus = mysqli_query($con, "UPDATE reservation SET Payment_Status='$status', Amount_To_Be_Paid='$amountToBePaid' WHERE Reservation_ID='$reservationID'");
    $insertConfirmation = mysqli_query($con, "INSERT INTO paid_confirmations(Paid_ID,Reservation_ID,Payment_Accepted,Date_Accepted,Payment_Method) VALUES('$payment_ID','$reservationID','$paidAmount','" . $date . "','$paymentMethod')");
    if ($insertConfirmation && $updatePaymentStatus) {
        echo '<script>alert("Payment Successfullt Accepted")</script>';
        header('location:ReceptionistAcceptPayments.php');
    }
}

?>

<?php
include("../../public/includes/session.php");
checkSession();
if (!isset($_SESSION['First_Name'])) {
	header('Location:../Hotel_Website/index.php');
}
?>


<html>

<head>
	<link rel="stylesheet" href="../../public/css/employee.css">
	<title>
		Employee View Customer Feedback
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
			<p style="margin-top: 2px; color:black"><?php echo "Logged in as " . $_SESSION['First_Name']; ?></P>
			<hr style="color:teal">
			<a href="../Hotel_Website/logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:-7px;margin-left:85px;padding:0px;background-color:black;color:white;border-radius:5px;cursor:pointer"></a>
		</div>

	</center>
	<div class="sidenav">
		<button class="dropdown-btn">View Customer Feedback
			<i class="fa fa-caret-down"></i>
		</button>

		<div class="dropdown-container">
			<a href="EmployeeDashboard.php">Dashboard</a>
			<a href="EmployeeLeaveRequest.php">Leave Request</a>
			<a href="EmployeeDutyRoaster.php">View Duty Roaster</a>
		</div>
	</div>

	<div class="top-right">
		<table width="100%">
			<tr>
				<td>
					<img src="../../public/images/ayomal.png" height="40%">
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


	<form>
		<fieldset style=" position:absolute; top:280px; width: 75%; left:160px">
			<legend style="color:white; font-size: 20px">Customer Feedback</legend>

			<table style="color:white; font-size: 20px; width:88%;">
				<tr>
					<td align="left">Name:</td>
					<td align="center"><input type="text" name="name" size="20" value="Kapila"></td>
				</tr>
				<tr>
					<td align="left">Reservation Type:</td>
					<td align="center"><input type="text" name="rtype" size="50" value="Staying-in"></td>
				</tr>
				<tr>
					<td align="left">Feedback about the Hotel Service and Staff:</td>
					<td align="center">
						<textarea name="Message" rows="5" cols="45">Very friendly staff and the service is really good</textarea>
					</td>
				</tr>
				<tr>
					<td align="left">Rating:</td>
					<td align="left">
						<input type="radio" name="rating1" value="excellent" checked style="margin-left:65px;">Excellent
						<input type="radio" name="rating1" value="good" disabled style="margin-left:65px;">Good
						<input type="radio" name="rating1" value="fair" disabled style="margin-left:65px;">Fair
						<input type="radio" name="rating1" value="poor" disabled style="margin-left:65px;">Poor
					</td>
				</tr>
				<tr>
					<td align="left">Feedback about the Hotel Website:</td>
					<td align="center">
						<textarea name="Message" rows="5" cols="45">Very user-friendly interface and include all the information necessary</textarea>
					</td>
				</tr>
				<tr>
					<td align="left">Rating:</td>
					<td align="left">
						<input type="radio" name="rating2" value="excellent" disabled style="margin-left:65px;">Excellent
						<input type="radio" name="rating2" value="good" checked style="margin-left:65px;">Good
						<input type="radio" name="rating2" value="fair" disabled style="margin-left:65px;">Fair
						<input type="radio" name="rating2" value="poor" disabled style="margin-left:65px;">Poor
					</td>
				</tr>
			</table>

			<br>

			<table style="color:white; font-size: 20px; width:81%;">
				<tr>
					<td align="left">
						<a href="#" class="button" style="padding:10px 20px; border-radius:50%">&laquo;</a>
						<a href="#" class="button" style="padding:10px 20px; border-radius:50%">&raquo;</a>
					</td>
					<td align="right">
						<input type="button" class="button" value="CANCEL">
						<input type="button" class="button" value="UPDATE">
					</td>
				</tr>
			</table>


		</fieldset>
	</form>

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