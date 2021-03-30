<?php

include("../../public/includes/session.php");
include("../../config/connection.php");

checkSession();
	if(!isset($_SESSION['First_Name'])){
		header('Location:../Hotel_Website/HomePage-login.php');
	}

?>
<html>
	<head>
	<link rel="stylesheet" href="../../public/css/employee.css">
		<title>
		Receptionist Reservations
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
			<p style="margin-top: 2px; color:black">
            <?php 
				echo "Logged in as " . $_SESSION['First_Name'] ."(Staff)</P>";
			?>
			<hr style="color:teal">
			<a href="../Hotel_Website/logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:-7px;margin-left:85px;padding:0px;background-color:black;color:white;border-radius:5px;cursor:pointer"></a>
		</div>
	</center>
		<div class="sidenav">	
			<button class="dropdown-btn">Reservations 
            <i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-container">
				<a href="ReceptionistDashboard.php">Dashboard</a>
				<a href="ReceptionistRoomDetails.php">Room Details</a>
                <a href="ReceptionistRequestLeave.php">Request a Leave</a>
                <a href="ReceptionistAcceptPayments.php">Accept Payments</a>
				</div>
		</div>
		<div class = "top-right">
		<table width = "100%">
		<tr>
		<td>
		</td>
		<td>
			<img src = "../../public/images/ayomal.png" height = "80px" >
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
	
   <!-- View Booking Details -->
      
    <!-- View Stayingin Booking Details -->
    <div class="staytablemanager">
        <table border="1px solid white" style="border-collapse:collapse; color:white; width:100%">
            <tr>
                <th><img src="../../public/images/BigCal.png" height="70px"></th>
                <th colspan="10"><h2>View Staying Booking Details</h2></th>
            </tr>
            <tr>
                <th>Staying ID</th>
                <th>Occupancy</th>
                <th>No: of Occupants</th>
                <th>Room No</th>
                <th>Reservation Type</th>
                <th>Check In Date</th>
                <th>Check Out Date</th>
                <th>Check In Time</th>
                <th>Check Out Time</th>
                <th>Paid Amount</th>
                <th>Total Amount</th>
            </tr>

            <?php
                $query = "SELECT * FROM stayingin_booking ORDER BY CheckIn_Date ASC";
                $query_run = mysqli_query($con,$query);

                while($row = mysqli_fetch_array($query_run))
                {
                    $roomNumbers = unserialize($row['Room_Numbers']);
            ?>

            <tr>
                <td><?php echo $row['StayingIn_ID'] ?></td>
                <td><?php echo $row['Occupancy'] ?></td>
                <td><?php echo $row['No_Occupants'] ?></td>
                <td><?php echo implode(",",$roomNumbers) ?></td>
                <td><?php echo $row['Reservation_Type'] ?></td>
                <td><?php echo $row['CheckIn_Date'] ?></td>
                <td><?php echo $row['CheckOut_Date'] ?></td>
                <td><?php echo $row['CheckIn_Time'] ?></td>
                <td><?php echo $row['CheckOut_Time'] ?></td>
                <td><?php echo $row['Paid_Amount'] ?></td>
                <td><?php echo $row['Total_Amount']?></td>
            </tr>

            <?php
                }
            ?>

        </table>
    </div>


    <!-- View Dinein Booking Details -->
    <div class="dinetablemanager">
        <table border="1px solid white" style="border-collapse:collapse; color:white; width:100%">
            <tr>
                <th><img src="../../public/images/BigCal.png" height="70px"></th>
                <th colspan="3"><h2>View Dine-in Booking Details</h2></th>
            </tr>
            <tr>
                <th>Date:</th>
                <th>Table No:</th>
                <th>Meal Period:</th>
                <th>Number of Guests:</th>
            </tr>

            <?php
                $query = "SELECT * FROM dinein_booking ORDER BY Date ASC";
                $query_run = mysqli_query($con,$query);

                while($row = mysqli_fetch_array($query_run))
                {
            ?>

            <tr>
                <td><?php echo $row['Date'] ?></td>
                <td><?php echo $row['Table_No'] ?></td>
                <td><?php echo $row['Meal_Period'] ?></td>
                <td><?php echo $row['Num_Guests'] ?></td>
            </tr>

            <?php
                }
            ?>

        </table>
    </div>
    
    <!-- View Events Booking Details -->
    <div class="eventtablemanager">
        <table border="1px solid white" style="border-collapse:collapse; color:white; width:100%">
            <tr>
                <th><img src="../../public/images/BigCal.png" height="70px"></th>
                <th colspan="4"><h2>View Events Booking Details</h2></th>
            </tr>
            <tr>
                <th>Reservation Date:</th>
                <th>Starting Time:</th>
                <th>Ending Time:</th>
                <th>Event Type:</th>
                <th>Meal Preference:</th>
            </tr>

            <?php
                $query = "SELECT * FROM events_booking ORDER BY Reservation_Date ASC";
                $query_run = mysqli_query($con,$query);

                while($row = mysqli_fetch_array($query_run))
                {
            ?>

            <tr>
                <td><?php echo $row['Reservation_Date'] ?></td>
                <td><?php echo $row['Starting_Time'] ?></td>
                <td><?php echo $row['Ending_Time'] ?></td>
                <td><?php echo $row['Event_Type'] ?></td>
                <td><?php echo $row['MealPackage_ID']?></td>
            </tr>

            <?php
                }
            ?>

        </table>
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