<?php
include("../../public/includes/session.php");
checkSession();
if (!isset($_SESSION['First_Name'])) {
    header('Location:index.php');
}
?>
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
    <div class="suite-rooms-form-container room-detail" id="suite-rooms-form-container-room-detail">
        <div class="suite-form-header">
            <h3 style="font-weight: bolder;color:black">Room Details & Availability</h3>
            <h3 style="display: none;" id="custom-meal">Customized Meals</h3>
            <h3>User & Payment Details</h3>
        </div>
        <div class="suite-form-details">
            <form action="suite-insert.php" method="post">
                <!-- start of form-for user details -->
                <div class="form-page">
                    <div class="form-page-title">
                        Room Details
                    </div>
                    <div class="form-page-fields">
                        <div class="occupancy">
                            occupancy
                            <select name="occupancy-select" class="occupancy-select" id="">
                                <option value="Double-Room">Double Room</option>
                                <option value="Triple-Room">Triple Room</option>
                            </select>
                        </div>
                        <div style="margin-left: -170px;margin-top:-25px">
                            <label for="reservation-type" style="font-size:20px;margin-right:5px;">Reservation Type</label>
                            <select name=" reservation-type" id="reservation-type" style="padding:5px">
                                <option value="Full-Board">Full Board</option>
                                <option value="Half-Board">Half Board</option>
                            </select>
                        </div>
                        <div class="occupancy-number-details" style="margin-left: 150px;">
                            <div class="occupancy-number-details-container">
                                <label for="kids">No.Of Adults</label>
                                <input type="number" name="No-Adults" id="" style="padding:-5px">
                            </div>
                            <div class="occupancy-number-details-container">
                                <label for="kids">No.Of Kids</label>
                                <input type="number" name="No-Kids" id="" style="margin-left: 5px;">
                            </div>
                            <input type="button" value="+" style="border-radius: 50%;padding:10px;border:none;margin-left:50px;font-size:20px;cursor:pointer" /><span style="font-size:15px;margin-left:10px;">Add a Room</span>
                        </div>
                    </div>
                    <div class="time-checker">
                        <label for="check-in-time" style="margin-left:-60px">Check In Time</label>
                        <select name="check-in-time" id="check-in-time" style="padding:5px;border-radius:5px;border:none;margin-right:20px" onchange="showCheckOut(event)">
                            <option value="9.00">9.00 A.M.</option>
                            <option value="14.00">2.00 P.M.</option>
                            <option value="20.00">8.00 P.M</option>
                        </select>
                        <label for="check-out-time">Check Out Time</label>
                        <input type="text" name="check-out-time" id="check-out-time" value="" style="margin-right:5px;margin-left:-2px;padding:5px;">
                    </div>

                    <div class="form-page-fields">
                        <div class="date-checker">
                            <div class="date-checker-checkin">
                                <label for="check-in-Date">Check In Date</label>
                                <input type="date" name="check-in-Date" id="">
                            </div>
                            <div class="date-checker-checkout">
                                <label for="check-out-Date">Check Out Date</label>
                                <input type="date" name="check-out-Date" id="">
                            </div>
                        </div>
                    </div>
                    <div class="form-page-fields suite-icons-container">
                        <div class="suite-icons-rooms-container">
                            <?php
                            include('../../config/connection.php');
                            $roomType = 'Suite Rooms';
                            $getNoRooms = mysqli_query($con, "SELECT NoRooms from rooms where Room_Type=' $roomType ' ");
                            $noRooms = mysqli_fetch_assoc($getNoRooms);
                            for ($roomNo = 1; $roomNo <= $noRooms['NoRooms']; $roomNo++) {
                                echo    '<div class="suite-icon">
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                            <span class="suite-icon-label">Room' . $roomNo . '</span>
                                         </div>';
                            }
                            ?>
                        </div>
                        <div class="suite-icons-main suite">
                            <div class="suite-icon main">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <span class="suite-icon-label-main">Available</span>
                            </div>
                            <div class="suite-icon gold main">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <span class="suite-icon-label-main">Not Available</span>
                            </div>
                        </div>
                    </div>
                    <div class="select-rooms">
                        <label for="" style="font-weight:bolder;margin-bottom:10px;font-size:15px;">Selection Of Room</label>
                        <input type="text" name="room-number" id="" style="padding:10px;" placeholder="Enter a Room Number">
                    </div>
                    <div class="form-page-fields">
                        <div class="meal-selection-fields" style="margin-left:295px;margin-top:12px;width:250%;margin-left:575px;margin-top:-360px">
                            <label for="meal-selection" style="font-size:20px;margin-right:15px;margin-bottom:5px;">Meal Selection</label><br>
                            <select name="meal-selection" id="meal-type" onclick="selectMealType()" style="padding:7px;margin-top:5px">
                                <option value="Set-Menu">Set Menu</option>
                                <option value="Customized">Customized</option>
                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="emailUser" value="<?php echo $_SESSION['User_Email']; ?>">
                    <div class="button-container-suite-form" style="margin-top:-60px;">
                        <input type="submit" name="Next" value="Next" id="next" style="padding:10px;color:white;background-color: goldenrod;border:none;width:170px;height:60px;font-size:22px;cursor:pointer;" onclick="userPayment()">
                        <input type="button" value="Meal Selection" id="meal-selection" style="display:none;padding:10px;color:white;background-color: goldenrod;border:none;width:170px;height:60px;font-size:22px;cursor:pointer;" onclick="mealSelect()">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--start of form for customized meal selection-->
    <div class=" suite-rooms-form-container detail-meals" style="display:none" id="form-page-mealuser">
        <div class="suite-form-header meals" id="suite-form-header">
            <h3>Room Details & Availability</h3>
            <h3 style="font-weight: bolder;color:black">Customized Meals</h3>
            <h3>User & Payment Details</h3>
        </div>
        <div class="day-selector">
            <h4 style="margin-right: 80px;
                        font-size: 30px;
    width: 1810px;
    margin-left:10px;color: #b88b4a;">Day 1</h4>
            <hr>
            <h4 style="margin-right: 80px;
    font-size: 30px;
    width: 1810px;
    margin-left:10px;">Day 2</h4>
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
        <div class="meal-selection" style="display: flex;flex-direction:row">
            <div class="set-menu-meals-card n-1">
                <div class><img src="../../public/images/br1.jpg" style="border-radius:10px 10px 0px 0px;" alt=""></div>
                <div class="set-menu-card-text">String Hoppers With Chicken curry<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span>
                    <div class="add-to-cart" width: 85px; margin-top: 2px; margin-left: 25%;><input type="button" name="Add to cart" value="Add to Cart" style="background-color:green;color:white;padding:10px;border:none;border-radius:5px;margin-bottom:-4px;"></div>
                </div>

            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/mbr2.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Noodles With Chicken Devilled curry<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span>
                    <div class="add-to-cart" width: 85px; margin-top: 2px; margin-left: 25%;><input type="button" name="Add to cart" value="Add to Cart" style="background-color:green;color:white;padding:10px;border:none;border-radius:5px;margin-bottom:-4px;"></div>
                </div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/mbr5.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Roti (3 pieces) with dhal curry<span style="display: block;font-weight:bolder;">$1.49/LKR 275.00</span>
                    <div class="add-to-cart" width: 85px; margin-top: 2px; margin-left: 25%;><input type="button" name="Add to cart" value="Add to Cart" style="background-color:green;color:white;padding:10px;border:none;border-radius:5px;margin-bottom:-4px;"></div>
                </div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/mbr4.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Bran Pittu(2 pieces) with Fish curry<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span>
                    <div class="add-to-cart" width: 85px; margin-top: 2px; margin-left: 25%;><input type="button" name="Add to cart" value="Add to Cart" style="background-color:green;color:white;padding:10px;border:none;border-radius:5px;margin-bottom:-4px;"></div>
                </div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/mbr1.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%   " alt=""></div>
                <div class="set-menu-card-text">Milk Rice(4 pieces) with Lunu Miris<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span>
                    <div class="add-to-cart" width: 85px; margin-top: 2px; margin-left: 25%;><input type="button" name="Add to cart" value="Add to Cart" style="background-color:green;color:white;padding:10px;border:none;border-radius:5px;margin-bottom:-4px;"></div>
                </div>
            </div>
        </div>
        <div class="meal-selection" style="display: flex;flex-direction:row">
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/lu1.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Crabby Snacks<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span>
                    <div class="add-to-cart" width: 85px; margin-top: 2px; margin-left: 25%;><input type="button" name="Add to cart" value="Add to Cart" style="background-color:green;color:white;padding:10px;border:none;border-radius:5px;margin-bottom:-4px;"></div>
                </div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/lu2.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Stuffed Cherry Peppers<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span>
                    <div class="add-to-cart" width: 85px; margin-top: 2px; margin-left: 25%;><input type="button" name="Add to cart" value="Add to Cart" style="background-color:green;color:white;padding:10px;border:none;border-radius:5px;margin-bottom:-4px;"></div>
                </div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/lu3.png" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Baked Clams<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span>
                    <div class="add-to-cart" width: 85px; margin-top: 2px; margin-left: 25%;><input type="button" name="Add to cart" value="Add to Cart" style="background-color:green;color:white;padding:10px;border:none;border-radius:5px;margin-bottom:-4px;"></div>
                </div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/lu4.png" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Indian Mint Yogur<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span>
                    <div class="add-to-cart" width: 85px; margin-top: 2px; margin-left: 25%;><input type="button" name="Add to cart" value="Add to Cart" style="background-color:green;color:white;padding:10px;border:none;border-radius:5px;margin-bottom:-4px;"></div>
                </div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/lu5.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Biscuits With Cheese and preserves<span style="display: block;font-weight:bolder;">$1.49/LKR 275.00</span>
                    <div class="add-to-cart" width: 85px; margin-top: 2px; margin-left: 25%;><input type="button" name="Add to cart" value="Add to Cart" style="background-color:green;color:white;padding:10px;border:none;border-radius:5px;margin-bottom:-4px;"></div>
                </div>
            </div>
        </div>
        <div class="meal-selection" style="display: flex;flex-direction:row">
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/di1.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Strawberry Panna Cotta<span>$1.49/LKR 275.00</span>
                    <div class="add-to-cart" width: 85px; margin-top: 2px; margin-left: 25%;><input type="button" name="Add to cart" value="Add to Cart" style="background-color:green;color:white;padding:10px;border:none;border-radius:5px;margin-bottom:-4px;"></div>
                </div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/di2.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Pineapple pudding<span>$1.49/LKR 275.00</span>
                    <div class="add-to-cart" width: 85px; margin-top: 2px; margin-left: 25%;><input type="button" name="Add to cart" value="Add to Cart" style="background-color:green;color:white;padding:10px;border:none;border-radius:5px;margin-bottom:-4px;"></div>
                </div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/di3.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Watalappan<span>$1.49/LKR 275.00</span>
                    <div class="add-to-cart" width: 85px; margin-top: 2px; margin-left: 25%;><input type="button" name="Add to cart" value="Add to Cart" style="background-color:green;color:white;padding:10px;border:none;border-radius:5px;margin-bottom:-4px;"></div>
                </div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/di4.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Fruit Triffle<span>$1.49/LKR 275.00</span>
                    <div class="add-to-cart" width: 85px; margin-top: 2px; margin-left: 25%;><input type="button" name="Add to cart" value="Add to Cart" style="background-color:green;color:white;padding:10px;border:none;border-radius:5px;margin-bottom:-4px;"></div>
                </div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/di5.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Red Velvet pudding<span>$1.49/LKR 275.00</span>
                    <div class="add-to-cart" width: 85px; margin-top: 2px; margin-left: 25%;><input type="button" name="Add to cart" value="Add to Cart" style="background-color:green;color:white;padding:10px;border:none;border-radius:5px;margin-bottom:-4px;"></div>
                </div>
            </div>
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
    <!--start of form for payment & user Details for setmenu details-->
    <div class="suite-rooms-form-container room-detail paymentuser" style="height:105vh;display:none;" id="form-page-paymentuser-setmenu">
        <div class="suite-form-header">
            <h3>Room Details & Availability</h3>
            <h3 style="display: none;" id="custom-meal" class="custom-meal">Customized Meals</h3>
            <h3 style="font-weight: bolder;color:black;">User & Payment Details</h3>
        </div>
        <div class=" form-page-title" style="text-align: center;margin-top:10px;">
            User & Payment Details
        </div>
        <div class="form-page-fields-user">
            <div class="user-details">
                <label for="User-Deatils" style="font-weight: bolder;margin-top:-40px;font-size:45px;color:white;margin-left:50px;">User Details</label>
                <div class="user-details">
                    <input type="text" name="" id="" placeholder="First Name" style="padding:15px;width:300px;margin-left:-270px;border-radius:10px;border:none;">
                    <input type="text" name="" id="" placeholder="Last Name" style="padding:15px;width:300px;margin-left:-270px;border-radius:10px;border:none;">
                    <input type="email" name="" id="" placeholder="Email-Address" style="padding:15px;width:300px;margin-left:-270px;border-radius:10px;border:none;">
                    <input type="number" name="" id="" placeholder="Contact Number" style="padding:15px;width:300px;margin-left:-270px;border-radius:10px;border:none;">
                    <input type="text" name="" id="" placeholder="Address" style="padding:15px;width:300px;margin-left:-270px;border-radius:10px;border:none;">
                    <input type="text" name="" id="" placeholder="City" style="padding:15px;width:300px;margin-left:-270px;border-radius:10px;border:none;">
                </div>
            </div>
            <div class="payment-details">
                <div style="margin-top:-15px;font-weight:bolder"><label for="Payment-Deatils" style="font-size:45px;color:white;" ;>Payment Details</label></div>
                <fieldset style="width: 450px;height:420px;margin-top:78px;background-color:white;border-radius:10px;border:none;padding:10px;">
                    <div class="room-payment" style="font-weight: bolder;font-size:30px;margin-bottom:10px;"><u>Price For the Rooms</u></div>
                    <label for="">Suite Room x 2 </label><label for="" style="font-weight:bolder;position:absolute;right:16%;top:31.5%;font-size:23px">&nbsp;Rs.50,000/=</label>
                    <div class="room-payment" style="font-weight: bolder;font-size:30px;margin-bottom:10px;margin-top:10px;"><u>Price For Meals</u></div>
                    <label for="" style="font-weight:bolder;text-align:center;margin-left:50px;margin-bottom:20px;">Set Menu</label><br>
                    <label for="" style="margin-top:20px;margin-left:10px;">Day 1</label><label for="">&nbsp; Rs.1000 /=</label><br>
                    <label for="" style="margin-top:20px;margin-left:10px;">Day 2</label><label for="">&nbsp; Rs.5000 /=</label><br>
                    <div class="total-amount" style="font-weight: bolder;font-size:30px;margin-bottom:10px;margin-top:20px;"><u>Total Amount</u></div>
                    <label for="">Total Amount for the Booking <br><br></label><span style="font-weight: bolder;position:absolute;right:16%;top:59.5%;font-size:23px"> Rs.56,200/=</span>
                    <div class="total-amount" style="font-weight: bolder;font-size:30px;margin-bottom:10px;margin-top:-5px;"><u>Advance Amount</u></div>
                    <label for="" style="font-weight:bold">Total Amount * 20 % <br><br></label><span style="position: absolute;right:14%;top:70.5%;font-size:28px;font-weight:bolder">Rs.11,200/=</span>
                </fieldset>

            </div>
            <input type="submit" value="Previous" id="previous-meal" style="padding:10px;color:white;background-color: goldenrod;border:none;width:170px;height:60px;font-size:22px;cursor:pointer;margin-top:20px;margin-right:10px;" onclick="SetPaymentToRoom()">
            <input type="submit" style="padding:10px;color:white;background-color: goldenrod;border:none;width:170px;height:60px;font-size:22px;cursor:pointer;margin-top:20px;margin-right:10px;" value="Book Now">

        </div>
    </div>




    <!--start of form for payment & user Details for customized details-->



    </form>
    <script>
        var a;
        //occurs in the room details page
        function selectMealType() {
            var val = document.getElementById('meal-type').value;
            console.log(val);
            if (val == 'Set-Menu') {
                document.getElementById('meal-selection').style.display = 'none'
                document.getElementById('next').style.display = 'block'
            }
            if (val == 'Customized') {
                document.getElementById('next').style.display = 'none'
                document.getElementById('meal-selection').style.display = 'block'
            }
        }

        //show the checkout time details according to given check-in details
        function showCheckOut(e) {
            var checkIn = e.target.value;
            console.log(checkIn);
            var resType = document.getElementById('reservation-type');
            var reservationType = resType.value;
            console.log(reservationType)
            var checkOut;
            if (reservationType == 'Full-Board' || reservationType == 'Half-Board') {
                if (checkIn == '9.00') {
                    checkOut = '8.00 A.M.'
                } else if (checkIn == '14.00') {
                    checkOut = '1.00 P.M.'
                } else {
                    checkOut = '7.00 P.M.'
                }
                document.getElementById('check-out-time').value = checkOut
            }
        }

        //from room details to the payment section
        function userPayment() {
            document.getElementById('suite-rooms-form-container-room-detail').style.display = 'none';
            document.getElementById('form-page-paymentuser').style.display = 'none';
            document.getElementById('form-page-mealuser').style.display = 'none';
            document.getElementById('form-page-paymentuser-setmenu').style.display = 'block';
        }

        function showRooms() {
            document.getElementById('suite-rooms-form-container-room-detail').style.display = 'block';
            document.getElementById('form-page-paymentuser').style.display = 'none';
        }

        //when customer select the customize meal
        function mealSelect() {
            document.getElementById('suite-rooms-form-container-room-detail').style.display = 'none';
            document.getElementById('form-page-mealuser').style.display = 'block';
            document.getElementById('suite-form-header').classList.add('meal');
        }

        //to open the items which were added to the cart
        function openCart() {
            document.getElementById('payment-shower').style.display = 'block';
        }

        //to close the view cart 
        document.querySelector(".close").addEventListener("click", function() {
            document.querySelector(".payment-shower").style.display = "none";
        });

        //from meals to user & payment details('for next button')
        function userMealPayment() {
            document.getElementById('form-page-mealuser').style.display = 'none';
            document.getElementById('form-page-paymentuser').style.display = 'block';
            var a = document.getElementById('suite-rooms-form-container-room-detail').style.getPropertyValue("display");
            var a = window.getComputedStyle(a);
            console.log(a);
        }
        //from meals to room details and availability
        function roomDetails() {
            document.getElementById('form-page-mealuser').style.display = 'none';
            document.getElementById('suite-rooms-form-container-room-detail').style.display = 'block';
            document.getElementById('custom-meal').setAttribute('style', 'display-block');
            document.getElementById('form-page-mealuser').style.display = 'none';
        }

        //adding event listener for the showing from payment page to meals page
        document.getElementById("previous-meal-btn").addEventListener('click', PaymentToMeals);

        function PaymentToMeals(e) {
            e.preventDefault();
            document.getElementById('form-page-paymentuser').style.display = 'none';
            document.getElementById('suite-rooms-form-container-room-detail').style.display = 'none';
            document.getElementById('form-page-mealuser').style.display = 'block';
            e.preventDefault();
        }
    </script>
</body>

</html>