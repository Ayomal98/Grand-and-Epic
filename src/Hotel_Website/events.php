<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="header-container-events" id="header-container">
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
    <div class="body-container">
        <h3>Events</h3>
        <p style="font-weight:900;text-align:center;margin-top:20px;">Honour you love with the grandeur it so richly deserves at Grand & Epic. Our spectacular waterfront hotel creates the perfect ambiance or this once-in-a-lifetime celebration, with an elegant ballroom, delectable cuisine and personalized attention to detail that is surpassed by none.

        </p>
        <div class="events-container">
            <div class="wedding-party-wrapper">
                <div class="wedding-wrapper">
                    <div class="card-img-wedding">
                        <img src="../../public/images/pexels-dimitri-kuliuk-1488315.jpg" style="height: 65vh; width:100%" alt="">
                    </div>
                    <div class="content-events-wrapper wedding">
                        <h2 style="font-weight: bolder;margin-top:20px;">Weddings & Parties</h2>
                        <div style="font-weight:900;text-align:center;margin-top:20px;font-size:14px;padding:10px 20px">Honour you love with the grandeur it so richly deserves at Grand & Epic. Our spectacular waterfront hotel creates
                            the perfect ambiance or this once-in-a-lifetime celebration, with an elegant ballroom, delectable cuisine and personalized attention to detail that is surpassed
                            by none.The endless ocean around us inspires an unrestrained, relaxed aura. While it rings around in every corner of our space, Tranzfuse is where it makes
                            itself at home. The pool , the food, and the drinks – everything about it lulls you into a blissful state of mind.

                        </div>
                        <p style="margin-left:70px; color:black;font-weight:700;margin-top:10px; margin-right:70px;color:white">Host the most special fete of your life in our sophisticated ballroom,
                            or our garden overlooking the free-spirited mountains. Let your affable personality reflect in the choice of venue and decorWe lay out a sumptuous
                            spread of the most delightful local and international cuisines, so that you and your guests can truly relish the wonderful occasion. From
                            delish appetisers, to a rich main course, to divine desserts, all of it ensure, your function leaves an aftertaste that is fondly remembered
                            for years to come.</p><br>
                        <p style="margin-left: 70px;color:black;color:white">Here are some of the special features which we provide,</P><br>
                        <ul style="list-style-type:disc;padding-left:12em;color:black;">
                            <li style="font-weight:700;">DJ music - complete package per day for Rs.75000.00</li>
                            <li style="font-weight:700;">Decorations - According to your preference </li>
                            <li style="font-weight:700;">Champagne table- Rs.22000.00</li>
                        </ul>
                        <a href="events-booking-form.php" style="position: absolute;top: 187%; right: 15%;" target="_blank">
                            <input type="button" value="Book-Now" name="book-wedding" class="wedding-btn">
                        </a>
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