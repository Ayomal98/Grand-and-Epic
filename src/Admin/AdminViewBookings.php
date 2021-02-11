<?php
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
    <style>
        body {
            height: 1500px;
        }
    </style>
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body bgcolor="black">

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
        <button class="dropdown-btn">Manage Co-admins(H.M)
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="AdminDashboard.php">
                <font size="4 px">Dashboard</font>
            </a>
            <a href="AdminRespondToLeaveRequests.php">
                <font size="4px">Respond to Leave Requests</font>
            </a>
            <a href="AdminViewBookings.php">
                <font size="4 px">View Booking Details</font>
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
                    <img src="../../public/images/Uvini.png" height="25%">
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
    <form style="font-size: 20px; width:98%; position:absolute; top:300px;">
        <fieldset>
            <legend style="color:white;">View Booking Details</legend>
            <table style="border: 1px solid white; width:100%">
                <tr>
                    <th>
                        <p style="font-family :Lato; font-size:20px; color :white;">For Staying-in</p>
                    </th>
                </tr>
                <tr>
                    <td align="center">
                        <img src="../../public/images/BIgCal.png" height=200>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="width:100%;border: 1px solid white;">
                            <tr>
                                <th style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:20px; color :white;">Room No</p>
                                </th>
                                <th style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:20px; color :white;">Room Type</p>
                                </th>
                                <th style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:20px; color :white;">isBooked</p>
                                </th>
                                <th style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:20px; color :white;">isStayingFullDay</p>
                                </th>
                                <th style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:20px; color :white;">Time Checked-in</p>
                                </th>
                                <th style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:20px; color :white;">Time Checked-out</p>
                                </th>
                            </tr>
                            <tr>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">S123</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">Superior</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">1</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">1</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">16.30 PM</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">Null</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">P123</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">Panoramic</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">1</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">1</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">10.00 AM</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">Null</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">Su123</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">Suite</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">1</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">1</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">8.00 AM</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">8.00 PM</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">P124</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">Panoramic</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">0</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">0</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">Null</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">Null</p>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td align="right">
                                    <p style="font-family :Lato; font-size:15px; color :rgb(240, 16, 16); cursor: pointer;">
                                        <u>Show more rows</u></p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table style="width:100%;border: 1px solid white;">
                <tr>
                    <th>
                        <p style="font-family :Lato; font-size:20px; color :white;">For Dine-in</p>
                    </th>
                </tr>
                <tr>
                    <td align="center">
                        <img src="../../public/images/BIgCal.png" height=200>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="width:100%;border: 1px solid white;">
                            <tr>
                                <th style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:20px; color :white;">Table No</p>
                                </th>
                                <th style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:20px; color :white;">Meal Preference</p>
                                </th>
                                <th style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:20px; color :white;">isBooked</p>
                                </th>
                                <th style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:20px; color :white;">Time Period</p>
                                </th>
                            </tr>
                            <tr>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">T12</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">Lunch</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">1</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">12.30 PM - 16.30 PM </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">T10</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">Dinner</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">1</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">18.30 PM - 21.30 PM </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">T02</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">Breakfast</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">1</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">9.00 AM - 10.00 AM </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">T11</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">Lunch</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">0</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">12.30 PM - 16.30 PM </p>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td align="right">
                                    <p style="font-family :Lato; font-size:15px; color :rgb(240, 16, 16); cursor: pointer;">
                                        <u>Show more rows</u></p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table style="width:100%; border:1px solid white;">
                <tr>
                    <th>
                        <p style="font-family :Lato; font-size:20px; color :white;">For Events</p>
                    </th>
                </tr>
                <tr>
                    <td align="center">
                        <img src="../../public/images/BIgCal.png" height=200>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="width:100%;border: 1px solid white;">
                            <tr>
                                <th style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:20px; color :white;">Location</p>
                                </th>
                                <th style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:20px; color :white;">Meal Schedule</p>
                                </th>
                                <th style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:20px; color :white;">isBooked</p>
                                </th>
                                <th style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:20px; color :white;">Time Period</p>
                                </th>
                            </tr>
                            <tr>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">Pool Area</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">Full Day</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">1</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">9.00 AM - 10.00 PM</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">Banquet Hall</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">Half Day</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">1</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">11.00 AM - 18.30PM </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">Garden</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">Half Day</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">1</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">9.00 AM - 1 PM </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">T11</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">Lunch</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">0</p>
                                </td>
                                <td style="border: 1px solid white;">
                                    <p style="font-family :Lato; font-size:15px; color :white;">Null </p>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td align="right">
                                    <p style="font-family :Lato; font-size:15px; color :rgb(240, 16, 16);cursor:pointer;">
                                        <u>Show more rows</u></p>
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