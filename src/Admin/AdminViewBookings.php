<<?php
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
		Admin View Bookings
	</title>

	<script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
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

    <!--ROOM TYPE-->

<form action="" method="POST">
		<fieldset style=" position:absolute; top:250px; left:40%; width: 25%; ">
			<legend style="color:white; font-size: 20px">Occupancy</legend>
			<tr>
									<td align="left">Occupancy </td>
									<td align="left"><select id="types" name="typelist1">
                                            <option selected="Any1">Any</option>
											<option value="Double-Room">Double Room</option>
											<option value="Triple-Room">Triple Room</option>
										</select>
									</td>
								</tr>
                                </td>
                            

                                  <!--MEAL SELECTION-->
  
			<legend style="color:white; font-size: 20px">Meal Selection</legend>
			<tr>
									<td align="left">Meal Selection </td>
									<td align="left"><select id="types" name="typelist2">
                                            <option selected="Any2">Any</option>
											<option value="Set-Menu">Set-Menu</option>
											<option value="Customized">Customized</option>
										</select>
									</td>
								</tr>
                        

                            
                                <!--Reservation Type-->
                                <legend style="color:white; font-size: 20px">Reservation Type</legend>
			<tr>
									<td align="left">Reservation type</td>
									<td align="left"><select id="types" name="typelist3">
                                            <option selected="Any3">Any</option>
											<option value="Full-Board">Full-Board</option>
											<option value="Half-Board">Half-Board</option>
										</select>
									</td>
								</tr>

                                  <!--Room Type-->
                                  <legend style="color:white; font-size: 20px">Room Type</legend>
			                    <tr>
									<td align="left">Room type</td>
									<td align="left"><select id="types" name="typelist4">
                                            <option selected="Any4">Any</option>
											<option value="Suite Rooms">Suite</option>
											<option value="Superior">Superior</option>
                                            <option value="Panaromic">Panaromic</option>
										</select>
									</td>
								</tr>
                                
                                <!--Check in Date-->
                                <legend style="color:white; font-size: 20px">Check-in Date</legend>
			                    <tr>
									<td align="left">Check-in Date</td>
									<input type="date" name="CheckIn_Date" id="datefield" size="20">
                                </tr>

                                 <!--Check out Date-->
                                 <legend style="color:white; font-size: 20px">Check out Date</legend>
			                    <tr>
									<td align="left">Check out Date</td>
									<input type="date" name="CheckOut_Date" id="datefield" size="20">
                                </tr>

                                

                                <input type="submit" class="button" name="search" value="SORT BOOKING DETAILS">
                                </fieldset>
    
	

		
        <table align="right" style="color:white; font-size: 17px; width:95%; top:830px; left:25px; position:absolute; border: 1px solid white; padding-bottom: 100px">
        <tr>
			<th colspan="6">
				<h4 align="center">Booking Details</h2>
			</th>
		</tr>
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
        <?php include("../../config/connection.php");
        	if (isset($_POST['search'])) {
                $Occupancy = $_POST['typelist1'];
                $Meal_Selection=$_POST['typelist2'];
                $Reservation_Type=$_POST['typelist3'];
                $Room_Type=$_POST['typelist4'];
                $CheckIn_Date = $_POST["CheckIn_Date"];
				$CheckOut_Date = $_POST["CheckOut_Date"];

		$query = "SELECT * FROM stayingin_booking WHERE Occupancy='".$Occupancy."'AND Meal_Selection='".$Meal_Selection."'AND Reservation_Type='".$Reservation_Type."'AND Room_Type='".$Room_Type."' AND CheckIn_Date='".$CheckIn_Date."' AND CheckOut_Date='".$CheckOut_Date."'";
		$query_run = mysqli_query($con, $query);
		while ($row = mysqli_fetch_array($query_run)) {
          

            

		?>

        <!--Any Occupancy-->





            <tr>
				<td><?php echo $row["StayingIn_ID"]; ?></td>
                <td><?php echo $row["Occupancy"]; ?></td>
				<td><?php echo $row["No_Occupants"]; ?></td>
				<td><?php echo $row["Meal_Selection"]; ?></td>
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
            }
		?>
        </fieldset>
	</form>
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