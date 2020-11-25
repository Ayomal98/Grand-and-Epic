<!-- This page consists of staying in page for not logged in customers -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accomodations</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="page-wrapper">
        <div class="header-container-accomodations" id="header-container">
            <?php include("../../public/includes/sticky-nav.php"); ?>
            <?php include("../../public/includes/side-nav.php"); ?>

            <div class="text-container">
                <span class="text1">Grand &</span>
                <span class="text2">Epic
                </span>
            </div>
            <?php include('login-signup-template.php'); ?>
            <?php include('forgotpassword.php'); ?>
        </div>
        <div class="body-container accomodations">
            <div class="accomodation-wrapper">
                <h3>Accomodations</h3>
                <div class="icons-check-in-out" style="text-align:center;padding:20px 20px 30px 20px;display:flex;flex-direction:row;justify-content:center;margin:30px 20px 10px 28px;border:1px solid black;width:96%;height:130px;background-color:#b88b4a;color:white;border:none;padding-bottom:5px">
                    <div style="position:absolute;left:15%">
                        <h1 style="margin-bottom: 15px;font-weight:bolder">Breakfast</h1>
                        <div style="margin-bottom: 15px;">
                            <span class="fa fa-clock-o" id="clock-icon" aria-hidden="true" style="display: block;color:black;margin-bottom:5px;color:white">Check In : &nbsp; 8.30 A.M</span>
                            <span class="fa fa-clock-o" id="clock-icon" aria-hidden="true" style="display: block;color:black;margin-bottom:5px;color:white;margin-left:10px">Check Out : &nbsp; 9.00 A.M </span>
                        </div>
                    </div>
                    <div style="position:absolute;left:45%">
                        <h1 style="margin-bottom: 15px;">Lunch</h1>
                        <span class="fa fa-clock-o" id="clock-icon" aria-hidden="true" style="display: block;margin-bottom:5px;color:white">Check In : &nbsp; 12.00 P.M</span>
                        <span class="fa fa-clock-o" id="clock-icon" aria-hidden="true" style="display: block;color:white;margin-left:10px">Check Out : &nbsp; 12.30 P.M </span>
                    </div>
                    <div style="position:absolute;left:75%">
                        <h1 style="margin-bottom: 15px;">Dinner</h1>
                        <span class="fa fa-clock-o" id="clock-icon" aria-hidden="true" style="display: block;color:white;margin-bottom:5px">Check In : &nbsp; 7.00 P.M</span>
                        <span class="fa fa-clock-o" id="clock-icon" aria-hidden="true" style="display: block;color:white;margin-left:10px">Check Out : &nbsp; 7.30 P.M </span>
                    </div>
                </div>
            </div>
            <div class="room-container">
                <div class="card-rooms">
                    <h2 class="card-room-header">Superior Rooms</h2>
                    <div class="card-room-img">
                        <img class="img-superior-rooms" src="../../public/images/CBB-Superior-Room-530X420.jpg" title="Superior Room interior" alt="Interior of Superior Room at GRAND & EPIC">
                    </div>
                    <div class="card-room-para" style="color:white;">In the heart of upcountry, accommodation of the most indulgent kind awaits you at our Superior Rooms. Set in the mountain
                        Wings you can relax in the comforts they offer and enjoy views.
                        After a day of exploring – or even just idling, it is a perfect refuge to return to a long shower.</div>
                    <div class="view-book-wrapper">
                        <button class="view" style="border:none"><a href="Superior-Rooms.php">View Room</a></button>
                        <button class="book" style="border:none"><a href="Superior-Rooms-form.php" target="_blank">Book Now</a></button>
                    </div>
                </div>
                <div class="card-rooms">
                    <h2 class="card-room-header">Panaromic Rooms</h2>
                    <div class="card-room-img">
                        <img class="img-panaromic-rooms" src="../../public/images/content2.jpg" title="Superior Room interior" alt="Interior of Superior Room at GRAND & EPIC">
                    </div>
                    <div class="card-room-para" style="color:white;">The Panoramic Rooms at Grand & Epic will provide do live up to their name.
                        Your own private balcony will serve as your vantage point – any time. The views over the mountains
                        are constant, yet ever changing. The rooms themselves are tempting too, with earthy tones, traditional woven tapestries, and fluffy pillows.</div>
                    <div class="view-book-wrapper">
                        <button class="view" style="border:none"><a href="Panaromic-Rooms.php">View Room</a></button>
                        <button class="book" style="border:none"><a href="Panaromic-Rooms-form.php" target="_blank">Book Now</a></button>
                    </div>

                </div>
                <div class="card-rooms">
                    <h2 class="card-room-header" style="margin-top:5px ;">Suite Rooms</h2>
                    <div class="card-room-img">
                        <img class="img-panaromic-rooms" src="../../public/images/suite-image.jpg" title="Superior Room interior" alt="Interior of Superior Room at GRAND & EPIC">
                    </div>
                    <div class="card-room-para" style="color:white;">For a ‘beyond the ordinary’ holiday in Sri Lanka,
                        suites at Grand and Epic offer you the ultimate in creature comforts. Panoramic views of mountains greet you from everywhere.
                        Stretch on the living room sofa and watch a favourite movie,
                        the four poster bed may also beckon for a quiet read, the spectacular views are just right for that pre-dinner drink,
                        but then, there is the Jacuzzi tempting you in too.</div>
                    <div class="view-book-wrapper">
                        <button class="view" style="border:none"><a href="Suite-Rooms.php">View Room</a></button>
                        <button class="book" style="border:none"><a href="Suite-Rooms-form.php" target="_blank">Book Now</a></button>
                    </div>
                </div>
            </div>
        </div>
        <?php include("../../public/includes/footer-index.php"); ?>
        <script src="../../public/Javascript/script.js"></script>
        <script src="../../public/Javascript/sticky-nav.js"></script>
</body>

</html>