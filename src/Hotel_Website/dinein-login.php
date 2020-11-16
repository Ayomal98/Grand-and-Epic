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
    <title>Grand & Epic</title>
    <link rel="stylesheet" href="../Css/style.css">
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="header-container-dinein" id="header-container">
        <!--to include the sticky nav bar -->
        <?php include("sticky-nav.php"); ?>

        <!--to include the side nav bar -->
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
    <div class="body-container dinein">
        <h3>Dining</h3>
        <p style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;margin:20px 30px;">High on the 6th floor, offering panoramic views from its full length glass windows, the Araliya Restaurant is our main dining area. Tempting spreads are laid at breakfast, lunch and dinner plying you with an array of cuisine from traditional Sri Lankan to international fare. Come nightfall, a flute plays sweet melodies, the stars glimmer, and a sumptuous barbecue sizzle.</p>
        <h3 style="color:#ffb515;">ARALIYA RESTAURANT</h3>
        <div class="open-close">
            <div style="border-left:none;background-color:#B88B4A;color:#F4FFFD;margin:auto 0px;">Opening Hours &emsp;<i class="fa fa-clock-o" aria-hidden="true"></i>
            </div>
            <div style="color:#B88B4A;">Breakfast Time &emsp; 8.00 A.M to 10.00 A.M</div>
            <div style="color:#B88B4A;">Lunch Time &emsp; 12.00 P.M to 2.00 P.M</div>
            <div style="color:#B88B4A;">Dinner Time &emsp; 7.30 P.M to 9.30 P.M</div>
        </div>
        <button class="book" style="color:black;background-color:goldenrod;padding:15px;margin-top:10px;"><a href="dinein-booking-form.php" target="_blank">Book Now</a></button>
        <div class="img-dinein-container">
            <img src="../Images/pexels-lee-hnetinka-1679825.jpg" alt="">
            <img src="../Images/pexels-mat-brown-1395964.jpg" alt="">
        </div>
        <div class="dine-in-details">
            <div><i class="fa fa-columns"><span style="display:inline-block">No.Of Tables</span><span style="display: block;margin-left:35px;">15</span></i></div>
            <div><i class="fa fa-cutlery"><span style="display:inline-block">Cuisine type </span><span style="display: block;margin-left:35px;"">International Buffet</span></i> </div>
            <div><i class=" fas fa-wifi"><span style="display:block;margin-left:-15px">Available</span></i></div>
            <div><i class="far fa-window-close"><span style="display:inline-block">Cancellation </span><span style="display:block;margin-left:35px"> Anytime</span></i></div>

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