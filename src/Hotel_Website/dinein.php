<!-- This page consists of dinein booking for the not logged in users -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand & Epic</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="header-container-dinein" id="header-container">
        <!--to include the sticky nav bar -->
        <?php include("../../public/includes/sticky-nav.php"); ?>

        <!--to include the side nav bar -->
        <?php include("../../public/includes/side-nav.php"); ?>

        <div class="text-container">
            <span class="text1">Grand &</span>
            <span class="text2">Epic
            </span>
        </div>
        <?php include('login-signup-template.php'); ?>
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
        <button class="book" style="color:black;background-color:goldenrod;padding:15px;margin-top:10px;"><a href="dinein-booking-form-nl.php" target="_blank">Book Now</a></button>
        <div class="img-dinein-container">
            <img src="../../public/Images/pexels-lee-hnetinka-1679825.jpg" alt="">
            <img src="../../public/Images/pexels-mat-brown-1395964.jpg" alt="">
        </div>
        <div class="dine-in-details">
            <div><i class="fa fa-columns"><span style="display:inline-block">No.Of Tables</span><span style="display: block;margin-left:35px;">15</span></i></div>
            <div><i class="fa fa-cutlery"><span style="display:inline-block">Cuisine type </span><span style="display: block;margin-left:35px;"">International Buffet</span></i> </div>
            <div><i class=" fas fa-wifi"><span style="display:block;margin-left:-15px">Available</span></i></div>
            <div><i class="far fa-window-close"><span style="display:inline-block">Cancellation </span><span style="display:block;margin-left:35px"> Anytime</span></i></div>

        </div>
    </div>
    <?php include("../../public/includes/footer-footer.php"); ?>
    <script src="../../public/Javascript/script.js"></script>
    <script src="../../public/Javascript/sticky-nav.js"></script>
</body>

</html>