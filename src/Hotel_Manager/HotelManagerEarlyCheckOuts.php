<?php
session_start();
$username = $_SESSION['username'];
$email = $_SESSION['User_Email'];
?>
<html>
	<head>
	<link rel="stylesheet" href="../Css/employee.css">
		<title>
		Hotel Manager Early Check-Outs
        </title>
        <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
	</head>	
	<body bgcolor = "black">

	<center>
    <img src="../Images/Logo.png" width="20%">

    <span class="far fa-caret-square-down" style="color:white;font-size:30px;position:absolute;right:100px;top:10px;" onclick="funcUserDetails()"></span>
		<!--<br><span style="position:absolute;top:100px;right:40px;font-size:20px;color:white"></span>-->
		<div id="user-detail-container">
			<span class="fa fa-window-close" style="margin-left:130px;" onclick="funcCloseUserDetails()"></span>
			<p style="margin-top: 2px; color:black"><?php echo "Logged in as $username"; ?></P>
			<hr style="color:teal">
			<a href="../Hotel_Website/logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:-7px;margin-left:85px;padding:0px;background-color:black;color:white;border-radius:5px;cursor:pointer"></a>
		</div>

	</center>
		<div class="sidenav">	
			<button class="dropdown-btn"><font size ="4 px">Early Check-Outs &#128317;</font>
				
				</button>
				<div class="dropdown-container">
                    <a href="HotelManagerDashboard.php"><font size = "4 px">Dashboard</font></a>
                    <a href="HotelManagerManageStaff.php"><font size = "4 px">Manage Staff</font></a>
                    <a href="ManagerBookingDetails.php"><font size = "4 px">Booking Details</font></a>
					<a href="HotelManagerPromotions.php"><font size = "4 px">Promotions</font></a>
					<a href="HotelManagerCustomerFeedback.php"><font size = "4 px">Customer Feedback</font></a>
					<a href="HotelManagerManageRoom.php"><font size = "4 px">Manage Room</font></a>
				</div>
		</div>
		<div class = "top-right">
		<table width = "100%">
		<tr>
		<td>
		</td>
		<td>
			<img src = "../Images/ayomal.png" height = "40%" >
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
	<fieldset style = " position:absolute; top:280px; width: 75%; left:160px">
		<legend style = "color:white; font-size: 20px">Early Check-Outs</legend>
		
		<table style = "color:white; font-size: 20px; width:88%;">
			<tr>
				<td align="left">Customer ID:</td>
				<td align="center"><input type="text" name="custID" size="20" value="C111"></td>
			</tr>
			<tr>
				<td align="left">Reservation ID:</td>
				<td align="center"><input type="text" name="resID" size="50" value="R203"></td>
            </tr>
            <tr>
				<td align="left">Date Checked In:</td>
                    <td align="center"><input type="date" name="startdate" size="20"></td></p>		
                </tr>
            </tr>
            <tr>
				<td align="left">Stated Check-Out Date:</td>
                    <td align="center"><input type="date" name="startdate" size="20"></td></p>		
                </tr>
            </tr>
            <tr>
				<td align="left">Actual Check-Out Date:</td>
                    <td align="center"><input type="date" name="startdate" size="20"></td></p>		
                </tr>
			</tr>
			<tr>
				<td align="left">Reason:</td>
				<td align="center"><textarea name="feedback1" rows="5" cols="55" style="font-size:20px; font-family:sans-serif;">Health Reasons</textarea></td>
			</tr>
			
		</table>
		
		<br>
		
		<table style = "color:white; font-size: 20px; width:81%;">
			<tr>
				<td align="left">
					<a href="#" class="button" style="padding:10px 20px; border-radius:50%">&laquo;</a>
					<a href="#" class="button" style="padding:10px 20px; border-radius:50%">&raquo;</a>
				</td>
				<td align="right">
					<input type="button" class="button" value="ACCEPT REFUND">
					<input type="button" class="button" value="DECLINE REFUND">
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