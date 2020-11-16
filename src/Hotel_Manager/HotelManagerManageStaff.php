<?php
session_start();
$username = $_SESSION['username'];
$email = $_SESSION['User_Email'];
?>
<html>

<head>
    <link rel="stylesheet" href="../Css/employee.css">
    <title>
        Hotel Manager Manage Staff
    </title>
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body bgcolor="black">

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
        <button class="dropdown-btn">Manage Staff 
        <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="HotelManagerDashboard.php">
                <font size="4 px">Dashboard</font>
            </a>
            <a href="ManagerBookingDetails.php">
                <font size="4 px">Booking Details</font>
            </a>
            <a href="HotelManagerPromotions.php">
                <font size="4 px">Promotions</font>
            </a>
            <a href="HotelManagerCustomerFeedback.php">
                <font size="4 px">Customer Feedback</font>
            </a>
            <a href="HotelManagerManageRoom.php">
                <font size="4 px">Manage Room</font>
            </a>
            <a href="HotelManagerEarlyCheckOuts.php">
                <font size="4 px">Early Check-Outs</font>
            </a>
        </div>
    </div>
    <div class="top-right">
        <table width="100%">
            <tr>
                <td>
                </td>
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
<!-- ADD -->
    <fieldset style=" position:absolute; top:270px; width: 75%; left:160px">
        <legend style="color:white; font-size: 20px">Manage Staff</legend>
        <table style="color:white; font-size: 20px; width: 100%;">

            <form action="StaffAdd.php" method="POST" id="manager_form"></form>
            <tr>
                <table style="color:white; font-size: 20px; width:88%;">

                    <tr>
                        <td align="left">Employee Type:</td>
                        <td align="center">
                            <select name="empType" id="" class="inputs" form="manager_form" required>
                                <option value="Employee">Employee</option>
                                <option value="Receptionist">Receptionist</option>
                                <option value="Supervisor">Supervisor</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left">Employee ID:</td>
                        <td align="center"><input type="text" name="empID" size="20" class="inputs" form="manager_form" required></td>
                    </tr>
                    <tr>
                        <td align="left">First Name:</td>
                        <td align="center"><input type="text" pattern="[A-Za-z]+" name="empFname" size="20" class="inputs" form="manager_form" required></td>
                    </tr>
                    <tr>
                        <td align="left">Last Name:</td>
                        <td align="center"><input type="text" pattern="[A-Za-z]+" name="empSname" size="50" class="inputs" form="manager_form" required></td>
                    </tr>
                    <tr>
                        <td align="left">Password:</td>
                        <td align="center"><input type="password" name="empPass" size="50" placeholder="Password" class="inputs" form="manager_form" required></td>
                    </tr>
                    <tr>
                        <td align="left">Email Address:</td>
                        <td align="center"><input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="empEmail" size="50" class="inputs" form="manager_form" required></td>
                    </tr>
                    <tr>
                        <td align="left">Contact No:</td>
                        <td align="center"><input type="tel" pattern="[0][1-9][0-9]{8}"name="empContact" size="20" class="inputs" form="manager_form" required></td>
                    </tr>
                </table>

            </tr>
        </table>
        <table style="color:white; font-size: 20px; width:81%;">
            <tr>
                <td align="right">
                    <input type="submit" class="button" value="  Add Employee " name="ADD" form="manager_form">
                    <input type="reset" class="button" value="  Reset " name="reset" form="manager_form">
                </td>
            </tr>
        </table>

    </fieldset>

   <!-- Search -->
    <form action="" method="POST">
        <fieldset style=" position:absolute; top:751px; width: 45%;right:0%;">
            <legend style="color:white; font-size: 20px">Update and Delete Employees</legend>
            <input type="text" name="Employee_ID" placeholder="Enter id to Search" />
            <input type="submit" name="search" value="Search by ID" class="button">
        </fieldset>
    </form>

    <?php
    include("../Templates/connection.php");
    if (isset($_POST['search'])) {
        $Employee_ID = $_POST['Employee_ID'];

        $query = "SELECT * FROM employee where Employee_ID='$Employee_ID' ";
        $query_run = mysqli_query($con, $query);

        while ($row = mysqli_fetch_array($query_run)) {
    ?>
            <form action="" method="POST">
                <fieldset style=" position:absolute; top:915px; width:45%;right:0%;">
                    <table align="center" style="color:white; font-size: 21px; width:100%;">
                        <tr>
                            <td width="300 px" style="display: none;"> First Name:</td>
                            <td width="300 px"><input type="text" style="display:none" name="Employee_ID" value="<?php echo $row['Employee_ID']; ?>" /></td>
                        </tr>
                        <tr>
                            <td width="300 px">First Name:</td>
                            <td width="300 px"><input type="text" name="First_Name" value="<?php echo $row['First_Name']; ?>" /></td>
                        </tr>
                        <tr>
                            <td>Last Name:</td>
                            <td><input type="text" name="Last_Name" value="<?php echo $row['Last_Name']; ?>" /></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input type="email" name="Email" value="<?php echo $row['Email']; ?>" /></td>
                        </tr>
                        <tr>
                            <td>Contact No:</td>
                            <td><input type="tel" name="Contact_No" value="<?php echo $row['Contact_No']; ?>" /></td>
                        </tr>
                        <tr>
                            <td>User Role:</td>
                            <td>
								<select id="types" name="User_Role" class="inputs">
								    <option value="-"
										<?php
										if($row["User_Role"]=='-')
										{
											echo "selected";
										}
										?>	
									>-</option>

                                    <option value="Hotel Manager"
										<?php
										if($row["User_Role"]=='Hotel Manager')
										{
											echo "selected";
										}
										?>	
									>Hotel Manager</option>

									<option value="Employee"
										<?php
										if($row["User_Role"]=='Employee')
										{
											echo "selected";
										}
										?>	
									>Employee</option>

									<option value="Receptionist"
										<?php
										if($row["User_Role"]=='Receptionist')
										{
											echo "selected";
										}
										?>	
									>Receptionist</option>

									<option value="Hotel Supervisor"
										<?php
										if($row["User_Role"]=='Hotel Supervisor')
										{
											echo "selected";
										}
										?>	
									>Hotel Supervisor</option>
								</select>
							</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="position:relative;left:-5px; padding:10px;">
                                <input type="submit" class="button" name="update" value="Update Employee"></a>
                                <input type="submit" class="button" name="delete" value="Delete Employee"></a>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </form>
    <?php
        }
    }
    ?>
    </table>
   

   <!-- Respond To Leave Requests -->
    <table style="width:100%;position:absolute">
        <tr>
            <th rowspan="5">
                <form>
                    <fieldset style=" position:absolute; top:844px; width: 45%;right:0%">
                        <legend style="color:white; font-size: 20px">Respond to Leave Requests of Employees</legend>
                        <table style="color:white; font-size: 20px; width:100%;">
                            <tr>
                                <td align="left">Employee ID:</td>
                                <td align="left"><input type="text" name="id" size="20" value="E004"></td>

                            </tr>
                            <tr>
                                <td align="left">Leave Start Date:</td>
                                <td align="left"><input type="text" name="startdate" size="20" value="05/26/2020"></td>
                            </tr>
                            <tr>
                                <td align="left">Leave End Date:</td>
                                <td align="left"><input type="text" name="enddate" size="20" value="05/27/2020"></td>
                            </tr>
                            <tr>
                                <td align="left">Reason for the leave:</td>
                                <td align="left"><textarea name="Message" rows="5" cols="53">Medical Leave</textarea></td>
                            </tr>
                        </table>

                        <table style="color:white; font-size: 20px; width:75%;">
                            <tr>
                                <td align="left">
                                    <a href="#" class="button" style="padding:10px 20px; border-radius:50%">&laquo;</a>
                                    <a href="#" class="button" style="padding:10px 20px; border-radius:50%">&raquo;</a>
                                </td>
                                <td align="right">
                                    <input type="button" class="button" value="ACCEPT">
                                    <input type="button" class="button" value="DECLINE">
                                </td>

                            </tr>
                        </table>

                    </fieldset>
                </form>
            </th>
        </tr>
    </table>

   <!-- Current Duty Toaster -->
    <table style="border: 1px solid white;width:52%; position:absolute; top:1369px">
        <tr>
            <td></td>
            <td align="center">
                <p style="font-family :Lato; font-size:25px; color :white"><b>Current Duty Roster</b></p>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:20px; color :white;">Employee ID</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:20px; color :white;">Employee Name</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:20px; color :white;">Section Assigned</p>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">E005</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Shehan Gunawardena</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Superior Rooms</p>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">E006</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Nuwangi Dewage</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Dine-In Area</p>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">E007</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Savindi Karunaratne</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Panoramic Rooms</p>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">E008</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Harini Munasinghe</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Reception</p>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">E009</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Thenuri Sakalasooriya</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Room Service</p>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">E010</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Sewumi Dissanayike</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Room Service</p>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">E011</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Sachini Samarasinghe</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Room Service</p>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">E012</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Ravinath Mahadurage</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Dine-In Area</p>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">E013</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Thisaru Silva</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Room Service</p>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">E014</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Kavindi Sachinthanee</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Event Coordination</p>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">E015</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Hashara Kumarasinghe</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Dine-In Area</p>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">E015</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Nilmani Kulaweera</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Dine-In Area</p>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">E015</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Sachinika Mahadurage</p>
            </td>
            <td style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:15px; color :white;">Dine-In Area</p>
            </td>
        </tr>
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
 <!-- View Table-->
 <div class="dtablescroll">
 <table align="center"style="color:white;width:100%;font-size:17px;">
		<tr>
			<th colspan="6"><h4>Employee Details</h2></th>
		</tr>
		<tr>
			<th>Employee ID</th>
			<th>First Name</th>
			<th>Last Name</th>
		    <th>Email Address</th>
			<th>Contact No</th>
            <th>User Role</th>
		</tr>

		<?php include("../Templates/connection.php");

		$query = "SELECT * FROM employee";
		$query_run = mysqli_query($con, $query);
			while($row=mysqli_fetch_array($query_run))
			{

		?>
				<tr>
				<td><?php echo $row["Employee_ID"]; ?></td>
			    <td><?php echo $row["First_Name"]; ?></td>
			    <td><?php echo $row["Last_Name"]; ?></td>
			    <td><?php echo $row["Email"]; ?></td>
			    <td><?php echo $row["Contact_No"]; ?></td>
                <td><?php echo $row["User_Role"]; ?></td>
				</tr>
		<?php
			}
		?>

    </table>
    </div>
<!-- Update -->
<?php
if (isset($_POST['update'])) {
    $First_Name = $_POST['First_Name'];
    $Last_Name = $_POST['Last_Name'];
    $Email = $_POST['Email'];
    $Contact_No = $_POST['Contact_No'];
    $User_Role = $_POST['User_Role'];
    $query = "UPDATE employee SET First_Name='$First_Name',Last_Name='$Last_Name',Email='$Email',Contact_No='$Contact_No',User_Role='$User_Role' where Employee_ID='$_POST[Employee_ID]'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        echo "<script>
                alert('Employee Has been updated');
                window.location.href='HotelManagerManageStaff.php';
                </script>";
    } else {
        echo '<script> alert("Data Not Updated") </script>';
    }
}
?>
<!-- delete -->
<?php
if (isset($_POST['delete'])) {
    $query = "DELETE FROM employee where Employee_ID='$_POST[Employee_ID]'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        echo "<script>
                alert('Employee Has been Deleted');
                window.location.href='HotelManagerManageStaff.php';
                </script>";
    } else {
        echo '<script> alert("Data Not Updated") </script>';
    }
}
?>