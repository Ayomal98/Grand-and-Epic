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
                <?php
                include('../../config/connection.php');
                $selectContent = "SELECT * FROM content";
                $getContent = mysqli_query($con, $selectContent);
                while ($rowContent = mysqli_fetch_assoc($getContent)) {
                    echo '
                    <div class="card">
                        <div style="background-position: center;width: 100%;height: 100%;background-size: cover;background-repeat: no-repeat;"><img src="data:image;base64,' . base64_encode($rowContent["Img_url"]) . '" style=" height: 100%;width:100%"></div>
                        <div class="card-content">
                            <h1 class="card-header">' . $rowContent["Heading"] . '</h1>
                            <p class="card-para">' . $rowContent["Content"] . ' ?></p>
                        </div>
                    </div>
                    ';
                ?>
                <?php } ?>
            </div>

        </div>
        <h3>Offers</h2>
            <div class="offers-container">
                <?php
                $selectPromotion = mysqli_query($con, "SELECT * FROM promotions");
                while ($rowPromotions = mysqli_fetch_assoc($selectPromotion)) {


                ?>
                    <div class="box">
                        <span class="fas fa-user" id="customer-icon"></span>
                        <div class="box-heading"><?php echo $rowPromotions["Promotion_type"] ?></div>
                        <div class="box-content"><?php echo $rowPromotions["Context"] ?> <b><?php echo $rowPromotions["Policies"] ?></b> Hurry up and witness the amazing oppurtuinity </div>
                    </div>
                <?php } ?>
            </div>
    </div>
    </div>
    <?php include("../../public/includes/footer-index.php"); ?>
    <script src="../../public/javascript/script.js"></script>
    <script src="../../public/Javascript/sticky-nav.js"></script>

</body>

</html>