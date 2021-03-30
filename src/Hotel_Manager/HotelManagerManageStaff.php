<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include("../../public/includes/session.php");
include("../../config/connection.php");
checkSession();
if (!isset($_SESSION['First_Name'])) {
    header('Location:../Hotel_Website/HomePage-login.php');
}
if (isset($_POST['Accept'])) {
	$EmployeeID = $_POST['Employee_ID'];
	$startDate = $_POST['Start_Date']; 
	$endDate = $_POST['End_Date']; 
	$typeEmployee = $_POST['Type_Employee'];
    $reason =  $_POST['Reason']; 
    $query = "SELECT Email from employee WHERE Employee_ID='$EmployeeID'";
    $row=mysqli_fetch_assoc(mysqli_query($con,$query));
    $email = $row["Email"];
    $status = 1;
	$acceptanceReply = mysqli_query($con,"UPDATE leave_request SET Status='$status' WHERE Employee_ID='$EmployeeID'");
	if ($acceptanceReply) {
		echo "<script>
            alert('Leave has been accepted');
          </script>";
		header('location:HotelManagerManageStaff.php');
		//sending the reservation confirmation mail to the customer
		require '../../config/PHPMailer/src/Exception.php';
		require '../../config/PHPMailer/src/PHPMailer.php';
		require '../../config/PHPMailer/src/SMTP.php';
		$mail = new PHPMailer(true);

		try {
			//Server settings

			$mail->isSMTP();                                            // Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'grandandepic20@gmail.com';                     // SMTP username
			$mail->Password   = 'grand&epicIs05';                               // SMTP password
			$mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			//Recipients
			$mail->setFrom('grandandepic20@gmail.com', 'Grand & Epic');
			$mail->addAddress($email);     // Add a recipient            // Name is optional

			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'Accept Leave Request';
			$mail->Body    = 'Request has been accepted';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();
			echo '<script>alert("Message Sent")</script>';
            header('location:HotelManagerManageStaff.php');
		} catch (Exception $e) {
			echo '<script>alert("Message could not be sent. Mailer Error: {$mail->ErrorInfo}")</script>';
            header('location:HotelManagerManageStaff.php');
		}
	} else {
		echo '<script> alert("Data Not Added") </script>';
	}
    
}
if (isset($_POST['Decline'])) {
	$EmployeeID = $_POST['Employee_ID'];
	$startDate = $_POST['Start_Date']; 
	$endDate = $_POST['End_Date']; 
	$typeEmployee = $_POST['Type_Employee'];
    $reason =  $_POST['Reason']; 
    $query = "SELECT Email from employee WHERE Employee_ID='$EmployeeID'";
    $row=mysqli_fetch_assoc(mysqli_query($con,$query));
    $email = $row["Email"];
    $status = 1;
    $declineReply = mysqli_query($con,"DELETE from leave_request WHERE Employee_ID='$EmployeeID'");
	if ($declineReply) {
		echo "<script>
            alert('Leave has been accepted');
          </script>";
		header('location:HotelManagerManageStaff.php');
		//sending the reservation confirmation mail to the customer
		require '../../config/PHPMailer/src/Exception.php';
		require '../../config/PHPMailer/src/PHPMailer.php';
		require '../../config/PHPMailer/src/SMTP.php';
		$mail = new PHPMailer(true);

		try {
			//Server settings

			$mail->isSMTP();                                            // Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'grandandepic20@gmail.com';                     // SMTP username
			$mail->Password   = 'grand&epicIs05';                               // SMTP password
			$mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			//Recipients
			$mail->setFrom('grandandepic20@gmail.com', 'Grand & Epic');
			$mail->addAddress($email);     // Add a recipient            // Name is optional

			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'Decline Leave Request';
			$mail->Body    = 'Request has been declined';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();
			echo '<script>alert("Message Sent")</script>';
            header('location:HotelManagerManageStaff.php');
		} catch (Exception $e) {
			echo '<script>alert("Message could not be sent. Mailer Error: {$mail->ErrorInfo}")</script>';
            header('location:HotelManagerManageStaff.php');
		}
	} else {
		echo '<script> alert("Data Not Added") </script>';
	}
  
}
?>


<html>

<head>
    <link rel="stylesheet" href="../../public/css/employee.css">
    <title>
        Hotel Manager Manage Staff
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
            <p style="margin-top: 2px; color:black">
                <?php
                echo "Logged in as " . $_SESSION['First_Name'] . "(Staff)</P>";
                ?>
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
                <font size="4 px">Manage Rooms</font>
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
                    <img src="../../public/images/ayomal.png" height="80px">
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
                                <option value disabled selected>Select the Employee Type</option>
                                <option value="Employee">Employee</option>
                                <option value="Receptionist">Receptionist</option>
                                <option value="Supervisor">Supervisor</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="left">Employee ID:</td>
                        <td align="center"><input type="text" name="empID" placeholder="Ex:S001/R001/E001" size="20" class="inputs" form="manager_form" required></td>
                    </tr>
                    <tr>
                        <td align="left">First Name:</td>
                        <td align="center"><input type="text" pattern="[A-Za-z]+" name="empFname" size="20" class="inputs" form="manager_form" required></td>
                    </tr>
                    <tr>
                        <td align="left">Last Name:</td>
                        <td align="center"><input type="text" pattern="^[A-Za-z ]+$" name="empSname" size="50" class="inputs" form="manager_form" required></td>
                    </tr>
                    <tr>
                        <td align="left">Password:</td>
                        <td align="center"><input type="password" name="empPass" title="Your Password Should contain minimum of 8 characters, the first character should should be uppercase & should include special characters as well" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password" class="inputs" form="manager_form" required></td>
                    </tr>
                    <tr>
                        <td align="left">Email Address:</td>
                        <td align="center"><input type="email" placeholder="Ex:abc@gmail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="empEmail" size="50" class="inputs" form="manager_form" required></td>
                    </tr>
                    <tr>
                        <td align="left">Contact No:</td>
                        <td align="center"><input type="tel" pattern="[0][1-9][0-9]{8}" name="empContact" size="20" class="inputs" form="manager_form" required></td>
                    </tr>
                </table>

            </tr>
        </table>
        <table style="color:white; font-size: 20px; width:81%;">
            <tr>
                <td align="right">
                    <input type="submit" class="button" value="  Add Employee " name="ADD" form="manager_form">
                    <input type="reset" class="button" value="  Reset Details " name="reset" form="manager_form">
                </td>
            </tr>
        </table>

    </fieldset>

    <!-- Search -->

    <form action="" method="POST">
        <fieldset style=" position:absolute; top:746px; width: 45%;right:0%;">
            <legend style="color:white; font-size: 20px">Update and Delete Employees</legend>
            <input type="text" name="Employee_ID" placeholder="Enter id to Search" />
            <input type="submit" name="search" value="Search by ID" class="button">
        </fieldset>
    </form>

    <?php
    include("../../config/connection.php");
    if (isset($_POST['search'])) {
        $Employee_ID = $_POST['Employee_ID'];

        $query = "SELECT * FROM employee where Employee_ID='$Employee_ID' ";
        $query_run = mysqli_query($con, $query);
        if (mysqli_num_rows($query_run) == 1) {
            while ($row = mysqli_fetch_array($query_run)) {
    ?>
                <form action="" method="POST">
                    <fieldset style=" position:absolute; top:914px; width:45%;right:0%;">
                        <table align="center" style="color:white; font-size: 21px; width:100%;">
                            <tr>
                                <td width="200 px" style="display: none;"> First Name:</td>
                                <td width="200 px"><input type="text" style="display:none" name="Employee_ID" value="<?php echo $row['Employee_ID']; ?>" /></td>
                            </tr>
                            <tr>
                                <td width="200 px">First Name:</td>
                                <td width="200 px"><input type="text" name="First_Name" value="<?php echo $row['First_Name']; ?>" /></td>
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
                                        <option value="-" <?php
                                                            if ($row["User_Role"] == '-') {
                                                                echo "selected";
                                                            }
                                                            ?>>-</option>

                                        <option value="Hotel Manager" <?php
                                                                        if ($row["User_Role"] == 'Hotel Manager') {
                                                                            echo "selected";
                                                                        }
                                                                        ?>>Hotel Manager</option>

                                        <option value="Employee" <?php
                                                                    if ($row["User_Role"] == 'Employee') {
                                                                        echo "selected";
                                                                    }
                                                                    ?>>Employee</option>

                                        <option value="Receptionist" <?php
                                                                        if ($row["User_Role"] == 'Receptionist') {
                                                                            echo "selected";
                                                                        }
                                                                        ?>>Receptionist</option>

                                        <option value="Hotel Supervisor" <?php
                                                                            if ($row["User_Role"] == 'Hotel Supervisor') {
                                                                                echo "selected";
                                                                            }
                                                                            ?>>Hotel Supervisor</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="position:relative;left:-5px; padding:10px;">
                                    <input type="submit" class="button" name="update" value="Update"></a>
                                    <input type="submit" class="button" name="delete" value="Delete"></a>
                                    <input type="reset" class="button" name="reset" value="Reset"></a>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
    <?php
            }
        } else {
            echo "<script>alert('ID you entered doesn\'t Exist.Please Try Again!')</script>";
            echo "<script>window.location.href='HotelManagerManageStaff.php'</script>";
        }
    }
    ?>

<!-- view customer feedback records  -->
	<?php
	include('../../config/connection.php');
	$tempStatus = 0;
	$selectLeaveRequest = mysqli_query($con, "SELECT * FROM leave_request WHERE Status='" . $tempStatus . "' ");
	if (mysqli_num_rows($selectLeaveRequest) > 0) {
		echo '<table style="color:white;border:1px solid white;position:absolute;margin-left:54%;top:1300px; width:46%;">
            <thead>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Employee Id</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Start Date</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">End Date</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Employee Type</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Status</th>
            </thead>';

		while ($rowResDetails = mysqli_fetch_assoc($selectLeaveRequest)) {
			$id = $rowResDetails['ID'];
			echo '<tbody>
                    <tr>
                        <td style="border: 1px solid white;padding: 5px;">' . $rowResDetails['Employee_ID'] . '</td>
                        <td style="border: 1px solid white;padding: 5px;">' . $rowResDetails['Start_Date'] . '</td>
                        <td style="border: 1px solid white;padding: 5px;">' . $rowResDetails['End_Date'] . '</td>
                        <td style="border: 1px solid white;padding: 5px;">' . $rowResDetails['Type_Employee'] . '</td>
                       
                        <td style="border: 1px solid white;padding: 5px;"><a href="HotelManagerManageStaff.php?id=' . $id . '">Request</a></td>
                    </tr>';
		}
		echo '</table>';
	}
	?>
    <!-- filter feedback  -->
	<?php if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$selectDetails = mysqli_query($con, "SELECT * FROM leave_request WHERE ID='$id'");
		$rowUserDetails = mysqli_fetch_assoc($selectDetails);
	?>
		<form action="" method="POST" style="border:1px solid white;width:600px;height:600px;display: flex;flex-direction: column;padding:10px 35px;margin-left:820px;position:absolute;top:1450px;">
			<label style="color:white;font-size: 35px;text-align: center;font-weight: bolder;">Leave Requests</label>
			<label for="Date" style="color:white;margin-top:30px;font-size: 20px;">Employee ID</label>
			<input type="hidden" name="ID" value="<?php echo $id ?>">
			<input type="text" name="Employee_ID" id="" value="<?php echo $rowUserDetails['Employee_ID'] ?>">
			<label for="Date" style="color:white;font-size: 20px;margin-top:20px;">Start Date</label>
			<input type="text" rows="5" name="Start_Date" id="" value="<?php echo $rowUserDetails['Start_Date'] ?>">
			<label for="Date" style="color:white;font-size: 20px;margin-top:20px;">End Date</label>
			<input type="text" rows="5" name="End_Date" id="" value="<?php echo $rowUserDetails['End_Date'] ?>">
            <label for="Date" style="color:white;font-size: 20px;margin-top:20px;">Type Employee</label>
			<input type="text" rows="5" name="Type_Employee" id="" value="<?php echo $rowUserDetails['Type_Employee'] ?>">
			<label for="Date" style="color:white;font-size: 20px;margin-top:20px;">Reason</label>
			<input type="text" rows="5" name="Reason" id="" value="<?php echo $rowUserDetails['Reason'] ?>">
            <table>
            <tr>
            <td>
			<input type="submit" name="Accept" value="Accept" style="border-radius: 10px;width: 200px;padding: 10px;font-size:15px;background-color: blue;color:white;border:none;cursor: pointer;margin-left:30px; margin-top:25px;">
            </td>
            <td>
			<input type="submit" name="Decline" value="Decline" style="border-radius: 10px;width: 200px;padding: 10px;font-size:15px;background-color: blue;color:white;border:none;cursor: pointer;margin-left:30px; margin-top:25px;">
            </td>
            </tr>
            </table>
		</form>
	<?php
	} else {
	} ?>
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

<!-- VIEW Employee TABLE -->
<div class="dtablescroll">
    <table align="center" style="color:white;width:100%;font-size:17px;top:746px">
        <tr>
            <th colspan="6">
                <h4>Employee Details</h2>
            </th>
        </tr>
        <tr>
            <th>Employee ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email Address</th>
            <th>Contact No</th>
            <th>User Role</th>
        </tr>

        <?php include("../../config/connection.php");

        $query = "SELECT * FROM employee where User_Role!='Admin' AND User_Role!='Hotel Manager'";
        $query_run = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($query_run)) {

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

<div class="dtablescrollduty">
    <table align="center" style="color:white;width:100%;font-size:17px;">
        <tr>
            <th colspan="6">
                <h4>Duty Roster</h2>
            </th>
        </tr>
        <tr>
            <th>Employee ID</th>
            <th>Assigned Date</th>
            <th>Assigned Section</th>
            <th>Allocated Room Numbers</th>
            <th>Allocated Table Numbers</th>
            <th>Allocated Locations</th>
        </tr>

        <?php include("../../config/connection.php");

        $query = "SELECT * FROM employee_tasks";
        $query_run = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($query_run)) {

        ?>
            <tr>
                <td><?php echo $row["Employee_ID"]; ?></td>
                <td><?php echo $row["Assigned_Date"]; ?></td>
                <td><?php echo $row["Assigned_Section"]; ?></td>
                <td><?php echo $row["Allo_Room_Numbers"]; ?></td>
                <td><?php echo $row["Allo_Table_Numbers"]; ?></td>
                <td><?php echo $row["Allo_Locations"]; ?></td>
            </tr>
        <?php
        }
        ?>

    </table>
</div>
<!-- UPDATE -->
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
<!-- DELETE -->
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