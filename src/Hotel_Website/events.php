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
        <p style="font-weight:900;text-align:center;margin-top:20px;">Honour you love with the grandeur it so richly deserves at Grand & Epic. Our spectacular waterfront hotel creates
            the perfect ambiance or this once-in-a-lifetime celebration, with an elegant ballroom, delectable cuisine and personalized attention to detail that is surpassed
            by none.The endless ocean around us inspires an unrestrained, relaxed aura. While it rings around in every corner of our space, Tranzfuse is where it makes
            itself at home. The pool , the food, and the drinks – everything about it lulls you into a blissful state of mind.
        </p>
        <div class="events-container">
            <div class="wedding-party-wrapper">
                <div class="wedding-wrapper">
                    <div class="card-img-wedding">
                        <img src="../../public/images/pexels-dimitri-kuliuk-1488315.jpg" style="height: 65vh; width:100%" alt="">
                    </div>
                    <div class="content-events-wrapper wedding">
                        <h2 style="font-weight: bolder;margin-top:20px;">Weddings & Parties</h2>
                        <p style="margin-left:70px; color:black;font-weight:700;margin-top:10px; margin-right:70px;color:white">Host the most special fete of your life in our sophisticated ballroom,
                            or our garden overlooking the free-spirited mountains. Let your affable personality reflect in the choice of venue and decorWe lay out a sumptuous
                            spread of the most delightful local and international cuisines, so that you and your guests can truly relish the wonderful occasion. From
                            delish appetisers, to a rich main course, to divine desserts, all of it ensure, your function leaves an aftertaste that is fondly remembered
                            for years to come.</p><br>
                        <h3 style="color:white;margin-left:-260px">Wedding</h3>
                        <h3 style="color:white;margin-left:280px;margin-top:-40px">Parties</h3>
                        <?php
                        include('../../config/connection.php');
                        $selectWeddingPriceDetails = mysqli_query($con, "SELECT * FROM event_location_features WHERE Event_Type='Wedding'");
                        $rowPriceWedding = mysqli_fetch_assoc($selectWeddingPriceDetails);
                        echo '
                        <ul style="list-style-type:disc;padding-left:12em;color:black;margin-left:-90px;margin-top:5px">
                            <li style="font-weight:700;">DJ music - complete package for Rs. ' . $rowPriceWedding["DJ_Price"] . '/=</li>
                            <li style="font-weight:700;">Decorations - Rs. ' . $rowPriceWedding['Decoration_Price'] . '/=</li>
                            <li style="font-weight:700;">Champagne table- Rs. ' . $rowPriceWedding['Champaigne_Price'] . '/=</li>
                        </ul>';
                        ?>
                        <?php
                        include('../../config/connection.php');
                        $selectPartyPriceDetails = mysqli_query($con, "SELECT * FROM event_location_features WHERE Event_Type='Party'");
                        $rowPriceParty = mysqli_fetch_assoc($selectPartyPriceDetails);
                        echo '
                        <ul style="list-style-type:disc;padding-left:12em;color:black;margin-left:290px;margin-top:-55px">
                            <li style="font-weight:700;">DJ music - complete package for Rs. ' . $rowPriceParty["DJ_Price"] . '/=</li>
                            <li style="font-weight:700;">Decorations - Rs. ' . $rowPriceParty['Decoration_Price'] . '/=</li>
                            <li style="font-weight:700;">Champagne table- Rs. ' . $rowPriceParty['Champaigne_Price'] . '/=</li>
                        </ul>';
                        ?>
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