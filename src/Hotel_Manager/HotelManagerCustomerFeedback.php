<?php
session_start();
$username = $_SESSION['username'];
$email = $_SESSION['User_Email'];
?>
<html>
	<head>
	<link rel="stylesheet" href="../Css/employee.css">
		<title>
		Hotel Manager View Customer Feedback
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
			<button class="dropdown-btn"><font size ="4 px">Customer Feedback</font>
			<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-container">
                    <a href="HotelManagerDashboard.php"><font size = "4 px">Dashboard</font></a>
                    <a href="HotelManagerManageStaff.php"><font size = "4 px">Manage Staff</font></a>
                    <a href="ManagerBookingDetails.php"><font size = "4 px">Booking Details</font></a>
					<a href="HotelManagerPromotions.php"><font size = "4 px">Promotions</font></a>
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
		<legend style = "color:white; font-size: 20px">Customer Feedback</legend>
		
		<table style = "color:white; font-size: 20px; width:88%;">
			<tr>
				<td align="left">Name:</td>
				<td align="center"><input type="text" name="name" size="20" value="Kapila"></td>
			</tr>
			<tr>
				<td align="left">Reservation Type:</td>
				<td align="center"><input type="text" name="rtype" size="50" value="Staying-in"></td>
			</tr>
			<tr>
				<td align="left">Feedback about the Hotel Service and Staff:</td>
				<td align="center">
					<textarea name="feedback1" rows="5" cols="45" style="font-size:20px; font-family:sans-serif;">Very friendly staff and the service is really good</textarea>
				</td>
			</tr>
			<tr>
				<td align="left">Rating:</td>
				<td align="left">
					<input type="radio" name="rating1" value="excellent" checked style="margin-left:65px;">Excellent
					<input type="radio" name="rating1" value="good" disabled style="margin-left:65px;">Good
					<input type="radio" name="rating1" value="fair" disabled style="margin-left:65px;">Fair
					<input type="radio" name="rating1" value="poor" disabled style="margin-left:65px;">Poor
				</td>
			</tr>
			<tr>
				<td align="left">Feedback about the Hotel Website:</td>
				<td align="center">
					<textarea name="feedback1" rows="5" cols="45" style="font-size:20px; font-family:sans-serif;">Very user-friendly interface and include all the information necessary</textarea>
				</td>
			</tr>
			<tr>
				<td align="left">Rating:</td>
				<td align="left">
					<input type="radio" name="rating2" value="excellent" disabled style="margin-left:65px;">Excellent
					<input type="radio" name="rating2" value="good" checked style="margin-left:65px;">Good
					<input type="radio" name="rating2" value="fair" disabled style="margin-left:65px;">Fair
					<input type="radio" name="rating2" value="poor" disabled style="margin-left:65px;">Poor
				</td>
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
					<input type="button" class="button" value="CANCEL">
					<input type="button" class="button" value="UPDATE">
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