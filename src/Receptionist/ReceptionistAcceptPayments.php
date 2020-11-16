<?php
session_start();
$username = $_SESSION['username'];
$email = $_SESSION['User_Email'];
?>

<html>

<head>
    <link rel="stylesheet" href="../Css/employee.css">
    <title>
        Receptionist Accept Payments
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
        <button class="dropdown-btn">Accept Payments
        <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="ReceptionistDashboard.php">Dashboard</a>
            <a href="ReceptionistReservations.php">Reservations</a>
            <a href="ReceptionistRoomDetails.php">Room Details</a>
            <a href="ReceptionistRequestLeave.php">Request a Leave</a> 
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
            dropdown[i].addEventListener("click", function () {
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
    <input type="date" name="" id="" style="margin-top:-200px;margin-bottom: 200px;width: 300px;margin-left: 600px;" />
    <table style="color:white;border:1px solid white;margin-left:12%;margin-top:-130px;width: 80%;">
        <thead>
            <th style="border: 1px solid white;padding: 10px;font-size:20px;">Reservation Id</th>
            <th style="border: 1px solid white;padding: 10px;font-size:20px;">Customer Name</th>
            <th style="border: 1px solid white;padding: 10px;font-size:20px;">Reservation type</th>
            <th style="border: 1px solid white;padding: 10px;font-size:20px;">Amount Paid</th>
            <th style="border: 1px solid white;padding: 10px;font-size:20px;">Amount to be Paid</th>
            <th style="border: 1px solid white;padding: 10px;font-size:20px;">Payment Status</th>

        </thead>
        <tbody>
            <tr>
                <td style="border: 1px solid white;padding: 5px;">R001</td>
                <td style="border: 1px solid white;padding: 5px;">Kumara Fernando</td>
                <td style="border: 1px solid white;padding: 5px;">Staying-in</td>
                <td style="border: 1px solid white;padding: 5px;">Rs.10,000/=</td>
                <td style="border: 1px solid white;padding: 5px;">Rs.50,000/=</td>
                <td style="border: 1px solid white;padding: 5px;"><a href="#">Accept Payment</a></td>
            </tr>
            <tr>
                <td style="border: 1px solid white;padding: 5px;">R002</td>
                <td style="border: 1px solid white;padding: 5px;">Lakmal De Silva</td>
                <td style="border: 1px solid white;padding: 5px;">Staying-in</td>
                <td style="border: 1px solid white;padding: 5px;">Rs.5,000/=</td>
                <td style="border: 1px solid white;padding: 5px;">Rs.20,000/=</td>
                <td style="border: 1px solid white;padding: 5px;"><a href="#">Accept Payment</a></td>
            </tr>
            <tr>
                <td style="border: 1px solid white;padding: 5px;">R003</td>
                <td style="border: 1px solid white;padding: 5px;">Upul Perera</td>
                <td style="border: 1px solid white;padding: 5px;">Events</td>
                <td style="border: 1px solid white;padding: 5px;">Rs.2,000/=</td>
                <td style="border: 1px solid white;padding: 5px;">Rs.30,000/=</td>
                <td style="border: 1px solid white;padding: 5px;"><a href="#">Accept Payment</a></td>
            </tr>
        </tbody>
    </table>

    <form
        style="border:1px solid white;width:350px;height:400px;display: flex;flex-direction: column;padding:10px 35px;margin-left: 500px;margin-top:50px;">
        <label style="color:white;font-size: 35px;text-align: center;font-weight: bolder;">Accepting Payments</label>
        <label for="Date" style="color:white;margin-top:30px;font-size: 20px;">Customer Name</label>
        <input type="text" name="" id="" value="Kumara Fernando">
        <div style="display: inline-block;margin-top:20px;">
            <label for="Payment Selection" style="color: white;font-size: 20px;">Payment Type</label>
            <select>
                <option value="By-Cash">By Cash</option>
                <option value="By-Credit Card">By Credit Card</option>
            </select>
        </div>
        <label for="Date" style="color:white;font-size: 20px;margin-top:20px;">Amount
        </label>
        <input type="text" name="" id="" value="Rs.50,000/=">
        <input type="button" value="Payment Accepted"
            style="border-radius: 10px;width: 200px;padding: 10px;font-size:15px;background-color: blue;color:white;border:none;cursor: pointer;margin-left:30px;margin-top:25px;">
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