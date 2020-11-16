<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panaromic Rooms</title>
    <link rel="stylesheet" href="../Css/style.css">
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="page-wrapper">
        <div class="header-container-SuperiorRooms" id="header-container">
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
        <div class="body-container Suite-Rooms">
            <div class="suite-rooms-wrapper">
                <h3>Suite Rooms</h3>
                <div class="suite-room-content">
                    <p>Wide views across the historic land of Sri Lanka, resort facilities of an exceptional kind and enough room for you to relax at complete ease – our suites are, indeed, rather special. You can choose to stay at the Dambulla or the Sigiriya Wing – either way, you have the balcony to contemplate the scenery from. Whether you are sipping drinks in your sitting room, snug in your bed, luxuriating in the Jacuzzi or snatching a rain shower.</p>
                </div>
                <button class="book" style="color:black;background-color:goldenrod"><a href="Suite-Rooms-form.php" target="_blank">Book Now</a></button>
            </div>

            <div class="room-container">
                <div class="image-container">
                    <img src="../Images/pexels-lisa-fotios-2249055.jpg" alt="Superior-Room Image">
                </div>
                <div class="room-details">
                    <h2 style="color:white;font-size:28px">Room-Details</h2>
                    <div class="room-details-wrapper">
                        <div class="grid-room-container"><i class="fa fa-list-ol" aria-hidden="true"><span class="room-detail">Number of Rooms</span><br><span class="Superior-values">10</span></i></div>
                        <div class="grid-room-container"><i class="fa fa-users" aria-hidden="true"><span class="room-detail">Occupancy</span><br><span class="Superior-values">Double or Triple</span></i></div>
                        <div class="grid-room-container"><i class="fas fa-sort-amount-down"><span class="room-detail">Room Size</span><br><span class="Superior-values">428.47 SQ.FT</span></i></div>
                        <div class="grid-room-container"><i class="fas fa-bed"><span class="room-detail">Beds</span><br><span class="Superior-values">King Bed or Twin Bed</span></i></div>
                        <div class="grid-room-container"><i class="fas fa-binoculars"><span class="room-detail">Room View</span><br><span class="Superior-values">Lake View</span></i></div>
                        <div class="grid-room-container"><i class="fas fa-dollar-sign"><span class="room-detail">Prices</span><br><span class="Superior-values">1 Triple Room:$400.00/=</span><br><span class="Superior-values">1 Double Room:$300.00/=</span></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("footer-footer.php"); ?>
    <script src="../Javascript/script.js"></script>
    <script src="../Javascript/sticky-nav.js"></script>
</body>

</html>