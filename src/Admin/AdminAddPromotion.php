<?php
session_start();
$username = $_SESSION['username'];
$email = $_SESSION['User_Email'];
?>
<html>

<head>
	<link rel="stylesheet" href="../../public/css/employee.css">
	
	<title>
		Admin Manage Co-admins
	</title>
	<style>
		body{
			height : 1050px;
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
		<button class="dropdown-btn">Add Promotions
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
			<a href="AdminManageContent.php">
				<font size="4 px">Manage Content on web-site</font>
			</a>
			<a href="AdminManageCoAdmins.php">
				<font size="4 px">Manage Co-Admins</font>
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

	<table style="position:absolute; top : 240px; width:350px;">
		<tr>
			<td>
				<img src="../../public/images/discount.png" height="40%">
			</td>
			<td>
				<p style="font-family :Lato; font-size:22px; color :white;">Current Promotions</p>
			</td>
		</tr>
	</table>


	<table style="position:absolute; left:20px; top:350px; width:97%;border: 1px solid white;">
		<tr>
			<th style="border: 1px solid white;">
				<p style="font-family :Lato; font-size:20px; color :white;">Customer Loyalty Promotions</p>
			</th>
			<th style="border: 1px solid white;">
				<p style="font-family :Lato; font-size:20px; color :white;">Last Minute Promotions</p>
			</th>
			<th style="border: 1px solid white;">
				<p style="font-family :Lato; font-size:20px; color :white;">Credit Card Promotions</p>
			</th>
		</tr>

		<td style="border: 1px solid white;">

			<table width="100%">
				<tr>
					<td align="center">
						<img src="../../public/images/loyalty.png" height="70%">
					</td>
					<td align="center">
						<textarea name="Message" rows="5" cols="0" placeholder="Terms & Conditions" style="font-size: 20px;"></textarea>
				</tr>
				<tr>
					<td align="center">
						<input type="button" class="button" value="UPDATE PROMOTION">
					</td>
					<td align="center">
						<input type="button" class="button" value="DELETE PROMOTION">
					</td>
				</tr>
			</table>

		</td>
		<td style="border: 1px solid white;">
			<table width="100%">
				<tr>
					<td align="center">
						<img src="../../public/images/lastminute.png" height="70%">
					</td>
					<td align="center">
						<textarea name="Message" rows="5" cols="20" placeholder="Terms & Conditions" style="font-size: 20px;"></textarea>
				</tr>
				<tr>
					<td align="center">
						<input type="button" class="button" value="UPDATE PROMOTION">
					</td>
					<td align="center">
						<input type="button" class="button" value="DELETE PROMOTION">
					</td>
				</tr>
			</table>
		</td>
		<td style="border: 1px solid white;">
			<table width="100%">
				<tr>
					<td align="center">
						<img src="../../public/images/credit.png" height="70%">
					</td>
					<td align="center">
						<textarea name="Message" rows="5" cols="20" placeholder="Terms & Conditions" style="font-size: 20px;"></textarea>
				</tr>
				<tr>
					<td align="center">
						<input type="button" class="button" value="UPDATE PROMOTION">
					</td>
					<td align="center">
						<input type="button" class="button" value="DELETE PROMOTION">
					</td>
				</tr>
			</table>
		</td>
		</tr>

		<table style="position:absolute; top : 600px; width:350px;width : 97%;">
			<tr>
				<td>
					<p style="font-family :Lato; font-size:20px; color :white;">To Create a new Promotion</p>
				</td>
				<td>
					<img src="../../public/images/point.png" height="50%">
				</td>
				<td>
					<form>
						<fieldset>
							<legend style="color:white; font-size: 20px">New Promotion</legend>
							<table style="color:white; font-size: 20px; width:90%; margin-left:auto; margin-right:auto;">
								<tr>
									<td align="left">Promotion Type: </td>
									<td align="left"><select id="types" name="typelist" form="typeform">
											<option value="volvo">Loyalty Promotion</option>
											<option value="saab">Last Minute Promotion</option>
											<option value="opel">Credit Card Promotion</option>
										</select>
									</td>
								</tr>
								<tr>
									<td align="left">Context of Promotions:</td>
									<td align="left"><textarea name="Message" rows="3" cols="25" placeholder="Leave your reason here:" style="font-size: 20px;"></textarea>
									</td>
								</tr>
								<tr>
									<td align="left">Constraints and Policies</td>
									<td align="left"><textarea name="Message" rows="3" cols="25" placeholder="Leave your reason here:" style="font-size: 20px;"></textarea>
									</td>
								</tr>
								<tr>
								</tr>
							</table>
							<br>
							<table style="color:white; font-size: 20px; width:84%;">
								<tr>
									<td align="right">
										<input type="button" class="button" value="UPDATE PROMOTION">
								</tr>
							</table>
						</fieldset>
					</form>
				</td>
			</tr>
		</table>
	</table>

	<table style="position:absolute; top : 1000px; width:350px;width : 86%;margin-bottom:50px">
		<tr>
			<td>
				<p style="font-family :Lato; font-size:20px; color :white;">To View Booking Analysis</p>
			</td>
			<td align="left">
				<img src="../../public/images/point.png" height="50%">
			</td>
			<td align="left">
				<p style="font-family :Lato; font-size:20px; color:cornflowerblue;">Booking Analysis Overview</p>
			</td>
			<td>
				<img src="../../public/images/pie.png" height="100%">
			</td>
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