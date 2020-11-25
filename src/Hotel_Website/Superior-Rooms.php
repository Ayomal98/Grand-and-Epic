<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superior Rooms</title>
    <link rel="stylesheet" href="../../public/css/style.css">
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
        <div class="body-container Superior-Rooms">
            <div class="superior-rooms-wrapper">
                <h3>Superior Rooms</h3>
                <div class="superior-room-content">
                    <p style="text-align:center; font-family:Tahoma, Geneva, sans-serif">Imagine having the view of a beautiful mountain every breathing minute of your day.
                        Or wait, why imagine? Live in our Superior stay. It also makes the sitting and dining areas and the balcony,
                        the perfect places to dine, wine, and ponder with a freewheeling state of mind.The superior rooms
                        are exceptional in every way
                        and you’ll notice this the moment you step in. Trappings like
                        your own Jacuzzi and carefully appointed lighting, add a sensual
                        touch to the overall ambiance. Underscored by exceptional style, the interiors are as
                        expansive as they are inviting, with meticulous attention to detail, offering a seamless
                        combination of functionality and bespoke luxury.</p>
                </div>
                <button class="book" style="color:black;background-color:goldenrod"><a href="Superior-Rooms-form.php" target="_blank">Book Now</a></button>
            </div>

            <div class="room-container">
                <div class="image-container">
                    <img src="../../public/images/sup-centara-ceysands-resort.jpg" alt="Superior-Room Image">
                </div>
                <div class="room-details">
                    <h2 style="color:white;font-size:28px">Room-Details</h2>
                    <div class="room-details-wrapper">
                        <div class="grid-room-container"><i class="fa fa-list-ol" aria-hidden="true"><span class="room-detail">Number of Rooms</span><br><span class="Superior-values">16</span></i></div>
                        <div class="grid-room-container"><i class="fa fa-users" aria-hidden="true"><span class="room-detail">Occupancy</span><br><span class="Superior-values">Double or Triple</span></i></div>
                        <div class="grid-room-container"><i class="fas fa-sort-amount-down"><span class="room-detail">Room Size</span><br><span class="Superior-values">229.93 SQ.FT</span></i></div>
                        <div class="grid-room-container"><i class="fas fa-bed"><span class="room-detail">Beds</span><br><span class="Superior-values">King Bed or Twin Bed</span></i></div>
                        <div class="grid-room-container"><i class="fas fa-binoculars"><span class="room-detail">Room View</span><br><span class="Superior-values">Garden View</span></i></div>
                        <div class="grid-room-container"><i class="fas fa-dollar-sign"><span class="room-detail">Prices</span><br><span class="Superior-values">1 Triple Room:$200.00</span><br><span class="Superior-values">1 Double Room:$100.00</span></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("../../public/includes/footer-index.php"); ?>
    <script src="../../public/Javascript/script.js"></script>
    <script src="../../public/Javascript/sticky-nav.js"></script>
</body>

</html>