<?php
session_start();
$username = $_SESSION['username'];
$email = $_SESSION['User_Email'];
?>
<html>
	<head>
	<link rel="stylesheet" href="../../public/css/employee.css">
		<title>
		Hotel Manager Dashboard
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
			<p style="margin-top: 2px; color:black"><?php echo "Logged in as $username"; ?></P>
			<hr style="color:teal">
			<a href="../Hotel_Website/logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:-7px;margin-left:85px;padding:0px;background-color:black;color:white;border-radius:5px;cursor:pointer"></a>
		</div>

	</center>
		<div class="sidenav">	
			<button class="dropdown-btn">Dashboard
			<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-container">
				<a href="HotelManagerManageStaff.php"><font size = "4 px">Manage Staff</font></a>
				<a href="ManagerBookingDetails.php"><font size = "4 px">Booking Details</font></a>
        		<a href="HotelManagerPromotions.php"><font size = "4 px">Promotions</font></a>
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
			<img src = "../../public/images/ayomal.png" height = "40%" >
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
			<img src = "../../public/images/Employee.png" height = "40%" >
		</td>
		<td>
			<p style = "font-family :Lato; font-size:20px; color :white;">Hotel Manager Dashboard</p>		
		</td>
		</tr>
	</table>
	

	<table style ="position:absolute; left:20px; top:350px; width:97%;border: 1px solid white;" >
		<tr>
		<th style ="border: 1px solid white;">
			<p style = "font-family :Lato; font-size:20px; color :white;"><a href="HotelManagerManageStaff.php">Manage Staff</a></p>		
		</th>
		<th style ="border: 1px solid white;">
			<p style = "font-family :Lato; font-size:20px; color :white;"><a href="ManagerBookingDetails.php">Booking Details</a></p>		
		</th>
		<th style ="border: 1px solid white;">
			<p style = "font-family :Lato; font-size:20px; color :white;"><a href="HotelManagerPromotions.php">Promotions</a></p>		
        </th>
		<th style ="border: 1px solid white;">
			<p style = "font-family :Lato; font-size:20px; color :white;"><a href="HotelManagerCustomerFeedback.php">Customer Feedback</a></p>		
		</th>
		<th style ="border: 1px solid white;">
			<p style = "font-family :Lato; font-size:20px; color :white;"><a href="HotelManagerManageRoom.php">Manage Rooms</a></p>		
        </th>
        <th style ="border: 1px solid white;">
			<p style = "font-family :Lato; font-size:20px; color :white;"><a href="HotelManagerEarlyCheckOuts.php">Early Check-Outs</a></p>		
		</th>
		</tr>
		<tr>
		<td style ="border: 1px solid white;">
		
			<table width= "100%">
				<tr>
				<td align ="center">
					<img src = "../../public/images/Emplo.png" height = "70%" >
				</td>
				<td align ="center">
                    <p style = "font-family :Lato; font-size:20px; color :white;">No. of  <br>Employees -131</p>		
				</td>
				</tr>
			</table>
			
		</td>
		<td style ="border: 1px solid white;">
		
			<table width="100%">
				<tr>
				<td align ="center">
					<img src = "../../public/images/Planner.png" height = "20%">
				</td>
				<td align="center">
					<img src = "../../public/images/Book.png" height = "85%">
				</td>
				</tr>
				<tr>
				<td align ="center">
					<img src = "../../public/images/Fork.png" height = "50%">
                </td>
                <td align ="center">
                    <p style = "font-family :Lato; font-size:20px; color :white;">Current <br>Bookings -141</p>		
				</td>
				</tr>
			</table>
			
		</td>
		<td style ="border: 1px solid white;" >

				<table width= "100%">
				<tr>
				<td align ="center">
					<img src = "../../public/images/discount.png" height = "50%" >
				</td>
				<td align ="center">
					<p style = "font-family :Lato; font-size:20px; color :white;">Existing <br>Promotions -03</p>		
				</td>
				</tr>
				</table>

		</td>
    <td style ="border: 1px solid white;" >
				<table width= "100%">
				<tr>
				<td align ="center">
					<img src = "../../public/images/Feedback.png" height = "50%" >
				</td>
				<td align ="center">
					<img src = "../../public/images/Feed.png" height = "90%" >
				</td>
				</tr>
			</table>    
	</td>
	<td style ="border: 1px solid white;" >
				<table width= "100%">
				<tr>
				<td align ="center">
					<img src = "../../public/images/room.png" height = "50%" >
				</td>
				<td align ="center">
					<p style = "font-family :Lato; font-size:20px; color :white;">Current <br>Room Types - 3</p>	
				</td>
				</tr>
			</table>
				
        </td>
	<td style ="border: 1px solid white;" >
				<table width= "100%">
				<tr>
				<td align ="center">
					<img src = "../../public/images/check-out.png" height = "20%" >
				</td>
				<td align ="center">
					<img src = "../../public/images/clock.png" height = "10%" >
				</td>
				</tr>
			</table>
				
        </td>
		</tr>	
    </table>

	
    <table style ="position:absolute; top : 1450px; left:150px;">
        <tr>
            <th>
                <p style = "font-family :Lato; font-size:20px; color :white;">Bookings Overview of the Year</p>	
            </th>
        </tr>
        <tr>
            <td align = "center">
                <img src = "../../public/images/bar.png" height = "75%" >
            </td>
        </tr>
    </table>
	
	<div class="bottom-right">
		<form style= "color:white; font-size:20px;">
			<fieldset>
			<legend><font size = "10px">User Profile</font></legend>
			<label for="fname">First Name  :    </label>
			<input type="text" id="fname" name="fname">
			<label for="lname">Last Name   :    </label>
			<input type="text" id="lname" name="lname">
			<label for="email">Email Add  :   </label>
			<input type="email" id="email" name="email">
			<label for="password">Password     :    </label>
			<input type="password" id="password" name="password" placeholder="Password">
			<label for="tel">TP Number     :      </label>
			<input type="tel" id="tel" name="tel">
			<br>
			<table>
				<td>
					<input type="button" class="button" value="UPDATE PROFILE">
			</table>
			</fieldset>
		</form>
		
	</div>
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