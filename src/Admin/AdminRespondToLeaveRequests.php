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
	<?php
    date_default_timezone_set('Asia/Colombo');
    $date = date('Y-m-d', time());
    echo '    <span id="" style="position:relative;top:-220px;width: 300px;margin-left: 500px;color:white;font-size:35px">' . $date . '</span>    ';
    ?>
    <?php
    include('../../config/connection.php');
    $tempStatus = 0;
    $selectLeaveDate = mysqli_query($con, "SELECT * FROM leave_request WHERE Start_Date='" . $date+2 . "' AND Status='" . $tempStatus . "' AND Employee_ID like 'C%' ");
    if (mysqli_num_rows($selectReservationDate) > 0) {
        echo '<table style="color:white;border:1px solid white;margin-left:12%;margin-top:-100px;width: 80%;">
            <thead>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Employee ID</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Start Date</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">End Date</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Section</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Reason</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Status</th>
            </thead>';
        while ($rowResDetails = mysqli_fetch_assoc($selectLeaveDate)) {
            $id = $rowResDetails['Employee_ID'];
            echo '<tbody>
                    <tr>
                        <td style="border: 1px solid white;padding: 5px;">' . $rowResDetails['Employee_ID'] . '</td>
                        <td style="border: 1px solid white;padding: 5px;">' . $rowResDetails['Start_Date'] . '</td>
                        <td style="border: 1px solid white;padding: 5px;">' . $rowResDetails['End_Date'] . '</td>
                        <td style="border: 1px solid white;padding: 5px;">' . $rowResDetails['Section'] . '</td>
                        <td style="border: 1px solid white;padding: 5px;">' . $rowResDetails['Reason'] . '</td>
                    </tr>';
        }
        echo '</table>';
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