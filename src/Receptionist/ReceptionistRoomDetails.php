<?php
session_start();
$username = $_SESSION['username'];
$email = $_SESSION['User_Email'];
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
			<img src = "../../public/images/ayomal.png" height = "40%" >
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
	
	<table style ="position:absolute; top : 240px; width:350px;" >
		<tr>
            <td>
                <img src = "../../public/images/room.png" height = "65%">
            </td>
		<td>
			<p style = "font-family :Lato; font-size:22px; color :white;">Room Details</p>		
		</td>
		</tr>
	</table>
	

	<table style ="position:absolute; left:20px; top:350px; width:97%;border: 1px solid white;" >
		<tr>
		<th style ="border: 1px solid white;">
			<p style = "font-family :Lato; font-size:20px; color :white;">Room Details</p>		
		</th>
		
		</tr>
		<tr>
		<td style ="border: 1px solid white;">
		
			<table width="100%">
				<tr>
				
				<td align="center">
                    <img src = "../../public/images/BIgCal.png" height = "10%">
				</td>
				</tr>
				<tr>
                    <td>
                        <table style ="width:100%;border: 1px solid white;">
                            <tr>
                                <th style ="border: 1px solid white;">
                                    <p style = "font-family :Lato; font-size:20px; color :white;">Room ID</p>		
                                </th>
                                <th style ="border: 1px solid white;">
                                    <p style = "font-family :Lato; font-size:20px; color :white;">Customer ID</p>		
                                </th>
                                <th style ="border: 1px solid white;">
                                    <p style = "font-family :Lato; font-size:20px; color :white;">Customer Name</p>		
                                </th>
                                <th style ="border: 1px solid white;">
                                    <p style = "font-family :Lato; font-size:20px; color :white;">Room Type</p>		
                                </th>
                                <th style ="border: 1px solid white;">
                                    <p style = "font-family :Lato; font-size:20px; color :white;">No: of People</p>		
                                </th>
                                <th style ="border: 1px solid white;">
                                    <p style = "font-family :Lato; font-size:20px; color :white;">Housekeeping Requested</p>		
                                </th>
                                <th style ="border: 1px solid white;">
                                    <p style = "font-family :Lato; font-size:20px; color :white;">Check-In Date</p>		
                                </th>
                                <th style ="border: 1px solid white;">
                                    <p style = "font-family :Lato; font-size:20px; color :white;">Check-Out Date</p>		
                                </th>
                                </tr>
                                <tr>
                                    <td style ="border: 1px solid white;">
                                        <p style = "font-family :Lato; font-size:20px; color :white;">S1203</p>		
                                    </td>
                                    <td style ="border: 1px solid white;">
                                        <p style = "font-family :Lato; font-size:20px; color :white;">C1111</p>		
                                    </td>
                                    <td style ="border: 1px solid white;">
                                        <p style = "font-family :Lato; font-size:20px; color :white;">Hasitha Athukorala</p>		
                                    </td>
                                    <td style ="border: 1px solid white;">
                                        <p style = "font-family :Lato; font-size:20px; color :white;">Superior Room</p>		
                                    </td>
                                    <td style ="border: 1px solid white;">
                                        <p style = "font-family :Lato; font-size:20px; color :white;">3</p>		
                                    </td>
                                    <td style ="border: 1px solid white;">
                                        <p style = "font-family :Lato; font-size:20px; color :white;">
                                            <input type="radio" name="rating1" value="yes" checked style="margin-left:65px;">Yes
                                            <input type="radio" name="rating1" value="no" disabled style="margin-left:65px;">No
                                        </p>		
                                    </td>
                                    <td  style ="border: 1px solid white;">
                                        <input type="date" name="startdate" size="20"></td></p>		
                                    </td>
                                    <td style ="border: 1px solid white;">
                                        <input type="date" name="startdate" size="20"></td></p>		
                                    </td>
                                </tr>
                                <tr>
                                    <td style ="border: 1px solid white;">
                                        <p style = "font-family :Lato; font-size:20px; color :white;">P1203</p>		
                                    </td>
                                    <td style ="border: 1px solid white;">
                                        <p style = "font-family :Lato; font-size:20px; color :white;">C1211</p>		
                                    </td>
                                    <td style ="border: 1px solid white;">
                                        <p style = "font-family :Lato; font-size:20px; color :white;">Dewni Pathirana</p>		
                                    </td>
                                    <td style ="border: 1px solid white;">
                                        <p style = "font-family :Lato; font-size:20px; color :white;">Panoramic Room</p>		
                                    </td>
                                    <td style ="border: 1px solid white;">
                                        <p style = "font-family :Lato; font-size:20px; color :white;">2</p>		
                                    </td>
                                    <td style ="border: 1px solid white;">
                                        <p style = "font-family :Lato; font-size:20px; color :white;">
                                            <input type="radio" name="rating2" value="yes" checked style="margin-left:65px;">Yes
                                            <input type="radio" name="rating2" value="no" disabled style="margin-left:65px;">No
                                        </p>		
                                    </td>
                                    <td  style ="border: 1px solid white;">
                                        <input type="date" name="startdate" size="20"></td></p>		
                                    </td>
                                    <td style ="border: 1px solid white;">
                                        <input type="date" name="startdate" size="20"></td></p>		
                                    </td>
                                 </tr>
                                 <tr>
                                    <td style ="border: 1px solid white;">
                                        <p style = "font-family :Lato; font-size:20px; color :white;">Su1203</p>		
                                    </td>
                                    <td style ="border: 1px solid white;">
                                        <p style = "font-family :Lato; font-size:20px; color :white;">C2211</p>		
                                    </td>
                                    <td style ="border: 1px solid white;">
                                        <p style = "font-family :Lato; font-size:20px; color :white;">Sisitha Nanayakkara</p>		
                                    </td>
                                    <td style ="border: 1px solid white;">
                                        <p style = "font-family :Lato; font-size:20px; color :white;">Suite Room</p>		
                                    </td>
                                    <td style ="border: 1px solid white;">
                                        <p style = "font-family :Lato; font-size:20px; color :white;">4</p>		
                                    </td>
                                    <td style ="border: 1px solid white;">
                                        <p style = "font-family :Lato; font-size:20px; color :white;">
                                            <input type="radio" name="rating3" value="yes" checked style="margin-left:65px;">Yes
                                            <input type="radio" name="rating3" value="no" disabled style="margin-left:65px;">No
                                        </p>		
                                    </td>
                                    <td  style ="border: 1px solid white;">
                                        <input type="date" name="startdate" size="20"></td></p>		
                                    </td>
                                    <td style ="border: 1px solid white;">
                                        <input type="date" name="startdate" size="20"></td></p>		
                                    </td>
                                 </tr>
                                 <tr>
                                    <td style ="border: 1px solid white;">
                                        <p style = "font-family :Lato; font-size:20px; color :white;">S1203</p>		
                                    </td>
                                    <td style ="border: 1px solid white;">
                                        <p style = "font-family :Lato; font-size:20px; color :white;">Null</p>		
                                    </td>
                                    <td style ="border: 1px solid white;">
                                        <p style = "font-family :Lato; font-size:20px; color :white;">Null</p>		
                                    </td>
                                    <td style ="border: 1px solid white;">
                                        <p style = "font-family :Lato; font-size:20px; color :white;">Superior Room</p>		
                                    </td>
                                    <td style ="border: 1px solid white;">
                                        <p style = "font-family :Lato; font-size:20px; color :white;">0</p>		
                                    </td>
                                    <td style ="border: 1px solid white;">
                                        <p style = "font-family :Lato; font-size:20px; color :white;">
                                            <input type="radio" name="rating4" value="yes" disabled style="margin-left:65px;">Yes
                                            <input type="radio" name="rating4" value="no" checked style="margin-left:65px;">No
                                        </p>		
                                    </td>
                                    <td  style ="border: 1px solid white;">
                                        <input type="date" name="startdate" size="20"></td></p>		
                                    </td>
                                    <td style ="border: 1px solid white;">
                                        <input type="date" name="startdate" size="20"></td></p>		
                                    </td>
                                 </tr>
                                 <tr>
                                <td></td>   
                                <td></td> 
                                <td></td> 
                                <td></td>
                                <td></td>
                                <td></td> 
                                <td></td>  
                                <td align= "right">
                                    <p style = "font-family :Lato; font-size:15px; color :rgb(240, 16, 16);cursor:pointer;"><u>Show more rows</u></p>
                                </td>

                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="button" class="button" value="UPDATE ROOM DETAILS">
                    </td>
                </tr>
             </table>
			
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