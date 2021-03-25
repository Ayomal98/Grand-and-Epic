<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details & Room Payment</title>
    <style>
        body {
            background-image: url("../../public/images/suite-form-img.jpeg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="suite-rooms-form-container room-detail paymentuser" style="height:105vh">
        <div class="suite-form-header">
            <h3>Room Details & Availability</h3>
            <h3 style="font-weight: bolder;color:black;">User & Payment Details</h3>
        </div>
        <div class=" form-page-title" style="text-align: center;margin-top:10px;">
            User & Payment Details
        </div>
        <div class="form-page-fields-user">
            <form action="https://sandbox.payhere.lk/pay/checkout" method="POST">
                <div class="user-details">
                    <label for="User-Deatils" style="font-weight: bolder;margin-top:-40px;font-size:45px;color:white;margin-left:50px;">User Details</label>
                    <div class="user-details">
                        <input type="text" oninput="assignFName(event)" id="FName" name="FName" id="" placeholder="First Name" style="padding:15px;width:300px;margin-left:-270px;border-radius:10px;border:none;" required>
                        <input type="text" oninput="assignLName(event)" id="LName " name="LName" id="" placeholder="Last Name" style="padding:15px;width:300px;margin-left:-270px;border-radius:10px;border:none;" required>
                        <input type="number" oninput="assignContactNo(event)" id="ContactNo " name="ContactNo" id="" placeholder="Contact Number" style="padding:15px;width:300px;margin-left:-270px;border-radius:10px;border:none;" required>
                        <input type="text" oninput="assignAddress(event)" id="Address" name="Address" id="" placeholder="Address" style="padding:15px;width:300px;margin-left:-270px;border-radius:10px;border:none;" required>
                        <input type="text" oninput="assignCity(event)" id="City" name="City" id="" placeholder="City" style="padding:15px;width:300px;margin-left:-270px;border-radius:10px;border:none;" required>
                        <input type="hidden" name="staying_in_temp" value="">
                    </div>
                </div>
                <?php
                include('../../config/connection.php');
                $stayingIn_ID = $_GET['temp_id'];
                $select_Room_Data = mysqli_query($con, "SELECT * FROM stayingin_booking_temp WHERE StayingIn_ID='$stayingIn_ID'");
                $select_Advance_Percentage = mysqli_query($con, "SELECT Advance_Percentage from advance_amount_table WHERE Reservation_Type='Staying-In'");
                $rowPercentage = mysqli_fetch_assoc($select_Advance_Percentage);
                $advance_Percentage = $rowPercentage["Advance_Percentage"];
                while ($row = mysqli_fetch_assoc($select_Room_Data)) {
                    $total_amount = (int)$row['Room_Price'] + (int)$row['Meal_Price'];
                    $advance_amount = ($total_amount * $advance_Percentage) / 100;
                    echo '
                            <div class="payment-details">
                                <div style="margin-top:-465px;font-weight:bolder;margin-left:450px"><label for="Payment-Deatils" style="font-size:45px;color:white;" ;>Payment Details</label></div>
                                <fieldset style="width: 550px;height:450px;margin-top:55px;background-color:white;border-radius:10px;border:none;padding:15px;margin-left:405px">
                                    <div class="room-payment" style="font-weight: bolder;font-size:30px;margin-bottom:10px;"><u>Price For the Rooms</u></div>
                                    <label for="">' . $row['Room_Type'] . ' x ' . $row['No_Rooms'] . ' </label><label for="" style="font-weight:bolder;position:absolute;top:28%;right:15%">&nbsp;Rs.' . $row['Room_Price'] . '/=</label>
                                    <div class="room-payment" style="font-weight: bolder;font-size:30px;margin-bottom:10px;margin-top:10px;"><u>Price For Meals</u></div>
                                    <label for="total amount meals" style="font-weight: bolder;font-size:20px;">Total Amount for Meals </label>&nbsp;<span style="font-weight: bolder;position:absolute;top:37.0%;right:18.75%"> Rs.' . $row['Meal_Price'] . '/=</span>
                                    <div class="total-amount" style="font-weight: bolder;font-size:30px;margin-bottom:10px;margin-top:20px;"><u>Total Amount</u></div>
                                    <label for="">Total Amount for the Booking <br><br></label><span style="font-weight: bolder;position:absolute;top:48%;right:15.25%">Rs.' . $total_amount . '/=</span>
                                    <input type="hidden" name="Total_Amount" value=' . $total_amount . '>
                                    <div class="total-amount" style="font-weight: bolder;font-size:30px;margin-bottom:10px;margin-top:-5px;"><u>Advance Amount</u></div>
                                    <label for="" style="font-weight:bold">Total Amount *' . $advance_Percentage . ' % <br><br></label><span style="position: absolute;right:12%;top:58%;font-size:28px;font-weight:bolder">Rs.' . $advance_amount . '/=</span>
                                    <input type="hidden" name="Advance_Amount" value=' . $advance_amount . '>
                                    <input type="hidden" name="merchant_id" value="1215666"> <!-- Replace your Merchant ID -->
                                    <input type="hidden" name="return_url" value="http://localhost/GRAND-AND-EPIC/src/Hotel_Website/payment-thanks.php?type=staying-in&id=' . $row["StayingIn_ID"] . '">
                                    <input type="hidden" name="cancel_url" value="abc.php">
                                    <input type="hidden" name="notify_url" value="abc.php">
                                    <input type="hidden" name="country" value="Sri Lanka">
                                    <input type="hidden" name="order_id" value=' . $row["StayingIn_ID"] . '>
                                    <input type="hidden" name="items" value=' . $row["Room_Type"] . '><br>
                                    <input type="hidden" name="currency" value="LKR">
                                    <input type="hidden" name="amount" value=' . $advance_amount . '>
                                    <!-- <br><br>Customer Details<br> -->
                                    <input type="hidden" id="phFName" name="first_name" value="">
                                    <input type="hidden" id="phLName" name="last_name" value=""><br>
                                    <input type="hidden" name="email" value=' . $row['User_Email'] . '>
                                    <input type="hidden" id="phContact" name="phone" value=""><br>
                                    <input type="hidden" id="phAddress" name="address" value="">
                                    <input type="hidden" id="phCity" name="city" value="">
                                </fieldset>
            
                            </div>
                                    ';
                }
                ?>
                <input type="submit" value="Previous" id="previous-meal-btn" style="padding:10px;color:white;background-color: goldenrod;border:none;width:170px;height:60px;font-size:22px;cursor:pointer;margin-top:50px;margin-right:100px;margin-left:150px">
                <input type="submit" name="BOOK_SUITE" style="padding:10px;color:white;background-color: goldenrod;border:none;width:170px;height:60px;font-size:22px;cursor:pointer;margin-top:50px;margin-right:10px;" value="Book Now">
            </form>
        </div>
    </div>
    <script>
        //to assign input first name for payhere form
        function assignFName(e) {
            document.getElementById("phFName").value = e.target.value;
            console.log(document.getElementById("phFName").value)
        }

        //to assign input last name for payhere form
        function assignLName(e) {
            document.getElementById("phLName").value = e.target.value;
            console.log(document.getElementById("phLName").value)
        }

        //to assign input contact number for payhere form
        function assignContactNo(e) {
            document.getElementById("phContact").value = e.target.value;
            console.log(document.getElementById("phContact").value)
        }

        //to assign input address for payhere form
        function assignAddress(e) {
            document.getElementById("phAddress").value = e.target.value;
            console.log(document.getElementById("phAddress").value)
        }

        //to assign input city for payhere form
        function assignCity(e) {
            document.getElementById("phCity").value = e.target.value;
            console.log(document.getElementById("phCity").value)
        }
    </script>

</body>