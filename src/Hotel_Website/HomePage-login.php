<?php
session_start();
$username = $_SESSION['First_Name'];
$email = $_SESSION['User_Email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand & Epic Hotel</title>
    <link rel="stylesheet" href="../Css/style.css">
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="header-container" id="header-container">
        <?php include("sticky-nav.php"); ?>

        <?php include("side-nav-login.php"); ?>

        <span class="fa fa-user" style="position:absolute;top:20px;right:40px;font-size:60px;color:white"><span class="far fa-caret-square-down" style="font-size:20px;margin-left:10px;" onclick="funcUserDetails()"></span></span>
        <!--<br><span style="position:absolute;top:100px;right:40px;font-size:20px;color:white"></span>-->
        <div id="user-detail-container">
            <span class="fa fa-window-close" style="margin-left:130px;" onclick="funcCloseUserDetails()"></span>
            <p style="margin-bottom: 10px;"><?php echo "Logged in as $username"; ?></P>
            <hr style="color:teal">
            <a href="logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:5px;margin-left:85px;padding:5px;background-color:black;color:white;border-radius:5px;"></a>

        </div>
        <div class="text-container">
            <span class="text1">Grand &</span>
            <span class="text2">Epic
            </span>
        </div>



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
    <h3>Offers</h2>
        <div class="offers-container">
            <div class="box">
                <span class="fas fa-user" id="customer-icon"></span>
                <div class="box-heading">Loyalty Offer</div>
                <div class="box-content">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, ex assumenda dolor aliquid, sequi recusandae voluptas </div>
                <box class="link">Read more</box>
            </div>
            <div class="box">
                <span class="fab fa-cc-visa" id="creditcard-icon"></span>
                <div class="box-heading">Credit-Card Offer</div>
                <div class="box-content">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, ex assumenda dolor aliquid, sequi recusandae voluptas </div>
                <box class="link">Read more</box>
            </div>
            <div class="box">
                <span class="fas fa-hourglass-end" id="lastmin-icon"></span>
                <div class="box-heading">Last-Miniute Offer</div>
                <div class="box-content">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, ex assumenda dolor aliquid, sequi recusandae voluptas </div>
                <box class="link">Read more</box>
            </div>
        </div>
        </div>
        <?php include("footer-footer.php"); ?>
        <script src="../Javascript/script.js"></script>
        <script src="../Javascript/sticky-nav.js"></script>
        <script>
            function funcUserDetails() {
                document.getElementById('user-detail-container').style.display = "block";
            }

            function funcCloseUserDetails() {
                document.getElementById('user-detail-container').style.display = "none";
            }
        </script>
</body>

</html>