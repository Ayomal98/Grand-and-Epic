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

        </div>
        <div class="body-container">
            <h3>Bookings</h3><br />
            <div class="booking-container">
                <div class="card">
                    <div class="card-img" id="img01"></div>
                    <div class="card-content">
                        <h class="card-header">Staying-In</h>
                        <p class="card-para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta architecto aliquid unde, ipsa laboriosam, dolorem mollitia quae provident molestiae placeat pariatur. Reiciendis, doloribus quaerat! Vitae dignissimos cupiditate sint ut eius?</p>
                        <a href="Hotel_Website/Staying-in.php" class="card-link">Read more</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-img" id="img02"></div>
                    <div class="card-content">
                        <h class="card-header">Dine-In</h>
                        <p class="card-para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta architecto aliquid unde, ipsa laboriosam, dolorem mollitia quae provident molestiae placeat pariatur. Reiciendis, doloribus quaerat! Vitae dignissimos cupiditate sint ut eius?</p>
                        <a href="" class="card-link">Read more</a>
                    </div>
                </div>
            </div>

        </div>
        <h2>Offers</h2>
        <div class="offers-container">
            <div class="box">
                <span class="fas fa-user" id="customer-icon"></span>
                <div class="box-heading">Loyalty Offer</div>
                <div class="box-content">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, ex assumenda dolor aliquid, sequi recusandae voluptas </div>
                <a href="">
                    <box class="link">Read more</box>
                </a>
            </div>
            <div class="box">
                <span class="fab fa-cc-visa" id="creditcard-icon"></span>
                <div class="box-heading">Credit-Card Offer</div>
                <div class="box-content">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, ex assumenda dolor aliquid, sequi recusandae voluptas </div>
                <a href="">
                    <box class="link">Read more</box>
                </a>
            </div>
            <div class="box">
                <span class="fas fa-hourglass-end" id="lastmin-icon"></span>
                <div class="box-heading">Last-Miniute Offer</div>
                <div class="box-content">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, ex assumenda dolor aliquid, sequi recusandae voluptas </div>
                <a href="">
                    <box class="link">Read more</box>
                </a>
            </div>
        </div>
    </div>
    <?php include("../../public/includes/footer-index.php"); ?>
    <script src="../../public/javascript/script.js"></script>
    <script src="../../public/Javascript/sticky-nav.js"></script>
</body>

</html>