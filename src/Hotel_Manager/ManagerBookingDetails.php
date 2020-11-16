<?php
session_start();
$username = $_SESSION['username'];
$email = $_SESSION['User_Email'];
?>
<html>
	<head>
	<link rel="stylesheet" href="../Css/employee.css">
		<title>
		Manager Booking Details
        </title>
        <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
	</head>	
	<body bgcolor = "black">

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
			<button class="dropdown-btn">Booking Details
            <i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-container">
				<a href="HotelManagerDashboard.php"><font size = "4 px">Dashboard</font></a>
				<a href="HotelManagerManageStaff.php"><font size = "4 px">Manage Staff</font></a>
                <a href="HotelManagerPromotions.php"><font size = "4 px">Promotions</font></a>
                <a href="HotelManagerCustomerFeedback.php"><font size = "4 px">Customer Feedback</font></a>
                <a href="HotelManagerManageRoom.php"><font size = "4 px">Manage Room</font></a>
				<a href="HotelManagerEarlyCheckOuts.php"><font size = "4 px">Early Check-Outs</font></a>
				</div>
		</div>
		<div class = "top-right">
		<table width = "100%">
		<tr>
		<td>	
		</td>
		<td>
			<img src = "../Images/ayomal.png" height = "40%" >
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
	
    <table style ="position:absolute; top : 260px; width:100%;border: 1px solid white;" >
    <tr>
        <th style ="border: 1px solid white;">
			<p style = "font-family :Lato; font-size:20px; color :white;">For Staying-in</p>		
        </th>
    </tr>
    <tr>
        <td align ="center">
            <img src = "../Images/BIgCal.png" height = "10%" >
        </td>
    </tr>
    <tr>
        <td>
            <table style ="width:100%;border: 1px solid white;">
                <tr>
                    <th style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">Room No</p>		
                    </th>
                    <th style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">Room Type</p>		
                    </th>
                    <th style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">Booked</p>		
                    </th>
                    <th style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">StayingFullDay</p>		
                    </th>
                    <th style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">Time Checked-in</p>		
                    </th>
                    <th style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">Time Checked-out</p>		
                    </th>
                    </tr>
                    <tr>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">S123</p>
                       </td> 
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">Superior</p>  
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">
                            <input type="radio" name="rating2" value="yes" checked style="margin-left:65px;">Yes
                            <input type="radio" name="rating2" value="no" disabled style="margin-left:65px;">No
                        </p>		
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">
                            <input type="radio" name="rating2" value="yes" checked style="margin-left:65px;">Yes
                            <input type="radio" name="rating2" value="no" disabled style="margin-left:65px;">No
                        </p>		
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">16.30 PM</p>  
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">Null</p>  
                       </td>
                    </tr>
                    <tr>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">P123</p>
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">Panoramic</p>  
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">
                            <input type="radio" name="rating2" value="yes" checked style="margin-left:65px;">Yes
                            <input type="radio" name="rating2" value="no" disabled style="margin-left:65px;">No
                        </p>		
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">
                            <input type="radio" name="rating2" value="yes" checked style="margin-left:65px;">Yes
                            <input type="radio" name="rating2" value="no" disabled style="margin-left:65px;">No
                        </p>		
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">10.00 AM</p>  
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">Null</p>  
                       </td>
                    </tr>
                    <tr>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">Su123</p>
                       </td> 
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">Suite</p>  
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">
                            <input type="radio" name="rating2" value="yes" checked style="margin-left:65px;">Yes
                            <input type="radio" name="rating2" value="no" disabled style="margin-left:65px;">No
                        </p>		
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">
                            <input type="radio" name="rating2" value="yes" checked style="margin-left:65px;">Yes
                            <input type="radio" name="rating2" value="no" disabled style="margin-left:65px;">No
                        </p>		
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">8.00 AM</p>  
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">8.00 PM</p>  
                       </td>
                    </tr>
                    <tr>
                        <td style ="border: 1px solid white;">
                         <p style = "font-family :Lato; font-size:15px; color :white;">P124</p>
                        </td> 
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">Panoramic</p>  
                        </td>
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:20px; color :white;">
                                <input type="radio" name="rating2" value="yes" checked style="margin-left:65px;">Yes
                                <input type="radio" name="rating2" value="no" disabled style="margin-left:65px;">No
                            </p>		
                        </td>
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:20px; color :white;">
                                <input type="radio" name="rating2" value="yes" checked style="margin-left:65px;">Yes
                                <input type="radio" name="rating2" value="no" disabled style="margin-left:65px;">No
                            </p>		
                        </td>
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">Null</p>  
                        </td>
                        <td style ="border: 1px solid white;">
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
                        <p style = "font-family :Lato; font-size:15px; color :rgb(240, 16, 16);cursor:pointer;"><u>Show more rows</u></p>
                    </td>
                     </tr>
            </table>
        </td>
    </tr>
	</table>
    <table style ="position:absolute; top : 700px; width:100%;border: 1px solid white;" >
    <tr>
        <th style ="border: 1px solid white;">
			<p style = "font-family :Lato; font-size:20px; color :white;">For Dine-in</p>		
        </th>
    </tr>
    <tr>
        <td align ="center">
            <img src = "../Images/BIgCal.png" height = "10%" >
        </td>
    </tr>
    <tr>
        <td>
            <table style ="width:100%;border: 1px solid white;">
                <tr>
                    <th style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">Table No</p>		
                    </th>
                    <th style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">Meal Preference</p>		
                    </th>
                    <th style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">Booked</p>		
                    </th>
                    <th style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">Time Period</p>		
                    </th>
                    </tr>
                    <tr>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">T12</p>
                       </td> 
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">Lunch</p>  
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:20px; color :white;">
                            <input type="radio" name="rating2" value="yes" checked style="margin-left:65px;">Yes
                            <input type="radio" name="rating2" value="no" disabled style="margin-left:65px;">No
                        </p>		
                       </td>
                       <td style ="border: 1px solid white;">
                        <p style = "font-family :Lato; font-size:15px; color :white;">12.30 PM - 16.30 PM </p>  
                       </td>
                    </tr>
                    <tr>
                        <td style ="border: 1px solid white;">
                         <p style = "font-family :Lato; font-size:15px; color :white;">T10</p>
                        </td> 
                        <td style ="border: 1px solid white;">
                         <p style = "font-family :Lato; font-size:15px; color :white;">Dinner</p>  
                        </td>
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:20px; color :white;">
                                <input type="radio" name="rating2" value="yes" checked style="margin-left:65px;">Yes
                                <input type="radio" name="rating2" value="no" disabled style="margin-left:65px;">No
                            </p>		
                        </td>
                        <td style ="border: 1px solid white;">
                         <p style = "font-family :Lato; font-size:15px; color :white;">18.30 PM - 21.30 PM </p>  
                        </td>
                     </tr>
                     <tr>
                        <td style ="border: 1px solid white;">
                         <p style = "font-family :Lato; font-size:15px; color :white;">T02</p>
                        </td> 
                        <td style ="border: 1px solid white;">
                         <p style = "font-family :Lato; font-size:15px; color :white;">Breakfast</p>  
                        </td>
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:20px; color :white;">
                                <input type="radio" name="rating2" value="yes" checked style="margin-left:65px;">Yes
                                <input type="radio" name="rating2" value="no" disabled style="margin-left:65px;">No
                            </p>		
                        </td>
                        <td style ="border: 1px solid white;">
                         <p style = "font-family :Lato; font-size:15px; color :white;">9.00 AM - 10.00 AM </p>  
                        </td>
                     </tr>
                     <tr>
                        <td style ="border: 1px solid white;">
                         <p style = "font-family :Lato; font-size:15px; color :white;">T11</p>
                        </td> 
                        <td style ="border: 1px solid white;">
                         <p style = "font-family :Lato; font-size:15px; color :white;">Lunch</p>  
                        </td>
                        <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:20px; color :white;">
                                <input type="radio" name="rating2" value="yes" checked style="margin-left:65px;">Yes
                                <input type="radio" name="rating2" value="no" disabled style="margin-left:65px;">No
                            </p>		
                        </td>
                        <td style ="border: 1px solid white;">
                         <p style = "font-family :Lato; font-size:15px; color :white;">12.30 PM - 16.30 PM </p>  
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
    <table style ="position:absolute; top : 1140px; width:100%;border: 1px solid white;" >
        <tr>
            <th style ="border: 1px solid white;">
                <p style = "font-family :Lato; font-size:20px; color :white;">For Events</p>		
            </th>
        </tr>
        <tr>
            <td align ="center">
                <img src = "../Images/BIgCal.png" height = "10%" >
            </td>
        </tr>
        <tr>
            <td>
                <table style ="width:100%;border: 1px solid white;">
                    <tr>
                        <th style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:20px; color :white;">Location</p>		
                        </th>
                        <th style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:20px; color :white;">Meal Schedule</p>		
                        </th>
                        <th style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:20px; color :white;">Booked</p>		
                        </th>
                        <th style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:20px; color :white;">Time Period</p>		
                        </th>
                        </tr>
                        <tr>
                           <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">Pool Area</p>
                           </td> 
                           <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">Full Day</p>  
                           </td>
                           <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:20px; color :white;">
                                <input type="radio" name="rating2" value="yes" checked style="margin-left:65px;">Yes
                                <input type="radio" name="rating2" value="no" disabled style="margin-left:65px;">No
                            </p>		
                           </td>
                           <td style ="border: 1px solid white;">
                            <p style = "font-family :Lato; font-size:15px; color :white;">9.00 AM - 10.00 PM</p>  
                           </td>
                        </tr>
                        <tr>
                            <td style ="border: 1px solid white;">
                             <p style = "font-family :Lato; font-size:15px; color :white;">Banquet Hall</p>
                            </td> 
                            <td style ="border: 1px solid white;">
                             <p style = "font-family :Lato; font-size:15px; color :white;">Half Day</p>  
                            </td>
                            <td style ="border: 1px solid white;">
                                <p style = "font-family :Lato; font-size:20px; color :white;">
                                    <input type="radio" name="rating2" value="yes" checked style="margin-left:65px;">Yes
                                    <input type="radio" name="rating2" value="no" disabled style="margin-left:65px;">No
                                </p>		
                            </td>
                            <td style ="border: 1px solid white;">
                             <p style = "font-family :Lato; font-size:15px; color :white;">11.00 AM - 18.30PM </p>  
                            </td>
                         </tr>
                         <tr>
                            <td style ="border: 1px solid white;">
                             <p style = "font-family :Lato; font-size:15px; color :white;">Garden</p>
                            </td> 
                            <td style ="border: 1px solid white;">
                             <p style = "font-family :Lato; font-size:15px; color :white;">Half Day</p>  
                            </td>
                            <td style ="border: 1px solid white;">
                                <p style = "font-family :Lato; font-size:20px; color :white;">
                                    <input type="radio" name="rating2" value="yes" checked style="margin-left:65px;">Yes
                                    <input type="radio" name="rating2" value="no" disabled style="margin-left:65px;">No
                                </p>		
                            </td>
                            <td style ="border: 1px solid white;">
                             <p style = "font-family :Lato; font-size:15px; color :white;">9.00 AM - 1 PM </p>  
                            </td>
                         </tr>
                         <tr>
                            <td style ="border: 1px solid white;">
                             <p style = "font-family :Lato; font-size:15px; color :white;">T11</p>
                            </td> 
                            <td style ="border: 1px solid white;">
                             <p style = "font-family :Lato; font-size:15px; color :white;">Lunch</p>  
                            </td>
                            <td style ="border: 1px solid white;">
                                <p style = "font-family :Lato; font-size:20px; color :white;">
                                    <input type="radio" name="rating2" value="yes" checked style="margin-left:65px;">Yes
                                    <input type="radio" name="rating2" value="no" disabled style="margin-left:65px;">No
                                </p>		
                            </td>
                            <td style ="border: 1px solid white;">
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