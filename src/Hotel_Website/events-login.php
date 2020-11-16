<?php include("../Templates/connection.php");
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
    <div class="header-container-events" id="header-container">
        <?php include("sticky-nav.php"); ?>
        <?php include("side-nav-login.php"); ?>

        <span class="fa fa-user" style="position:absolute;top:20px;right:40px;font-size:60px;color:white"><span class="far fa-caret-square-down" style="font-size:20px;margin-left:10px;" onclick="funcUserDetails()"></span></span>
        <!--<br><span style="position:absolute;top:100px;right:40px;font-size:20px;color:white"></span>-->
        <div id="user-detail-container">
            <span class="fa fa-window-close" style="margin-left:130px;" onclick="funcCloseUserDetails()"></span>
            <p style="margin-bottom: 10px;"><?php echo "Logged in as $username"; ?></P>
            <hr style="color:teal">
            <a href="logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:5px;margin-left:85px;padding:5px;background-color:black;color:white;border-radius:5px;cursor:pointer"></a>

        </div>
        <div class="text-container">
            <span class="text1">Grand &</span>
            <span class="text2">Epic
            </span>
        </div>
    </div>
    <div class="body-container">
        <h3>Events</h3>
        <p style="font-weight:900;text-align:center;margin-top:20px;">Honour you love with the grandeur it so richly deserves at Grand & Epic. Our spectacular waterfront hotel creates the perfect ambiance or this once-in-a-lifetime celebration, with an elegant ballroom, delectable cuisine and personalized attention to detail that is surpassed by none.

        </p>
        <div class="events-container">
            <div class="wedding-party-wrapper">
                <div class="wedding-wrapper">
                    <div class="card-img-wedding">
                        <img src="../Images/pexels-dimitri-kuliuk-1488315.jpg" style="height: 55vh; width:100%" alt="">
                    </div>
                    <div class="content-events-wrapper wedding">
                        <h2 style="font-weight: 1000;margin-top:20px;">Weddings & Parties</h2>
                        <p style="margin-left:70px; color:black;font-weight:700;margin-top:30px;">We are here to provide your special day even more special by providing with you with the best customer service service.</p>
                        <p style="margin-left: 70px;color:black;">Here are some of the special features which we provide</P>
                        <p style="margin-left: 70px;color:black;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem sapiente soluta sed dignissimos a quisquam minus velit, corporis optio voluptates numquam illo quaerat tempore nihil! Quae laborum animi a sit!</p>
                        <p style="margin-left: 70px;color:black;">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ex debitis, tenetur consectetur impedit atque, reiciendis error consequuntur asperiores cupiditate blanditiis illum commodi distinctio. Eaque fugit eius accusamus nesciunt adipisci iusto.</p>
                        <a href="events-booking-form.php" style="position: absolute;top: 170%; right: 30%;" target="_blank">
                            <input type="button" value="Book-Now" name="book-wedding" class="wedding-btn">
                        </a>
                    </div>

                </div>
                <div class="party-wrapper">
                    <div class="card-img-party" id="img-party">
                        <img src="../Images/pexels-jacob-morch-426976.jpg" style="height: 55vh; width:64%" alt="">
                    </div>
                    <div class="content-events-wrapper wedding">
                        <h2 style="margin-left:-90px;margin-top:20px;">Meetings & Conferences</h2>
                        <p style="margin-left:-180px;color:black;font-weight:700;margin-top:30px;">We are here to provide your special day even more special by providing with you with the best customer service & appreciation</p>
                        <p style="margin-left:-180px;color:black;font-weight:700;">We are here to provide your special day even more special by providing with you with the best customer service & appreciation</p>
                        <p style="margin-left:-180px;color:black;font-weight:700;">We are here to provide your special day even more special by providing with you with the best customer service & appreciation</p>
                        <p style="margin-left:-180px;color:black;font-weight:700;">We are here to provide your special day even more special by providing with you with the best customer service & appreciation</p>
                        <input type="button" value="Book-Now" name="book-events">
                    </div>
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