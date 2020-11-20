<?php
session_start();
$username = $_SESSION['username'];
$email = $_SESSION['User_Email'];
?>
<html>

<head>
	<link rel="stylesheet" href="../../public/css/employee.css">
	<title>
		Admin Dashboard
	</title>
	<script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body bgcolor="black">
	<center>
		<img src="../../public/images/Logo.png" width="20%">
		<span class="far fa-caret-square-down" style="color:white;font-size:30px;position:absolute;right:100px;top:10px;" onclick="funcUserDetails()"></span>
		<div id="user-detail-container">
			<span class="fa fa-window-close" style="margin-left:130px;" onclick="funcCloseUserDetails()"></span>
			<p style="margin-top: 2px; color:black"><?php echo "Logged in as $username"; ?></P>
			<hr style="color:teal">
			<a href="../Hotel_Website/logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:-7px;margin-left:85px;padding:0px;background-color:black;color:white;border-radius:5px;cursor:pointer"></a>
		</div>
	</center>
	<div class="sidenav">
		<button class="dropdown-btn">Dashboard &#128317;

		</button>
		<div class="dropdown-container">

			<a href="AdminManageCoAdmins.php">Manage Co-admins</a>
			<a href="AdminRespondToLeaveRequests.php">Respond to Leave Requests</a>
			<a href="AdminViewBookings.php">View Booking Details</a>
			<a href="AdminManageContent.ph">Manage Content on Website</a>
			<a href="AdminAddPromotion.php">Add Promotion</a>
			<a href="AdminViewStats.php">View Stats</a>
		</div>
	</div>
	<div class="top-right">
		<table width="100%">
			<tr>
				<td>

				</td>
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

	<table style="position:absolute; top : 280px; width:350px;">
		<tr>
			<td>
				<img src="../../public/images/Employee.png" height="40%">
			</td>
			<td>
				<p style="font-family :Lato; font-size:20px; color :white;">System-Administrator Dashboard</p>
			</td>
		</tr>
	</table>


	<table style="position:absolute; left:20px; top:380px; width:97%;border: 1px solid white;">
		<tr>
			<th style="border: 1px solid white;">
				<p style="font-family :Lato; font-size:20px; color :white;">Manage Co-admin Accounts</p>
			</th>
			<th style="border: 1px solid white;">
				<p style="font-family :Lato; font-size:20px; color :white;">View Booking Details</p>
			</th>
			<th style="border: 1px solid white;">
				<p style="font-family :Lato; font-size:20px; color :white;">Manage Content on Website</p>
			</th>
			<th style="border: 1px solid white;">
				<p style="font-family :Lato; font-size:20px; color :white;">Add Promotions</p>
			</th>
		</tr>
		<tr>
			<td style="border: 1px solid white;">

				<table width="100%">
					<tr>
						<td align="center">
							<img src="../../public/images/Emplo.png" height="70%">
						</td>
						<td align="center">
							<p style="color: white; font-size: 20px;">No. of<br>Co-Admins - 5</p>
						</td>
					</tr>
				</table>

			</td>
			<td style="border: 1px solid white;">

				<table width="100%">
					<tr>
						<td align="center">
							<img src="../../public/images/Calendar.png" height="50%">
						</td>
						<td rowspan="2" align="center">
							<img src="../../public/images/Duty.png" height="75%">
						</td>
					</tr>
					<tr></tr>
					<tr>
						<td align="center">
							<img src="../../public/images/hotel.png" height="50%">
						</td>
						<td align="center">
							<p style="color: white; font-size: 20px;">12</p>
						</td>
					</tr>
					<tr>
						<td align="center">
							<img src="../../public/images/cutlery.png" height="50%">
						</td>
						<td align="center">
							<p style="color: white; font-size: 20px;">16</p>
						</td>
					</tr>
					<tr>
						<td align="center">
							<img src="../../public/images/tie.png" height="50%">
						</td>
						<td align="center">
							<p style="color: white; font-size: 20px;">2</p>
						</td>
					</tr>
				</table>

			</td>

			<td style="border: 1px solid white;">
				<table width="100%">
					<tr>
						<td align="center">
							<img src="../../public/images/webcontent.png" height="40%">
						</td>
						<td align="center">
							<img src="../../public/images/BigWebcontent.png" height="30%">
						</td>
					</tr>
				</table>
			</td>

			<td style="border: 1px solid white;">
				<table width="100%">
					<tr>
						<td align="center">
							<img src="../../public/images/discount.png" height="50%">
						</td>
						<td align="center">
							<p style="color: white; font-size: 20px;">Existing<br>Promotions - 2</p>
						</td>
					</tr>
				</table>
			</td>
		</tr>

	</table>

	<table style="position:absolute; top:800px; left:200px;">
		<tr>
			<th>
				<p style="font-size:30px; color:white;">Booking Overview of the Year</p>
			</th>
		</tr>
		<tr>
			<td align="center">
				<img src="../../public/images/graph.png" height="100%">
			</td>
		</tr>
	</table>
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