<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="bg-modal-early-request" id="bg-modal-early-request">
        <div class="modal-content early-request">
            <div class="close close-early-checkout">+</div>
            <img src="../../public/Images/early-checkout.jpg" alt="" class="early-logo">
            <h3 class="login-heading" style="color:white">Request Early Checkout</h3>
            <form action="" method="post">
                <div class="early-reservation-id">
                    <label for="" style="color:white">Reservation ID</label>
                    <input type="text" name="" id="" class="inputs">
                </div>
                <div class="early-checked-in" style="display: flex;margin-left:35px;">
                    <div style="margin-right: 100px;">
                        <label for="" style="color:white">Date Checked In</label>
                        <input type="date" name="" id="" style="width: 120%;display: block;margin: 15px auto; padding: 10px; border-radius: 4px; border-color: black;">
                    </div>
                    <div>
                        <label for="" style="color:white">Stated Checked Out Date</label>
                        <input type="date" name="" id="" style="width: 120%;display: block;margin: 15px auto; padding: 10px; border-radius: 4px; border-color: black;">
                    </div>
                </div>
                <div class="early-actual-checked-out">
                    <label for="" style="color:white">Actual Checked Out Date</label>
                    <input type="date" name="" id="" class="inputs">
                </div>
                <div class="early-reasons">
                    <label for="" style="color:white">Reason</label>
                    <input type="text" name="" id="" style="width: 80%;height:80px;display: block;margin: 15px auto; padding: 10px; border-radius: 4px; border-color: black;">
                </div>
                <div style="display: inline-block;">
                    <input type="reset" value="Cancel" style="margin: 5px;padding: 7px;border-radius: 4px;border: none;background-color: #3498db;color: #fff;font-size: 15px;  cursor: pointer;">
                    <input type="submit" value="Request Early Checkout" style="margin: 5px;padding: 7px;border-radius: 4px;border: none;background-color: #3498db;color: #fff;font-size: 15px;  cursor: pointer;">
                </div>
            </form>
        </div>
    </div>

</body>

</html>