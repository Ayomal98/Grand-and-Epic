<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Selection</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <style>
        body {
            background-image: url("../../public/images/suite-form-img.jpeg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class=" suite-rooms-form-container detail-meals" id="form-page-mealuser">
        <div class="suite-form-header meals" id="suite-form-header">
            <h3>Room Details & Availability</h3>
            <h3 style="font-weight: bolder;color:black">Customized Meals</h3>
            <h3>User & Payment Details</h3>
        </div>

        <div class="meal-type-selector">
            <h4 style="margin-right: 20px;
                        font-size: 25px;
    width: 1810px;
    margin-left:10px;color:white;">Breakfast</h4>
            <hr>
            <h4 style="margin-right: 20px;
                        font-size: 25px;
    width: 1810px;
    margin-left:10px">Lunch</h4>
            <hr>
            <h4 style="margin-right: 20px;
                        font-size: 25px;
    width: 1810px;
    margin-left:10px">Dinner</h4>
        </div>
        <div class="meal-selection" style="display: grid;grid-template-columns:100px 100px 100px 100px;column-gap:250px">
            <?php
            include('../../config/connection.php');
            $mealType = "Breakfast";
            $selectBreakfastFood = mysqli_query($con, "SELECT * FROM meals WHERE Meal_Type='$mealType'");
            if (mysqli_num_rows($selectBreakfastFood) > 0) {
                while ($rowBreakfast = mysqli_fetch_assoc($selectBreakfastFood)) {
                    echo '<div class="set-menu-meals-card">
                                <div class="set-menu-card-image"><img src="data:image;base64,' . base64_encode($rowBreakfast["Meal_Image"]) . '" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                                <input type="hidden" value="' . $rowBreakfast["Meal_Type"] . '">
                                <div class="set-menu-card-text">' . $rowBreakfast["Meals_Name"] . '<span style="display: inline-block;font-weight:bolder;">LKR ' . $rowBreakfast["Price"] . '.00</span>
                                    <div class="add-to-cart"><input type="button" name="Add to cart" value="Add to Cart" style="background-color:green;color:white;padding:10px;border:none;border-radius:5px;margin-bottom:-4px;"></div>
                                </div>
                
                            </div>';
                }
            }


            ?>

        </div>
        <div class="view-items-cart" style="position: absolute;top:140px;right:20px;background-color:green;padding:10px;border-radius:10px;width:110px;height:40px;cursor:pointer;" onclick="openCart()"><span style="font-size:15px;color:white;">View Cart</span><i class="fas fa-shopping-cart" style="color:white;position:absolute;right:10px;"></i></div>
        <div class="payment-shower" style="display: none;" id="payment-shower">
            <div class="close">+</div>
            <h1 style="font-size:22px;text-align:center;margin-right:8px;margin-top:5px;">Added Items</h1>
            <div style="display: inline-block;padding:10px;border-radius:5px;margin-top:30px;border:1px solid black;margin-left:5px;margin-right:5px">
                <span style="font-weight: bolder;font-size:20px;border:1px solid black;padding:5px;cursor:pointer;background-color:green;color:white;">-</span>

                <span style="font-size: 10px;font-weight:bolder">String Hoppers with Chicken 3 plates</span>
                <span style="font-weight: bolder;font-size:15px;padding:5px;border:1px solid black;cursor:pointer;background-color:green;color:white;">+</span>
            </div>
            <div style="display: inline-block;padding:10px;border-radius:5px;margin-top:15px;border:1px solid black;margin-left:5px;margin-right:5px">
                <span style="font-weight: bolder;font-size:20px;padding:5px;border:1px solid black;cursor:pointer;background-color:green;color:white;">-</span>
                <span style="font-size: 10px;font-weight:bolder">Noodles with Chicken Devilled curry 2 plates</span>
                <span style="font-weight: bolder;font-size:15px;padding:5px;border:1px solid black;cursor:pointer;background-color:green;color:white;">+</span>
            </div>
            <div style="display: inline-block;padding:10px;border-radius:5px;margin-top:15px;border:1px solid black;margin-left:5px;margin-right:5px">
                <span style="font-weight: bolder;font-size:20px;padding:5px;border:1px solid black;cursor:pointer;background-color:green;color:white;">-</span>
                <span style="font-size: 10px;font-weight:bolder">Pineapple Pudding</span>
                <span style="font-weight: bolder;font-size:15px;padding:5px;border:1px solid black;cursor:pointer;background-color:green;color:white;">+</span>
            </div>
        </div>
        <div style="width:100px;border-radius:5px; padding:8px;font-size:10px;background-color:green;color:white;border:none;position:absolute;top:140px;left:200px;padding:10px;border-radius:10px;width:200px;height:40px;font-size:15px;">Search Food<i class="fas fa-search" style="color: white;margin-left:10px;cursor:pointer;"></i></div>
        <div class="button-container-suite-form" style="margin-top:20px;margin-left:30%;">
            <input type="button" value="Back" id="room-details-availability" style="padding:10px;color:white;background-color: goldenrod;border:none;width:170px;height:60px;font-size:22px;cursor:pointer;margin-top:20px;margin-right:30px;" onclick="roomDetails()">
            <input type="button" value="Next" id="user-payment-details" style="padding:10px;color:white;background-color: goldenrod;border:none;width:170px;height:60px;font-size:22px;cursor:pointer;margin-top:20px;" onclick="userMealPayment()">
        </div>
    </div>

</body>

</html>