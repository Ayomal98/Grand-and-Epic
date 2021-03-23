<?php
include("../../public/includes/session.php");

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
 <?php include("../../config/connection.php");
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
	include("../../config/connection.php");
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
			<th colspan="6"><h2>Assigned Task Details</h2></th>
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
				include("../../config/connection.php");

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
		<fieldset style="font-size: 20px; position:absolute; top:1400px; width: 48%; left:0%">
		<legend style = "color:white;">View Leave Requests</legend>
			<table border="1px solid white" style="width:100%" >
				<tr>
					<td align ="center">
						<img src = "../../public/images/BIgCal.png" height = "200px" >
					</td>
				</tr>
				<tr>
					<td>
						<table border="1px solid white" style ="width:100%;">
							<tr>
								<th>
									<p style = "font-family :Lato; font-size:20px; color :white;">Employee ID</p>		
								</th>
								<th>
									<p style = "font-family :Lato; font-size:20px; color :white;">Leave Start Date</p>		
								</th>
								<th>
									<p style = "font-family :Lato; font-size:20px; color :white;">Leave End Date</p>		
								</th>
								<th>
									<p style = "font-family :Lato; font-size:20px; color :white;">Section</p>		
								</th>
								<th>
									<p style = "font-family :Lato; font-size:20px; color :white;">Leave request Accepted/Not Accepted</p>		
								</th>
							</tr>
							<tr>
								<td>
									<p style = "font-family :Lato; font-size:15px; color :white;">E53</p>
								</td> 
								<td>
									<p style = "font-family :Lato; font-size:15px; color :white;">05/05/2020</p>  
								</td>
								<td>
									<p style = "font-family :Lato; font-size:15px; color :white;">05/05/2020</p>  
								</td>
								<td>
									<p style = "font-family :Lato; font-size:15px; color :white;">Room Service</p>  
								</td>
								<td>
									<p style = "font-family :Lato; font-size:15px; color :white;">Accepted</p>  
								</td>
							</tr>
							<tr>
								<td>
									<p style = "font-family :Lato; font-size:15px; color :white;">E02</p>
								</td>
								<td>
									<p style = "font-family :Lato; font-size:15px; color :white;">10/05/2020</p>  
								</td>
								<td>
									<p style = "font-family :Lato; font-size:15px; color :white;">17/05/2020</p>  
								</td>
								<td>
									<p style = "font-family :Lato; font-size:15px; color :white;">Dine-in</p>  
								</td>
								<td>
									<p style = "font-family :Lato; font-size:15px; color :white;">Not Accepted</p>  
								</td>
							</tr>
							<tr>
								<td>
									<p style = "font-family :Lato; font-size:15px; color :white;">E23</p>
								</td> 
								<td>
									<p style = "font-family :Lato; font-size:15px; color :white;">27/05/2020</p>  
								</td>
								<td>
									<p style = "font-family :Lato; font-size:15px; color :white;">30/05/2020</p>  
								</td>
								<td>
									<p style = "font-family :Lato; font-size:15px; color :white;">Room Service</p>  
								</td>
								<td>
									<p style = "font-family :Lato; font-size:15px; color :white;">Not Accepted</p>  
								</td>
							</tr>
							<tr>
							    <td>
									<p style = "font-family :Lato; font-size:15px; color :white;">E12</p>
								</td> 
								<td>
									<p style = "font-family :Lato; font-size:15px; color :white;">15/05/2020</p>  
								</td>
								<td>
									<p style = "font-family :Lato; font-size:15px; color :white;">16/05/2020</p>  
								</td>
								<td>
									<p style = "font-family :Lato; font-size:15px; color :white;">Room Service</p>  
								</td>
								<td>
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
<form>
<fieldset style="font-size: 20px; position:absolute; top:-20px; width: 88%; left:105%">
	<legend style = "color:white;">View Booking Details</legend>
    <table border="1px solid white" style="width:100%" >
    <tr>
        <th>
			<p style = "font-family :Lato; font-size:20px; color :white;">For Staying-in</p>		
        </th>
    </tr>
    <tr>
        <td align ="center">
            <img src ="../../public/images/BIgCal.png" height = "200px" >
        </td>
    </tr>
    <tr>
        <td>
            <table border="1px solid white" style ="width:100%;">
                <tr>
                    <th>
                        <p style = "font-family :Lato; font-size:20px; color :white;">Room No</p>		
                    </th>
                    <th>
                        <p style = "font-family :Lato; font-size:20px; color :white;">Room Type</p>		
                    </th>
                    <th>
                        <p style = "font-family :Lato; font-size:20px; color :white;">isBooked</p>		
                    </th>
                    <th>
                        <p style = "font-family :Lato; font-size:20px; color :white;">isStayingFullDay</p>		
                    </th>
                    <th>
                        <p style = "font-family :Lato; font-size:20px; color :white;">Time Checked-in</p>		
                    </th>
                    <th>
                        <p style = "font-family :Lato; font-size:20px; color :white;">Time Checked-out</p>		
                    </th>
                    </tr>
                    <tr>
                       <td>
                        <p style = "font-family :Lato; font-size:15px; color :white;">S123</p>
                       </td> 
                       <td>
                        <p style = "font-family :Lato; font-size:15px; color :white;">Superior</p>  
                       </td>
                       <td>
                        <p style = "font-family :Lato; font-size:15px; color :white;">1</p>  
                       </td>
                       <td>
                        <p style = "font-family :Lato; font-size:15px; color :white;">1</p>  
                       </td>
                       <td>
                        <p style = "font-family :Lato; font-size:15px; color :white;">16.30 PM</p>  
                       </td>
                       <td>
                        <p style = "font-family :Lato; font-size:15px; color :white;">Null</p>  
                       </td>
                    </tr>
                    <tr>
                       <td>
                        <p style = "font-family :Lato; font-size:15px; color :white;">P123</p>
                       </td>
                       <td>
                        <p style = "font-family :Lato; font-size:15px; color :white;">Panoramic</p>  
                       </td>
                       <td>
                        <p style = "font-family :Lato; font-size:15px; color :white;">1</p>  
                       </td>
                       <td>
                        <p style = "font-family :Lato; font-size:15px; color :white;">1</p>  
                       </td>
                       <td>
                        <p style = "font-family :Lato; font-size:15px; color :white;">10.00 AM</p>  
                       </td>
                       <td>
                        <p style = "font-family :Lato; font-size:15px; color :white;">Null</p>  
                       </td>
                    </tr>
                    <tr>
                       <td>
                        <p style = "font-family :Lato; font-size:15px; color :white;">Su123</p>
                       </td> 
                       <td>
                        <p style = "font-family :Lato; font-size:15px; color :white;">Suite</p>  
                       </td>
                       <td>
                        <p style = "font-family :Lato; font-size:15px; color :white;">1</p>  
                       </td>
                       <td>
                        <p style = "font-family :Lato; font-size:15px; color :white;">1</p>  
                       </td>
                       <td>
                        <p style = "font-family :Lato; font-size:15px; color :white;">8.00 AM</p>  
                       </td>
                       <td>
                        <p style = "font-family :Lato; font-size:15px; color :white;">8.00 PM</p>  
                       </td>
                    </tr>
                    <tr>
                        <td>
                         <p style = "font-family :Lato; font-size:15px; color :white;">P124</p>
                        </td> 
                        <td>
                            <p style = "font-family :Lato; font-size:15px; color :white;">Panoramic</p>  
                        </td>
                        <td>
                            <p style = "font-family :Lato; font-size:15px; color :white;">0</p>  
                        </td>
                        <td>
                            <p style = "font-family :Lato; font-size:15px; color :white;">0</p>  
                        </td>
                        <td>
                            <p style = "font-family :Lato; font-size:15px; color :white;">Null</p>  
                        </td>
                        <td>
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
    <table border="1px solid white" style ="width:100%;" >
    <tr>
        <th>
			<p style = "font-family :Lato; font-size:20px; color :white;">For Dine-in</p>		
        </th>
    </tr>
    <tr>
        <td align ="center">
            <img src ="../../public/images/BIgCal.png" height = "200px" >
        </td>
    </tr>
    <tr>
        <td>
            <table border="1px solid white" style ="width:100%;">
                <tr>
                    <th>
                        <p style = "font-family :Lato; font-size:20px; color :white;">Table No</p>		
                    </th>
                    <th>
                        <p style = "font-family :Lato; font-size:20px; color :white;">Meal Preference</p>		
                    </th>
                    <th>
                        <p style = "font-family :Lato; font-size:20px; color :white;">isBooked</p>		
                    </th>
                    <th>
                        <p style = "font-family :Lato; font-size:20px; color :white;">Time Period</p>		
                    </th>
                    </tr>
                    <tr>
                       <td>
                        <p style = "font-family :Lato; font-size:15px; color :white;">T12</p>
                       </td> 
                       <td>
                        <p style = "font-family :Lato; font-size:15px; color :white;">Dine-in Area</p>  
                       </td>
                       <td>
                        <p style = "font-family :Lato; font-size:15px; color :white;">1</p>  
                       </td>
                       <td>
                        <p style = "font-family :Lato; font-size:15px; color :white;">12.30 PM - 16.30 PM </p>  
                       </td>
                    </tr>
                    <tr>
                        <td>
                         <p style = "font-family :Lato; font-size:15px; color :white;">T10</p>
                        </td> 
                        <td>
                         <p style = "font-family :Lato; font-size:15px; color :white;">Events</p>  
                        </td>
                        <td>
                         <p style = "font-family :Lato; font-size:15px; color :white;">1</p>  
                        </td>
                        <td>
                         <p style = "font-family :Lato; font-size:15px; color :white;">18.30 PM - 21.30 PM </p>  
                        </td>
                     </tr>
                     <tr>
                        <td>
                         <p style = "font-family :Lato; font-size:15px; color :white;">T02</p>
                        </td> 
                        <td>
                         <p style = "font-family :Lato; font-size:15px; color :white;">Breakfast</p>  
                        </td>
                        <td>
                         <p style = "font-family :Lato; font-size:15px; color :white;">1</p>  
                        </td>
                        <td>
                         <p style = "font-family :Lato; font-size:15px; color :white;">9.00 AM - 10.00 AM </p>  
                        </td>
                     </tr>
                     <tr>
                        <td>
                         <p style = "font-family :Lato; font-size:15px; color :white;">T11</p>
                        </td> 
                        <td>
                         <p style = "font-family :Lato; font-size:15px; color :white;">Dine-in Area</p>  
                        </td>
                        <td>
                         <p style = "font-family :Lato; font-size:15px; color :white;">0</p>  
                        </td>
                        <td>
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
	
	<table border="1px solid white" style ="width:100%;" >
    <tr>
        <th>
			<p style = "font-family :Lato; font-size:20px; color :white;">For Events</p>		
        </th>
    </tr>
    <tr>
        <td align ="center">
            <img src ="../../public/images/BIgCal.png" height = "200px" >
        </td>
    </tr>
    <tr>
        <td>
	         <table border="1px solid white" style ="width:100%;">
                    <tr>
                        <th>
                            <p style = "font-family :Lato; font-size:20px; color :white;">Location</p>		
                        </th>
                        <th>
                            <p style = "font-family :Lato; font-size:20px; color :white;">Meal Schedule</p>		
                        </th>
                        <th>
                            <p style = "font-family :Lato; font-size:20px; color :white;">isBooked</p>		
                        </th>
                        <th>
                            <p style = "font-family :Lato; font-size:20px; color :white;">Time Period</p>		
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <p style = "font-family :Lato; font-size:15px; color :white;">Pool Area</p>
                        </td> 
                        <td>
                            <p style = "font-family :Lato; font-size:15px; color :white;">Full Day</p>  
                        </td>
                        <td>
                            <p style = "font-family :Lato; font-size:15px; color :white;">1</p>  
                        </td>
                        <td>
                            <p style = "font-family :Lato; font-size:15px; color :white;">9.00 AM - 10.00 PM</p>  
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style = "font-family :Lato; font-size:15px; color :white;">Banquet Hall</p>
                        </td> 
                        <td>
                            <p style = "font-family :Lato; font-size:15px; color :white;">Half Day</p>  
                        </td>
                        <td>
                            <p style = "font-family :Lato; font-size:15px; color :white;">1</p>  
                        </td>
                        <td>
                            <p style = "font-family :Lato; font-size:15px; color :white;">11.00 AM - 18.30PM </p>  
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style = "font-family :Lato; font-size:15px; color :white;">Garden</p>
                        </td> 
                        <td>
                            <p style = "font-family :Lato; font-size:15px; color :white;">Half Day</p>  
                        </td>
                        <td>
                            <p style = "font-family :Lato; font-size:15px; color :white;">1</p>  
                        </td>
                        <td>
                            <p style = "font-family :Lato; font-size:15px; color :white;">9.00 AM - 1 PM </p>  
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style = "font-family :Lato; font-size:15px; color :white;">T11</p>
                        </td> 
                        <td>
                            <p style = "font-family :Lato; font-size:15px; color :white;">Dine-in Area</p>  
                        </td>
                        <td>
                            <p style = "font-family :Lato; font-size:15px; color :white;">0</p>  
                        </td>
                        <td>
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



<!-- Update -->
<?php include("../../config/connection.php");
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
<?php include("../../config/connection.php");
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
	