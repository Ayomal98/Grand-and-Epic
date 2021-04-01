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
		<button class="dropdown-btn">
			<i class="fa fa-caret-down">Edit Feature Prices</i>
		</button>
		<div class="dropdown-container">
			<a href="AdminDashboard.php">
				<font size="4 px">Admin Dashboard</font>
			</a>
			<a href="View.php">
				<font size="4 px">View Booking Details</font>
			</a>
			<a href="AdminManageCoAdmins.php">
				<font size="4 px">Manage Co-admins(H.M)</font>
			</a>
			<a href="AdminManageContent.php">
				<font size="4 px">Manage Content on web-site</font>
			</a>
			<a href="AdminManageRoomDetails.php">
				<font size="4 px">Room Manage</font>
			</a>
			<a href="view.php">
				<font size="4 px">View Stats</font>
			</a>
			<a href="AdminViewCustomerFeedback.php">
				<font size="4 px">View Feedback</font>
			</a>
			<a href="AdminManagePromotions.php">
				<font size="4 px">Manage Promotions</font>
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
	<fieldset style=" position:absolute; top:250px;left:50px; width: 45%;">
		<form action="" method="POST">
			<table align="left" style="color:white; font-size: 20px; width:110%;">
				<tr>
					<td>Event Type</td>
					<td align="left"><select id="type" name="typelist">
							<option value="Wedding">Wedding</option>
							<option value="Party">Party</option>
						</select>
						<input type="submit" class="button" name="search" value="Search by Type">
					</td>
				</tr>
			</table>
		</form>

		<?php
		//UPDATE
		include("../../config/connection.php");
		if (isset($_POST['update'])) {
			$Event_Type = $_POST['event_type'];
			$Location_Price = $_POST['Location_Price'];
			$DJ_Price = $_POST['DJ_Price'];
			$Decoration_Price = $_POST['Decoration_Price'];
			$Champaigne_Price = $_POST['Champaigne_Price'];
			$query = "UPDATE event_location_features SET Location_Price='$Location_Price',DJ_Price='$DJ_Price',Decoration_Price='$Decoration_Price',Decoration_Price='$Decoration_Price',Champaigne_Price='$Champaigne_Price' WHERE Event_Type='$Event_Type '";
			$query_run = mysqli_query($con, $query);
			if ($query_run) {
				echo '<script type="text/javascript">alert("Data updated successfully")</script>';
				echo '<script>window.location.href="EditFeatures.php"</script>';
			} else {
				echo '<script type="text/javascript">alert("Data update is unsuccessful. Please try again")</script>';
				// echo '<script>window.location.href=AdminAddPromotion.php"</script>';
			}
		}

		?>
		<!--RETRIEVE-->
		<?php
		include("../../config/connection.php");
		if (isset($_POST['search'])) {
			$Event_Type = $_POST['typelist'];

			$query = "SELECT * FROM event_location_features where Event_Type='$Event_Type '";
			$query_run = mysqli_query($con, $query);
			$row = mysqli_fetch_assoc($query_run);
			if (mysqli_num_rows($query_run) > 0) {
		?>
				<form action="" method="POST">
					<table align="left" style="color:white; font-size: 20px; width:110%">
						<tr>
							<td>Location Price</td>
							<td><input type="text" name="Location_Price" value="<?php echo $row['Location_Price'] ?>" /></td>
						</tr>
						<tr>
							<td>DJ Price</td>
							<td><input type="text" name="DJ_Price" value="<?php echo $row['DJ_Price'] ?>" /></td>
						</tr>
						<tr>
							<td>Decoration Price</td>
							<td><input type="text" name="Decoration_Price" value="<?php echo $row['Decoration_Price'] ?>" /></td>
						</tr>
						<tr>
							<td>Champagne Price</td>
							<td><input type="text" name="Champaigne_Price" value="<?php echo $row['Champaigne_Price'] ?>" /></td>
						</tr>
						<input type="hidden" name="event_type" value="<?php echo $Event_Type ?>">
						<tr>
							<td align="center" style="width:50%;">
								<input type="submit" class="button" name="update" value="UPDATE">
								<input type="reset" class="button" value="  RESET " name="reset">
							</td>

						</tr>
					</table>
				</form>
		<?php
			}
		}

		?>
	</fieldset>
	<fieldset style="position:absolute; top:250px;left:850px; width: 35%;">
		<form action="" method="POST">
			<table align="left" style="color:white; font-size: 20px; width:110%;">
				<tr>
					<td>Reservation Type</td>
					<td align="left"><select id="type" name="reservation_type">
							<option value="Events">Events</option>
							<option value="Staying-In">Staying In</option>
						</select>
						<input type="submit" class="button" name="search_reservation" value="Search by Reservation">
					</td>
				</tr>
			</table>
		</form>
		<?php
		include("../../config/connection.php");
		if (isset($_POST['search_reservation'])) {
			$reservationType = $_POST['reservation_type'];
			$queryreservation = "SELECT * FROM advance_amount_table where Reservation_Type='" . $reservationType . "'";
			$query_run_reservation = mysqli_query($con, $queryreservation);
			$row_reservation = mysqli_fetch_assoc($query_run_reservation);
			if (mysqli_num_rows($query_run_reservation) > 0) {
		?>
				<form action="" method="POST">
					<table align="left" style="color:white; font-size: 20px; width:110%;">
						<input type="hidden" name="reservation_type" value="<?php echo $row_reservation['Reservation_Type'] ?>" /></td>
						<tr>
							<td>Advance Percentage</td>
							<td><input type="text" name="Advance_Percentage" value="<?php echo $row_reservation['Advance_Percentage'] ?>" /></td>
						</tr>
						<tr>
							<td align="center" style="width:50%;">
								<input type="submit" class="button" name="update_advance_percentage" value="UPDATE">
								<input type="reset" class="button" value="  RESET " name="reset">
							</td>
						</tr>
					</table>
				</form>
		<?php	}
		}
		?>
	</fieldset>
	<?php
	//UPDATE
	include("../../config/connection.php");
	if (isset($_POST['update_advance_percentage'])) {
		$Reservation_Type = $_POST['reservation_type'];
		$Advance_Percentage = $_POST['Advance_Percentage'];
		$queryUpdateReservation = "UPDATE advance_amount_table SET Advance_Percentage='$Advance_Percentage' WHERE Reservation_Type='$Reservation_Type'";
		$query_run_update = mysqli_query($con, $queryUpdateReservation);
		if ($query_run_update) {
			echo '<script type="text/javascript">alert("Data updated successfully")</script>';
			echo '<script>window.location.href="EditFeatures.php"</script>';
		} else {
			echo '<script type="text/javascript">alert("Data update is unsuccessful. Please try again")</script>';
			// echo '<script>window.location.href=AdminAddPromotion.php"</script>';
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