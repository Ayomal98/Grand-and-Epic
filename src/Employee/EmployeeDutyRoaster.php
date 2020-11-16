<?php
session_start();
$username = $_SESSION['username'];
$email = $_SESSION['User_Email'];
?>


<html>
	<head>
	<link rel="stylesheet" href="../Css/employee.css">
		<title>
		Employee Duty Roaster
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
			<button class="dropdown-btn">View Duty Roaster
				<i class="fa fa-caret-down"></i>
            </button>
            
			<div class="dropdown-container">
				<a href="EmployeeDashboard.php">Dashboard</a>
				<a href="EmployeeLeaveRequest.php">Leave Request</a>
				<a href="EmloyeeViewCustomerFeedback.php">View Customer Feedback</a>
                
            </div>
		</div>
        
        <div class="top-right">
            <table width="100%">
                <tr>
                    <td>
                        <img src="../Images/ayomal.png" height="40%">
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
		<legend style = "color:white; font-size: 20px">Duty Roaster</legend>
		
		<table style = "color:white; font-size: 20px; width:88%;">
			<tr>
				<td align="left">Assigned Section:</td>
				<td align="center"><input type="text" name="section" size="20" value="Room Service"></td>
			</tr>
			<tr>
				<td align="left">Assigned Date:</td>
				<td align="center"><input type="text" name="date" size="50" value="05/22/2020"></td>
			</tr>
			<tr>
				<td align="left">Allocated Room Numbers:</td>
				<td align="center"><input type="text" name="rnmbr" size="50" value="S22 / S23"></td>
			</tr>
			<tr>
				<td align="left">Allocated Table Numbers:</td>
				<td align="center"><input type="text" name="rnmbr" size="50" value="-"></td>
			</tr>
			<tr>
				<td align="left">Allocated Locations:</td>
				<td align="center"><input type="text" name="rnmbr" size="50" value="-"></td>
			</tr>
			<tr>
				<td align="left">Availability:</td>
				<td align="left">
					<input checked="checked" type="radio" name="availablity" value="notavailable" style="margin-left:80px;">Not Available
					<input type="radio" name="availablity" value="available" style="margin-left:80px;">Available
				</td>
			</tr>
		</table>
		
		<br>
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