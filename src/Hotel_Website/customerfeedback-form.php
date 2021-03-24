<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=fofo, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="bg-modal-customer-feedback" id="bg-modal-early-request">
        <div class="modal-content early-request">

            <div class="close close-early-checkout" id="close-early-checkout">+</div>
            <img src="../../public/images/customer-feedback.png" alt="" class="early-logo">
            <u style="color: white;">
                <h3 class="login-heading" style="color:white">Customer Feedback</h3>
            </u>
            <form action="" method="post">

                <label for="" style="color:white;font-weight:bolder;font-size:27px;margin-top:10px;">Feedback about the Hotel Service and Staff</label>
                <input type="text" name="feedback_staff" id="" style="margin-top:10px;height:100px">
                <input type="hidden" name="Reservation_ID" id="" style="margin-top:10px;height:100px">
                <div style="color:white;margin-top:20px;">
                    <label for="" style="font-weight: lighter;font-size:18px;margin-right:20px">Rate Us :</label>
                    <span style="margin-right: 5px;">
                        <input type="radio" value="Excellent" name="Staff_Rate" id="">
                        <label for="Excellent">Excellent</label>
                    </span>
                    <span style="margin-right: 5px;">
                        <input type="radio" value="Good" name="Staff_Rate" id="">
                        <label for="Good">Good</label>
                    </span>
                    <span style="margin-right: 5px;">
                        <input type="radio" value="Fair" name="Staff_Rate" id="">
                        <label for="Fair">Fair</label>
                    </span>
                    <span style="margin-right: 5px;">
                        <input type="radio" value="Poor" name="Staff_Rate" id="">
                        <label for="Poor">Poor</label>
                    </span>
                </div>
                <label for="" style="color:white;font-weight:bolder;font-size:27px;margin-top:17px;">Feedback about the Hotel Website</label>
                <input type="text" name="feedback_website" id="" style="margin-top:10px;height:100px">
                <div style="color:white;margin-top:20px;">
                    <label for="" style="font-weight: lighter;font-size:18px;margin-right:20px">Rate Us :</label>
                    <span style="margin-right: 5px;">
                        <input type="radio" value="Excellent" name="Website_Rate" id="">
                        <label for="Excellent">Excellent</label>
                    </span>
                    <span style="margin-right: 5px;">
                        <input type="radio" value="Good" name="Website_Rate" id="">
                        <label for="Good">Good</label>
                    </span>
                    <span style="margin-right: 5px;">
                        <input type="radio" value="Fair" name="Website_Rate" id="">
                        <label for="Fair">Fair</label>
                    </span>
                    <span style="margin-right: 5px;">
                        <input type="radio" value="Poor" name="Website_Rate" id="">
                        <label for="Poor">Poor</label>
                    </span>
                </div>
                <div style="display: inline-block;margin-top:5px">
                    <input type="reset" value="Cancel" style="margin: 5px;padding: 7px;border-radius: 4px;border: none;background-color: #3498db;color: #fff;font-size: 15px;  cursor: pointer;">
                    <input type="submit" name="Provide_Feedback" value="Provide Feedback" style="margin: 5px;padding: 7px;border-radius: 4px;border: none;background-color: #3498db;color: #fff;font-size: 15px;  cursor: pointer;">
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php
include('../../config/connection.php');
include('../../public/includes/id-generator.php');
if (isset($_POST['Provide_Feedback'])) {
    $customerFeedbackID = getID("customer_feedback", "CF");
    $reservationID = 'R001';
    $feedBackStaff = $_POST['feedback_staff'];
    $feedbackWebsite = $_POST['feedback_website'];
    $feedbackRate_Staff = $_POST['Staff_Rate'];
    $feedbackRate_Website = $_POST['Website_Rate'];
    // $user_Email = $_POST['user_email'];
    $status = 0;
    $insertCusFeedback = mysqli_query($con, "INSERT INTO customer_feedback(Feedback_ID,Reservation_ID,Feedback_Staff,Staff_Rate,Feedback_Website,Website_Rate,User_Email,Status) VALUES('$customerFeedbackID','$reservationID','$feedBackStaff','$feedbackRate_Staff','" . $feedbackWebsite . "','$feedbackRate_Website','$user_Email','$status')");
    if ($insertCusFeedback) {
        echo '<script>alert("Customer Feedback has been sent")
                window.location.href="myreservations.php"</script>';
    } else {
        echo '<script>alert("Customer Feedback has been not sent")
                window.location.href="myreservations.php"</script>';
    }
}
?>