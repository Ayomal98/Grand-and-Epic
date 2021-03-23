<?php

include("../../public/includes/session.php");
include('../../public/includes/id-generator.php');

checkSession();
if (!isset($_SESSION['First_Name'])) {
    header('Location:../Hotel_Website/HomePage-login.php');
}

if (isset($_POST['Payment_Accept'])) {
    $reservationID = $_POST['Reservation_ID'];
    $customerNam = $_POST['Customer_Name'];
    $paymentMethod = $_POST['payment-method'];
    $paidAmount = $_POST['Paid_Amount'];
    $date = $_POST['Date'];
    $status = 1;
    $amountToBePaid = 0;
    $payment_ID = getID('paid_confirmations', 'P');
    $updatePaymentStatus = mysqli_query($con, "UPDATE reservation SET Payment_Status='$status', Amount_To_Be_Paid='$amountToBePaid' WHERE Reservation_ID='$reservationID'");
    $insertConfirmation = mysqli_query($con, "INSERT INTO paid_confirmations(Paid_ID,Reservation_ID,Payment_Accepted,Date_Accepted,Payment_Method) VALUES('$payment_ID','$reservationID','$paidAmount','" . $date . "','$paymentMethod')");
    if ($insertConfirmation && $updatePaymentStatus) {
        echo '<script>alert("Payment Successfullt Accepted")</script>';
        header('location:ReceptionistAcceptPayments.php');
    }
}

?>

<html>

<head>
    <link rel="stylesheet" href="../../public/css/employee.css">
    <title>
        Receptionist Accept Payments
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
        <button class="dropdown-btn">Accept Payments
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="ReceptionistDashboard.php">Dashboard</a>
            <a href="ReceptionistReservations.php">Reservations</a>
            <a href="ReceptionistRoomDetails.php">Room Details</a>
            <a href="ReceptionistRequestLeave.php">Request a Leave</a>
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
    <!-- to generate today date  -->
    <?php
    date_default_timezone_set('Asia/Colombo');
    $date = date('Y-m-d', time());
    echo '    <span id="" style="position:relative;top:-220px;width: 300px;margin-left: 500px;color:white;font-size:35px">' . $date . '</span>    ';
    ?>
    <?php
    include('../../config/connection.php');
    $tempStatus = 0;
    $selectReservationDate = mysqli_query($con, "SELECT * FROM reservation WHERE Reservation_Date='" . $date . "' AND Payment_Status='" . $tempStatus . "' ");
    if (mysqli_num_rows($selectReservationDate) > 0) {
        echo '<table style="color:white;border:1px solid white;margin-left:12%;margin-top:-100px;width: 80%;">
            <thead>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Reservation Id</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Customer Name</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Reservation type</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Amount Paid</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Amount to be Paid</th>
                <th style="border: 1px solid white;padding: 10px;font-size:20px;">Payment Status</th>
            </thead>';
        while ($rowResDetails = mysqli_fetch_assoc($selectReservationDate)) {
            $id = $rowResDetails['Reservation_ID'];
            echo '<tbody>
                    <tr>
                        <td style="border: 1px solid white;padding: 5px;">' . $rowResDetails['Reservation_ID'] . '</td>
                        <td style="border: 1px solid white;padding: 5px;">' . $rowResDetails['Customer_Name'] . '</td>
                        <td style="border: 1px solid white;padding: 5px;">' . $rowResDetails['Reservation_Type'] . '</td>
                        <td style="border: 1px solid white;padding: 5px;">' . $rowResDetails['Amount_Paid'] . '</td>
                        <td style="border: 1px solid white;padding: 5px;">' . $rowResDetails['Amount_To_Be_Paid'] . '</td>
                        <td style="border: 1px solid white;padding: 5px;"><a href="ReceptionistAcceptPayments.php?id=' . $id . '">Accept Payments</a></td>
                    </tr>';
        }
        echo '</table>';
    }

    ?>

    <?php if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $selectDetails = mysqli_query($con, "SELECT * FROM reservation WHERE Reservation_ID='$id'");
        $rowUserDetails = mysqli_fetch_assoc($selectDetails);
    ?>
        <form action="" method="POST" style="border:1px solid white;width:350px;height:400px;display: flex;flex-direction: column;padding:10px 35px;margin-left: 500px;margin-top:50px;">
            <label style="color:white;font-size: 35px;text-align: center;font-weight: bolder;">Accepting Payments</label>
            <label for="Date" style="color:white;margin-top:30px;font-size: 20px;">Customer Name</label>
            <input type="hidden" name="Date" value="<?php echo $date ?>">
            <input type="hidden" name="Reservation_ID" value="<?php echo $id ?>">
            <input type="text" name="Customer_Name" id="" value="<?php echo $rowUserDetails['Customer_Name'] ?>">
            <div style="display: inline-block;margin-top:20px;">
                <label for="Payment Selection" style="color: white;font-size: 20px;">Payment Type</label>
                <select name="payment-method">
                    <option value="By-Cash">By Cash</option>
                    <option value="By-Credit Card">By Credit Card</option>
                </select>
            </div>
            <label for="Date" style="color:white;font-size: 20px;margin-top:20px;">Amount
            </label>
            <input type="text" name="Paid_Amount" id="" value="<?php echo $rowUserDetails['Amount_To_Be_Paid'] ?>">
            <input type="submit" name="Payment_Accept" value="Payment Accepted" style="border-radius: 10px;width: 200px;padding: 10px;font-size:15px;background-color: blue;color:white;border:none;cursor: pointer;margin-left:30px;margin-top:25px;">
        </form>
    <?php } else {
    } ?>
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