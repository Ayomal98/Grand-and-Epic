<!-- This Page consists of side nav bar for the logged in customers -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body>
    <a href="#" onclick="openSlideMenu()">
        <svg width="30" height="30">
            <path d="M0,5 30,5" stroke="#fff" stroke-width="3" />
            <path d="M0,14 30,14" stroke="#fff" stroke-width="3" />
            <path d="M0,23 30,23" stroke="#fff" stroke-width="3" />
        </svg>
        <span class="heading">| Menu</span>
    </a>

    <div class="side-nav" id="side-nav">
        <ul>
            <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a><br />
            <li> <a href="HomePage-login.php">Home<span class="fas fa-home"></span></a></li>
            <li><a href="staying-in-login.php" class="staying-btn">Staying-In<span class="fas fa-hotel"></span>
                    <span class="fas fa-caret-down" id="toggle-btn" onclick="showStayingIn()"></span>
                </a></li>
            <ul class="stayingin-show" id="stayingin-show">
                <li><a href="Suite-Rooms-login.php">Suites</a></li>
                <li><a href="Panaromic-Rooms-login.php">Panaromic Rooms</a></li>
                <li><a href="Superior-Rooms-login.php">Superior Rooms</a></li>
            </ul>
            <li><a href="dinein-login.php">Dining<span class="fas fa-utensils"></span></a></li>
            <li><a href="meals-login.php">meals<span class="fas fa-hamburger"></span></a></li>
            <li><a href="events-login.php">Events<span class="fas fa-handshake"></span></a></li>
            <li><a href="myreservations.php">My Reservations<span class="fa fa-user"></span></a></li>
        </ul>
    </div>
</body>

</html>