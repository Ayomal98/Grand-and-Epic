<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Early Checkout</title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<?php
include('../../config/connection.php');
$stayingInID = $_GET['id'];
$getStayingInBookingDetailsQuery = mysqli_query($con, "SELECT * FROM stayingin_booking WHERE StayingIn_ID='" . $stayingInID . "' ");
$rowBookingDetails = mysqli_fetch_assoc($getStayingInBookingDetailsQuery);
?>

<body style="background-color: black;">
    <div class="bg-modal-early-request" id="bg-modal-early-request">
        <div class="modal-content early-request" style="padding: 5px;">
            <form action="" method="POST">
                <img src="../../public/Images/early-checkout.jpg" style="margin-left: 40%;height:60px;margin-top:10px;margin-bottom:5px" alt="" class="early-logo">
                <u style="color:white">
                    <h3 class="login-heading" style="color:white">Request Early Checkout</h3>
                </u>
                <div class="early-reservation-id">
                    <label for="" style="color:white">Reservation ID</label>
                    <input type="text" name="" id="" class="inputs" value="<?php echo $stayingInID; ?>" readonly>
                </div>
                <div class="early-checked-in" style="display: flex;margin-left:35px;">
                    <div style="margin-right: 100px;">
                        <label for="" style="color:white">Date Checked In</label>
                        <input type="date" name="checked_in_date" id="" style="width: 120%;display: block;margin: 15px auto; padding: 10px; border-radius: 4px; border-color: black;" value="<?php echo $rowBookingDetails['CheckIn_Date']; ?>" readonly>
                    </div>
                    <div>
                        <label for="" style="color:white;margin-left:105px">Stated Checked Out Date</label>
                        <input type="date" name="checked_out_date" id="requested-early-checkout-date" style="width: 100%;display: block;margin: 15px 0px 15px 65px; padding: 10px; border-radius: 4px; border-color: black;" value="<?php echo $rowBookingDetails['CheckOut_Date']; ?>" readonly>
                    </div>
                </div>
                <div class=" early-actual-checked-out">
                    <label for="" style="color:white">Required Checked Out Date</label>
                    <input type="date" name="requested_checkout_date" id="" class="inputs">
                </div>
                <div class="early-reasons">
                    <label for="" style="color:white">Reason</label>
                    <input type="text" name="reason" id="" style="width: 80%;height:80px;display: block;margin: 15px auto; padding: 10px; border-radius: 4px; border-color: black;">
                </div>
                <input type="hidden" name="user_email" value="<?php echo $rowBookingDetails['User_Email'] ?>">
                <div style="display: inline-block;">
                    <input type="reset" value="Cancel" style="margin: 5px;padding: 7px;border-radius: 4px;border: none;background-color: #3498db;color: #fff;font-size: 15px;  cursor: pointer;">
                    <input type="submit" name="Request-early-checkout" value="Request Early Checkout" style="margin: 5px;padding: 7px;border-radius: 4px;border: none;background-color: #3498db;color: #fff;font-size: 15px;  cursor: pointer;">
                </div>
            </form>
        </div>
    </div>

</body>

</html>

<?php
include('../../config/connection.php');
include('../../public/includes/id-generator.php');
if (isset($_POST['Request-early-checkout'])) {
    $checkedInDate = $_POST['checked_in_date'];
    $checkedOutDate = $_POST['checked_out_date'];
    $requested_checkout_date = $_POST['requested_checkout_date'];
    $reason = $_POST['reason'];
    $emailUser = $_POST['user_email'];
    $selectCustomerID = mysqli_query($con, "SELECT Customer_ID FROM customer WHERE Email='" . $emailUser . "'");
    $rowCustomerID = mysqli_fetch_assoc($selectCustomerID);
    $customerID = $rowCustomerID['Customer_ID'];
    $remarks = 0;
    $earlyCheckOutID = getID("early_checkout_table", "EC");

    $requestEalryCheckOut = mysqli_query($con, "INSERT INTO early_checkout_table (Early_Checkout_ID,Reservation_ID,Customer_ID,Date_CheckedIn,Date_CheckedOut,Requested_CheckedOut,Reason,User_Email,Remarks) VALUES('$earlyCheckOutID','$stayingInID','$customerID','$checkedInDate','$checkedOutDate','$requested_checkout_date','$emailUser','$remarks')");
    if ($requestEalryCheckOut) {
        echo '<script>alert("Early Checkout has been requested")
        window.location.href="HomePage-login.php"</script>';
    } else {
        echo '<script>alert("Early Checkout has been not requested")
        window.location.href="request-early-checkout-form.php"</script>';
    }
}

?>