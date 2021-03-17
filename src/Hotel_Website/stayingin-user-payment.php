<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suite Room Form</title>
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
            <form action="suite-insert.php" method="POST">
                <div class="user-details">
                    <label for="User-Deatils" style="font-weight: bolder;margin-top:-40px;font-size:45px;color:white;margin-left:50px;">User Details</label>
                    <div class="user-details">
                        <input type="text" name="FName" id="" placeholder="First Name" style="padding:15px;width:300px;margin-left:-270px;border-radius:10px;border:none;">
                        <input type="text" name="LName" id="" placeholder="Last Name" style="padding:15px;width:300px;margin-left:-270px;border-radius:10px;border:none;">
                        <input type="number" name="ContactNo" id="" placeholder="Contact Number" style="padding:15px;width:300px;margin-left:-270px;border-radius:10px;border:none;">
                        <input type="text" name="Address" id="" placeholder="Address" style="padding:15px;width:300px;margin-left:-270px;border-radius:10px;border:none;">
                        <input type="text" name="City" id="" placeholder="City" style="padding:15px;width:300px;margin-left:-270px;border-radius:10px;border:none;">
                    </div>
                </div>
                <div class="payment-details">
                    <div style="margin-top:-15px;font-weight:bolder"><label for="Payment-Deatils" style="font-size:45px;color:white;" ;>Payment Details</label></div>
                    <fieldset style="width: 450px;height:450px;margin-top:80px;background-color:white;border-radius:10px;border:none;padding:10px;">
                        <div class="room-payment" style="font-weight: bolder;font-size:30px;margin-bottom:10px;"><u>Price For the Rooms</u></div>
                        <label for="">Suite Room x 2 </label><label for="" style="font-weight:bolder;position:absolute;top:31%;right:15%">&nbsp;Rs.50,000/=</label>
                        <div class="room-payment" style="font-weight: bolder;font-size:30px;margin-bottom:10px;margin-top:10px;"><u>Price For Meals</u></div>
                        <label for="" style="font-weight:bolder;text-align:center;margin-left:50px;margin-bottom:20px;">Customized Menu</label><br>
                        <label for="" style="margin-top:20px;margin-left:10px;">Day 1</label><label for="">&nbsp; Rs.3000 /=</label><br>
                        <label for="" style="margin-top:20px;margin-left:10px;">Day 2</label><label for="">&nbsp; Rs.5000 /=</label><br>
                        <label for="total amount meals" style="font-weight: bolder;font-size:20px;">Total Amount for Meals </label>&nbsp;<span style="font-weight: bolder;position:absolute;top:49.5%;right:15%"> Rs.8000/=</span>
                        <div class="total-amount" style="font-weight: bolder;font-size:30px;margin-bottom:10px;margin-top:20px;"><u>Total Amount</u></div>
                        <label for="">Total Amount for the Booking <br><br></label><span style="font-weight: bolder;position:absolute;top:60%;right:15%"> Rs.58,000/=</span>
                        <div class="total-amount" style="font-weight: bolder;font-size:30px;margin-bottom:10px;margin-top:-5px;"><u>Advance Amount</u></div>
                        <label for="" style="font-weight:bold">Total Amount * 20 % <br><br></label><span style="position: absolute;right:14%;top:70.5%;font-size:28px;font-weight:bolder">Rs.11,600/=</span>
                    </fieldset>

                </div>
                <input type="submit" value="Previous" id="previous-meal-btn" style="padding:10px;color:white;background-color: goldenrod;border:none;width:170px;height:60px;font-size:22px;cursor:pointer;margin-top:20px;margin-right:10px;">
                <input type="submit" name="BOOK_SUITE" style="padding:10px;color:white;background-color: goldenrod;border:none;width:170px;height:60px;font-size:22px;cursor:pointer;margin-top:20px;margin-right:10px;" value="Book Now">
            </form>
        </div>
    </div>
</body>