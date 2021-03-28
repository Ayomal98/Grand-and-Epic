<?php
include("../../public/includes/session.php");
checkSession();
if (!isset($_SESSION['First_Name'])) {
	header('Location:../Hotel_Website/index.php');
}
?>




<html>

<head>
	<link rel="stylesheet" href="../../public/css/employee.css">
	<title>
		Employee Duty Roaster
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
			<p style="margin-top: 2px; color:black"><?php echo "Logged in as " . $_SESSION['First_Name']; ?></P>
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



<form action="" method="POST">
		<fieldset style=" position:absolute; top:280px; width: 75%; left:160px">
			<table align="center" style="color:white; font-size: 20px; width:88%;">

			<?php
				include("../../config/connection.php");

					$query = "SELECT * FROM employee_tasks where Employee_ID='$_SESSION[Employee_ID]' ; ";
					$query_run = mysqli_query($con,$query);

					while($row = mysqli_fetch_array($query_run))
					{
			?>
				<tr>
					<td align="center" colspan="2"><h1>DUTY ROASTER</h1></td>
				</tr>
				<tr>
					<td>Assigned Date:</td>
					<td><?php echo $row['Assigned_Date'] ?></td>
				</tr>
				<tr>
					<td>Assigned Section:</td>
					<td><?php echo $row['Assigned_Section'] ?></td>
				</tr>
				<tr>
					<td>Room Numbers:</td>
					<td><?php echo $row['Allo_Room_Numbers'] ?></td>
				</tr>
				<tr>
					<td>Table Numbers:</td>
					<td><?php echo $row['Allo_Table_Numbers'] ?></td>
				</tr>
				<tr>
					<td>Locations: </td>
					<td><?php echo $row['Allo_Locations'] ?></td>
				</tr>
				
			<?php
				}
			?>

			</table>
		</form>

			<br>
			<table style="color:white; font-size: 20px; width:81%;">
				<tr>
					<td align="right">
						<input type="button" class="button" value="BACK TO DASHBOARD" onclick="window.location.href='EmployeeDashboard.php'" >

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
	<script>
	//--    for setting the current day as the minimum date for the time being --
	var today = new Date();
	var dd = today.getDate() + 1;
	var mm = today.getMonth() + 1;
	var yy = today.getFullYear();
	if (dd < 10) {
		dd = '0' + dd;
	}
	if (mm < 10) {
		mm = '0' + mm;
	}
	today = yy + '-' + mm + '-' + dd;
	document.getElementById("datefield").setAttribute("min", today);
	document.getElementById("endfield").setAttribute("min", today);
</script>

</body>

</html>