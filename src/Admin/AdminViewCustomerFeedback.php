<?php
include("../../public/includes/session.php");
checkSession();
if (!isset($_SESSION['First_Name'])) {
	header('Location:../Hotel_Website/index.php');
}
if (isset($_POST['Cancel'])) {
	header('Location:AdminViewCustomerFeedback.php');
}
?>


<html>

<head>
	<link rel="stylesheet" href="../../public/css/employee.css">
	<title>
		Admin View Customer Feedback
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
			<p style="margin-top: 2px; color:black"><?php echo "Logged in as " . $_SESSION['First_Name'] . "(Staff)</P>";
			?>
			</P>
			<hr style="color:teal">
			<a href="../Hotel_Website/logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:-7px;margin-left:85px;padding:0px;background-color:black;color:white;border-radius:5px;cursor:pointer"></a>
		</div>

	</center>
    <div class="sidenav">
		<button class="dropdown-btn">View Customer Feedback
			<i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-container">
			<a href="AdminDashboard.php">
				<font size="4 px">Dashboard</font>
			</a>
			<a href="AdminRespondToLeaveRequests.php">
				<font size="4px">Respond to Leave Requests</font>
			</a>
			<a href="AdminManageCoAdmins.php">
				<font size="4 px">Manage Co-admins(H.M)</font>
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
	include('../../config/connection.php');
	$ViewFeedback = mysqli_query($con, "SELECT * FROM customer_feedback");
	if (mysqli_num_rows($ViewFeedback) > 0) {
		echo '<table style="color:white;border:1px solid white;margin-left:12%;margin-top:-100px;width: 80%;">
            <thead>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Feedback ID</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Staff Rate</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Website Rate</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">View Feedback</th>
            </thead>';
		while ($rowDetails = mysqli_fetch_assoc($ViewFeedback)) {
			$id = $rowDetails['Feedback_ID'];
			echo '<tbody>
						<tr>
							<td style="border: 1px solid white;padding: 5px;">' . $rowDetails['Feedback_ID'] . '</td>
							<td style="border: 1px solid white;padding: 5px;">' . $rowDetails['Staff_Rate'] . '</td>
                            <td style="border: 1px solid white;padding: 5px;">' . $rowDetails['Website_Rate'] . '</td>
							<td style="border: 1px solid white;padding: 5px;"><a href="AdminViewCUstomerFeedback.php?id=' . $id . '">View</a></td>
						</tr>';
		}
		echo '</table>';
	}

	?>
		 <?php if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $selectDetails = mysqli_query($con, "SELECT * FROM customer_feedback WHERE Feedback_ID='$id'");
        $rowDetails = mysqli_fetch_assoc($selectDetails);
    ?>
	 <form action="" method="POST" style="border:1px solid white;width:850px;height:600px;display: flex;flex-direction: column;padding:10px 35px;margin-left: 300px;margin-top:50px;">
            <label style="color:white;font-size: 35px;text-align: center;font-weight: bolder;">Feedback</label>
            

            <input type="hidden" name="Feedback_ID" value="<?php echo $id ?>"></br>
            <label for="Date" style="color:white;margin-top:30px;font-size: 20px;">Rate For Website</label>
            <input type="text" name="Staff_Rate" id="" value="<?php echo $rowDetails['Website_Rate'] ?>">
            <label for="Date" style="color:white;margin-top:30px;font-size: 20px;">Feedback for website</label>
            <input type="text" name="Feedback_Staff" id="" value="<?php echo $rowDetails['Feedback_Website'] ?>">
            <label for="Date" style="color:white;margin-top:30px;font-size: 20px;">Rate For Staff</label>
            <input type="text" name="Website_Rate" id="" value="<?php echo $rowDetails['Staff_Rate'] ?>">
            <label for="Date" style="color:white;margin-top:30px;font-size: 20px;">Feedback for staff</label>
            <input type="text" name="Feedback_Website" id="" value="<?php echo $rowDetails['Feedback_Staff'] ?>">
			<input type="submit" name="Cancel" value="Cancel" style="border-radius: 10px;width: 200px;padding: 10px;font-size:15px;background-color: blue;color:white;border:none;cursor: pointer;margin-left:30px;margin-top:25px;">
        </form>
    <?php 
	} else {
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