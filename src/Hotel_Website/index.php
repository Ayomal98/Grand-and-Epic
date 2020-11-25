<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand & Epic Hotel</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="page-wrapper">
        <div class="header-container" id="header-container">

            <?php include("../../public/includes/sticky-nav.php"); ?>

            <?php include("../../public/includes/side-nav.php"); ?>

            <div class="text-container">
                <span class="text1">Grand &</span>
                <span class="text2">Epic
                </span>
            </div>
            <?php include('./login-signup-template.php'); ?>
            <?php include('./forgotpassword.php'); ?>
        </div>
        <div class="body-container">
            <h3>Bookings</h3><br />
            <div class="booking-container">
                <div class="card">
                    <div class="card-img" id="img01"></div>
                    <div class="card-content">
                        <h1 class="card-header">Staying-In</h>
                            <p class="card-para">Have you been feeling the need of escaping from your hectic lifestyle and find a perfect hideaway to spend your family with.A place where you won’t be disturbed by the polluted and busy towns and inhale the purest air and enjoy the tranquillity of a place where you can enjoy nature.This is the perfect gateway that you needed all this time.</p>
                            <a href="staying-in.php" class="card-link">Read more</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-img" id="img02"></div>
                    <div class="card-content">
                        <h1 class="card-header">Dine-In</h>
                            <p class="card-para">Welcome to Grand and Epic where you feel the cozy comfort. Select your favorite food, from the wide range to feel the reality in Sri Lanka. Our interior with stunning designs along with some magical positive vibes allows you to enjoy every bite of it. Let our menu stimulate your soul and teleport you to another dimension while watching the world go by.</p>
                            <a href="dinein.php" class="card-link">Read more</a>
                    </div>
                </div>
            </div>

        </div>
        <h3>Offers</h2>
            <div class="offers-container">
                <div class="box">
                    <span class="fas fa-user" id="customer-icon"></span>
                    <div class="box-heading">Loyalty Offer</div>
                    <div class="box-content">We value customers as our best asset. Therefore if you have booked our hotel 6 times, you will get a <b>50% off on your 7th booking.</b> Hurry up and witness the amazing oppurtuinity </div>

                </div>
                <div class="box">
                    <span class="fas fa-gifts" id="creditcard-icon"></span>
                    <div class="box-heading" style="margin-top: 50px;">Seasonal Offer</div>
                    <div class="box-content">We are providing some attractive discounts from your complete amount of stay as the seasonal promotions during the christmas season, School vacations etc. Stay tuned for more interesting updates. </div>
                    <div style="margin-left:-130px;font-size:20px;margin-top:-10px"><b>Available Only For Suit Rooms</b></div>
                    <div class="box-specials"><b>*Valid Until 25th Of December</b></div>
                    <a href="apply-promotions-suite.php" target="_blank"><input type="button" value="Apply Now" style="padding: 5px 5px;border:none;border-radius:5px;background-color:white;cursor:pointer;font-weight:bolder;position:absolute;top:84%;right:10%"></a>
                </div>

                <div class="box">
                    <span class="fas fa-hourglass-end" id="lastmin-icon"></span>
                    <div class="box-heading">Last-Minute Offer</div>
                    <div class="box-content">Worried for last minute bookings? Not anymore. There will be special discounts to the last minute bookings. Do not let your idea of a sudden espace fade from you. We are here to help. </div>
                </div>
            </div>
    </div>
    </div>
    <?php include("../../public/includes/footer-index.php"); ?>
    <script src="../../public/javascript/script.js"></script>
    <script src="../../public/Javascript/sticky-nav.js"></script>

</body>

</html>