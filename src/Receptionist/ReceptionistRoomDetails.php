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
		Receptionist Room Details
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
			<button class="dropdown-btn">Room Details 
            <i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-container">
				<a href="ReceptionistDashboard.php">Dashboard</a>
				<a href="ReceptionistReservations.php">Reservations</a>
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


	<!-- View Room Details -->
        <div class="staytablemanager">
        <table border="1px solid white" style="border-collapse:collapse; color:white; width:100%">
            <tr>
                <th colspan="8"><h2>Room Details</h2></th>
            </tr>
            <tr>
                <th>Staying ID</th>
                <th>Room Numbers</th>
                <th>Reservation Type</th>
                <th>Room Type</th>
                <th>No. of people</th>
                <th>Check In Date</th>
                <th>Check Out Date</th>
                <th>Status</th>
            </tr>

            <?php
                $view_query = "SELECT * FROM stayingin_booking ORDER BY StayingIn_ID ASC";
                $view_query_run = mysqli_query($con,$view_query);

                while($row = mysqli_fetch_array($view_query_run))
                {
                    $roomNumbers = unserialize($row['Room_Numbers']);
            ?>

            <tr>
                <td><?php echo $row['StayingIn_ID'] ?></td>
                <td><?php echo implode(",",$roomNumbers) ?></td>
                <td><?php echo $row['Reservation_Type'] ?></td>
                <td><?php echo $row['Room_Type'] ?></td>
                <td><?php echo $row['No_Occupants'] ?></td>
                <td><?php echo $row['CheckIn_Date'] ?></td>
                <td><?php echo $row['CheckOut_Date'] ?></td>
                <td><?php echo $row['Status'] ?></td>
            </tr>

            <?php
                }
            ?>

        </table>

    </div>



	<!-- SEARCH -->
        <form action="" method="POST">
		<fieldset style=" position:absolute; top:700px; width:90%; left:4%;">
			<legend style="color:white; font-size: 20px">Update Room Details</legend>
			<input type="text" name="StayingIn_ID" placeholder="Enter StayingIn ID to Search" />
			<input type="submit" class="button" name="search" value="Search by ID">
		</fieldset>
	</form>



	<?php
	
	if (isset($_POST['search'])) {
		$StayingIn_ID = $_POST['StayingIn_ID'];

		$search_query = "SELECT * FROM stayingin_booking where StayingIn_ID='$StayingIn_ID' ";
		$search_query_run = mysqli_query($con, $search_query);
		if (mysqli_num_rows($search_query_run) == 1) {

			while ($row = mysqli_fetch_array($search_query_run)) {
                $roomNumbers = unserialize($row['Room_Numbers']);
	?>
				<form action="" method="POST">
					<fieldset style=" position:absolute; top:790px; width: 90%; left:4%">
						<table style="color:white; font-size: 20px; width:95%;">
							<tr style="border: 1px solid white;">
								<td>StayingIn ID:</td>
								<td><input type="text" name="stayinginid" value="<?php echo $row['StayingIn_ID'] ?>" readonly /></td>
							</tr>
							<tr>
								<td>Room Numbers:</td>
								<td><input type="text" name="mealname" value="<?php echo implode(",",$roomNumbers) ?>" readonly /></td>
							</tr>
							<tr>
								<td>Reservation Type:</td>
								<td><input type="text" name="retype" value="<?php echo $row['Reservation_Type'] ?>" readonly /></td>
							</tr>
							<tr>
								<td>Room Type:</td>
								<td><input type="text" name="rotype" value="<?php echo $row['Room_Type'] ?>" readonly /></td>
							</tr>
                            <tr>
								<td>No. of People:</td>
								<td><input type="text" name="people" value="<?php echo $row['No_Occupants'] ?>" readonly /></td>
							</tr>
                            <tr>
								<td>CheckIn Date:</td>
								<td><input type="date" name="indate" value="<?php echo $row['CheckIn_Date'] ?>" readonly /></td>
							</tr>
                            <tr>
								<td>CheckOut Date:</td>
								<td><input type="date" name="outdate" value="<?php echo $row['CheckOut_Date'] ?>" readonly /></td>
							</tr>
                            <tr>
								<td>Room Status:</td>
								<td>
                                    <input type="radio" name="Status" value="Checked In" 
                                    <?php
                                        if($row["Status"]=='Checked In'){
                                            echo "Checked In";
                                        }
                                    ?>
                                    />
                                    <label for="Checked In">Checked In</label>

                                    <input type="radio" name="Status" value="Checked Out" 
                                    <?php
                                        if($row["Status"]=='Checked Out'){
                                            echo "Checked Out";
                                        }
                                    ?>
                                    />
                                    <label for="Checked Out">Checked Out</label>

                                </td>
							</tr>
							<tr>
								<td>
									<input type="submit" class="button" name="update" value="Update Details">
								</td>
							</tr>
						</table>
					</fieldset>
				</form>

	<?php

			}
		} else {
			echo "<script>alert('ID you entered doesn't Exist.Please Try Again!')</script>";
			echo "<script>window.location.href='ReceptionistRoomDetails.php'</script>";
        }
	}
	?>

    
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


<!-- Update -->
<?php 
if (isset($_POST['update'])) {
	$Status = $_POST['Status'];

		$update_query = "UPDATE stayingin_booking SET Status='$Status' WHERE StayingIn_ID='$_POST[stayinginid]'";
		$update_query_run = mysqli_query($con, $update_query);

		if ($update_query_run) {
			echo "<script>
			alert('Data Has been Updated');
			window.location.href='ReceptionistRoomDetails.php';
			</script>";
		} else {
			echo '<script> alert("Data Not Updated") </script>';
		}
}
?>
