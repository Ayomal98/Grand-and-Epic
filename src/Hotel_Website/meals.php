<!-- This page consists for meals(set menu for the not logged in customers) -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand & Epic Hotel</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="header-container" id="header-container">
        <?php include("../../public/includes/sticky-nav.php"); ?>

        <?php include("../../public/includes/side-nav.php"); ?>
        <div class="text-container">
            <span class="text1">Grand &</span>
            <span class="text2">Epic
            </span>
        </div>
    </div>
    <?php include('login-signup-template.php'); ?>
    <?php include('forgotpassword.php'); ?>

    <!-- set menu shower container for the staying in users -->
    <div class="body-container set-menu" id="body-container-set-menu">
        <div class="all-in-price">All in one for Rs.1200/=<span style="font-weight:bold;font-size:15px;color:black">&nbsp-For Fullboard Customers Only</span></div>
        <h1 style="text-align: center;font-size:40px;margin-top:-10px;padding:20px;">Set Menu For Staying-In </h1>
        <p style="text-align: center;font-size:20px;">Please note that this menu is for the staying in customers which will be sufficient for one person only</p>
        <div class="set-menu-breakfast-area">
            <h3 style="font-family: roboto;font-weight:lighter;color:white;position:absolute;color:white;left:43%;font-size:30px;margin-top:-10px;">Breakfast Menu</h3>
            <div class="set-menu-meals-card">
                <div class><img src="../../public/images/br1.jpg" style="border-radius:10px 10px 0px 0px;" alt=""></div>
                <div class="set-menu-card-text">String Hoppers
                </div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/br2.jpg" style="border-radius:10px 10px 0px 0px;" alt=""></div>
                <div class="set-menu-card-text">Pol Sambol</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/br3.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Sri Lankan Coconut Milk Gravy</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/br4.jpg" style="border-radius:10px 10px 0px 0px;" alt=""></div>
                <div class="set-menu-card-text">Fish curry</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/br5.jpg" style="border-radius:10px 10px 0px 0px;" alt=""></div>
                <div class="set-menu-card-text">Sweet Onion Relish</div>
            </div>
            <div class="amount-set-menu" style="position: absolute;top:200%;right:20%"><span> Whole Plate For Rs.400/=</span></div>
        </div>

        <div class="set-menu-lunch-area">
            <h3 style="font-family: roboto;font-weight:lighter;color:white;position:absolute;color:white;left:43%;font-size:30px;margin-top:-10px;">Lunch Menu</h3>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/lu1.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Fried Rice</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/lu2.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Devilled Chicken Curry</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/lu3.png" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Vegetable Salad with Mayonise</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/lu4.png" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Dhal curry</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/lu5.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Fish Cutlet with Tomato Sauce</div>
            </div>
            <div class="amount-set-menu" style="position: absolute;top:270%;right:20%"><span> Whole Plate For Rs.600/=</span></div>
        </div>
        <div class="set-menu-dinner-area">
            <h3 style="font-family: roboto;font-weight:lighter;color:white;position:absolute;color:white;left:43%;font-size:30px;margin-top:-10px;">Dinner Menu</h3>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/di1.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Pasta</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/di2.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Chicken Gravy</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/di3.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Tomato Sauce</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/di4.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Potato Chips</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/di5.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Mayonise</div>
            </div>
            <div class="amount-set-menu" style="position: absolute;top:333%;right:20%"><span> Whole Plate For Rs.800/=</span></div>
        </div>
    </div>
    <!-- set menu shower container for the events users -->

    <!-- <div class="body-container set-menu" id="body-container-set-menu">

        <h1 style="text-align: center;font-size:40px;margin-top:-100px">Set Menu For Events </h1>
        <div class="set-menu-breakfast-area">
            <h3 style="font-family: roboto;font-weight:lighter;color:white;position:absolute;color:white;left:43%;font-size:30px;margin-top:-10px;">Set Menu 1</h3>
            <div class="set-menu-meals-card">
                <div class><img src="../../public/images/br1.jpg" style="border-radius:10px 10px 0px 0px;" alt=""></div>
                <div class="set-menu-card-text">String Hoppers
                </div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/br2.jpg" style="border-radius:10px 10px 0px 0px;" alt=""></div>
                <div class="set-menu-card-text">Pol Sambol</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/br3.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Sri Lankan Coconut Milk Gravy</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/br4.jpg" style="border-radius:10px 10px 0px 0px;" alt=""></div>
                <div class="set-menu-card-text">Fish curry</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/br5.jpg" style="border-radius:10px 10px 0px 0px;" alt=""></div>
                <div class="set-menu-card-text">Sweet Onion Relish</div>
            </div>
            <div class="amount-set-menu" style="position: absolute;top:425%;right:20%"><span> Whole Plate For Rs.800/=</span></div>

        </div>

        <div class="set-menu-lunch-area">
            <h3 style="font-family: roboto;font-weight:lighter;color:white;position:absolute;color:white;left:43%;font-size:30px;margin-top:-10px;">Set Menu 2</h3>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/lu1.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Fried Rice</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/lu2.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Devilled Chicken Curry</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/lu3.png" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Vegetable Salad with Mayonise</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/lu4.png" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Dhal curry</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/lu5.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Fish Cutlet with Tomato Sauce</div>
            </div>
            <div class="amount-set-menu" style="position: absolute;top:492%;right:20%"><span> Whole Plate For Rs.800/=</span></div>
        </div>
        <div class="set-menu-dinner-area">
            <h3 style="font-family: roboto;font-weight:lighter;color:white;position:absolute;color:white;left:43%;font-size:30px;margin-top:-10px;">Set Menu 3</h3>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/di1.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Pasta</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/di2.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Chicken Gravy</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/di3.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Tomato Sauce</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/di4.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Potato Chips</div>
            </div>
            <div class="set-menu-meals-card">
                <div class="set-menu-card-image"><img src="../../public/images/di5.jpg" style="border-radius:10px 10px 0px 0px;height:163.5px;width:100%" alt=""></div>
                <div class="set-menu-card-text">Mayonise</div>
            </div>
            <div class="amount-set-menu" style="position: absolute;top:555%;right:20%"><span> Whole Plate For Rs.800/=</span></div>
        </div>
    </div> -->

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


    <?php include("../../public/includes/footer-footer.php"); ?>
    <script src="../../public/Javascript/script.js"></script>
    <script src="../../public/Javascript/sticky-nav.js"></script>

</body>

</html>