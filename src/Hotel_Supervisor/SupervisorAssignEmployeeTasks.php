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
		Supervisor Assign Employee Tasks
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
			<button class="dropdown-btn">Assign Employee Tasks
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-container">
                <a href="SupervisorDashboard.php">Dashboard</a>
                <a href="SupervisorManageMeals.php">Manage Meals</a>
                <a href="SupervisorManageSetMenus.php">Manage Set Menu</a>
                <a href="SupervisorManageMealPackages.php">Manage Meal Packages</a>
                <a href="SupervisorLeaveRequest.php">Request a leave</a>
			</div>
		</div>

		<div class = "top-right">
	<table width = "100%">
		<tr>
            <td>
                <img src ="../../public/images/ayomal.png" height = "80px">
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
		<form action="" method="POST" style="font-size: 20px; width:75%; position:absolute; left:160px; top:240px;">
		<fieldset>
			<legend style = "color:white;">Assign Employees Tasks</legend>
				<table style = "color:white; font-size: 20px; width:88%;">
					<tr>
						<td align="left">Employee ID:</td>
						<td align="center"><input type="text" name="employeeid" size="20"></td>
					</tr>
                    <tr>
						<td align="left">Assigned Date:</td>
						<td align="center"><input type="date" name="assigneddate" size="20" style="width:80%"></td>
					</tr>
					<tr>
                        <td align="left">Assigned Section:</td>
                        <td align="left">
                            <select id="types" name="assignedsection" class="inputs" style="margin: 8px 68px;">
                                <option value disabled selected>Section to be Assigned</option>
                                <option value="Staying-in Rooms">Staying-in Rooms</option>
                                <option value="Dine-in Area">Dine-in Area</option>
                                <option value="Events">Events</option>
                            </select>
					</tr>
					<tr id="rnumber">
						<td align="left">Allocated Room Numbers:</td>
						<td align="center"><input type="text" name="alloroomnumbers" size="50"></td>
					</tr>
					<tr id="tnumber">
						<td align="left">Allocated Table Numbers:</td>
						<td align="center"><input type="text" name="allotablenumbers" size="50"></td>
					</tr>
					<tr id="location">
						<td align="left">Allocated Locations:</td>
						<td align="center"><input type="text" name="allolocations" size="50"></td>
					</tr>
				</table>
				
				<table style = "color:white; font-size: 20px; width:81%;">
					<tr>
						<td align="right">
							<input type="submit" class="button" name="insert" value="Assign Tasks">
                            <input type="reset" class="button" name="reset" value="Reset Details">
						</td>
						
					</tr>
		</table>
		</fieldset>
		</form>


	
 <!-- Assign New Task -->
 <?php 
if(isset($_POST['insert'])){

    $employeeid=$_POST['employeeid'];  
    $assigneddate=$_POST['assigneddate'];
    $assignedsection=$_POST['assignedsection'];
    $alloroomnumbers=$_POST['alloroomnumbers'];
    $allotablenumbers=$_POST['allotablenumbers'];
    $allolocations=$_POST['allolocations'];

      $add_query = "INSERT INTO employee_tasks(Employee_ID, Assigned_Date, Assigned_Section, Allo_Room_Numbers, Allo_Table_Numbers, Allo_Locations) VALUES ('".$employeeid."','".$assigneddate."','".$assignedsection."','".$alloroomnumbers."','".$allotablenumbers."','".$allolocations."')";
      $add_query_run = mysqli_query($con,$add_query);

      if ($add_query_run) {
        echo "<script>
        alert('Task Assigned to a Employee');
        window.location.href='SupervisorAssignEmployeeTasks.php';
        </script>";
      }else {
        echo "<script>
        alert('Task is not Assigned!');
        window.location.href='SupervisorAssignEmployeeTasks.php';
        </script>";
      }  
}
?> 

    <form action="" method="POST">
            <fieldset style=" position:absolute; top:700px; width: 45%; right:0%;">
                <legend style="color:white; font-size: 20px">Update and Delete Tasks</legend>
                <input type="text" name="Employee_ID" placeholder="Enter id to Search" />
                <input type="submit" class="button" name="search" value="Search by ID">
            </fieldset>
    </form>


<!-- SEARCH -->
<?php
	
	if (isset($_POST['search'])) {
		$Employee_ID = $_POST['Employee_ID'];

		$search_query = "SELECT * FROM employee_tasks where Employee_ID='$Employee_ID' ";
		$search_query_run = mysqli_query($con, $search_query);
		if (mysqli_num_rows($search_query_run) == 1) {

			while ($row = mysqli_fetch_array($search_query_run)) {
	?>
				<form action="" method="POST">
					<fieldset style=" position:absolute; top:820px; width: 45%; right:0%">
						<table style="color:white; font-size: 20px; width:95%;">
							<tr style="border: 1px solid white;">
								<td>Employee ID:</td>
								<td><input type="text" name="employeeid" value="<?php echo $row['Employee_ID'] ?>" /></td>
							</tr>
							<tr>
								<td>Assigned Date:</td>
								<td><input type="date" name="assigneddate" value="<?php echo $row['Assigned_Date'] ?>" /></td>
							</tr>
							<tr>
								<td>Assigned Date:</td>
								<td>
									<select id="types" name="assignedsection" class="inputs" style="margin: 8px 2px;">
										<option value disabled selected>Setion to be Assigned</option>

											<option value="Staying-in Rooms"
												<?php
												if($row["Assigned_Section"]=='Staying-in Rooms')
												{
													echo "selected";
												}
												?>	
											>Staying-in Rooms</option>

											<option value="Dine-in Area"
												<?php
												if($row["Assigned_Section"]=='Dine-in Area')
												{
													echo "selected";
												}
												?>	
											>Dine-in Area</option>

											<option value="Events"
												<?php
												if($row["Assigned_Section"]=='Events')
												{
													echo "selected";
												}
												?>	
											>Events</option>
									</select>
								</td>
							</tr>
                            <tr>
								<td>Allocated Room Numbers:</td>
								<td><input type="text" name="alloroomnumbers" value="<?php echo $row['Allo_Room_Numbers'] ?>" /></td>
							</tr>
                            <tr>
								<td>Allocated Table Numbers:</td>
								<td><input type="text" name="allotablenumbers" value="<?php echo $row['Allo_Table_Numbers'] ?>" /></td>
							</tr>
                            <tr>
								<td>Allocated Locations:</td>
								<td><input type="text" name="allolocations" value="<?php echo $row['Allo_Locations'] ?>" /></td>
							</tr>
							<tr>
								<td></td>
								<td style="position:relative;left:50px;">
									<input type="submit" class="button" name="update" value="Update Task">
									<input type="submit" class="button" name="delete" value="Delete Task">
									<input type="reset" class="button" name="reset" value="Reset"></a>
								</td>
							</tr>
						</table>
					</fieldset>
				</form>

	<?php

			}
		} else {
			echo "<script>alert('ID you entered doesn't Exist.Please Try Again!')</script>";
			echo "<script>window.location.href='SupervisorManageMeals.php'</script>";
        }
	}
	?>



	<!-- View Table-->
	<div class="dbtablescroll">
	<table border="1px solid white" style="color:white; width:100%; top:400px;">
		<tr>
            <th><img src="../../public/images/roomService.png" height="70px"></th>
			<th colspan="5"><h2>Assigned Task Details</h2></th>
		</tr>
		<tr>
			<th>Employee ID:</th>
			<th>Assigned Date:</th>
			<th>Assigned Section:</th>
			<th>Allocated Room Numbers:</th>
			<th>Allocated Table Numbers:</th>
            <th>Allocated Locations:</th>
		</tr>

			<?php
				

					$view_query = "SELECT * FROM employee_tasks";
					$view_query_run = mysqli_query($con,$view_query);

					while($row = mysqli_fetch_array($view_query_run))
					{
			?>
						<tr>
							<td><?php echo $row['Employee_ID'] ?></td>
							<td><?php echo $row['Assigned_Date'] ?></td>
							<td><?php echo $row['Assigned_Section'] ?></td>
							<td><?php echo $row['Allo_Room_Numbers'] ?></td>
							<td><?php echo $row['Allo_Table_Numbers'] ?></td>
                            <td><?php echo $row['Allo_Locations'] ?></td>
						</tr>
				<?php
					}
				?>

	</table>
	</div>

	<!-- View Leave Requests of Employees -->
    <form>
    <fieldset style="font-size: 20px; position:absolute; top:1400px; width: 45%; right:0%">
    <legend style = "color:white;">View Leave Requests</legend>
	<table border="1px solid white" style="color:white; width:100%">
		<tr>
			<th>Employee ID:</th>
			<th>Leave Start Date:</th>
			<th>Leave End Date:</th>
			<th>Reason for the leave:</th>
			<th>Accepted/Not Accepted:</th>
		</tr>

			<?php
					$query = "SELECT * FROM leave_request WHERE Employee_ID LIKE '%E%' ORDER BY Start_Date ASC";
					$query_run = mysqli_query($con,$query);

					while($row = mysqli_fetch_array($query_run))
					{
                        $showStatus = $row["Status"];

					    if ($showStatus == 0) {
						    $showStatus = 'Not Accepted';
					    } else {
						    $showStatus = 'Accepted';
					    }
			?>
						<tr>
							<td><?php echo $row['Employee_ID'] ?></td>
							<td><?php echo $row['Start_Date'] ?></td>
							<td><?php echo $row['End_Date'] ?></td>
							<td><?php echo $row['Reason'] ?></td>
							<td><?php echo $showStatus ?></td>
						</tr>
				<?php
					}
				?>

	</table>
    </fieldset>
    </form>
	
	

<!-- View Booking Details -->

    <!-- View Stayingin Booking Details -->
    <div class="staytable">
        <table border="1px solid white" style="color:white; width:100%">
            <tr>
                <th><img src="../../public/images/BigCal.png" height="70px"></th>
                <th colspan="4"><h2>View Staying Booking Details</h2></th>
            </tr>
            <tr>
                <th>CheckIn Date:</th>
                <th>CheckOut Date:</th>
                <th>Room No:</th>
                <th>Room Type:</th>
                <th>Reservation Type:</th>
            </tr>

            <?php
                $query = "SELECT * FROM stayingin_booking ORDER BY CheckIn_Date ASC";
                $query_run = mysqli_query($con,$query);

                while($row = mysqli_fetch_array($query_run))
                {
            ?>

            <tr>
                <td><?php echo $row['CheckIn_Date'] ?></td>
                <td><?php echo $row['CheckOut_Date'] ?></td>
                <td><?php echo $row['Room_Numbers'] ?></td>
                <td><?php echo $row['Room_Type'] ?></td>
                <td><?php echo $row['Reservation_Type']?></td>
            </tr>

            <?php
                }
            ?>

        </table>
    </div>



    <!-- View Dinein Booking Details -->
    <div class="dinetable">
        <table border="1px solid white" style="color:white; width:100%">
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
    <div class="eventtable">
        <table border="1px solid white" style="color:white; width:100%">
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



<!-- Update -->
<?php 
if (isset($_POST['update'])) {
	
    $employeeid=$_POST['employeeid'];  
    $assigneddate=$_POST['assigneddate'];
    $assignedsection=$_POST['assignedsection'];
    $alloroomnumbers=$_POST['alloroomnumbers'];
    $allotablenumbers=$_POST['allotablenumbers'];
    $allolocations=$_POST['allolocations'];

		$update_query = "UPDATE employee_tasks SET Employee_ID='$employeeid', Assigned_Date='$assigneddate', Assigned_Section='$assignedsection', Allo_Room_Numbers='$alloroomnumbers', Allo_Table_Numbers='$allotablenumbers', Allo_Locations='$allolocations' where Employee_ID='$_POST[employeeid]'";
		$update_query_run = mysqli_query($con, $update_query);

		if ($update_query_run) {
			echo "<script>
			alert('Task Has been Updated');
			window.location.href='SupervisorAssignEmployeeTasks.php';
			</script>";
		} else {
			echo '<script> alert("Data Not Updated") </script>';
		}
}
?>



<!-- Delete -->
<?php 
if (isset($_POST['delete'])) {
	
    $employeeid=$_POST['employeeid'];  
    $assigneddate=$_POST['assigneddate'];
    $assignedsection=$_POST['assignedsection'];
    $alloroomnumbers=$_POST['alloroomnumbers'];
    $allotablenumbers=$_POST['allotablenumbers'];
    $allolocations=$_POST['allolocations'];

	$delete_query = "DELETE from employee_tasks where Employee_ID='$_POST[employeeid]'";
	$delete_run = mysqli_query($con, $delete_query);
	
	if ($delete_run) {
		echo "<script>
		alert('Task Has been Deleted');
		window.location.href='SupervisorAssignEmployeeTasks.php';
		</script>";
	} else {
		echo '<script> alert("Data Not Deleted") </script>';
	}
}
?>