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
		Admin Manage Content
	</title>
	<style>
		body {
			height: 1500px;
		}
	</style>
	<script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body bgcolor="black">

	<center>
		<img src="../../public/images/Logo.png" width="20%">
		<span class="far fa-caret-square-down" style="color:white;font-size:30px;position:absolute;right:0px;top:20px;" onclick="funcUserDetails()"></span>
		<div id="user-detail-container">
			<span class="fa fa-window-close" style="margin-left:130px;" onclick="funcCloseUserDetails()"></span>
			<p style="margin-top: 2px; color:black"><?php echo "Logged in as " . $_SESSION['First_Name']; ?></P>
			<hr style="color:teal">
			<a href="../Hotel_Website/logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:-7px;margin-left:85px;padding:0px;background-color:black;color:white;border-radius:5px;cursor:pointer"></a>
		</div>
	</center>
	<div class="sidenav">
		<button class="dropdown-btn">Manage Contents
			<i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-container">
			<a href="AdminDashboard.php">
				<font size="4 px">Dashboard</font>
			</a>
			<a href="AdminRespondToLeaveRequests.php">
				<font size="4px">Respond to Leave Requests</font>
			</a>
			<a href="AdminViewBookings.php">
				<font size="4 px">View Booking Details</font>
			</a>
			<a href="AdminManageCoAdmins.php">
				<font size="4 px">Manage Co-Admins</font>
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
					<img src="../../public/images/Uvini.png" width="60" height="60">
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
	<form action="" method="POST">
		<fieldset style=" position:absolute; top:250px;left:150px; width: 45%;">
			<table align="left" style="color:white; font-size: 20px; width:110%;">
				<tr>
					<td>Event Type</td>
					<td align="left"><select id="type" name="typelist">
							<option value="Wedding">Wedding</option>
							<option value="Party">Party</option>
						</select>
						<input type="submit" class="button" name="search" value="Search by ID">
					</td>
				</tr>
			</table>
			</form>
	


	<?php
	include("../../config/connection.php");
	if (isset($_POST['search'])) {
		$Event_Type = $_POST['typelist'];

		$query = "SELECT * FROM event_location_features where Event_Type='$Event_Type '";
		$query_run = mysqli_query($con, $query);
		$row = mysqli_fetch_assoc($query_run);
		if (mysqli_num_rows($query_run) > 0) {
	?>
			
		
			<table align="left" style="color:white; font-size: 20px; width:110%;">
				<tr>
					<td>Location Price(LKR)</td>
					<td><input type="text" name="First_Name" value="<?php echo $row['Location_Price'] ?>" /></td>
				</tr>
				<tr>
					<td>DJ Price(LKR)</td>
					<td><input type="float" name="Last_Name" value="<?php echo $row['DJ_Price'] ?>" /></td>
				</tr>
				<tr>
					<td>Decoration Price(LKR)</td>
					<td><input type="text" name="Email" value="<?php echo $row['Decoration_Price'] ?>" /></td>
				</tr>
				<tr>
					<td>Champagne Price(LKR)</td>
					<td><input type="text" name="Contact_No" value="<?php echo $row['Champaigne_Price'] ?>" /></td>
				</tr>
				<tr>
					<td>Advance Percentage</td>
					<td><input type="text" name="Contact_No" value="<?php echo $row['Advance_Percentage'] ?>" /></td>
				</tr>
				<tr>
					<td align="center" style="width:50%;">
						<input type="submit" class="button" name="update" value="UPDATE">
						<input type="reset" class="button" value="  RESET " name="reset">

					</td>

				</tr>
			</table>
			</fieldset>
		
			
	<?php
		}
	}

	?>



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