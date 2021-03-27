<?php

include("../../public/includes/session.php");
checkSession();
if (!isset($_SESSION['First_Name'])) {
    header('Location:index.php');
}
include("../../config/connection.php");
$email = $_SESSION["User_Email"];

if (isset($_POST['Delete_StayingIn'])) {
    date_default_timezone_set('Asia/Colombo');
    $date = date('Y-m-d', time()); // todays date
    $checkInDate = $_POST['checkin_date'];
    $StayingIn = $_POST['stayingin_id'];
    $checkInBeforeFifteenDates = Date('Y-m-d', strtotime($date . '- 14 days')); //to get the fifteen dates from todate
    if ($date > $checkInBeforeFifteenDates) {
        echo '<script>
                alert("You wont be getting any money back ")
            </script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand & Epic</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>

    <style>
        option[value=""][disabled] {
            display: none;
        }
    </style>
</head>

<body id="main-body">
    <div class="header-container-userReservations" id="header-container">
        <?php include("../../public/includes/sticky-nav-login.php"); ?>
        <?php include("../../public/includes/side-nav-login.php"); ?>
        <span class="fa fa-user" style="position:absolute;top:20px;right:40px;font-size:60px;color:white"><span class="far fa-caret-square-down" style="font-size:20px;margin-left:10px;" onclick="funcUserDetails()"></span></span>
        <!--<br><span style="position:absolute;top:100px;right:40px;font-size:20px;color:white"></span>-->
        <div id="user-detail-container">
            <span class="fa fa-window-close" style="margin-left:130px;" onclick="funcCloseUserDetails()"></span>
            <p style="margin-bottom: 10px;"><?php echo "Logged in as " . $_SESSION['First_Name']; ?></P>
            <hr style="color:teal">
            <a href="logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:5px;margin-left:85px;padding:5px;background-color:black;color:white;border-radius:5px;cursor:pointer"></a>

        </div>
        <div class="text-container">
            <span class="text1">Grand &</span>
            <span class="text2">Epic
            </span>
        </div>
    </div>
    <div class="body-container-myreservations">
        <i class="fas fa-chart-bar" style="position:absolute;font-size:40px;left:50px;top:765px;"></i>
        <?php
        $selectNoBookings = mysqli_query($con, "SELECT No_Bookings FROM customer WHERE Email='" . $email . "'");
        $rowNoBookings = mysqli_fetch_assoc($selectNoBookings);
        $noBookings = $rowNoBookings['No_Bookings'];
        ?>
        <label for="" style="position:absolute;font-size:20px;left:100px;font-weight:bolder;top:775px;">Number Of Total Bookings : <?php echo $noBookings; ?></label>
        <?php if (($noBookings != 0) && ($noBookings % 5) == 0) {
            echo '
                <input type="button" value="Apply Customer Loyalty Promotion" style="padding:10px;border:none;border-radius:10px;background-color:black;color:white;position:absolute;top:733px;right:30px;cursor:pointer;">
                <input type="button" value="Edit Profile" style="padding:10px;border:none;border-radius:10px;background-color:black;color:white;position:absolute;top:733px;right:300px;cursor:pointer;" onclick="editProfile()" id="edit-cusdetails-btn">
            ';
        } else {
            echo '
            <input type="button" value="Edit Profile" style="padding:10px;border:none;border-radius:10px;background-color:black;color:white;position:absolute;top:768px;right:100px;cursor:pointer;" onclick="editProfile()" id="edit-cusdetails-btn">
            ';
        } ?>

    </div>
    <h3><u>Upcoming Reservations</u></h3>

    <div style="display:none;width: 400px;height:200px;position:absolute;top:110vh;background-color:black;left:40%;border-radius:10px;padding:5px">
        <h3 style="color: white;padding-top:15px">Select Your Reservation Type</h3>
        <div>
            <select name="" id="">
                <option value="" disabled selected>Select Your Reservation</option>
                <option value="Staying-In">Staying In</option>
                <option value="Staying-In">Events In</option>
            </select>
        </div>
    </div>
    <div class="userBookings upcoming" id="user-bookings">

        <?php
        $selectStayingInBookings = mysqli_query($con, "SELECT * FROM stayingin_booking WHERE User_Email='$email'");
        if (mysqli_num_rows($selectStayingInBookings) > 0) {
            while ($rowSelectedStayingIn = mysqli_fetch_assoc($selectStayingInBookings)) {
                $rooomNumbers = unserialize($rowSelectedStayingIn['Room_Numbers']);
                $rooomType = $rowSelectedStayingIn["Room_Type"];
                $amountToPay = (int)$rowSelectedStayingIn['Total_Amount'] - (int)$rowSelectedStayingIn['Paid_Amount'];
                echo '<div class="upcomig-reservation-box">
                        <form action="" method="POST">
                            <span style="font-weight: bolder;font-size:15px;margin-top:-40px;margin-left:25%;margin-bottom:10px;">' . $rooomType . ' Numbers   :' . implode(",", $rooomNumbers) . '</span>
                            <table border="1px solid black" style="font-size:13px;border-radius:10px">
                                    <tr>
                                        <th style="padding:5px 0px">Check-in Date</th>
                                        <th style="padding:5px 0px">Check-in Time</th>
                                        <th style="padding:5px 0px">Check-out Date</th>
                                        <th style="padding:5px 0px">Check-out Time</th>
                                    </tr>
                                    <tr>
                                        <td style="padding-left:7px">' . $rowSelectedStayingIn['CheckIn_Date'] . '</td>
                                        <td style="padding-left:7px">' . $rowSelectedStayingIn['CheckIn_Time'] . '</td>
                                        <td style="padding-left:7px">' . $rowSelectedStayingIn['CheckOut_Date'] . '</td>
                                        <td style="padding-left:7px">' . $rowSelectedStayingIn['CheckIn_Time'] . '</td>
                                    </tr>
                            </table>
                            <table border="1px solid black" style="font-size:13px;border-radius:10px;margin-top:20px;width:60%;margin-left:50px">
                                    <tr>
                                        <th style="padding:5px">Amount Paid</th>
                                        <th style="padding:5px">Amount to be Paid</th>
                                    </tr>
                                    <tr>
                                        <td style="padding-left: 15px;">Rs. ' . $rowSelectedStayingIn['Paid_Amount'] . '/=</td>
                                        <td style="padding-left: 15px;">Rs.' . $amountToPay . '/=</td>
                                    </tr>
                            </table>      
                            <input type="hidden" name="checkin_date" value=' . $rowSelectedStayingIn['CheckIn_Date'] . '>          
                            <input type="hidden" name="stayingin_id" value=' . $rowSelectedStayingIn['StayingIn_ID'] . ' >
                            <div class="book-btn-container" style="margin-top:10px">
                                <a href="request-early-checkout-form.php?id=' . $rowSelectedStayingIn['StayingIn_ID'] . '" target="_blank"><button name="" class="book update" style="padding: 10px 10px 10px 10px;font-size:12px;margin-left:10px;width:55%;height:40px;text-align:center;margin-top:25px;border-radius:5px" id="btn-early-checkout" >Request Early Checkouts</button></a>
                                <input type="submit" name="Delete_StayingIn" class="book delete" style="padding: 10px 10px 10px 10px;font-size:12px;margin-left:14px;width:35%;height:40px;text-align:center;margin-top:23px;border-radius:5px" id="cancel-stayingin" value="Cancel Booking">
                            </div>
                        </form>
                    </div>';
            }
        }
        ?>

        <!-- <span style="font-weight: bold;font-size:15px;">Room Number : Suite-12</span>
            <span style="font-weight: bold;font-size:15px;">Check-In Date: &nbsp;<span>29th of November 2020</span></span>
            <span style="font-weight: bold;font-size:15px;">Check-In Time: &nbsp;<span>12.30 P.M</span></span>
            <span style="font-weight: bold;font-size:15px;">Check-Out Date: &nbsp;<span>21st of November 2020</span></span>
            <span style="font-weight: bold;font-size:15px;">Check-Out Time: &nbsp;<span>12.30 P.M</span></span>
            <span style="font-weight: bold;font-size:15px;">Amount Paid: Rs. 16,000/=</span>
            <span style="font-weight: bold;font-size:15px;">Amount left to paid: Rs.64,000/=</span> -->
        <!-- Including the early-checkout request form -->


        <?php
        $table_no;
        $date;
        $time;
        $numguests;
        preg_match_all("/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i", $email, $matches); //to convert text type email into email type
        $email1 = ($matches[0][0]);
        $query = "SELECT Dinein_ID,Table_No,Date,Time,Num_Guests FROM dinein_booking WHERE Customer_Email ='$email1' ";

        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $dinein_id = $row['Dinein_ID'];
                $table_no = $row['Table_No'];
                $_SESSION['table_no'] = $table_no;
                $date = $row['Date'];
                $time = $row['Time'];
                $numguests = $row['Num_Guests'];
                echo "<div class=\"upcomig-reservation-box\">
                            <form action=\"update-delete-dinein.php\" method=\"POST\" id=\"showData\">
                                <div style=\"margin-top:10px;margin-bottom:5px;display:flex;flex-direction:row\">
                                    <div style=\"display:inline-block;\">    
                                    <span style=\"font-weight: bold;font-size:20px\">Dine-in ID:</span><br>
                                    <input type=\"text\" name=\"dinein_id\" value=\"$dinein_id\" style=\"padding-left:10px\">
                                    </div>
                                    <div style=\"display:inline-block;margin-left:15px;margin-top:-3px;\"> 
                                    <span style=\"font-weight: bold;font-size:20px\">Table No:</span><br>
                                    <input type=\"text\" name=\"table_no\" value=\"$table_no\" style=\"padding-left:10px;margin-top:3px\">
                                    </div>
                                </div>
                                <div style=\"margin-top:-5px;margin-bottom:5px;display:flex;flex-direction:row\">
                                    <div style=\"display:inline-block;margin-top:5px;\">    
                                        <span style=\"font-weight: bold;font-size:20px;\">Date: </span><br>
                                        <input type=\"text\" name=\"date\" value=\"$date\" style=\"padding-left:10px\">
                                    </div>
                                    <div style=\"display:inline-block;margin-left:15px;margin-top:5px;\">    
                                        <span style=\"font-weight: bold;font-size:20px\">Time:</span><br>
                                        <input type=\"text\" name=\"time\" value=\"$time\" style=\"padding-left:10px\">
                                    </div> 
                                </div>
                                <div style=\"display:flex;flex-direction:column;justify-content:center;align-items:center;margin-top:10px;\">   
                                    <span style=\"font-weight: bold;font-size:20px\">Number Of Guests:</span><br>
                                    <input type=\"text\" name=\"numguestes\" value=\"$numguests\" style=\"margin-top:-10px;padding-left:50px;\">
                                </div>    
                                <div class=\"book-btn-container\" style=\"margin-top:20px;display:flex;flex-direction:row;margin-bottom:15px;\">    
                                    <a href=\"update-dinein-booking-form.php?dinein_id=$dinein_id\" target=\"_blank\"><input type=\"button\" type=\"text\" name=\"Update\" value=\"Update Booking\" class=\"book update\" style=\"padding: 15px 65px 25px 20px;font-size:15px;margin-left:20px;width:70%;height:25%;text-align:center;border:none;border-radius:5px\"></a>
                                    <input type=\"submit\" type=\"text\" name=\"Delete\" value=\"Cancel Booking\" class=\"book update\" style=\"padding: 15px 65px 5px 20px;font-size:15px;margin-left:10px;width:38%;height:40px;text-align:center;border:none;margin-left:20px;border-radius:5px\">
                                </div>    
                            </form>
                            </div>";
            }
        }
        ?>
        <?php
        $selectEvtBookings = mysqli_query($con, "SELECT * FROM events_booking WHERE Customer_Email='$email'");
        if (mysqli_num_rows($selectEvtBookings) > 0) {
            while ($rowEvtBookings = mysqli_fetch_assoc($selectEvtBookings)) {
                $amountEvtPay = (int)$rowEvtBookings['Total_Amount'] - (int)$rowEvtBookings['Paid_Amount'];
                echo ' <div class="upcomig-reservation-box">
                            <form action="" method="POST">
                                <span style="font-weight: bolder;font-size:15px;margin-top:-40px;margin-left:25%;margin-bottom:10px;">Event Type :' . $rowEvtBookings['Event_Type'] . '</span>
                                <table border="1px solid black" style="font-size:13px;border-radius:10px">
                                    <tr>
                                        <th style="padding:5px 0px">Event Date</th>
                                        <th style="padding:5px 0px">Starting Time</th>
                                        <th style="padding:5px 0px">Ending Time</th>
                                        <th style="padding:5px 0px">No_Guests</th>
                                    </tr>
                                    <tr>
                                        <td style="padding-left:7px">' . $rowEvtBookings['Reservation_Date'] . '</td>
                                        <td style="padding-left:7px">' . $rowEvtBookings['Starting_Time'] . '</td>
                                        <td style="padding-left:7px">' . $rowEvtBookings['Ending_Time'] . '</td>
                                        <td style="padding-left:7px">' . $rowEvtBookings['Num_Guests'] . '</td>
                                    </tr>
                                </table>
                                <table border="1px solid black" style="font-size:13px;border-radius:10px;margin-top:20px;width:60%;margin-left:50px">
                                    <tr>
                                        <th style="padding:5px">Amount Paid</th>
                                        <th style="padding:5px">Amount to be Paid</th>
                                    </tr>
                                    <tr>
                                        <td style="padding-left: 15px;">Rs. ' . $rowEvtBookings['Paid_Amount'] . '/=</td>
                                        <td style="padding-left: 15px;">Rs.' . $amountEvtPay     . '/=</td>
                                    </tr>
                                </table>
                                <div class="book-btn-container" style="margin-top:10px">
                                    <input type="submit" name="Update_Events" class="book update" style="padding: 10px 10px 10px 10px;font-size:13px;margin-left:10px;width:38%;height:40px;text-align:center;margin-top:25px;border-radius:5px" id="btn-early-checkout" value="Update Booking">
                                    <input type="submit" name="Delete_Events" class="book delete" style="padding: 10px 10px 10px 10px;font-size:14px;margin-left:50px;width:40%;height:40px;text-align:center;margin-top:23px;border-radius:5px" id="cancel-stayingin" value="Cancel Booking">
                                </div>
                            </form>
                        </div>

               ';
            }
        }
        ?>
    </div>
    <br>

    <u>
        <h3 style="text-align: center;">Past Reservations</h3>
    </u>
    <div style="margin-bottom: 50px;" class="userBookings upcoming" id="user-bookings">
        <?php
        $paymentStatus = 1;
        $selectPastBookings = mysqli_query($con, "SELECT * FROM reservation WHERE User_Email='" . $email . "' AND Payment_Status='$paymentStatus'");
        if (mysqli_num_rows($selectPastBookings) > 0) {
            while ($rowPastBookings = mysqli_fetch_assoc($selectPastBookings)) {
                if ($rowPastBookings["Reservation_Type"] == 'events') {
                    $id = $rowPastBookings['Booking_ID'];
                    $reservationID = $rowPastBookings['Reservation_ID'];
                    $selectBookingsFromEvents = mysqli_query($con, "SELECT * FROM events_booking WHERE Events_ID='" . $id . "'");
                    $rowBookingEvents = mysqli_fetch_assoc($selectBookingsFromEvents);
                    $packageID = $rowBookingEvents['MealPackage_ID'];
                    $selectPackagePrice = mysqli_query($con, "SELECT * FROM events_meals_packages WHERE Package_ID='" . $packageID . "'");
                    $rowPackagePrice = mysqli_fetch_assoc($selectPackagePrice);
                    $MealPrice = $rowPackagePrice['price'] * $rowBookingEvents['Num_Guests'];
                    $locationPrice = $rowBookingEvents['Total_Amount'] - $MealPrice;
                    echo '
                    <div class="upcomig-reservation-box" style="margin-left: 10px;height:100%;width:100%">
                            <div style="display:flex;margin-top:-100px;">
                                <span style="font-weight: bold;font-size:15px;margin-right:95px">Events ID : ' . $rowBookingEvents['Events_ID'] . '</span>
                                <span style="font-weight: bold;font-size:15px;">Event Type : ' . $rowBookingEvents['Event_Type'] . '</span>
                            </div>
                            <table border="1px solid black" style="margin-top: 15px;font-size:13px;border-radius:10px">
                                <tr>
                                    <th style="padding:7px">Event Date</th>
                                    <th style="padding:3px">Starting Time</th>
                                    <th style="padding:3px">Ending Time</th>
                                    <th style="padding:3px">Number Of Guests</th>
                                </tr>
                                <tr>
                                    <td style="padding:5px">' . $rowBookingEvents['Reservation_Date'] . '</td>
                                    <td style="padding:4px">' . $rowBookingEvents['Starting_Time'] . '</td>
                                    <td style="padding:4px">' . $rowBookingEvents['Ending_Time'] . '</td>
                                    <td style="padding:2px">' . $rowBookingEvents['Num_Guests'] . '</td>
                                </tr>
                            </table>
                            <table border="1px solid black" style="margin-top: 15px;font-size:13px;border-radius:10px;width:30%;margin-left:0%">
                                <tr>
                                    <th style="padding: 5px;">Location Amount </th>
                                    <td style="padding: 5px;">Rs. ' . $locationPrice . '.00</td>
                                    <th style="padding: 5px;">Meal Amount </th>
                                    <td style="padding: 5px;">Rs. ' . $MealPrice . '.00</td>
                                    <th style="padding: 5px;">Total Amount </th>
                                    <td style="padding: 5px;">Rs. ' . $rowBookingEvents['Total_Amount'] . '.00</td>
                                </tr>
                            </table>
                                <div class="book-btn-container" style="margin-bottom:-120px">
                                        <a href="customerfeedback-form.php?id=' . $reservationID . '" target="_blank"><button class="book update" style="padding: 15px 15px 25px 15px;font-size:15px;margin-left:100px;width:40%;height:40%;text-align:center;margin-top:30px;border-radius:5px" id="btn-feedback">Provide Feedback</button></a>
                                </div>
                    </div>';
                } else {
                    $id = $rowPastBookings['Booking_ID'];
                    $reservationID = $rowPastBookings['Reservation_ID'];
                    $selectBookingsFromStayingIn = mysqli_query($con, "SELECT * FROM stayingin_booking WHERE StayingIn_ID='" . $id . "'");
                    $rowStayingIn = mysqli_fetch_assoc($selectBookingsFromStayingIn);
                    $rooomNumbers = unserialize($rowStayingIn['Room_Numbers']);
                    echo '
                    <div class="upcomig-reservation-box" style="margin-left: 10px;height:100%;width:100%">
                            <div style="display:flex;margin-top:0px;margin-bottom:7px">
                                <span style="font-weight: bold;font-size:13.75px;margin-right:8px">Events ID : ' . $rowStayingIn['StayingIn_ID'] . '</span>
                                <span style="font-weight: bold;font-size:13.75px;margin-right:8px">Room Type : ' . $rowStayingIn['Room_Type'] . '</span>
                                <span style="font-weight: bold;font-size:15px;">Room Numbers : ' . implode(",", $rooomNumbers) . '</span>
                            </div>
                            <table border="1px solid black" style="margin-top: 15px;font-size:13px;border-radius:10px">
                                <tr>
                                    <th style="padding:7px">Check In Date</th>
                                    <th style="padding:3px">CheckOut Date</th>
                                    <th style="padding:3px">CheckIn Time</th>
                                    <th style="padding:3px">Number Of Guests</th>
                                    <th style="padding:3px">Meal Type</th>
                                    <th style="padding:3px">Reservation Type</th>
                                </tr>
                                <tr>
                                    <td style="padding:5px">' . $rowStayingIn['CheckIn_Date'] . '</td>
                                    <td style="padding:4px">' . $rowStayingIn['CheckOut_Date'] . '</td>
                                    <td style="padding:4px">' . $rowStayingIn['CheckIn_Time'] . '</td>
                                    <td style="padding:2px">' . $rowStayingIn['CheckOut_Time'] . '</td>
                                    <td style="padding:2px">' . $rowStayingIn['Meal_Selection'] . '</td>
                                    <td style="padding:2px">' . $rowStayingIn['Reservation_Type'] . '</td>

                                </tr>
                            </table>
                            <table border="1px solid black" style="margin-top: 15px;font-size:13px;border-radius:10px;width:50%;margin-left:5%">
                                <tr>
                                    <th style="padding: 10px;">Room Prce </th>
                                    <td style="padding: 5px;">Rs. ' . $rowStayingIn['Room_Price'] . '.00</td>
                                    <th style="padding: 10px;">Meal Price </th>
                                    <td style="padding: 5px;">Rs. ' . $rowStayingIn['Meal_Price'] . '.00</td>
                                    <th style="padding: 10px;">Total Amount </th>
                                    <td style="padding: 5px;">Rs. ' . $rowStayingIn['Total_Amount'] . '.00</td>
                                </tr>
                            </table>
                            <div class="book-btn-container">
                                <a href="customerfeedback-form.php?id=' . $reservationID . '" target="_blank"><button class="book update" style="padding: 15px 15px 25px 15px;font-size:15px;margin-left:100px;width:40%;height:40%;text-align:center;margin-top:30px;border-radius:5px" id="btn-feedback">Provide Feedback</button></a>
                            </div>
                    </div>
                    
                    ';
                }
            }
        }
        ?>


    </div>

    <?php include('./customer-edit-profile-form.php'); ?>
    <?php include("../../public/includes/footer-footer.php"); ?>
    <script src="../../public/Javascript/script.js"></script>

    <script>
        function funcUserDetails() {
            document.getElementById('user-detail-container').style.display = "block";
        }

        function funcCloseUserDetails() {
            document.getElementById('user-detail-container').style.display = "none";
        }
        // const myForm = document.getElementById('showData');
        // myForm.addEventListener("submit", (e) => {
        //     e.preventDefault();
        //     console.log("form has been submitted");
        //     const request=new XMLHttpRequest();
        //     request.open('post','update-delete-dinein.php')
        // })

        //to display the early checkout form
        document.getElementById('btn-early-checkout').addEventListener("click", function() {
            document.querySelector(".bg-modal-early-request").style.display = "flex";
            document.querySelector(".sticky-navbar").style.display = "none";
        })
        //to close the early checkout form
        document.querySelector(".close-early-checkout").addEventListener("click", function() {
            document.querySelector(".bg-modal-early-request").style.display = "none";
            document.querySelector(".sticky-navbar").style.display = "flex";
            document.querySelector(".stickyblack-nav").style.display = "inline";
        })

        //to show a popup when cancel reservation clicked on 

        //to show the pop up for the customer feedack
        document.getElementById('btn-feedback').addEventListener("click", function() {
            document.querySelector(".bg-modal-customer-feedback").style.display = "flex";
            document.querySelector(".sticky-navbar").style.display = "none";
        })
        //to close the customer feedback form
        document.getElementById('close-early-checkout').addEventListener("click", function() {
            document.querySelector(".bg-modal-customer-feedback").style.display = "none";
            document.querySelector(".sticky-navbar").style.display = "flex";
            document.querySelector(".stickyblack-nav").style.display = "inline";
        })

        //to open the edit profile for the user
        function editProfile() {
            const position = document.getElementById('edit-cusdetails-btn').getBoundingClientRect();
            // console.log(position.top)
            // console.log(top)
            document.querySelector('.bg-modal-edit').style.display = "flex";
            // if (position.top < 200) {
            //     const top = `${position.top+400}px`
            //     document.querySelector('.bg-modal-edit').style.top = top;
            // }
            document.getElementsByTagName("body")[0].style.overflowY = "hidden";
        }

        function closeEdit() {
            document.querySelector('.bg-modal-edit').style.display = "none";
            document.getElementsByTagName("body")[0].style.overflowY = ""

        }
    </script>
    <script src="../../public/Javascript/sticky-nav.js"></script>

</body>

</html>

<?php
include('../../config/connection.php');
include('../../public/includes/id-generator.php');
if (isset($_POST['Provide_Feedback'])) {
    $customerFeedbackID = getID("customer_feedback", "CF");
    $reservationID = 'R001';
    $feedBackStaff = $_POST['feedback_staff'];
    $feedbackWebsite = $_POST['feedback_website'];
    $feedbackRate_Staff = $_POST['Staff_Rate'];
    $feedbackRate_Website = $_POST['Website_Rate'];
    // $user_Email = $_POST['user_email'];
    $status = 0;
    $insertCusFeedback = mysqli_query($con, "INSERT INTO customer_feedback(Feedback_ID,Reservation_ID,Feedback_Staff,Staff_Rate,Feedback_Website,Website_Rate,User_Email,Status) VALUES('$customerFeedbackID','$reservationID','$feedBackStaff','$feedbackRate_Staff','" . $feedbackWebsite . "','$feedbackRate_Website','$user_Email','$status')");
    if ($insertCusFeedback) {
        echo '<script>alert("Customer Feedback has been sent")
                window.location.href="myreservations.php"</script>';
    } else {
        echo '<script>alert("Customer Feedback has been not sent")
                window.location.href="myreservations.php"</script>';
    }
}
?>