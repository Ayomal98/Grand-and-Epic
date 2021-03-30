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
			<a href="AdminManageCoAdmins.php">
				<font size="4 px">Manage Co-admins(H.M)</font>
			</a>
			<a href="AdminRespondToLeaveRequests.php">
				<font size="4px">Respond to Leave Requests</font>
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
			<a href="EditFeatures.php">
				<font size="4 px">Edit Feature Prices</font>
			</a>
			<a href="AdminViewCustomerFeedback.php">
				<font size="4 px">View Feedback</font>
			</a>
		</div>
	</div>
	<div class="top-right" >
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
<?php
	include('../../config/connection.php');
	$tempStatus = 0;
	$selectLeaveRequest = mysqli_query($con, "SELECT * FROM leave_request WHERE Status='" . $tempStatus . "' ");
	if (mysqli_num_rows($selectLeaveRequest) > 0) {
		echo '<table style="color:white;border:1px solid white;position:absolute;margin-left:25%;top:300px; width:46%;">
            <thead>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Employee Id</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Start Date</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">End Date</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Employee Type</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Status</th>
            </thead>';

		while ($rowResDetails = mysqli_fetch_assoc($selectLeaveRequest)) {
			$id = $rowResDetails['ID'];
			echo '<tbody>
                    <tr>
                        <td style="border: 1px solid white;padding: 5px;">' . $rowResDetails['Employee_ID'] . '</td>
                        <td style="border: 1px solid white;padding: 5px;">' . $rowResDetails['Start_Date'] . '</td>
                        <td style="border: 1px solid white;padding: 5px;">' . $rowResDetails['End_Date'] . '</td>
                        <td style="border: 1px solid white;padding: 5px;">' . $rowResDetails['Type_Employee'] . '</td>
                       
                        <td style="border: 1px solid white;padding: 5px;"><a href="AdminRespondToLeaveRequests.php?id=' . $id . '">Requested</a></td>
                    </tr>';
		}
		echo '</table>';
	}
	?>
	<?php if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$selectDetails = mysqli_query($con, "SELECT * FROM leave_request WHERE ID='$id'");
		$rowUserDetails = mysqli_fetch_assoc($selectDetails);
	?>
	<form action="" method="POST" style="border:1px solid white;width:600px;height:600px;display: flex;flex-direction: column;padding:10px 35px;margin-left:380px;position:absolute;top:450px;">
			<label style="color:white;font-size: 35px;text-align: center;font-weight: bolder;">Leave Requests</label>
			<label for="Date" style="color:white;margin-top:30px;font-size: 20px;">Employee ID</label>
			<input type="hidden" name="ID" value="<?php echo $id ?>">
			<input type="text" name="Employee_ID" id="" value="<?php echo $rowUserDetails['Employee_ID'] ?>">
			<label for="Date" style="color:white;font-size: 20px;margin-top:20px;">Start Date</label>
			<input type="text" rows="5" name="Start_Date" id="" value="<?php echo $rowUserDetails['Start_Date'] ?>">
			<label for="Date" style="color:white;font-size: 20px;margin-top:20px;">End Date</label>
			<input type="text" rows="5" name="End_Date" id="" value="<?php echo $rowUserDetails['End_Date'] ?>">
            <label for="Date" style="color:white;font-size: 20px;margin-top:20px;">Type Employee</label>
			<input type="text" rows="5" name="Type_Employee" id="" value="<?php echo $rowUserDetails['Type_Employee'] ?>">
			<label for="Date" style="color:white;font-size: 20px;margin-top:20px;">Reason</label>
			<input type="text" rows="5" name="Reason" id="" value="<?php echo $rowUserDetails['Reason'] ?>">
            <table>
            <tr>
            <td>
			<input type="submit" name="Accept" value="Accept" style="border-radius: 10px;width: 200px;padding: 10px;font-size:15px;background-color: blue;color:white;border:none;cursor: pointer;margin-left:30px; margin-top:25px;">
            </td>
            <td>
			<input type="submit" name="Decline" value="Decline" style="border-radius: 10px;width: 200px;padding: 10px;font-size:15px;background-color: blue;color:white;border:none;cursor: pointer;margin-left:30px; margin-top:25px;">
            </td>
            </tr>
            </table>
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