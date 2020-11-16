<?php
session_start();
$username = $_SESSION['First_Name'];
$email = $_SESSION['User_Email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accomodations</title>
    <link rel="stylesheet" href="../Css/style.css">
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="page-wrapper">
        <div class="header-container-accomodations" id="header-container">
            <?php include("sticky-nav.php"); ?>
            <?php include("side-nav-login.php"); ?>
            <span class="fa fa-user" style="position:absolute;top:20px;right:40px;font-size:60px;color:white"><span class="far fa-caret-square-down" style="font-size:20px;margin-left:10px;" onclick="funcUserDetails()"></span></span>
            <!--<br><span style="position:absolute;top:100px;right:40px;font-size:20px;color:white"></span>-->
            <div id="user-detail-container">
                <span class="fa fa-window-close" style="margin-left:130px;" onclick="funcCloseUserDetails()"></span>
                <p style="margin-bottom: 10px;"><?php echo "Logged in as $username"; ?></P>
                <hr style="color:teal">
                <a href="logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:5px;margin-left:85px;padding:5px;background-color:black;color:white;border-radius:5px;cursor:pointer"></a>

            </div>

            <div class="text-container">
                <span class="text1">Grand &</span>
                <span class="text2">Epic
                </span>
            </div>
        </div>
        <div class="body-container accomodations">
            <div class="accomodation-wrapper">
                <h3>Accomodations</h3>
                <div class="icons-check-in-out" style="text-align:center;padding:10px;">
                    <span class="fas fa-clock-o" id="clock-icon" aria-hidden="true" style="display: block;color:black">Check In : &nbsp; 12.30 P.M</span>
                    <span class="fas fa-clock-o" id="clock-icon" aria-hidden="true" style="display: block;color:black">Check Out : &nbsp; 2.00 P.M </span>
                </div>
            </div>
            <div class="room-container">
                <div class="card-rooms">
                    <h2 class="card-room-header">Superior Rooms</h2>
                    <div class="card-room-img">
                        <img class="img-superior-rooms" src="../Images/CBB-Superior-Room-530X420.jpg" title="Superior Room interior" alt="Interior of Superior Room at GRAND & EPIC">
                    </div>
                    <div class="card-room-para" style="color:white;">In the heart of Sri Lanka, accommodation of the most indulgent kind awaits you at our Superior Rooms. Set in the Grand Wings you can relax in the comforts.</div>
                    <div class="view-book-wrapper">
                        <button class="view"><a href="Superior-Rooms-login.php">View Room</a></button>
                        <button class="book"><a href="">Book Now</a></button>
                    </div>
                </div>
                <div class="card-rooms">
                    <h2 class="card-room-header">Panaromic Rooms</h2>
                    <div class="card-room-img">
                        <img class="img-panaromic-rooms" src="../Images/content2.jpg" title="Superior Room interior" alt="Interior of Superior Room at GRAND & EPIC">
                    </div>
                    <div class="card-room-para">The Panoramic Rooms at Grand & Epic will provide do live up to their name. Your own private balcony will serve as your vantage point – any time. The views over the lake and the Dambulla rock are constant, yet ever changing.</div>
                    <div class="view-book-wrapper">
                        <button class="view"><a href="Panaromic-Rooms-login.php">View Room</a></button>
                        <button class="book"><a href="">Book Now</a></button>
                    </div>

                </div>
                <div class="card-rooms">
                    <h2 class="card-room-header">Suite Rooms</h2>
                    <div class="card-room-img">
                        <img class="img-panaromic-rooms" src="../Images/suite-image.jpg" title="Superior Room interior" alt="Interior of Superior Room at GRAND & EPIC">
                    </div>
                    <div class="card-room-para" style="color:white;">Wide views across the historic land of Sri Lanka, resort facilities of an exceptional kind and enough room for you to relax at complete ease – our suites are, indeed, rather special.</div>
                    <div class="view-book-wrapper">
                        <button class="view"><a href="Suite-Rooms-login.php">View Room</a></button>
                        <button class="book"><a href="">Book Now</a></button>
                    </div>
                </div>
            </div>
        </div>
        <?php include("footer-footer.php"); ?>
        <script src="../Javascript/script.js"></script>
        <script src="../Javascript/sticky-nav.js"></script>
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