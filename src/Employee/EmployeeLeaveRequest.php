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
		Employee Leave Request
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
		<button class="dropdown-btn">Leave Request
			<i class="fa fa-caret-down"></i>
		</button>

		<div class="dropdown-container">
			<a href="EmployeeDashboard.php">Dashboard</a>
			<a href="EmployeeDutyRoaster.php">View Duty Roaster</a>
			<a href="EmloyeeViewCustomerFeedback.php"> View Customer Feedback</a>
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
			<legend style="color:white; font-size: 20px">Request a Leave</legend>

			<table style="color:white; font-size: 20px; width:90%; margin-left:auto; margin-right:auto;">
				<tr>
					<td align="left">Employee ID:</td>
					<td align="left"><input type="text" name="id" size="20"></td>
				</tr>
				<tr>
					<td align="left">Leave Start Date:</td>
					<td align="left"><input type="date" name="startdate" size="20"></td>
				</tr>
				<tr>
					<td align="left">Leave End Date:</td>
					<td align="left"><input type="date" name="enddate" size="20"></td>
				</tr>
				<tr>
					<td align="left">Section:</td>
					<td align="left"><input type="text" name="section" size="50"></td>
				</tr>
				<tr>
					<td align="left">Reason for the leave:</td>
					<td align="left"><textarea name="Message" rows="5" cols="53" placeholder="Leave your reason here:"></textarea></td>
				</tr>
			</table>

			<br>
			<table style="color:white; font-size: 20px; width:81%;">
				<tr>
					<td align="right">
						<input type="button" class="button" value="CANCEL">
						<input type="button" class="button" value="SUBMIT">
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