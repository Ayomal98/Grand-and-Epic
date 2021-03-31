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
		Respond Leave Requests
	</title>
	<style>
		body {
			height: 700px;
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
	<h1 style="color:white;margin-top:-200px;text-align:center">Room Details Sent by Admin</h1>
	<?php
	include('../../config/connection.php');
	$selectRoomDetails = mysqli_query($con, "SELECT * FROM rooms_temp ");
	if (mysqli_num_rows($selectRoomDetails) > 0) {
		echo '<table style="color:white;border:1px solid white;margin-left:6%;margin-top:0px;width: 80%;">
            <thead>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Room Type</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">No Rooms</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Price</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Room View</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">No Guests</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Bed Type</th>
				<th style="border: 1px solid white;padding: 10px;font-size:20px;">No Beds</th>
				<th style="border: 1px solid white;padding: 10px;font-size:20px;">Bathroom</th>
				<th style="border: 1px solid white;padding: 10px;font-size:20px;">Amenities</th>
				<th style="border: 1px solid white;padding: 10px;font-size:20px;">Description</th>
				<th style="border: 1px solid white;padding: 10px;font-size:20px;">Other</th>
				<th style="border: 1px solid white;padding: 10px;font-size:20px;">Add Room</th>
            </thead>';
		while ($rowRoomTempDetails = mysqli_fetch_assoc($selectRoomDetails)) {
	?><tbody>
				<tr>
					<form action="" method="POST" <td style="border: 1px solid white;padding: 2px;">
						<td style="border: 1px solid white;padding: 2px;"><?php echo $rowRoomTempDetails["Room_Type"] ?></td>
						<input type="hidden" style="display:none;" name="Room_Type" value="<?php echo $rowRoomTempDetails["Room_Type"] ?>">
						<td style=" border: 1px solid white;padding: 2px;"><?php echo $rowRoomTempDetails['NoRooms'] ?></td>
						<input type="text" style="display:none;" name="No_Rooms" value="<?php echo $rowRoomTempDetails["NoRooms"] ?>"">
						<td style=" border: 1px solid white;padding: 2px;"><?php echo $rowRoomTempDetails['Price'] ?></td>
						<input type="text" style="display:none;" name="Price" value="<?php echo $rowRoomTempDetails["Price"] ?>"">
						<td style=" border: 1px solid white;padding: 2px;"><?php echo $rowRoomTempDetails['Room_View'] ?></td>
						<input type="text" style="display:none;" name="Room_View" value="<?php echo $rowRoomTempDetails["Room_View"] ?>">
						<td style=" border: 1px solid white;padding: 2px;"><?php echo $rowRoomTempDetails['NoGuests'] ?></td>
						<input type="text" style="display:none;" name="No_Guests" value="<?php echo $rowRoomTempDetails["NoGuests"] ?>">
						<td style="border: 1px solid white;padding: 2px;"><?php echo $rowRoomTempDetails['BedType'] ?></td>
						<input type="text" style="display:none;" name="Bed_Type" value="<?php echo $rowRoomTempDetails["BedType"] ?>"">
						<td style=" border: 1px solid white;padding: 2px;"><?php echo $rowRoomTempDetails['NoBeds']  ?></td>
						<input type="text" style="display:none;" name="No_Beds" value="<?php echo $rowRoomTempDetails["NoBeds"] ?>">
						<td style="border: 1px solid white;padding: 2px;"><?php echo $rowRoomTempDetails['Bathroom'] ?></td>
						<input type="text" style="display:none;" name="Bathroom" value="<?php echo $rowRoomTempDetails["Bathroom"] ?>">
						<td style="border: 1px solid white;padding: 2px;"><?php echo $rowRoomTempDetails['Amenities'] ?></td>
						<input type="text" style="display:none;" name="Amenities" value="<?php echo $rowRoomTempDetails["Amenities"] ?>">
						<td style="border: 1px solid white;padding: 8px;font-size:10px"><?php echo $rowRoomTempDetails['Description'] ?></td>
						<input type="text" style="display:none;" name="Description" value="<?php echo $rowRoomTempDetails['Description'] ?>">
						<td style="border: 1px solid white;padding: 2px;"><?php echo $rowRoomTempDetails['Other'] ?></td>
						<input type="text" style="display:none;" name="Other" value=<?php echo $rowRoomTempDetails['Other'] ?>>
						<td style="border: 1px solid white;padding: 5px;"><input type="submit" name="Add_Rooms" value="Insert Room" style="padding:2px;color:white;background-color:blue;cursor:pointer;"></td>
					</form>
				</tr>' ; <?php } ?> '</table>' ; <?php }

													?> <script>
			function funcUserDetails() {
				document.getElementById('user-detail-container').style.display = "block";
			}

			function funcCloseUserDetails() {
				document.getElementById('user-detail-container').style.display = "none";
			}
		</script>

</body>

</html>

<?php
if (isset($_POST['Add_Rooms'])) {
	$roomtype = $_POST['Room_Type'];
	$noRooms = $_POST['No_Rooms'];
	$price = $_POST['Price'];
	$roomView =	$_POST['Room_View'];
	$no_guests =	$_POST['No_Guests'];
	$bed_type =	$_POST['Bed_Type'];
	$no_beds =	$_POST['No_Beds'];
	$bathroom =	$_POST['Bathroom'];
	$amenities = $_POST['Amenities'];
	$description = $_POST['Description'];
	$other = $_POST['Other'];
	$insertRoom = "INSERT into rooms (Room_Type,NoRooms,Price,Room_View,NoGuests,BedType,NoBeds,Bathroom,Amenities,Description,Other) VALUES('" . $roomtype . "','$noRooms','$price','$roomView','$no_guests','$bed_type','$no_beds','$bathroom','$amenities','$description','$other')";
	$query = mysqli_query($con, $insertRoom);
	if ($query) {
		$deleteTemp = "DELETE FROM rooms_temp WHERE Room_Type='$roomtype'";
		mysqli_query($con, $deleteTemp);
		echo '<script>alert("Room Successfully Added")
				window.location.href="AdminManageRoomDetails.php"</script>';
	}
}
?>