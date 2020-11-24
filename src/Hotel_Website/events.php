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
                        <img src="../../public/images/pexels-dimitri-kuliuk-1488315.jpg" style="height: 55vh; width:100%" alt="">
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
            </div>
        </div>
    </div>
    <?php include("../../public/includes/footer-index.php"); ?>
    <script src="../../public/Javascript/script.js"></script>
    <script src="../../public/Javascript/sticky-nav.js"></script>


</body>

</html>