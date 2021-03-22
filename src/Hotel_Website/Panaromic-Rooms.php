<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panaromic Rooms</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="page-wrapper">
        <div class="header-container-SuperiorRooms" id="header-container">
            <?php include("../../public/includes/sticky-nav.php"); ?>
            <?php include("../../public/includes/side-nav.php"); ?>
            <div class="text-container">
                <span class="text1">Grand &</span>
                <span class="text2">Epic
                </span>
            </div>
            <?php include('login-signup-template.php'); ?>
        </div>
        <div class="body-container Panaromic-Rooms">
            <?php
            include('../../config/connection.php');
            $roomType = 'Panaromic Rooms';
            $selectSuperior = "SELECT * from rooms WHERE Room_Type=' $roomType '";
            $result = mysqli_query($con, $selectSuperior);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo   '
                        <div class="panaromic-rooms-wrapper">
                            <h3>' . $roomType . '</h3>
                                <div class="superior-room-content">
                                    <p style="text-align:center; font-family:Tahoma, Geneva, sans-serif">' . $row['Description'] . '</p>
                                </div>
                                    <button class="book" style="color:black;background-color:goldenrod"><a href="Superior-Rooms-form.php" target="_blank">Book Now</a></button>
                        </div>         
                        <div class="room-container">
                            <div class="image-container">
                                <img src="../../public/images/sup-centara-ceysands-resort.jpg" alt="Superior-Room Image">
                            </div>
                            <div class="room-details">
                                <h2 style="color:white;font-size:28px">Room-Details</h2>
                                <div class="room-details-wrapper">
                                    <div class="grid-room-container"><i class="fa fa-list-ol" aria-hidden="true"><span class="room-detail">Number of Rooms</span><br><span class="Superior-values">' . $row['NoRooms'] . '</span></i></div>
                                    <div class="grid-room-container"><i class="fa fa-users" aria-hidden="true"><span class="room-detail">Occupancy</span><br><span class="Superior-values">Double or Triple</span></i></div>
                                    <div class="grid-room-container"><i class="fas fa-sort-amount-down"><span class="room-detail">Room Size</span><br><span class="Superior-values">199.93 SQ.FT</span></i></div>
                                    <div class="grid-room-container"><i class="fas fa-bed"><span class="room-detail">Beds</span><br><span class="Superior-values">' . $row['BedType'] . '</span></i></div>
                                    <div class="grid-room-container"><i class="fas fa-binoculars"><span class="room-detail">Room View</span><br><span class="Superior-values">' . $row['Room_View'] . '</span></i></div>
                                    <div class="grid-room-container"><i class="fas fa-dollar-sign"><span class="room-detail">Prices</span><br><span class="Superior-values">1 Triple Room:' . $row['Price'] . '</span><br><span class="Superior-values">1 Double Room:' . $row['Price'] . '</span></i></div>
                                </div>
                            </div>
                        </div>
                                    ';
                }
            }
            ?>
        </div>
    </div>

    <?php include("../../public/includes/footer-index.php"); ?>
    <script src="../../public/Javascript/script.js"></script>
    <script src="../../public/Javascript/sticky-nav.js"></script>
</body>

</html>