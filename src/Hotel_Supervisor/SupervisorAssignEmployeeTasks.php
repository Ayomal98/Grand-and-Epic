<?php
session_start();
$username = $_SESSION['username'];
$email = $_SESSION['User_Email'];
?>

<html>
	<head>
	<link rel="stylesheet" href="../Css/employee.css">
		<title>
		Supervisor Assign Employee Tasks
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
			<button class="dropdown-btn">Assign Employee Tasks
				<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-container">
                <a href="SupervisorDashboard.php"><font size = "4 px">Dashboard</font></a>
                <a href="SupervisorManageMeals.php">Manage Meals</a>
                <a href="SupervisorManageSetMenus.php">Manage Set Menu</a>
                <a href="SupervisorLeaveRequest.php"><font size = "4 px">Request a leave</font></a>
				</div>
		</div>
		<div class = "top-right">
		<table width = "100%">
		<tr>
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

	<!-- Assign Employee Tasks -->
		<form style="font-size: 20px; width:75%; position:absolute; left:160px; top:260px;">
		<fieldset>
			<legend style = "color:white;">Assign Employees Tasks</legend>
				<table style = "color:white; font-size: 20px; width:88%;">
					<tr>
						<td align="left">Employee ID:</td>
						<td align="center"><input type="text" name="id" size="20"></td>
					</tr>
					<tr>
                        <td align="left">Assigned Section:</td>
                        <td align="left">
                            <select id="types" name="typelist" form="typeform" style="margin: 8px 68px;">
                                <option value="rservice">Room Service</option>
                                <option value="dinein">Dine-in Area</option>
                                <option value="pool">Pool Area</option>
                                <option value="bhall">Banquet Hall</option>
                                <option value="garden">Garden Area</option>
                            </select>
					</tr>
					<tr>
						<td align="left">Assigned Date:</td>
						<td align="center"><input type="date" name="enddate" size="20" style="width:80%"></td>
					</tr>
					<tr>
						<td align="left">Allocated Room Numbers:</td>
						<td align="center"><input type="text" name="rnmbr" size="50"></td>
					</tr>
					<tr>
						<td align="left">Allocated Table Numbers:</td>
						<td align="center"><input type="text" name="rnmbr" size="50"></td>
					</tr>
					<tr>
						<td align="left">Allocated Locations:</td>
						<td align="center"><input type="text" name="rnmbr" size="50"></td>
					</tr>
				</table>
				
				<table style = "color:white; font-size: 20px; width:81%;">
					<tr>
						<td align="right">
							<input type="button" class="button" value="CANCEL">
							<input type="button" class="button" value="UPDATE">
						</td>
						
					</tr>
		</table>
		</fieldset>
		</form>

	<!-- View Leave Requests of Employees -->

		<form style="font-size: 20px; width:100%; position:absolute; top:800px;">
		<fieldset>
		<legend style = "color:white;">View Leave Requests</legend>
			<table style="border: 1px solid white; width:100%" >
				<tr>
					<td align ="center">
						<img src = "../Images/BIgCal.png" height = "10%" >
					</td>
				</tr>
				<tr>
					<td>
						<table style ="width:100%;border: 1px solid white;">
							<tr>
								<th style ="border: 1px solid white;">
									<p style = "font-family :Lato; font-size:20px; color :white;">Employee ID</p>		
								</th>
								<th style ="border: 1px solid white;">
									<p style = "font-family :Lato; font-size:20px; color :white;">Leave Start Date</p>		
								</th>
								<th style ="border: 1px solid white;">
									<p style = "font-family :Lato; font-size:20px; color :white;">Leave End Date</p>		
								</th>
								<th style ="border: 1px solid white;">
									<p style = "font-family :Lato; font-size:20px; color :white;">Section</p>		
								</th>
								<th style ="border: 1px solid white;">
									<p style = "font-family :Lato; font-size:20px; color :white;">Leave request Accepted/Not Accepted</p>		
								</th>
							</tr>
							<tr>
								<td style ="border: 1px solid white;">
									<p style = "font-family :Lato; font-size:15px; color :white;">E53</p>
								</td> 
								<td style ="border: 1px solid white;">
									<p style = "font-family :Lato; font-size:15px; color :white;">05/05/2020</p>  
								</td>
								<td style ="border: 1px solid white;">
									<p style = "font-family :Lato; font-size:15px; color :white;">05/05/2020</p>  
								</td>
								<td style ="border: 1px solid white;">
									<p style = "font-family :Lato; font-size:15px; color :white;">Room Service</p>  
								</td>
								<td style ="border: 1px solid white;">
									<p style = "font-family :Lato; font-size:15px; color :white;">Accepted</p>  
								</td>
							</tr>
							<tr>
								<td style ="border: 1px solid white;">
									<p style = "font-family :Lato; font-size:15px; color :white;">E02</p>
								</td>
								<td style ="border: 1px solid white;">
									<p style = "font-family :Lato; font-size:15px; color :white;">10/05/2020</p>  
								</td>
								<td style ="border: 1px solid white;">
									<p style = "font-family :Lato; font-size:15px; color :white;">17/05/2020</p>  
								</td>
								<td style ="border: 1px solid white;">
									<p style = "font-family :Lato; font-size:15px; color :white;">Dine-in</p>  
								</td>
								<td style ="border: 1px solid white;">
									<p style = "font-family :Lato; font-size:15px; color :white;">Not Accepted</p>  
								</td>
							</tr>
							<tr>
								<td style ="border: 1px solid white;">
									<p style = "font-family :Lato; font-size:15px; color :white;">E23</p>
								</td> 
								<td style ="border: 1px solid white;">
									<p style = "font-family :Lato; font-size:15px; color :white;">27/05/2020</p>  
								</td>
								<td style ="border: 1px solid white;">
									<p style = "font-family :Lato; font-size:15px; color :white;">30/05/2020</p>  
								</td>
								<td style ="border: 1px solid white;">
									<p style = "font-family :Lato; font-size:15px; color :white;">Room Service</p>  
								</td>
								<td style ="border: 1px solid white;">
									<p style = "font-family :Lato; font-size:15px; color :white;">Not Accepted</p>  
								</td>
							</tr>
							<tr>
							    <td style ="border: 1px solid white;">
									<p style = "font-family :Lato; font-size:15px; color :white;">E12</p>
								</td> 
								<td style ="border: 1px solid white;">
									<p style = "font-family :Lato; font-size:15px; color :white;">15/05/2020</p>  
								</td>
								<td style ="border: 1px solid white;">
									<p style = "font-family :Lato; font-size:15px; color :white;">16/05/2020</p>  
								</td>
								<td style ="border: 1px solid white;">
									<p style = "font-family :Lato; font-size:15px; color :white;">Room Service</p>  
								</td>
								<td style ="border: 1px solid white;">
									<p style = "font-family :Lato; font-size:15px; color :white;">Accepted</p>  
								</td>
							</tr>
							<tr>
								<td></td>   
								<td></td> 
								<td></td> 
								<td></td>
								<td align= "right">
									<p style = "font-family :Lato; font-size:15px; color :rgb(240, 16, 16); cursor: pointer;"><u>Show more rows</u></p>
								</td>
							</tr>
						</table>
		</fieldset>
		</form>
	
<!-- View Booking Details -->
<form style="font-size: 20px; width:98%; position:absolute; top:500px;">
<fieldset>
	<legend style = "color:white;">View Booking Details</legend>
    <table style="border: 1px solid white; width:100%" >
    <tr>
        <th>
			<p style = "font-family :Lato; font-size:20px; color :white;">For Staying-in</p>		
        </th>
    </tr>
    <tr>
        <td align ="center">
            <img src = "../Images/BIgCal.png" height = "10%" >
        </td>
    </tr>
    <tr>
        <td>
            <table style ="width:100%;border: 1px solid white;">
                <tr>
                    <th style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">Room No</p>		
                    </th>
                    <th style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">Room Type</p>		
                    </th>
                    <th style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">isBooked</p>		
                    </th>
                    <th style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">isStayingFullDay</p>		
                    </th>
                    <th style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">Time Checked-in</p>		
                    </th>
                    <th style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">Time Checked-out</p>		
                    </th>
                    </tr>
                    <tr>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">S123</p>
                       </td> 
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">Superior</p>  
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">1</p>  
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">1</p>  
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">16.30 PM</p>  
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">Null</p>  
                       </td>
                    </tr>
                    <tr>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">P123</p>
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">Panoramic</p>  
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">1</p>  
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">1</p>  
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">10.00 AM</p>  
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">Null</p>  
                       </td>
                    </tr>
                    <tr>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">Su123</p>
                       </td> 
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">Suite</p>  
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">1</p>  
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">1</p>  
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">8.00 AM</p>  
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">8.00 PM</p>  
                       </td>
                    </tr>
                    <tr>
                        <td style ="border: 1px solid white;">
                         <p style = "font-family :Lato; font-size:15px; color :white;">P124</p>
                        </td> 
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">Panoramic</p>  
                        </td>
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">0</p>  
                        </td>
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">0</p>  
                        </td>
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">Null</p>  
                        </td>
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">Null</p>  
                        </td>
                     </tr>
                     <tr>
                    <td></td>   
                    <td></td> 
                    <td></td> 
                    <td></td>
                    <td></td>  
                    <td align= "right">
                        <p style = "font-family :Lato; font-size:15px; color :rgb(240, 16, 16); cursor: pointer;"><u>Show more rows</u></p>
                    </td>
                     </tr>
            </table>
        </td>
    </tr>
	</table>
    <table style ="width:100%;border: 1px solid white;" >
    <tr>
        <th>
			<p style = "font-family :Lato; font-size:20px; color :white;">For Dine-in</p>		
        </th>
    </tr>
    <tr>
        <td align ="center">
            <img src = "../Images/BIgCal.png" height = "10%" >
        </td>
    </tr>
    <tr>
        <td>
            <table style ="width:100%;border: 1px solid white;">
                <tr>
                    <th style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">Table No</p>		
                    </th>
                    <th style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">Meal Preference</p>		
                    </th>
                    <th style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">isBooked</p>		
                    </th>
                    <th style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">Time Period</p>		
                    </th>
                    </tr>
                    <tr>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">T12</p>
                       </td> 
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">Lunch</p>  
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">1</p>  
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">12.30 PM - 16.30 PM </p>  
                       </td>
                    </tr>
                    <tr>
                        <td style ="border: 1px solid white;">
                         <p style = "font-family :Lato; font-size:15px; color :white;">T10</p>
                        </td> 
                        <td style ="border: 1px solid white;">
                         <p style = "font-family :Lato; font-size:15px; color :white;">Dinner</p>  
                        </td>
                        <td style ="border: 1px solid white;">
                         <p style = "font-family :Lato; font-size:15px; color :white;">1</p>  
                        </td>
                        <td style ="border: 1px solid white;">
                         <p style = "font-family :Lato; font-size:15px; color :white;">18.30 PM - 21.30 PM </p>  
                        </td>
                     </tr>
                     <tr>
                        <td style ="border: 1px solid white;">
                         <p style = "font-family :Lato; font-size:15px; color :white;">T02</p>
                        </td> 
                        <td style ="border: 1px solid white;">
                         <p style = "font-family :Lato; font-size:15px; color :white;">Breakfast</p>  
                        </td>
                        <td style ="border: 1px solid white;">
                         <p style = "font-family :Lato; font-size:15px; color :white;">1</p>  
                        </td>
                        <td style ="border: 1px solid white;">
                         <p style = "font-family :Lato; font-size:15px; color :white;">9.00 AM - 10.00 AM </p>  
                        </td>
                     </tr>
                     <tr>
                        <td style ="border: 1px solid white;">
                         <p style = "font-family :Lato; font-size:15px; color :white;">T11</p>
                        </td> 
                        <td style ="border: 1px solid white;">
                         <p style = "font-family :Lato; font-size:15px; color :white;">Lunch</p>  
                        </td>
                        <td style ="border: 1px solid white;">
                         <p style = "font-family :Lato; font-size:15px; color :white;">0</p>  
                        </td>
                        <td style ="border: 1px solid white;">
                         <p style = "font-family :Lato; font-size:15px; color :white;">12.30 PM - 16.30 PM </p>  
                        </td>
                     </tr>
                     <tr>
                    <td></td>   
                    <td></td> 
                    <td></td>  
                    <td align= "right">
                        <p style = "font-family :Lato; font-size:15px; color :rgb(240, 16, 16); cursor: pointer;"><u>Show more rows</u></p>
                    </td>
                     </tr>
            </table>
        </td>
    </tr>
	</table>
	
	<table style ="width:100%; border:1px solid white;" >
    <tr>
        <th>
			<p style = "font-family :Lato; font-size:20px; color :white;">For Events</p>		
        </th>
    </tr>
    <tr>
        <td align ="center">
            <img src = "../Images/BIgCal.png" height = "10%" >
        </td>
    </tr>
    <tr>
        <td>
	         <table style ="width:100%;border: 1px solid white;">
                    <tr>
                        <th style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:20px; color :white;">Location</p>		
                        </th>
                        <th style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:20px; color :white;">Meal Schedule</p>		
                        </th>
                        <th style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:20px; color :white;">isBooked</p>		
                        </th>
                        <th style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:20px; color :white;">Time Period</p>		
                        </th>
                    </tr>
                    <tr>
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">Pool Area</p>
                        </td> 
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">Full Day</p>  
                        </td>
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">1</p>  
                        </td>
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">9.00 AM - 10.00 PM</p>  
                        </td>
                    </tr>
                    <tr>
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">Banquet Hall</p>
                        </td> 
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">Half Day</p>  
                        </td>
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">1</p>  
                        </td>
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">11.00 AM - 18.30PM </p>  
                        </td>
                    </tr>
                    <tr>
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">Garden</p>
                        </td> 
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">Half Day</p>  
                        </td>
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">1</p>  
                        </td>
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">9.00 AM - 1 PM </p>  
                        </td>
                    </tr>
                    <tr>
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">T11</p>
                        </td> 
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">Lunch</p>  
                        </td>
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">0</p>  
                        </td>
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">Null </p>  
                        </td>
                    </tr>
                    <tr>
                        <td></td>   
                        <td></td> 
                        <td></td>  
                        <td align= "right">
                            <p style = "font-family :Lato; font-size:15px; color :rgb(240, 16, 16);cursor:pointer;"><u>Show more rows</u></p>
                        </td>
                    </tr>
            </table>
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