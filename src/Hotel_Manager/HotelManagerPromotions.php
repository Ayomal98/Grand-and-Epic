<?php

include("../../public/includes/session.php");

checkSession();
	if(!isset($_SESSION['First_Name'])){
		header('Location:../Hotel_Website/HomePage-login.php');
	}

?>
<html>
	<head>
	<link rel="stylesheet" href="../../public/css/employee.css">
		<title>
		Hotel Manager Manage Promotions
        </title>
        <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
	</head>	
	<body bgcolor = "black">

	<center>
	<img src="../../public/images/Logo.png" width="20%">
	<span class="far fa-caret-square-down" style="color:white;font-size:30px;position:absolute;right:0px;top:20px;" onclick="funcUserDetails()"></span>
		<!--<br><span style="position:absolute;top:100px;right:40px;font-size:20px;color:white"></span>-->
		<div id="user-detail-container">
			<span class="fa fa-window-close" style="margin-left:130px;" onclick="funcCloseUserDetails()"></span>
			<p style="margin-top: 2px; color:black">
			<?php 
				echo "Logged in as " . $_SESSION['First_Name'] ."(Staff)</P>";
			?>
			<hr style="color:teal">
			<a href="../Hotel_Website/logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:-7px;margin-left:85px;padding:0px;background-color:black;color:white;border-radius:5px;cursor:pointer"></a>
        </div>
	</center>
		<div class="sidenav">	
			<button class="dropdown-btn">Promotions 
			<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-container">
                <a href="HotelManagerDashboard.php"><font size = "4 px">Dashboard</font></a>
				<a href="HotelManagerManageStaff.php"><font size = "4 px">Manage Staff</font></a>
				<a href="ManagerBookingDetails.php"><font size = "4 px">Booking Details</font></a>
				<a href="HotelManagerCustomerFeedback.php"><font size = "4 px">Customer Feedback</font></a>
				<a href="HotelManagerManageRoom.php"><font size = "4 px">Manage Room</font></a>
				<a href="HotelManagerEarlyCheckOuts.php"><font size = "4 px">Early Check-Outs</font></a>
				</div>
		</div>
		<div class = "top-right">
		<table width = "100%">
		<tr>
		<td>
		</td>
		<td>
			<img src = "../../public/images/ayomal.png" height = "80px" >
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
	
	<table style ="position:absolute; top : 240px; width:350px;" >
		<tr>
		<td>
			<img src = "../../public/images/discount.png" height = "80px" >
		</td>
		<td>
			<p style = "font-family :Lato; font-size:22px; color :white;">Current Promotions</p>		
		</td>
		</tr>
	</table>
	

	<table style="position:absolute; left:20px; top:350px; width:97%;border: 1px solid white;">
		<tr>
			<th style="border: 1px solid white;">
				<p style="font-family :Lato; font-size:20px; color :white;">Loyalty Promotions</p>
			</th>
			<th style="border: 1px solid white;">
				<p style="font-family :Lato; font-size:20px; color :white;">Last Minute Promotions</p>
			</th>
			<th style="border: 1px solid white;">
				<p style="font-family :Lato; font-size:20px; color :white;">Seasonal Promotions</p>
			</th>
		</tr>

		<form action="PromotionManage.php" method="POST">
				<td style="border: 1px solid white;">
					<table width="100%">
						<tr>
							<td align="center">
								<img src="../../public/images/loyalty.png" width="125" height="100">
							</td>
							<td align="center">
								<textarea name="Context" rows="5" cols="20" placeholder="Context" style="font-size: 20px;">
						<?php
						include("../../config/connection.php");
						$query = "SELECT Context,Policies FROM promotions where Promotion_type='Loyalty'";
						$query_run = mysqli_query($con, $query);
						while ($row = mysqli_fetch_array($query_run))
							echo   $row["Context"] .
								'</textarea><textarea name="Policies" rows="5" cols="20" placeholder="Policies" style="font-size: 20px;">
						' . $row["Policies"] . '
							</textarea>'
						?>
						</textarea>

								<input type="hidden" name="type" value="Loyalty">
						</tr>
						<tr>
							<td align="center">
								<input type="submit" class="button" name="update" value="UPDATE">
							</td>
						</tr>
					</table>
				</td>
			</form>

		<!--LAST MINUTE-->
		<form action="PromotionManage.php" method="POST">
				<td style="border: 1px solid white;">
					<table width="100%">
						<tr>
							<td align="center">
								<img src="../../public/images/lastminute.png" width="125" height="100">
							</td>
							<td align="center">
								<textarea name="Context" rows="5" cols="20" placeholder="Context" style="font-size: 20px;">
						<?php
						include("../../config/connection.php");
						$query = "SELECT Context,Policies FROM promotions where Promotion_type='Last'";
						$query_run = mysqli_query($con, $query);
						while ($row = mysqli_fetch_array($query_run))
							echo   $row["Context"] .
								'</textarea><textarea name="Policies" rows="5" cols="20" placeholder="Policies" style="font-size: 20px;">
						' . $row["Policies"] . '
							</textarea>'
						?>
						</textarea>

								<input type="hidden" name="type" value="Last">
						</tr>
						<tr>
							<td align="center">
								<input type="submit" class="button" name="update" value="UPDATE">
							</td>
						</tr>
					</table>
				</td>
			</form>
		

		<!--SEASONAL-->
		<form action="PromotionManage.php" method="POST">
				<td style="border: 1px solid white;">
					<table width="100%">
						<tr>
							<td align="center">
								<img src="../../public/images/presents.jpeg" width="125" height="100">
							</td>
							<td align="center">
								<textarea name="Context" rows="5" cols="20" placeholder="Context" style="font-size: 20px;">
						<?php
						include("../../config/connection.php");
						$query = "SELECT Context,Policies FROM promotions where Promotion_type='Seasonal'";
						$query_run = mysqli_query($con, $query);
						while ($row = mysqli_fetch_array($query_run))
							echo   $row["Context"] .
								'</textarea><textarea name="Policies" rows="5" cols="20" placeholder="Policies" style="font-size: 20px;">
						' . $row["Policies"] . '
							</textarea>'
						?>
						</textarea>

								<input type="hidden" name="type" value="Seasonal">
						</tr>
						<tr>
							<td align="center">
								<input type="submit" class="button" name="update" value="UPDATE">
							</td>
						</tr>
					</table>
				</td>
				</form>
				</td>
			</tr>
		</table>
	</table>
    
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