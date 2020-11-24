<?php
session_start();
$username = $_SESSION['username'];
$email = $_SESSION['User_Email'];
?>
<html>

<head>
	<link rel="stylesheet" href="../../public/css/employee.css">
	<title>
		Supervisor Dashboard
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
			<a href="SupervisorAssignEmployeeTasks.php">Assign Employee Tasks</a>
			<a href="SupervisorManageMeals.php">Manage Meals</a>
			<a href="SupervisorManageSetMenus.php">Manage Set Menu</a>
			<a href="SupervisorLeaveRequest.php">Request a Leave</a>
		</div>
	</div>
	<div class="top-right">
		<table width="100%">
			<tr>
				<td>
				</td>
				<td>
					<img src="../../public/images/ayomal.png" height="40%">
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

	<table style="position:absolute; top : 270px; width:350px;">
		<tr>
			<td>
				<img src="../../public/images/Employee.png" height="40%">
			</td>
			<td>
				<p style="font-family :Lato; font-size:20px; color :white;">Supervisor Dashboard</p>
			</td>
		</tr>
	</table>


	<table style="position:absolute; left:20px; top:350px; width:97%;border: 1px solid white;">
		<tr>
			<th style="border: 1px solid white;">
				<p style="font-family :Lato; font-size:20px;"><a href="SupervisorAssignEmployeeTasks.php">Assign Employee Tasks</a></p>
			</th>
			<th style="border: 1px solid white;">
				<p style="font-family :Lato; font-size:20px;"><a href="SupervisorManageMeals.php">Manage Meals</a></p>
			</th>
			<th style="border: 1px solid white;">
				<p style="font-family :Lato; font-size:20px;"><a href="SupervisorManageSetMenus.php">Manage Set Menu</a></p>
			</th>
			<th style="border: 1px solid white;">
				<p style="font-family :Lato; font-size:20px;"><a href="SupervisorLeaveRequest.php">Request a Leave</a></p>
			</th>
		</tr>
		<tr>
			<td style="border: 1px solid white;">

				<table width="100%">
					<tr>
						<td align="center">
							<img src="../../public/images/roomService.png" height="75%">
						</td>
						<td align="center">
							<p style="color: white; font-size: 20px;">15</p>
						</td>
					</tr>
					<tr>
						<td align="center">
							<img src="../../public/images/cutlery.png" height="50%">
						</td>
						<td align="center">
							<p style="color: white; font-size: 20px;">18</p>
						</td>
					</tr>
					<tr>
						<td align="center">
							<img src="../../public/images/tie.png" height="50%">
						</td>
						<td align="center">
							<p style="color: white; font-size: 20px;">2</p>
						</td>
					</tr>
				</table>

			</td>
			<td style="border: 1px solid white;">

				<table width="100%">
					<tr>
						<td align="center">
							<img src="../../public/images/breakfast.png" height="50%">
						</td>
						<td rowspan="3" align="center">
							<img src="../../public/images/meal.png" height="60%">
						</td>
					</tr>
					<tr>
						<td align="center">
							<img src="../../public/images/lunch.png" height="40%">
						</td>
					</tr>
					<tr>
						<td align="center">
							<img src="../../public/images/dinner.png" height="50%">
						</td>
					</tr>
				</table>

			</td>

			<td style="border: 1px solid white;">
				<table width="100%">
					<tr>
						<td align="center">
							<img src="../../public/images/setmenuSmall.png" height="50%">
						</td>
						<td align="center">
							<img src="../../public/images/setMenuBig.png" height="100%">
						</td>
					</tr>
				</table>
			</td>

			<td style="border: 1px solid white;">
				<table width="100%">
					<tr>
						<td align="center">
							<img src="../../public/images/leave.png" height="50%">
						</td>
						<td align="center">
							<img src="../../public/images/leaveBig.png" height="35%">
						</td>
					</tr>
				</table>
			</td>
		</tr>

	</table>


	<form>
		<fieldset style=" position:absolute; top:680px; width: 75%; left:160px">
			<table align="center" style="color:white; font-size: 20px; width:88%;">
				<tr>
					<td align="center" colspan="2"><h1>USER PROFILE</h1></td>
				</tr>
				<tr>
					<td>Supervisor ID:</td>
					<td><input type="text" id="id" name="id"></td>
				</tr>
				<tr>
					<td>First Name:</td>
					<td><input type="text" id="fname" name="fname"></td>
				</tr>
				<tr>
					<td>Last Name:</td>
					<td><input type="text" id="lname" name="lname"></td>
				</tr>
				<tr>
					<td>Email Address:</td>
					<td><input type="email" id="email" name="email"></td>
				</tr>
				<tr>
					<td>Password: </td>
					<td><input type="password" id="password" name="password" placeholder="Password"></td>
				</tr>
				<tr>
					<td>TP Number: </td>
					<td><input type="tel" id="tel" name="tel"></td>
				</tr>
				<tr>
					<td><input type="button" class="button" value="UPDATE PROFILE"></td>
				</tr>
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