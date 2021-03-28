<?php
include("../../public/includes/session.php");
include("../../config/connection.php");
include('../../public/includes/id-generator.php');

checkSession();
	if(!isset($_SESSION['First_Name'])){
		header('Location:../Hotel_Website/HomePage-login.php');
		
	}
?>

<html>
	<head>
	<link rel="stylesheet" href="../../public/css/employee.css">
		<title>
		Supervisor Leave Request
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
				<?php 
					echo "<br><p class=\"logged-in-msg\">You are Logged in as " . $_SESSION['First_Name']. " (Staff)</p>"; 
				?>
			<hr style="color:teal">
			<a href="../Hotel_Website/logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:-7px;margin-left:85px;padding:0px;background-color:black;color:white;border-radius:5px;cursor:pointer"></a>
		</div>
	</center>
		<div class="sidenav">	
			<button class="dropdown-btn">Request a leave
				<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-container">
				<a href="SupervisorDashboard.php">Dashboard</a>
				<a href="SupervisorManageMeals.php">Manage Meals</a>
				<a href="SupervisorManageSetMenus.php">Manage Set Menu</a>
				<a href="SupervisorManageMealpackages.php">Manage Meal Packages</a>
				<a href="SupervisorAssignEmployeeTasks.php">Assign Employee Tasks</a>
				</div>
		</div>
		<div class = "top-right">
		<table width = "100%">
		<tr>
		<td>
			<img src ="../../public/images/ayomal.png" height = "80px" >
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
	


	<form method="post" action="">
		<fieldset style=" position:absolute; top:280px; width: 75%; left:160px">
			<legend style="color:white; font-size: 20px">Request a Leave</legend>

			<table style="color:white; font-size: 20px; width:90%; margin-left:auto; margin-right:auto;">
				<tr>
					<td>Supervisor ID:</td>
					<td><input type="text" name="id" size="20" value=<?php echo $_SESSION["Employee_ID"]; ?>></td>
				</tr>
				<tr>
					<td>Leave Start Date:</td>
					<td><input type="date" name="startdate" id="datefield" size="20"></td>
				</tr>
				<tr>
					<td>Leave End Date:</td>
					<td><input type="date" name="enddate" id="endfield" size="20"></td>
				</tr>
				<tr>
					<td>Section:</td>
					<td><input type="text" name="section" size="50"></td>
				</tr>
				<tr>
					<td>Reason for the leave:</td>
					<td><textarea name="Message" rows="5" cols="53" placeholder="Leave your reason here:"></textarea></td>
				</tr>
			</table>

			<br>
			<table style="color:white; font-size: 20px; width:81%;">
				<tr>
					<td align="right">
						<input type="reset" class="button" value="CANCEL">
						<input type="submit" class="button" name="Submit" value="SUBMIT">
					</td>

				</tr>
			</table>
		</fieldset>
	</form>


	<h1 style="text-align:center; color:white; margin-top:300px"><u><b>Leave Request Info</b></u></h1>
	<table border="3px solid white" style="color:white; border-collapse:collapse; margin-top:20px; margin-left:450px">
		<thead>
			<tr>
				<th style="padding:15px">Start Date</th>
				<th style="padding:15px">End Date</th>
				<th style="padding:8px">Reason</th>
				<th style="padding:8px">Status</th>
			</tr>
		</thead>

		<tbody>
			<?php
			$employeeID = $_SESSION['Employee_ID'];
			$showLR = "SELECT * FROM leave_request WHERE Employee_ID='$employeeID' ";
			$result = mysqli_query($con, $showLR);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					$startDate = $row["Start_Date"];
					$endDate = $row["End_Date"];
					$reason = $row["Reason"];
					$showStatus = $row["Status"];
					if ($showStatus == 0) {
						$showStatus = 'Not Accepted';
					} else {
						$showStatus = 'Accepted';
					}
					echo 	'<tr>
								<td style="padding:15px">' . $startDate . '</td>
								<td style="padding:15px">' . $endDate . '</td>
								<td style="padding:15px 25px">' . $reason . '</td>
								<td style="padding:15px">' . $showStatus . '</td> 
							</tr>';
				}
			} else {
				echo '<h2>No Leave Request Have been taken </h2>';
			}
			?>
		</tbody>
	</table>


</body>
<script>
	function funcUserDetails() {
		document.getElementById('user-detail-container').style.display = "block";
	}

	function funcCloseUserDetails() {
		document.getElementById('user-detail-container').style.display = "none";
	}
</script>

<script>

	//--  for setting the current day as the minimum date for the time being --
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


</html>

<?php
if (isset($_POST["Submit"])) {
	$leaveRequestID = getID("leave_request", "L");
	$employeeID = $_SESSION['Employee_ID'];
	$startDate = mysqli_real_escape_string($con, $_POST['startdate']);
	$endDate = mysqli_real_escape_string($con, $_POST['enddate']);
	$section = mysqli_real_escape_string($con, $_POST['section']);
	$reason = mysqli_real_escape_string($con, $_POST['Message']);

	$status = 0;
	$insertLR = "INSERT INTO leave_request(ID,Employee_ID,Start_Date,End_Date,Type_Employee,Reason,Status) VALUES ('" . $leaveRequestID . "','$employeeID','$startDate','$endDate','$section','$reason','$status')";
	if (mysqli_query($con, $insertLR)) {
		echo "<script>alert('Your Leave Request Has been sent')
					  window.location.href='SupervisorLeaveRequest.php'
			  </script>";
	} else {
		echo $leaveRequestID;
	}
}
?>