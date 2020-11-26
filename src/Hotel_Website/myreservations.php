<?php

include("../../public/includes/session.php");
checkSession();
if (!isset($_SESSION['First_Name'])) {
    header('Location:index.php');
}
include("../../config/connection.php");
$email = $_SESSION["User_Email"];
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

<body>
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
        <i class="fas fa-chart-bar" style="position:absolute;font-size:40px;left:50px;top:750px;"></i>
        <label for="" style="position:absolute;font-size:20px;left:100px;font-weight:bolder;top:760px;">Number Of Total Bookings : 6</label>
        <input type="button" value="Deactivate Account" style="padding:10px;border:none;border-radius:10px;background-color:black;color:white;position:absolute;top:750px;right:280px;cursor:pointer;">
        <input type="button" value="Apply Customer Loyalty Promotion" style="padding:10px;border:none;border-radius:10px;background-color:black;color:white;position:absolute;top:750px;right:30px;cursor:pointer;">
        <input type="button" value="Edit Profile" style="padding:10px;border:none;border-radius:10px;background-color:black;color:white;position:absolute;top:750px;right:440px;cursor:pointer;">

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
        <div class="upcomig-reservation-box">
            <span style="font-weight: bolder;font-size:15px;margin-top:-40px;margin-left:25%;margin-bottom:10px;">Room Number : Suite 12</span>
            <table border="1px solid black" style="font-size:13px;border-radius:10px">
                <tr>
                    <th style="padding:5px 0px">Check-in Date</th>
                    <th style="padding:5px 0px">Check-in Time</th>
                    <th style="padding:5px 0px">Check-out Date</th>
                    <th style="padding:5px 0px">Check-out Time</th>
                </tr>
                <tr>
                    <td style="padding-left:7px">29th November</td>
                    <td style="padding-left:7px">12.30 P.M</td>
                    <td style="padding-left:7px">31st November</td>
                    <td style="padding-left:7px">12.30 P.M</td>
                </tr>
            </table>
            <table border="1px solid black" style="font-size:13px;border-radius:10px;margin-top:20px;width:60%;margin-left:50px">
                <tr>
                    <th style="padding:5px">Amount Paid</th>
                    <th style="padding:5px">Amount to be Paid</th>
                </tr>
                <tr>
                    <td style="padding-left: 15px;">Rs.16,000/=</td>
                    <td style="padding-left: 15px;">Rs.64,000/=</td>
                </tr>
            </table>
            <!-- <span style="font-weight: bold;font-size:15px;">Room Number : Suite-12</span>
            <span style="font-weight: bold;font-size:15px;">Check-In Date: &nbsp;<span>29th of November 2020</span></span>
            <span style="font-weight: bold;font-size:15px;">Check-In Time: &nbsp;<span>12.30 P.M</span></span>
            <span style="font-weight: bold;font-size:15px;">Check-Out Date: &nbsp;<span>21st of November 2020</span></span>
            <span style="font-weight: bold;font-size:15px;">Check-Out Time: &nbsp;<span>12.30 P.M</span></span>
            <span style="font-weight: bold;font-size:15px;">Amount Paid: Rs. 16,000/=</span>
            <span style="font-weight: bold;font-size:15px;">Amount left to paid: Rs.64,000/=</span> -->
            <div class="book-btn-container" style="margin-top:10px">
                <button class="book update" style="padding: 10px 10px 10px 10px;font-size:13px;margin-left:10px;width:36%;height:40px;text-align:center;margin-top:25px" id="btn-early-checkout">Request Early Checkouts</button>
                <button class="book delete" style="padding: 10px 10px 10px 10px;font-size:14px;margin-left:50px;width:35%;height:40px;text-align:center;margin-top:23px" id="cancel-stayingin">Cancel Booking</button>
            </div>
        </div>
        <?php include("./request-early-checkout-form.php") ?>
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
                                    <a href=\"update-dinein-booking-form.php?dinein_id=$dinein_id\" target=\"_blank\"><input type=\"button\" type=\"text\" name=\"Update\" value=\"Update Booking\" class=\"book update\" style=\"padding: 15px 65px 25px 20px;font-size:15px;margin-left:20px;width:70%;height:25%;text-align:center;border:none;\"></a>
                                    <input type=\"submit\" type=\"text\" name=\"Delete\" value=\"Cancel Booking\" class=\"book update\" style=\"padding: 15px 65px 5px 20px;font-size:15px;margin-left:10px;width:38%;height:40px;text-align:center;border:none;margin-left:20px;\">
                                </div>    
                            </form>
                            </div>";
            }
        }
        ?>
        <br>
    </div>
    <div style="margin-bottom: 50px;">
        <u>
            <h3 style="text-align: center;">Past Reservations</h3>
        </u>
        <div class="upcomig-reservation-box past" style="margin-left: 10px;">
            <div style="display:flex;margin-top:-40px;margin-bottom:10px">
                <span style="font-weight: bold;font-size:15px;margin-right:35px">Staying-in ID : 48</span>
                <span style="font-weight: bold;font-size:15px;">Room Number : Panaromic 13</span>
            </div>
            <table border="1px solid black" style="margin-top: 15px;font-size:13px;border-radius:10px">
                <tr>
                    <th>Check-In Date</th>
                    <th>Check-In Time</th>
                    <th>Check-Out Date</th>
                    <th>Check-Out Time</th>
                </tr>
                <tr>
                    <td style="padding-left:5px">20th November 2020</td>
                    <td style="padding-left:5px">8.30 A.M.</td>
                    <td style="padding-left:5px">23th November 2020</td>
                    <td style="padding-left:5px">12.30 P.M.</td>
                </tr>
            </table>
            <table border="1px solid black" style="margin-top: 15px;font-size:13px;border-radius:10px;width:30%;margin-left:27%">
                <tr>
                    <th style="padding: 5px;">Total Amount </th>
                    <td style="padding: 5px;">Rs.60,000/=</td>
                </tr>
            </table>
            <!-- <span style="font-weight: bold;font-size:15px;">Staying-in ID : 48</span>
            <span style="font-weight: bold;font-size:15px;">Room Number : Panaromic-13</span>
            <span style="font-weight: bold;font-size:15px;">Check-In Date: &nbsp;<span>21st of November 2020</span></span>
            <span style="font-weight: bold;font-size:15px;">Check-In Time: &nbsp;<span>12.30 P.M</span></span>
            <span style="font-weight: bold;font-size:15px;">Check-Out Date: &nbsp;<span>22st of November 2020</span></span>
            <span style="font-weight: bold;font-size:15px;">Check-Out Time: &nbsp;<span>12.30 P.M</span></span> -->
            <div class="book-btn-container">
                <button class="book update" style="padding: 15px 15px 25px 15px;font-size:15px;margin-left:100px;width:40%;height:40%;text-align:center;margin-top:30px" id="btn-feedback">Provide Feedback</button>

            </div>
        </div>

    </div>
    <?php include('customerfeedback-form.php'); ?>


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
    </script>
    <script src="../../public/Javascript/sticky-nav.js"></script>

</body>

</html>