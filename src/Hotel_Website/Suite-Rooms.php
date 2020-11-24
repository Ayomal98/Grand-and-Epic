<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suite Rooms</title>
    <link rel="stylesheet" href="../../public/Css/style.css">
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="page-wrapper">
        <div class="header-container-SuperiorRooms" id="header-container">
            <?php include("../../public/includes/sticky-nav.php"); ?>
            <?php include("../../public/includes/side-nav.php"); ?>
            <div class="text-container">
                <span class="text1">Grand &</span>
                <span class="text2">Epic
                </span>
            </div>
            <?php include('login-signup-template.php'); ?>
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
                    <img src="../../public/Images/pexels-lisa-fotios-2249055.jpg" alt="Superior-Room Image">
                </div>
                <div class="room-details">
                    <h2 style="color:white;font-size:28px">Room-Details</h2>
                    <div class="room-details-wrapper">
                        <div class="grid-room-container"><i class="fa fa-list-ol" aria-hidden="true"><span class="room-detail">Number of Rooms</span><br><span class="Superior-values">14</span></i></div>
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

    <?php include("../../public/includes/footer-footer.php"); ?>
    <script src="../../public/Javascript/script.js"></script>
    <script src="../../publicJavascript/sticky-nav.js"></script>
</body>

</html>