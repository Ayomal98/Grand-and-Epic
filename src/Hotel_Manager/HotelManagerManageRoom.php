<?php

include("../../public/includes/session.php");
include("../../config/connection.php");
checkSession();
if (!isset($_SESSION['First_Name'])) {
    header('Location:../Hotel_Website/HomePage-login.php');
}

?>
<html>

<head>
    <link rel="stylesheet" href="../../public/css/employee.css">
    <title>
        Hotel Manager Manage Rooms
    </title>
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body bgcolor="black">

    <center>
        <img src="../../public/images/Logo.png" width="20%">

        <span class="far fa-caret-square-down" style="color:white;font-size:30px;position:absolute;right:0px;top:20px;" onclick="funcUserDetails()"></span>
        <!--<br><span style="position:absolute;top:100px;right:40px;font-size:20px;color:white"></span>-->
        <div id="user-detail-container">
            <span class="fa fa-window-close" style="margin-left:130px;" onclick="funcCloseUserDetails()"></span>
            <p style="margin-top: 2px; color:black">
                <?php
                echo "Logged in as " . $_SESSION['First_Name'] . "(Staff)</P>";
                ?>
                <hr style="color:teal">
                <a href="../Hotel_Website/logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:-7px;margin-left:85px;padding:0px;background-color:black;color:white;border-radius:5px;cursor:pointer"></a>
        </div>

    </center>
    <div class="sidenav">
        <button class="dropdown-btn">Manage Rooms
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="HotelManagerDashboard.php">
                <font size="4 px">Dashboard</font>
            </a>
            <a href="HotelManagerManageStaff.php">
                <font size="4 px">Manage Staff</font>
            </a>
            <a href="ManagerBookingDetails.php">
                <font size="4 px">Booking Details</font>
            </a>
            <a href="HotelManagerPromotions.php">
                <font size="4 px">Promotions</font>
            </a>
            <a href="HotelManagerCustomerFeedback.php">
                <font size="4 px">Customer Feedback</font>
            </a>
        </div>
    </div>
    <div class="top-right">
        <table width="100%">
            <tr>
                <td>
                </td>
                <td>
                    <img src="../../public/images/ayomal.png" height="80px">
                </td>
            </tr>
        </table>
    </div>
    <script>
        /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script>

    <table style="position:absolute; top : 240px; width:350px;">
        <tr>
            <td>
                <img src="../../public/images/room.png" height="80px">
            </td>
            <td>
                <p style="font-family :Lato; font-size:22px; color :white;">Current Room Types</p>
            </td>
        </tr>
    </table>


    <table style="position:absolute; left:20px; top:350px; width:97%;border: 1px solid white;">
        <tr>
            <th style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:20px; color :white;">Superior Room</p>
            </th>
            <th style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:20px; color :white;">Panoramic Room</p>
            </th>
            <th style="border: 1px solid white;">
                <p style="font-family :Lato; font-size:20px; color :white;">Suite Room</p>
            </th>
        </tr>

        <td style="border: 1px solid white;">

            <table width="100%">
                <tr>
                    <td align="center">
                        <img src="../../public/images/Superior.png" height="80%">
                    </td>
                    <td align="center">
                        <?php
                        include("../../config/connection.php");
                        $roomTypeSuperior = "Superior Rooms";
                        $querySuperior = "SELECT * FROM rooms where Room_Type= ' $roomTypeSuperior '";
                        $query_run_Superior = mysqli_query($con, $querySuperior);
                        $rowSuperior = mysqli_fetch_assoc($query_run_Superior);
                        echo
                        '<textarea name="Description" rows="5" cols="25" placeholder="Description" style="font-size: 20px;"> ' . $rowSuperior["Description"] . '
                            </textarea>';

                        ?>
                    </td>
                </tr>
            </table>

        </td>
        <td style="border: 1px solid white;">
            <table width="100%">
                <tr>
                    <td align="center">
                        <img src="../../public/images/Panora.png" height="100px">
                    </td>
                    <td align="center">
                        <?php
                        include("../../config/connection.php");
                        $roomTypePanaromic = "Panaromic Rooms";
                        $query_panaromic = "SELECT * FROM rooms where Room_Type=' $roomTypePanaromic '";
                        $query_run_panaromic = mysqli_query($con, $query_panaromic);
                        $rowPanaromic = mysqli_fetch_assoc($query_run_panaromic);
                        echo '
                        <textarea name="Description" rows="5" cols="25" placeholder="Description" style="font-size: 20px;"> ' . $rowPanaromic['Description'] . '
                            </textarea>';
                        ?>
                    </td>
                </tr>
            </table>
        </td>
        <td style="border: 1px solid white;">
            <table width="100%">
                <tr>
                    <td align="center">
                        <img src="../../public/images/suite.png" height="80%">
                    </td>
                    <td align="center">
                        <?php
                        $roomTypeSuperior = "Superior Rooms";

                        include("../../config/connection.php");
                        $query = "SELECT Description FROM rooms where Room_Type= ' $roomTypeSuperior'";
                        $query_run = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($query_run))
                            echo
                            '<textarea name="Description" rows="5" cols="20" placeholder="Description" style="font-size: 20px;"> ' . $row["Description"] . '
                            </textarea>';
                        ?>
                </tr>
            </table>
        </td>
        </tr>
        <!-- Add -->
        <table style="position:absolute; top : 600px; width:350px;width : 100%;">
            <tr>
                <td>
                    <fieldset>
                        <legend style="color:white; font-size: 26px"><b>New Room Type</b></legend>
                        <table style="color:white; font-size: 20px; width:90%; margin-left:auto; margin-right:auto;">
                            <form method="POST" id="room_form" action="">
                                <tr>
                                    <td align="left">Room Type: </td>
                                    <td align="left"><input type="text" name="roomType" rows="1" cols="25" placeholder="Suggested Name" style="font-size: 20px;" form="room_form" required></textarea></td>
                                </tr>
                                <tr>
                                    <td align="left">No: of Rooms:</td>
                                    <td align="left"><input type="number" min="5" max="20" name="noRooms" rows="1" cols="25" style="font-size: 20px;width:905px;margin:8px 0; padding: 5px 29px" form="room_form"   required></textarea></td>
                                </tr>
                                <tr>
                                    <td align="left">Price Estimated:</td>
                                    <td align="left"><input type="text" name="price" rows="1" cols="25" style="font-size: 20px;" form="room_form" required></textarea></td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td align="left"><u>
                                            <font size="5px">Room Details</font>
                                        </u></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td align="left">Room View:</td>
                                    <td align="left"><input type="text" name="roomView" rows="1" cols="25" style="font-size: 20px;" form="room_form" required></td>
                                </tr>
                                <tr>
                                    <td align="left">No of Guests:</td>
                                    <td align="left"><input type="number" min="1" max="5"name="noGuests" rows="1" cols="25" style="font-size: 20px;width:905px;margin:8px 0; padding: 5px 29px" form="room_form" required></td>
                                </tr>
                                <tr>
                                    <td align="left">Bed Type:</td>
                                    <td align="left"><input type="text" name="bedType" rows="1" cols="25" style="font-size: 20px;" form="room_form" required></td>
                                </tr>
                                <tr>
                                    <td align="left">No of Beds:</td>
                                    <td align="left"><input type="number" min="1" max="3" name="noBeds" rows="1" cols="25" style="font-size: 20px;width:905px;margin:8px 0; padding: 5px 29px" form="room_form" required></td>
                                </tr>
                                <tr>
                                    <td align="left">Bathroom:</td>
                                    <td align="left"><input type="text" name="bathroom" rows="1" cols="25" style="font-size: 20px;" form="room_form" required></td>
                                </tr>
                                <tr>
                                    <td align="left">Amenities:</td>
                                    <td align="left"><input type="text" name="amenities" rows="3" cols="25" placeholder="List down here the suggested amenities" style="font-size: 20px;" form="room_form" required></td>
                                </tr>
                                <tr>
                                    <td align="left">Description:</td>
                                    <td align="left"><input type="text" name="description" rows="3" cols="25" placeholder="Add images & the description here" style="font-size: 20px;" form="room_form" required></td>
                                </tr>
                                <tr>
                                    <td align="left">Other:</td>
                                    <td align="left"><input type="text" name="other" rows="3" cols="25" placeholder="Special Notes" style="font-size: 20px;" form="room_form" required></td>
                                </tr>
                                <br>
                                <table style="color:white; font-size: 20px; width:81%;">
                                    <tr>
                                        <td align="right">
                                            <input type="submit" class="button" value="SEND TO ADMIN" name="Insert" form="room_form">

                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </table>
                    </fieldset>
                </td>
            </tr>
        </table>

        <form action="" method="POST">
            <fieldset style=" position:absolute; top:1500px; width: 75%; left:160px">
                <legend style="color:white; font-size: 20px">Update and Delete Room Types</legend>
                <input type="text" name="roomType" placeholder="Enter Room Type to Search" />
                <input type="submit" name="search" value="Search by Type" class="button">
            </fieldset>
        </form>
        <!-- SEARCH -->
        <?php
        include("../../config/connection.php");
        if (isset($_POST['search'])) {
            $roomType = $_POST['roomType'];
            $query = "SELECT * FROM rooms where Room_Type=' $roomType ' ";
            $query_run = mysqli_query($con, $query);
            if (mysqli_num_rows($query_run) == 1) {
                while ($row = mysqli_fetch_array($query_run)) {
        ?>

                    <fieldset style=" position:absolute; top:1700px; width: 98%; left:2px">
                        <form action="" method="POST" id="roomform">
                            <table align="center" style="color:white; font-size: 22px; width:75%;">
                                <tr>
                                    <td align="left">Room Type:</td>
                                    <td align="left"><textarea name="roomType" rows="1" cols="25" style="font-size: 20px;width:722px;margin:8px 0; padding: 5px 29px" form="roomform" required><?php echo $row['Room_Type']; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td align="left">No: of Rooms:</td>
                                    <td align="left"><input type="number" min="5" max="20" name="noRooms" value="<?php echo $row['NoRooms']; ?>" rows="1" cols="25" style="font-size: 20px;width:722px;margin:8px 0; padding: 5px 29px" form="roomform" required></td>
                                </tr>
                                <tr>
                                    <td align="left">Price Estimated:</td>
                                    <td align="left"><input type="text" name="price" value="<?php echo $row['Price']; ?>" rows="1" cols="25" style="font-size: 20px;" form="roomform" required></td>
                                </tr>
                                <tr>
                                    <td align="left">Room View:</td>
                                    <td align="left"><input type="text" name="roomView" value="<?php echo $row['Room_View']; ?>" rows="1" cols="25" style="font-size: 20px;" form="roomform" required></td>
                                </tr>
                                <tr>
                                    <td align="left">No of Guests:</td>
                                    <td align="left"><input type="number" min="1" max="5" name="noGuests" value="<?php echo $row['NoGuests']; ?>" rows="1" cols="25" style="font-size: 20px;width:722px; margin:8px 0;padding: 5px 29px" form="roomform" required></td>
                                </tr>
                                <tr>
                                    <td align="left">Bed Type:</td>
                                    <td align="left"><input type="text" name="bedType" value="<?php echo $row['BedType']; ?>" rows="1" cols="25" style="font-size: 20px;" form="roomform" required></td>
                                </tr>
                                <tr>
                                    <td align="left">No of Beds:</td>
                                    <td align="left"><input type="number" min="1" max="3" name="noBeds" value="<?php echo $row['NoBeds']; ?>" rows="1" cols="25" style="font-size: 20px;width:722px; margin:8px 0;padding: 5px 29px" form="roomform" required></td>
                                </tr>
                                <tr>
                                    <td align="left">Bathroom:</td>
                                    <td align="left"><input type="text" name="bathroom" value="<?php echo $row['Bathroom']; ?>" rows="1" cols="25" style="font-size: 20px;" form="roomform" required></td>
                                </tr>
                                <tr>
                                    <td align="left">Amenities:</td>
                                    <td align="left"><input type="text" name="amenities" value="<?php echo $row['Amenities']; ?>" rows="3" cols="25" placeholder="List down here the suggested amenities" style="font-size: 20px;" form="roomform" required></td>
                                </tr>
                                <tr>
                                    <td align="left">Description:</td>
                                    <td align="left"><input type="text" name="description" value="<?php echo $row['Description']; ?>" rows="5" cols="30" placeholder="Add images & the description here" style="font-size: 20px;" form="roomform" required></td>
                                </tr>
                                <tr>
                                    <td align="left">Other:</td>
                                    <td align="left"><input type="text" name="other" value="<?php echo $row['Other']; ?>" rows="5" cols="30" placeholder="Special Notes" style="font-size: 20px;" form="roomform" required></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="position:relative;left:180px">
                                        <input type="submit" class="button" name="update" value="Update Room Type"></a>
                                        <input type="submit" class="button" name="delete" value="Delete Room Type"></a>
                                        <input type="reset" class="button" name="reset" value="Reset Details"></a>
                                    </td>
                                </tr>
                        </form>
    </table>
    </fieldset>

<?php
                }
            } else {
                echo "<script>alert('Room Type you entered doesn\'t Exist.Please Try Again!')</script>";
                echo "<script>window.location.href='HotelManagerManageRoom.php'</script>";
            }
        }
?>

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
<?php

include("../../config/connection.php");
if (isset($_POST['Insert'])) {

    $roomType = $_POST['roomType'];
    $noRooms = $_POST['noRooms'];
    $price = $_POST['price'];
    $roomView = $_POST['roomView'];
    $noGuests = $_POST['noGuests'];
    $bedType = $_POST['bedType'];
    $noBeds = $_POST['noBeds'];
    $bathroom = $_POST['bathroom'];
    $amenities = $_POST['amenities'];
    $description = $_POST['description'];
    $other = $_POST['other'];
    $status = 0;

    $sql = "INSERT into rooms_temp(Room_Type,NoRooms,Price,Room_View,NoGuests,BedType,NoBeds,Bathroom,Amenities,Description,Other,Status) VALUES (' $roomType ','$noRooms ','$price','$roomView ',' $noGuests ','$bedType ',' $noBeds ',' $bathroom ','$amenities ','$description ','$other','$status')";
    $query_run = mysqli_query($con, $sql);

    if ($query_run) {
        echo "<script>
            alert('New Room Type Has been Added');
            window.location.href='HotelManagerManageRoom.php';
            </script>";
    } else {
        echo "<script>
            alert('Room Type Not Added');
            window.location.href='HotelManagerManageRoom.php';
            </script>";
    }
}
?>

<!-- UPDATE -->
<?php
if (isset($_POST['update'])) {

    $noRooms = $_POST['noRooms'];
    $price = $_POST['price'];
    $roomView = $_POST['roomView'];
    $noGuests = $_POST['noGuests'];
    $bedType = $_POST['bedType'];
    $noBeds = $_POST['noBeds'];
    $bathroom = $_POST['bathroom'];
    $amenities = $_POST['amenities'];
    $description = $_POST['description'];
    $other = $_POST['other'];
    $roomType = $_POST['roomType'];
    $query = "UPDATE rooms SET NoRooms='" . $noRooms . "', Price='" . $price . "', Room_View='" . $roomView . "',NoGuests='" . $noGuests . "', BedType='" . $bedType . "', NoBeds ='" . $noBeds . "' , Bathroom='" . $bathroom . "', Amenities='" . $amenities . "' , Description='" . $description . "', Other='" . $other . "' where Room_Type ='" . $roomType . "'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        echo "<script>
                        alert('Room Type Has been updated');
                        window.location.href='HotelManagerManageRoom.php';
                        </script>";
    } else {
        echo '<script> alert("Data Not Updated") </script>';
    }
}
?>
<!-- DELETE -->
<?php
if (isset($_POST['delete'])) {
    $query = "DELETE FROM rooms where Room_Type='$_POST[roomType]'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        echo "<script>
                        alert('Room Type Has been Deleted');
                        window.location.href='HotelManagerManageRoom.php';
                        </script>";
    } else {
        echo '<script> alert("Data Not Updated") </script>';
    }
}
?>