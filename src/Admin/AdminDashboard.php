<?php
include("../../public/includes/session.php");
include("../../config/connection.php");
checkSession();
if (!isset($_SESSION['First_Name'])) {
	header('Location:../Hotel_Website/index.php');
}

?>
<html>

<head>
	<link rel="stylesheet" href="../../public/css/employee.css">

	<title>
		Admin Dashboard
	</title>
	<style>
		body {
			height: 5500px;
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
		<button class="dropdown-btn">Admin Dashboard
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

	<table style="position:absolute; top : 220px; width : 350px;">
		<tr>
			<td>
				<img src="../../public/images/Employee.png" width="150" height="150">
			</td>
			<td>
				<p style="font-family :Lato; font-size:20px; color :white;">System-Administrator Dashboard</p>
			</td>
		</tr>
	</table>


	<table style="position:absolute; left:20px; top:380px; width:97%;border: 1px solid white;">
		<tr>

			<th style="border: 1px solid white;">
				<p style="font-family :Lato; font-size:20px; color :white;"><a href="AdminManageCoAdmins.php">Manage Co-admin Accounts</a></p>
			</th>

			<th style="border: 1px solid white;">
				<p style="font-family :Lato; font-size:20px; color :white;"><a href="AdminViewBookings.php">View Booking Details</a></p>
			</th>
			<th style="border: 1px solid white;">
				<p style="font-family :Lato; font-size:20px; color :white;"><a href="AdminManageContent.php">Manage Content on Website</a></p>
			</th>
			<th style="border: 1px solid white;">
				<p style="font-family :Lato; font-size:20px; color :white;"><a href="AdminAddPromotion.php">Manage Promotions</a></p>
			</th>
			<th style="border: 1px solid white;">
				<p style="font-family :Lato; font-size:20px; color :white;"><a href="AdminViewStats.php">View Statistics</a></p>
			</th>
			<th style="border: 1px solid white;">
				<p style="font-family :Lato; font-size:20px; color :white;"><a href="EditFeatures.php">Update Feature Prices</a></p>
			</th>
			<th style="border: 1px solid white;">
				<p style="font-family :Lato; font-size:20px; color :white;"><a href="AdminViewCustomerFeedback.php">View Customer Feedback</a></p>
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

			<!--VIEW BOOKING DETAILS-->
			<td style="border: 1px solid white;">

				<table width="100%">
					<tr>

						<td colspan="2" align="center">
							<p style="color: white; font-size: 20px;">Booking<br>Details</p>
						</td>
					</tr>
					<tr></tr>
					<tr>
						<td align="center">
							<img src="../../public/images/hotel.png" height="50px" weight="50px">
						</td>
						<td align="center">
							<p style="color: white; font-size: 20px;">12</p>
						</td>
					</tr>
					<tr>
						<td align="center">
							<img src="../../public/images/cutlery.png" height="50px" weight="50px">
						</td>
						<td align="center">
							<p style="color: white; font-size: 20px;">16</p>
						</td>
					</tr>
					<tr>
						<td align="center">
							<img src="../../public/images/tie.png" height="50px" weight="50px">
						</td>
						<td align="center">
							<p style="color: white; font-size: 20px;">2</p>
						</td>
					</tr>
				</table>

			</td>

			<!--VIEW BOOKING DETAILS-->

			<td style="border: 1px solid white;">
			<table width="100%">
					<tr>
						
						<td colspan="2"align="center">
							<p style="color: white; font-size: 22px;">Contents</p>
						</td>
					</tr>
					<tr></tr>
					<tr>
						<td align="center">
							<img src="../../public/images/bed1.png" height="50px" weight="50px">
						</td>
						<td align="center">
							<p style="color: white; font-size: 18px;">Staying-In</p>
						</td>
					</tr>
					<tr>
						<td align="center">
							<img src="../../public/images/meal1.png" height="50px" weight="50px">
						</td>
						<td align="center">
							<p style="color: white; font-size: 18px;">Dine-In</p>
						</td>
					</tr>
				
						
					
				</table>
			</td>

			<td style="border: 1px solid white;">
				<table width="100%">
				<tr>
						
						<td colspan="2"align="center">
							<p style="color: white; font-size: 22px;">Promotion<br>Types</p>
						</td>
					</tr>
					<tr>
						<td align="center">
							<img src="../../public/images/credit1.png" height="50px" weight="50px">
						</td>
						<td align="center">
							<p style="color: white; font-size: 18px;">Loyalty</p>
						</td>
					</tr>
					<tr>
						<td align="center">
							<img src="../../public/images/clock.png" height="50px" weight="50px">
						</td>
						<td align="center">
							<p style="color: white; font-size: 18px;">Last-Minute</p>
						</td>
					</tr>
					<tr>
						<td align="center">
							<img src="../../public/images/presents.jpeg" height="50px" weight="50px">
						</td>
						<td align="center">
							<p style="color: white; font-size: 18px;">Seasonal</p>
						</td>
					</tr>

				</table>
			</td>
			<td style="border: 1px solid white;">
				<table width="100%">
					<tr>
					
						<td colspan="2" align="center">
							<p style="color: white; font-size: 22px;">Analyse<br>Types</p>
						</td>
					</tr>
					<tr>
						<td align="center">
							<img src="../../public/images/booking.png" height="50px" weight="50px">
						</td>
						<td align="center">
							<p style="color: white; font-size: 18px;">Booking analysis</p>
						</td>
					</tr>
					<tr>
						<td align="center">
							<img src="../../public/images/food12.png" height="50px" weight="50px">
						</td>
						<td align="center">
							<p style="color: white; font-size: 18px;">Meals analysis</p>
						</td>
					</tr>
				</table>
			</td>
			<td style="border: 1px solid white;">
				<table width="100%">
				
					<tr>
					<td colspan="2" align="center">
						<p style="color: white; font-size: 22px;">Features</p>
					</td>
					</tr>
					<tr>
						<td align="center">
							<img src="../../public/images/music.png" height="50px" weight="50px">
						</td>
						<td align="center">
							<p style="color: white; font-size: 18px;">DJ Music</p>
						</td>
					</tr>
					<tr>
						<td align="center">
							<img src="../../public/images/decos.png" height="50px" weight="50px">
						</td>
						<td align="center">
							<p style="color: white; font-size: 18px;">Decoration</p>
						</td>
					</tr>
					<tr>
						<td align="center">
							<img src="../../public/images/champ.png" height="50px" weight="50px">
						</td>
						<td align="center">
							<p style="color: white; font-size: 18px;">Champaigne</p>
						</td>
					</tr>
				</table>
			</td>
			<td style="border: 1px solid white;">
				<table width="100%">
				<tr>
					<td colspan="2" align="center">
						<p style="color: white; font-size: 22px;">Feedback and Rating</p>
					</td>
					</tr>
					<tr>
						<td align="center">
							<img src="../../public/images/chef.png" height="50px" weight="50px">
						</td>
						<td align="center">
							<p style="color: white; font-size: 18px;">Staff</p>
						</td>
					</tr>
					<tr>
						<td align="center">
							<img src="../../public/images/laptop.png" height="50px" weight="50px">
						</td>
						<td align="center">
							<p style="color: white; font-size: 18px;">Website</p>
						</td>
					</tr>
			
				</table>
			</td>
		

	
	<!-- User Profie -->
	<form action="" method="POST">
		<fieldset style=" position:absolute; top:980px; width: 75%; left:160px">
			<table align="center" style="color:white; font-size: 20px; width:88%;">

			<?php
				

					$query = "SELECT * FROM employee where First_Name='$_SESSION[First_Name]' ; ";
					$query_run = mysqli_query($con,$query);

					
					// Update Profile
					if (isset($_POST['update'])) {

						$id = $_POST['id'];
						$fname = $_POST['fname'];
						$lname = $_POST['lname'];
						$email = $_POST['email'];
						$tel = $_POST['tel'];
					
							$update_query = " UPDATE employee SET Last_Name='$lname', Email='$email', Contact_No='$tel' where Employee_ID='$_POST[id]' ";
							$update_run = mysqli_query($con, $update_query);
					
							if ($update_run) {
								echo "<script>
								alert('Your Details has been Updated');
								window.location.href='SupervisorDashboard.php';
								</script>";
							} else {
								echo '<script> alert("Data Not Updated") </script>';
							}
					}



					
					while($row = mysqli_fetch_array($query_run))
					{
			?>

				<tr>
					<td align="center" colspan="2"><h1>USER PROFILE</h1></td>
				</tr>
				<tr>
					<td>Employee ID:</td>
					<td><input type="text" name="id" readonly value="<?php echo $row['Employee_ID'] ?>" /></td>
				</tr>
				<tr>
					<td>First Name:</td>
					<td><input type="text" name="fname" readonly value="<?php echo $row['First_Name'] ?>" /></td>
				</tr>
				<tr>
					<td>Last Name:</td>
					<td><input type="text" name="lname" value="<?php echo $row['Last_Name'] ?>" /></td>
				</tr>
				<tr>
					<td>Email Address:</td>
					<td><input type="email" name="email" value="<?php echo $row['Email'] ?>" /></td>
				</tr>
				<tr>
					<td>TP Number: </td>
					<td><input type="tel" name="tel" value="<?php echo $row['Contact_No'] ?>" /></td>
				</tr>
				<tr>
					<td><input type="submit" class="button" name="update" value="UPDATE PROFILE"></td>
				</tr>
			<?php
				}
			?>

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