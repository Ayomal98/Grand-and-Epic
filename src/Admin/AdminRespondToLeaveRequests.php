<?php
session_start();
$username = $_SESSION['username'];
$email = $_SESSION['User_Email'];
?>
<html>

<head>
	<link rel="stylesheet" href="../../public/css/employee.css">
	
	<title>
		Respond Leave Requests
	</title>
	<style>
		body{
			height : 700px;
		}
		</style>
	<script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body bgcolor="black" >
	
	<center>
		<img src="../../public/images/Logo.png" width="20%">
		<span class="far fa-caret-square-down" style="color:white;font-size:30px;position:absolute;right:0px;top:20px;" onclick="funcUserDetails()"></span>
		<div id="user-detail-container">
			<span class="fa fa-window-close" style="margin-left:130px;" onclick="funcCloseUserDetails()"></span>
			<p style="margin-top: 2px; color:black"><?php echo "Logged in as $username"; ?></P>
			<hr style="color:teal">
			<a href="../Hotel_Website/logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:-7px;margin-left:85px;padding:0px;background-color:black;color:white;border-radius:5px;cursor:pointer"></a>
		</div>
	</center>
	<div class="sidenav">
		<button class="dropdown-btn">Respond Leave Requests
			<i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-container">
			<a href="AdminDashboard.php">
				<font size="4 px">Dashboard</font>
			</a>
			<a href="AdminManageCoAdmins.php">
				<font size="4px">Manage Co-admins(H.M)</font>
			</a>
			<a href="AdminViewBookings.php">
				<font size="4 px">View Booking Details</font>
			</a>
			<a href="AdminManageContent.php">
				<font size="4 px">Manage Content on web-site</font>
			</a>
			<a href="AdminAddPromotion.php">
				<font size="4 px">Add promotion</font>
			</a>
			<a href="AdminViewStats.php">
				<font size="4 px">View Stats</font>
			</a>
		</div>
	</div>
	<div class="top-right">
		<table width="100%">
			<tr>
				<td>
					
				</td>
				<td>
				<img src="../../public/images/Uvini.png" height="25%">
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
			<legend style="color:white; font-size: 20px">Respond to Leave Requests of Co-admins</legend>
			<table style="color:white; font-size: 20px; width:88%;">
				<tr>
					<td align="left">Manager ID:</td>
					<td align="left"><input type="text" name="id" size="20" value="M04"></td>
				</tr>
				<tr>
					<td align="left">Leave Start Date:</td>
					<td align="left"><input type="text" name="startdate" size="20" value="05/26/2020"></td>
				</tr>
				<tr>
					<td align="left">Leave End Date:</td>
					<td align="left"><input type="text" name="enddate" size="20" value="05/27/2020"></td>
				</tr>
				<tr>
					<td align="left">Reason for the leave:</td>
					<td align="left"><textarea name="Message" rows="5" cols="53">Medical Leave</textarea></td>
				</tr>
			</table>

			<br>
			<table style="color:white; font-size: 20px; width:75%;">
				<tr>
					<td align="left">
						<a href="#" class="button" style="padding:10px 20px; border-radius:50%">&laquo;</a>
						<a href="#" class="button" style="padding:10px 20px; border-radius:50%">&raquo;</a>
					</td>
					<td align="right">
						<input type="button" class="button" value="ACCEPT">
						<input type="button" class="button" value="DECLINE">
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