<!-- This page consists for meals(set menu for the logged in customers) -->
<?php
session_start();
$username = $_SESSION['First_Name'];
$email = $_SESSION['User_Email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand & Epic Hotel</title>
    <link rel="stylesheet" href="../Css/style.css">
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="header-container" id="header-container">
        <?php include("sticky-nav.php"); ?>

        <?php include("side-nav-login.php"); ?>
        <span class="fa fa-user" style="position:absolute;top:20px;right:40px;font-size:60px;color:white"><span class="far fa-caret-square-down" style="font-size:20px;margin-left:10px;" onclick="funcUserDetails()"></span></span>
        <div id="user-detail-container">
            <span class="fa fa-window-close" style="margin-left:130px;" onclick="funcCloseUserDetails()"></span>
            <p style="margin-bottom: 10px;"><?php echo "Logged in as $username"; ?></P>
            <hr style="color:teal">
            <a href="logout.php"><input type="button" value="Log-out" name="logout-btn" style="margin-top:5px;margin-left:85px;padding:5px;background-color:black;color:white;border-radius:5px;"></a>

        </div>
        <div class="text-container">
            <span class="text1">Grand &</span>
            <span class="text2">Epic
            </span>
        </div>
    </div>
    <!-- set menu shower container -->
    <div class="body-container set-menu" id="body-container-set-menu">
        <div class="all-in-price">All in one for Rs.1200/=<span style="font-weight:bold;font-size:15px;color:black">&nbsp-For Fullboard Customers Only</span></div>
        <h1 style="text-align: center;font-size:40px;margin-top:-10px;padding:20px;">Set Menu For Staying-In </h1>
        <div class="set-menu-breakfast-area">
            <h3 style="font-family: roboto;font-weight:lighter;color:white;position:absolute;color:white;left:43%;font-size:30px;margin-top:-10px;">Breakfast Menu</h3>
            <div class="set-menu-meals-card">
                <div class><img src="src/br1.jpg" style="border-radius:10px 10px 0px 0px;" alt=""></div>
                <div class="set-menu-card-text">String Hoppers
                </div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/br2.jpg" style="border-radius:10px 10px 0px 0px;" alt=""></div>
                <div class="set-menu-card-text">Pol Sambol</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/br3.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Sri Lankan Coconut Milk Gravy</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/br4.jpg" style="border-radius:10px 10px 0px 0px;" alt=""></div>
                <div class="set-menu-card-text">Fish curry</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/br5.jpg" style="border-radius:10px 10px 0px 0px;" alt=""></div>
                <div class="set-menu-card-text">Sweet Onion Relish</div>
            </div>
        </div>

        <div class="set-menu-lunch-area">
            <h3 style="font-family: roboto;font-weight:lighter;color:white;position:absolute;color:white;left:43%;font-size:30px;margin-top:-10px;">Lunch Menu</h3>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/lu1.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Fried Rice</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/lu2.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Devilled Chicken Curry</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/lu3.png" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Vegetable Salad with Mayonise</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/lu4.png" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Dhal curry</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/lu5.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Fish Cutlet with Tomato Sauce</div>
            </div>

        </div>
        <div class="set-menu-dinner-area">
            <h3 style="font-family: roboto;font-weight:lighter;color:white;position:absolute;color:white;left:43%;font-size:30px;margin-top:-10px;">Dinner Menu</h3>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/di1.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Pasta</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/di2.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Chicken Gravy</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/di3.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Tomato Sauce</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/di4.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Potato Chips</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/di5.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Mayonise</div>
            </div>
        </div>
    </div>

    <div class="body-container set-menu" id="body-container-set-menu">

        <h1 style="text-align: center;font-size:40px;margin-top:-100px">Set Menu For Events </h1>
        <div class="set-menu-breakfast-area">
            <div class="set-menu-meals-card">
                <div class><img src="src/br1.jpg" style="border-radius:10px 10px 0px 0px;" alt=""></div>
                <div class="set-menu-card-text">String Hoppers
                </div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/br2.jpg" style="border-radius:10px 10px 0px 0px;" alt=""></div>
                <div class="set-menu-card-text">Pol Sambol</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/br3.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Sri Lankan Coconut Milk Gravy</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/br4.jpg" style="border-radius:10px 10px 0px 0px;" alt=""></div>
                <div class="set-menu-card-text">Fish curry</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/br5.jpg" style="border-radius:10px 10px 0px 0px;" alt=""></div>
                <div class="set-menu-card-text">Sweet Onion Relish</div>
            </div>
        </div>

        <div class="set-menu-lunch-area">
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/lu1.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Fried Rice</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/lu2.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Devilled Chicken Curry</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/lu3.png" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Vegetable Salad with Mayonise</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/lu4.png" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Dhal curry</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/lu5.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Fish Cutlet with Tomato Sauce</div>
            </div>

        </div>
        <div class="set-menu-dinner-area">
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/di1.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Pasta</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/di2.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Chicken Gravy</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/di3.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Tomato Sauce</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/di4.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Potato Chips</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="src/di5.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Mayonise</div>
            </div>
        </div>
    </div>

    <!-- Customize menu shower container -->

    <div class="body-container customize-menu" id="body-container-customize-menu">
        <!-- for breakast area     -->
        <div class="breakfast-customized">
            <div class="meal-types-headers" style="display: flex;flex-direction:column;background-color:white;position:absolute;padding:13px 15px;position:absolute;right:40%;top:125%;font-size:20px;cursor:pointer;">
                <ul style="display: flex;flex-direction:row;">
                    <li style="margin-right:10px;border-right:1px solid;padding:5px 7px 5px 5px" class="customize-type">Breakast</li>
                    <li style="margin-right:10px;border-right:1px solid;padding:5px 7px 5px 5px">Lunch</li>
                    <li style="margin-right:10px;padding:5px">Dinner</li>
                </ul>
            </div>
            <div class="all-in-price">Make your own food menu<span style="font-weight:bold;font-size:15px;color:black">&nbsp-For both Dine-in & Events Customers Only</span></div>
            <h1 style="text-align: center;font-size:40px;margin-top:-80px">Customized Menu</h1>
            <div class="set-menu-breakfast-area">
                <h3 style="font-family: roboto;font-weight:lighter;color:white;position:absolute;color:white;left:43%;font-size:30px;margin-top:-10px;">Mains with curries</h3>
                <div class="set-menu-meals-card">
                    <div class><img src="src/br1.jpg" style="border-radius:10px 10px 0px 0px;" alt=""></div>
                    <div class="set-menu-card-text">String Hoppers With Chicken curry<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span>
                    </div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/mbr2.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Noodles With Chicken Devilled curry<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/mbr5.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Roti (3 pieces) with dhal curry<span style="display: block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/mbr4.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Bran Pittu(2 pieces) with Fish curry<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/mbr1.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%   " alt=""></div>
                    <div class="set-menu-card-text">Milk Rice(4 pieces) with Lunu Miris<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>
            </div>

            <div class="set-menu-lunch-area">
                <h3 style="font-family: roboto;font-weight:lighter;color:white;position:absolute;color:white;left:43%;font-size:30px;margin-top:-10px;">Appetizers</h3>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/lu1.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Crabby Snacks<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/lu2.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Stuffed Cherry Peppers<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/lu3.png" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Baked Clams<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/lu4.png" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Indian Mint Yogur<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/lu5.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Biscuits With Cheese and preserves<span style="display: block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>

            </div>
            <div class="set-menu-dinner-area">
                <h3 style="font-family: roboto;font-weight:lighter;color:white;position:absolute;color:white;left:43%;font-size:30px;margin-top:-10px;">Deserts</h3>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/di1.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Strawberry Panna Cotta<span>$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/di2.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Pineapple pudding<span>$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/di3.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Watalappan<span>$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/di4.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Fruit Triffle<span>$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/di5.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Red Velvet pudding<span>$1.49/LKR 275.00</span></div>
                </div>
            </div>
        </div>
        <!-- for lunch area     -->
        <div class="lunch-customized" style="display: none;">
            <div class="meal-types-headers" style="display: flex;flex-direction:column;background-color:white;position:absolute;padding:13px 15px;position:absolute;right:40%;top:125%;font-size:20px;cursor:pointer;">
                <ul style="display: flex;flex-direction:row;">
                    <li style="margin-right:10px;border-right:1px solid;padding:5px 7px 5px 5px" class="customize-type">Breakast</li>
                    <li style="margin-right:10px;border-right:1px solid;padding:5px 7px 5px 5px">Lunch</li>
                    <li style="margin-right:10px;padding:5px">Dinner</li>
                </ul>
            </div>
            <div class="all-in-price">Make your own food menu<span style="font-weight:bold;font-size:15px;color:black">&nbsp-For both Dine-in & Events Customers Only</span></div>
            <h1 style="text-align: center;font-size:40px;margin-top:-80px">Customized Menu</h1>
            <div class="set-menu-breakfast-area">
                <h3 style="font-family: roboto;font-weight:lighter;color:white;position:absolute;color:white;left:43%;font-size:30px;margin-top:-10px;">Mains with curries</h3>
                <div class="set-menu-meals-card">
                    <div class><img src="src/br1.jpg" style="border-radius:10px 10px 0px 0px;" alt=""></div>
                    <div class="set-menu-card-text">String Hoppers With Chicken curry<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span>
                    </div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/mbr2.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Noodles With Chicken Devilled curry<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/mbr5.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Roti (3 pieces) with dhal curry<span style="display: block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/mbr4.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Bran Pittu(2 pieces) with Fish curry<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/mbr1.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%   " alt=""></div>
                    <div class="set-menu-card-text">Milk Rice(4 pieces) with Lunu Miris<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>
            </div>

            <div class="set-menu-lunch-area">
                <h3 style="font-family: roboto;font-weight:lighter;color:white;position:absolute;color:white;left:43%;font-size:30px;margin-top:-10px;">Appetizers</h3>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/lu1.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Crabby Snacks<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/lu2.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Stuffed Cherry Peppers<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/lu3.png" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Baked Clams<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/lu4.png" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Indian Mint Yogur<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/lu5.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Biscuits With Cheese and preserves<span style="display: block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>

            </div>
            <div class="set-menu-dinner-area">
                <h3 style="font-family: roboto;font-weight:lighter;color:white;position:absolute;color:white;left:43%;font-size:30px;margin-top:-10px;">Deserts</h3>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/di1.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Strawberry Panna Cotta<span>$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/di2.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Pineapple pudding<span>$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/di3.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Watalappan<span>$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/di4.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Fruit Triffle<span>$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/di5.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Red Velvet pudding<span>$1.49/LKR 275.00</span></div>
                </div>
            </div>
        </div>
        <!-- for dinner area     -->
        <div class="dinner-customized" style="display: none;">
            <div class="meal-types-headers" style="display: flex;flex-direction:column;background-color:white;position:absolute;padding:13px 15px;position:absolute;right:40%;top:125%;font-size:20px;cursor:pointer;">
                <ul style="display: flex;flex-direction:row;">
                    <li style="margin-right:10px;border-right:1px solid;padding:5px 7px 5px 5px" class="customize-type">Breakast</li>
                    <li style="margin-right:10px;border-right:1px solid;padding:5px 7px 5px 5px">Lunch</li>
                    <li style="margin-right:10px;padding:5px">Dinner</li>
                </ul>
            </div>
            <div class="all-in-price">Make your own food menu<span style="font-weight:bold;font-size:15px;color:black">&nbsp-For both Dine-in & Events Customers Only</span></div>
            <h1 style="text-align: center;font-size:40px;margin-top:-80px">Customized Menu</h1>
            <div class="set-menu-breakfast-area">
                <h3 style="font-family: roboto;font-weight:lighter;color:white;position:absolute;color:white;left:43%;font-size:30px;margin-top:-10px;">Mains with curries</h3>
                <div class="set-menu-meals-card">
                    <div class><img src="src/br1.jpg" style="border-radius:10px 10px 0px 0px;" alt=""></div>
                    <div class="set-menu-card-text">String Hoppers With Chicken curry<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span>
                    </div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/mbr2.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Noodles With Chicken Devilled curry<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/mbr5.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Roti (3 pieces) with dhal curry<span style="display: block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/mbr4.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Bran Pittu(2 pieces) with Fish curry<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/mbr1.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%   " alt=""></div>
                    <div class="set-menu-card-text">Milk Rice(4 pieces) with Lunu Miris<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>
            </div>

            <div class="set-menu-lunch-area">
                <h3 style="font-family: roboto;font-weight:lighter;color:white;position:absolute;color:white;left:43%;font-size:30px;margin-top:-10px;">Appetizers</h3>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/lu1.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Crabby Snacks<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/lu2.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Stuffed Cherry Peppers<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/lu3.png" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Baked Clams<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/lu4.png" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Indian Mint Yogur<span style="display: inline-block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/lu5.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Biscuits With Cheese and preserves<span style="display: block;font-weight:bolder;">$1.49/LKR 275.00</span></div>
                </div>

            </div>
            <div class="set-menu-dinner-area">
                <h3 style="font-family: roboto;font-weight:lighter;color:white;position:absolute;color:white;left:43%;font-size:30px;margin-top:-10px;">Deserts</h3>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/di1.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Strawberry Panna Cotta<span>$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/di2.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Pineapple pudding<span>$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/di3.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Watalappan<span>$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/di4.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Fruit Triffle<span>$1.49/LKR 275.00</span></div>
                </div>
                <div class="set-menu-meals-card">
                    <div class="set-menu-card-image"><img src="src/di5.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                    <div class="set-menu-card-text">Red Velvet pudding<span>$1.49/LKR 275.00</span></div>
                </div>
            </div>
        </div>
    </div>


    <?php include("footer-footer.php"); ?>
    <script src="../Javascript/script.js"></script>
    <script src="../Javascript/sticky-nav.js"></script>
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