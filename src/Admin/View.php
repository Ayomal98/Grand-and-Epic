<?php
include("../../public/includes/session.php");
checkSession();
if (!isset($_SESSION['First_Name'])) {
	header('Location:../Hotel_Website/index.php');
}
// function fill_brand($con)
// {
// 	$output = '';
// 	$sql = mysqli_query($con, "SELECT * FROM stayingin_booking");
// 	$result=mysqli_query($con,$sql);
// 	while($row=mysqli_fetch_array($result)){
// 		$output.='<option value="'.$row[].'">' '</option>';
// 	}
// }
// 
?>
<html>

<head>
	<link rel="stylesheet" href="../../public/css/employee.css">

	<title>
		Admin View Bookings
	</title>

	<script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body bgcolor="black" padding-bottom=" 50px">

	<center>
		<img src="../../public/images/Logo.png" width="20%">
		<span class="far fa-caret-square-down" style="color:white;font-size:30px;position:absolute;right:0px;top:20px;" onclick="funcUserDetails()"></span>
		<div id="user-detail-container">
			<span class="fa fa-window-close" style="margin-left:130px;" onclick="funcCloseUserDetails()"></span>
			<p style="margin-top: 2px; color:black"><?php echo "Logged in as " . $_SESSION['First_Name']; ?></P>
			<hr style="color:teal">
			<a href="../Hotel_Website/logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:-7px;margin-left:85px;padding:0px;background-color:black;color:white;border-radius:5px;cursor:pointer"></a>
		</div>
	</center>
	<div class="sidenav">
		<button class="dropdown-btn">View Bookings
			<i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-container">
			<a href="AdminDashboard.php">
				<font size="4 px">Dashboard</font>
			</a>
			<a href="AdminRespondToLeaveRequests.php">
				<font size="4px">Respond to Leave Requests</font>
			</a>
			<a href="AdminManageCoAdmins.php">
				<font size="4 px">Manage Co-admins(H.M)</font>
			</a>
			<a href="AdminManageContent.php">
				<font size="4 px">Manage Content on web-site</font>
			</a>
			<a href="AdminAddPromotion.php">
				<font size="4 px">Add promotion</font>
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
					<img src="../../public/images/Uvini.png" width="60" height="60">
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
	<legend style="color:white; font-size: 20px">Occupancy</legend>
	<select id="filter-occ" class="filter">
		<option value="0">Any</option>
		<option value="Suite">Suite </option>
		<option value="Panaromic">Panaromic </option>
		<option value="Superior">Superior </option>
	</select>

	<legend style="color:white; font-size: 20px">Meal</legend>
	<select id="filter-Meal" class="filter">
		<option value="0">Any</option>
		<option value="Set-Menu">Set-Menu</option>
		<option value="Customized">Customized</option>
	</select>

	<script>
		$('.filter').change(function() {

			filter_function();

			//calling filter function each select box value change

		});

		$('table tbody tr').show(); //intially all rows will be shown

		function filter_function() {
			$('table tbody tr').hide(); //hide all rows
			var occFlag = 0;
			var occValue = $('#filter-occ').val();
			var mealFlag = 0;
			var mealValue = $('#filter-Meal').val();
			console.log(mealValue)
			console.log(occValue)
			//setting intial values and flags needed

			//traversing each row one by one
			$('table tbody tr').each(function() {

				if (occValue == 0) { //if no value then display row
					occFlag = 1;
				} else if (occValue == $(this).find('td.occ').data('occ')) {
					occFlag = 1; //if value is same display row
				} else {
					occFlag = 0;
				}

				if (mealValue == 0) {
					mealFlag = 1;
				} else if (mealValue == $(this).find('td.meal').data('meal')) {
					mealFlag = 1;
				} else {
					mealFlag = 0;
				}

				if (occFlag && mealFlag) {
					$(this).show(); //displaying row which satisfies all conditions
				}

			});




		}
	</script>








	<table align="right" style="color:white; font-size: 17px; width:95%; top:830px; left:25px; position:absolute; border: 1px solid white; padding-bottom: 100px">
		<!-- <tr>
			<th colspan="6">
				<h4 align="center">Booking Details</h2>
			</th>
		</tr> -->
		<thead>
			<tr>
				<th>Staying in ID</th>
				<th>Occupancy</th>
				<th>Number of Occupants</th>
				<th>Meal Package</th>
				<th>Reservation</th>
				<th>Checkin-Date</th>
				<th>Check-out date</th>
				<th>Check-in Time</th>
				<th>Check-out Time</th>
				<th>Room Type</th>
				<th>User Email</th>

			</tr>
		</thead>
		<tbody>
			<?php include("../../config/connection.php");



			$query = "SELECT * FROM stayingin_booking ";
			$query_run = mysqli_query($con, $query);
			while ($row = mysqli_fetch_array($query_run)) {




			?>







				<tr>
					<td><?php echo $row["StayingIn_ID"]; ?></td>
					<td class="occ" data-occ="<?php echo $row["Occupancy"] ?>"><?php echo $row["Occupancy"]; ?></td>
					<td><?php echo $row["No_Occupants"]; ?></td>
					<td class="meal" data-meal="<?php echo $row["Meal_Selection"] ?>"><?php echo $row["Meal_Selection"]; ?></td>
					<td><?php echo $row["Reservation_Type"]; ?></td>
					<td><?php echo $row["CheckIn_Date"]; ?></td>
					<td><?php echo $row["CheckOut_Date"]; ?></td>
					<td><?php echo $row["CheckIn_Time"]; ?></td>
					<td><?php echo $row["CheckOut_Time"]; ?></td>
					<td><?php echo $row["Room_Type"]; ?></td>
					<td><?php echo $row["User_Email"]; ?></td>
				</tr>
			<?php
			}

			?>
		</tbody>
	</table>




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