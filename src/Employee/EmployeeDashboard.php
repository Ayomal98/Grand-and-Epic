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
		Employee Dashboard
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
		<button class="dropdown-btn">Dashboard
			<i class="fa fa-caret-down"></i>
		</button>

		<div class="dropdown-container">

			<a href="EmployeeLeaveRequest.php">Request a Leave</a>
			<a href="EmployeeDutyRoaster.php">View Duty Roaster</a>
			<a href="EmloyeeViewCustomerFeedback.php">View Customer Feedback</a>
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

	<table style="position:absolute; top : 240px; width:350px;">
		<tr>
			<td>

				<img src="../../public/images/Employee.png" height="40%">

			</td>
			<td>
				<p style="font-family :Lato; font-size:20px; color :white;">Employee Dashboard</p>
			</td>
		</tr>
	</table>


	<table style="position:absolute; left:20px; top:350px; width:97%;border: 1px solid white;">
		<tr>
			<th style="border: 1px solid white;">
				<p style="font-family :Lato; font-size:20px;"><a href="EmployeeLeaveRequest.php">Request a Leave</a></p>
			</th>
			<th style="border: 1px solid white;">
				<p style="font-family :Lato; font-size:20px;"><a href="EmployeeDutyRoaster.php">View Duty Roaster</a></p>
			</th>
			<th style="border: 1px solid white;">
				<p style="font-family :Lato; font-size:20px;"><a href="EmloyeeViewCustomerFeedback.php">View Customer Feedback</a></p>
			</th>
		</tr>
		<tr>
			<td style="border: 1px solid white;">

				<table width="100%">
					<tr>
						<td align="center">
							<img src="../../public/images/Calendar.png" height="50%">
						</td>
						<td align="center">
							<img src="../../public/images/BigCal.png" height="10%">
						</td>
					</tr>
				</table>

			</td>
			<td style="border: 1px solid white;">

				<table width="100%">
					<tr>
						<td align="center">
							<img src="../../public/images/T.png" height="50%">
						</td>
						<td rowspan="2" align="center">
							<img src="../../public/images/Duty.png" height="100%">
						</td>
					</tr>
					<tr>
						<td align="center">
							<img src="../../public/images/Tick.png" height="50%">
						</td>
					</tr>

				</table>

			</td>
			<td style="border: 1px solid white;">
				<table width="100%">
					<tr>
						<td align="center">
							<img src="../../public/images/Feedback.png" height="50%">
						</td>
						<td align="center">
							<img src="../../public/images/Feed.png" height="100%">
						</td>
					</tr>
				</table>

			</td>
		</tr>

	</table>


	<form>
		<fieldset style=" position:absolute; top:680px; width: 75%; left:160px">
			<table align="center" style="color:white; font-size: 20px; width:88%;">
				<tr>
					<td align="center" colspan="2"><h1>USER PROFILE</h1></td>
				</tr>
				<tr>
					<td>Employee ID:</td>
					<td><input type="text" id="id" name="id" value="E001"></td>
				</tr>
				<tr>
					<td>First Name:</td>
					<td><input type="text" id="fname" name="fname" value="Shehan"></td>
				</tr>
				<tr>
					<td>Last Name:</td>
					<td><input type="text" id="lname" name="lname" value="Gunawardena"></td>
				</tr>
				<tr>
					<td>Email Address:</td>
					<td><input type="email" id="email" name="email" value="heisenrberg52@gmail.com"></td>
				</tr>
				<tr>
					<td>TP Number: </td>
					<td><input type="tel" id="tel" name="tel" value="0701236956"></td>
				</tr>
				<tr>
					<td><input type="button" class="button" value="UPDATE PROFILE"></td>
				</tr>
			</table>
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