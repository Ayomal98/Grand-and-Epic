<html>

<head>
    <title>Meal Selection</title>
    <link rel="stylesheet" href="../../public/css/mealsselection.css">
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body>
    <style>
        body {
            background-image: url('../../public/images/events-meals-bg.jpeg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            font-family: sans-serif;
            color: black;
            font-weight: lighter;
        }

        figcaption {
            color: white;
        }
    </style>

    <h1 style="text-align:center;color: white;margin-left:-5px;"><u>MEAL SELECTION</u></h1>
    <input type="button" value="View Cart" class="button1 cart" onclick="showMeals()">
    <i class="fas fa-shopping-cart" style="position: absolute;left:1280px;top:45px;size: 40px;color:white;cursor: pointer;"></i>
    <input type="button" value="Proceed to Payment" class="button1 Payment" onclick="showPayments()">

    <a href="events-booking-form.php"><input type="button" value="Back" class="button1 Payment" style="padding: 15px;position:absolute;top:5%;width:10%;left:10px"></a>
    <div class="main">
        <div class="row">
            <div class="column">
                <img src="../../public/images/llu1.jpg" alt="String hoppers" style=width:180px;height:144px;">
                <figcaption>Fried Rice<br><br>$1.49/LKR 275.00</figcaption>
                <div class="button1">
                    <p>Add to cart</p>
                </div>


            </div>
            <div class="column">
                <img src="../../public/images/llu2.png" alt="Milk rice" style="width:180px;height:144px;">
                <figcaption>Plain Rice-Red or White<br><br>$1.90/LKR 350.00</figcaption>
                <div class="button1">
                    <p>Add to cart</p>
                </div>
            </div>
            <div class="column">
                <img src="../../public/images/llu3.jpg" alt="Noodles" style="width:180px;height:144px;">
                <figcaption>Nasi-Gorang (Egg/Veg)<br><br>$1.79/LKR 330.00</figcaption>
                <div class="button1">
                    <p>Add to cart</p>
                </div>
            </div>
            <div class="column">
                <img src="../../public/images/llu4.jpg" alt="Plain Rice" style="width:180px;height:144px;">
                <figcaption>Spagetti<br><br>$2.01/LKR 370.00</figcaption>
                <div class="button1">
                    <p>Add to cart</p>
                </div>
            </div>
            <div class="column">
                <img src="../../public/images/llu5.jpeg" alt="Kurakkan pittu" style="width:180px;height:144px;">
                <figcaption>Chicken Biriyani<br><br>$2.17/LKR 400.00</figcaption>
                <div class="button1">
                    <p>Add to cart</p>
                </div>
            </div>
            <div class="column">
                <img src="../../public/images/llu6.jpg" alt="Roti" style="width:180px;height:144px;">
                <figcaption>Pasta<br><br>$1.90/LKR 350.00</figcaption>
                <div class="button1">
                    <p>Add to cart</p>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="column">
            <img src="../../public/images/mlu1.jpg" alt="String hoppers" style=width:180px;height:144px;">
            <figcaption>String Hoppers-Red/white (15)<br><br>$1.49/LKR 275.00</figcaption>
            <div class="button1" style="margin-top:-3px;">
                <p>Add to cart</p>
            </div>

        </div>
        <div class="column">
            <img src="../../public/images/mlu2.jpg" alt="Milk rice" style="width:180px;height:144px;">
            <figcaption>Milk rice with Lunu Miris(4 pieces)<br><br>$1.90/LKR 350.00</figcaption>
            <div class="button1" style="margin-top:-3px;">
                <p>Add to cart</p>
            </div>

        </div>
        <div class="column">
            <img src="../../public/images/lcu3.jpg" alt="Noodles" style="width:180px;height:144px;">
            <figcaption>Devilled Chicken<br><br>$1.79/LKR 330.00</figcaption>
            <div class="button1" style="margin-top:12px;">
                <p>Add to cart</p>
            </div>

        </div>
        <div class="column">
            <img src="../../public/images/lcu4.jpg" alt="Plain Rice" style="width:180px;height:144px;">
            <figcaption>Plain Rice(Red/White)<br><br>$2.01/LKR 370.00</figcaption>
            <div class="button1" style="margin-top:12px;">
                <p>Add to cart</p>
            </div>

        </div>
        <div class="column">
            <img src="../../public/images/mlu5.jpg" alt="Kurakkan pittu" style="width:180px;height:144px;">
            <figcaption>Chicken Fried Gravy<br><br>$2.17/LKR 400.00</figcaption>
            <div class="button1" style="margin-top:12px;">
                <p>Add to cart</p>
            </div>

        </div>
        <div class=column>
            <img src="../../public/images/mlu6.jpg" alt="Roti" style="width:180px;height:144px;">
            <figcaption>Roti (3 pieces)<br><br>$1.90/LKR 350.00</figcaption>
            <div class="button1" style="margin-top:12px;">
                <p>Add to cart</p>
            </div>

        </div>
    </div>
    <div class=row>
        <div class=column>
            <img src="../../public/images/llu7.jpg" alt="String hoppers" style=width:180px;height:144px;">
            <figcaption>Vegetable Salad<br><br>$1.49/LKR 275.00</figcaption>
            <div class=button1>
                <p>Add to cart</p>
            </div>

        </div>
        <div class=column>
            <img src="../../public/images/llu8.jpg" alt="Milk rice" style="width:180px;height:144px;">
            <figcaption>Milk rice with Lunu Miris(4 pieces)<br><br>$1.90/LKR 350.00</figcaption>
            <div class=button1 style="margin-top:-15px;">
                <p>Add to cart</p>
            </div>
        </div>
        <div class=column>
            <img src="../../public/images/llu9.jpg" alt="Noodles" style="width:180px;height:144px;">
            <figcaption>Prawns Curry<br><br>$1.79/LKR 330.00</figcaption>
            <div class=button1>
                <p>Add to cart</p>
            </div>

        </div>
        <div class=column>
            <img src="../../public/images/llu10.jpg" alt="Plain Rice" style="width:180px;height:144px;">
            <figcaption>Plain Rice(Red/White)<br><br>$2.01/LKR 370.00</figcaption>
            <div class=button1>
                <p>Add to cart</p>
            </div>
        </div>
        <div class=column>
            <img src="../../public/images/lu6.jpg" alt="Kurakkan pittu" style="width:180px;height:144px;">
            <figcaption>Chicken Fried Gravy<br><br>$2.17/LKR 400.00</figcaption>
            <div class=button1>
                <p>Add to cart</p>
            </div>

        </div>
        <div class=column>
            <img src="../../public/images/llu12.jpg" alt="Roti" style="width:180px;height:144px;">
            <figcaption>Roti (3 pieces)<br><br>$1.90/LKR 350.00</figcaption>
            <div class=button1>
                <p>Add to cart</p>
            </div>

        </div>
    </div>
    <div class=row>
        <div class=column>
            <img src="../../public/images/lap1.jpg" alt="String hoppers" style=width:180px;height:144px;">
            <figcaption>Anti-Pasti Bites<br><br>$1.49/LKR 275.00</figcaption>
            <div class=button1>
                <p>Add to cart</p>
            </div>

        </div>
        <div class=column>
            <img src="../../public/images/lap2.jpg" alt="Milk rice" style="width:180px;height:144px;">
            <figcaption>Potato chips with Tomato Sauce<br><br>$1.90/LKR 350.00</figcaption>
            <div class=button1>
                <p>Add to cart</p>
            </div>

        </div>
        <div class=column>
            <img src="../../public/images/lap3.jpg" alt="Noodles" style="width:180px;height:144px;">
            <figcaption>Mini Pizza<br><br>$1.79/LKR 330.00</figcaption>
            <div class=button1>
                <p>Add to cart</p>
            </div>

        </div>
        <div class=column>
            <img src="../../public/images/lap4.jpg" alt="Plain Rice" style="width:180px;height:144px;">
            <figcaption>honey garlic crockpot meatballs<br><br>$2.01/LKR 370.00</figcaption>
            <div class=button1>
                <p>Add to cart</p>
            </div>
        </div>
        <div class=column>
            <img src="../../public/images/lap5.jpg" alt="Kurakkan pittu" style="width:180px;height:144px;">
            <figcaption>stuffed baguette<br><br>$2.17/LKR 400.00</figcaption>
            <div class=button1>
                <p>Add to cart</p>
            </div>
        </div>
        <div class=column>
            <img src="../../public/images/lap6.jpg" alt="Roti" style="width:180px;height:144px;">
            <figcaption>Turkey pepper jack roll ups<br><br>$1.90/LKR 350.00</figcaption>
            <div class=button1>
                <p>Add to cart</p>
            </div>
        </div>
    </div>
    <div class=row>
        <div class=column>
            <img src="../../public/images/lds1.jpg" alt="String hoppers" style=width:180px;height:144px;">
            <figcaption>Strawberry Panna Cotta<br><br>$1.49/LKR 275.00</figcaption>
            <div class=button1>
                <p>Add to cart</p>
            </div>
        </div>
        <div class=column>
            <img src="../../public/images/lds2.jpg" alt="Milk rice" style="width:180px;height:144px;">
            <figcaption>Pineapple pudding<br><br>$1.90/LKR 350.00</figcaption>
            <div class=button1>
                <p>Add to cart</p>
            </div>
        </div>
        <div class=column>
            <img src="../../public/images/lds3.jpg" alt="Noodles" style="width:180px;height:144px;">
            <figcaption>Watalappan<br><br>$1.79/LKR 330.00</figcaption>
            <div class=button1>
                <p>Add to cart</p>
            </div>
        </div>
        <div class=column>
            <img src="../../public/images/lds4.jpg" alt="Plain Rice" style="width:180px;height:144px;">
            <figcaption>Fruit Triffle<br><br>$2.01/LKR 370.00</figcaption>
            <div class=button1>
                <p>Add to cart</p>
            </div>

        </div>
        <div class=column>
            <img src="../../public/images/lds5.jpg" alt="Kurakkan pittu" style="width:180px;height:144px;">
            <figcaption>Coffee Pudding<br><br>$2.17/LKR 400.00</figcaption>
            <div class=button1>
                <p>Add to cart</p>
            </div>

        </div>
        <div class=column>
            <img src="../../public/images/lds6.jpg" alt="Roti" style="width:180px;height:144px;">
            <figcaption>Red Velvet pudding<br><br>$1.90/LKR 350.00</figcaption>
            <div class=button1>
                <p>Add to cart</p>
            </div>

        </div>
    </div>
    <div class=row>
        <div class=column>
            <img src="../../public/images/ldr1.jpg" alt="String hoppers" style=width:180px;height:144px;">
            <figcaption>Orange Juice<br><br>$1.49/LKR 275.00</figcaption>
            <div class=button1>
                <p>Add to cart</p>
            </div>

        </div>
        <div class=column>
            <img src="../../public/images/ldr2.jpg" alt="Milk rice" style="width:180px;height:144px;">
            <figcaption>Strawberry Smoothie<br><br>$1.90/LKR 350.00</figcaption>
            <div class=button1>
                <p>Add to cart</p>
            </div>

        </div>
        <div class=column>
            <img src="../../public/images/ldr3.jpg" alt="Noodles" style="width:180px;height:144px;">
            <figcaption>Aloe-Vera Drink<br><br>$1.79/LKR 330.00</figcaption>
            <div class=button1>
                <p>Add to cart</p>
            </div>

        </div>
        <div class=column>
            <img src="../../public/images/ldr4.jpg" alt="Plain Rice" style="width:180px;height:144px;">
            <figcaption>Chocolate MilkShake With Whipped Cream<br><br>$2.01/LKR 370.00</figcaption>
            <div class=button1 style="margin-top: -13px;">
                <p>Add to cart</p>
            </div>

        </div>
        <div class=column>
            <img src="../../public/images/ldr5.jpg" alt="Kurakkan pittu" style="width:180px;height:144px;">
            <figcaption>Butterfly Pea Flower Drink<br><br>$2.17/LKR 400.00</figcaption>
            <div class=button1>
                <p>Add to cart</p>
            </div>

        </div>
        <div class=column>
            <img src="../../public/images/ldr6.jpg" alt="Roti" style="width:180px;height:144px;">
            <figcaption>Faluda With Ice-Cream<br><br>$1.90/LKR 350.00</figcaption>
            <div class=button1>
                <p>Add to cart</p>
            </div>

        </div>
    </div>

    <div style="display:none;position:absolute;top:10px;background-color: black;opacity:0.96;width:100%;height:100%;justify-content:center;align-items:center;height:100vh" id="mealCart">

        <div style="position: absolute;width:650px;height:500px;background-color:white">
            <i class="fas fa-times-circle" style="position:absolute;top:3%;right:8%;color:black;font-size:25px;cursor:pointer;color:white;width:20px;height:40px;color:black" onclick="closeFoodCart()"></i>
            <h2 style="text-align: center;font-weight:bolder;font-size:33px;color:black">Selected Meals</h3>
                <table border="1px solid black" style="margin-left: 6.0%;border-radius:5px">
                    <thead>
                        <tr>
                            <th style="padding: 5px;width:40%">Meal Name</th>
                            <th style="padding: 5px;">No.of Plates</th>
                            <th style="padding: 5px;">Price</th>
                            <th style="padding: 5px;">Add</th>
                            <th style=" padding: 5px;">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="padding-left: 7.5px;">Pasta</td>
                            <td style="padding-left: 7.5px;">3</td>
                            <td style=" padding-left: 10.5px;">Rs.800.00</td>
                            <td style="padding-left: 8.5px;font-size:25px;font-weight:bolder;cursor:pointer">+</td>
                            <td style="padding-left: 8.5px;font-size:25px;font-weight:bolder;cursor:pointer">-</td>
                        </tr>
                        <tr>
                            <td style="padding-left: 7.5px;">Chicken Fried Rice</td>
                            <td style="padding-left: 7.5px;">4</td>
                            <td style=" padding-left: 10.5px;">Rs.1600.00</td>
                            <td style="padding-left: 8.5px;font-size:25px;font-weight:bolder;cursor:pointer">+</td>
                            <td style="padding-left: 8.5px;font-size:25px;font-weight:bolder;cursor:pointer">-</td>
                        </tr>
                        <tr>
                            <td style="padding-left: 7.5px;">Milk Rice With Lunu Miris</td>
                            <td style="padding-left: 7.5px;">4</td>
                            <td style=" padding-left: 10.5px;">Rs.1000.00</td>
                            <td style="padding-left: 8.5px;font-size:25px;font-weight:bolder;cursor:pointer">+</td>
                            <td style="padding-left: 8.5px;font-size:25px;font-weight:bolder;cursor:pointer">-</td>
                        </tr>
                        <tr>
                            <td style="padding-left: 7.5px;">Prawns Curry</td>
                            <td style="padding-left: 7.5px;">2</td>
                            <td style=" padding-left: 10.5px;">Rs.500.00</td>
                            <td style="padding-left: 8.5px;font-size:25px;font-weight:bolder;cursor:pointer">+</td>
                            <td style="padding-left: 8.5px;font-size:25px;font-weight:bolder;cursor:pointer">-</td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
    <div style="display:none;position:absolute;top:10px;background-color: black;opacity:0.95;width:100%;height:100%;justify-content:center;align-items:center;height:100vh" id="payments">
        <div style="position: absolute;width:650px;height:650px;background-color:white">
            <i class="fas fa-times-circle" style="position:absolute;top:5%;right:8%;color:black;font-size:25px;cursor:pointer;color:white;width:20px;height:40px;color:black" onclick="closePayments()"></i>
            <u>
                <h2 style="text-align: center;font-weight:bolder;font-size:33px;color:black">Payment Details</h3>
            </u>
            <h3 style="position: absolute;top:10%;left:65%;font-size:30px">Amount</h3>
            <div class="location-payment" style="margin-left:40px;margin-top:70px">
                <u>
                    <h3>Price For the Location</h3>
                </u>

                <h3 style="margin-left:20px;margin-top:30px">From 7 P.M to 11 P.M</h4>
                    <h4 style="position: absolute;top:25%;left:65%;">Rs.60,000/=</h4>
                    <h3 style="margin-left:20px;margin-top:10px">Additional Features</h3>
                    <h4 style="position: absolute;top:32%;left:65%;">Rs.50,000/=</h4>
            </div>
            <div class="location-payment" style="margin-left:40px;margin-top:40px">
                <u>
                    <h3>Price For the Meals</h3>
                </u>
                <h3 style="margin-left:20px;margin-top:30px">Total Amount for meals</h3>
                <h4 style="position: absolute;top:50%;left:65%;">Rs.20,000/=</h4>
            </div>

            <div class="location-payment" style="margin-left:40px;margin-top:40px">
                <u>
                    <h3>Total Amount</h3>
                </u>
                <h3 style="margin-left:20px;margin-top:30px">Total Amount for Booking</h3>
                <h4 style="position: absolute;top:63%;left:65%;font-size:25px;">Rs.130,000/=</h4>
            </div>
            <div class="location-payment" style="margin-left:40px;margin-top:40px">
                <u>
                    <h3>Advance Amount</h3>
                </u>
                <h3 style="margin-left:20px;margin-top:20px">Total Amount for Booking * 20%</h3>
                <h4 style="position: absolute;top:79%;left:65%;font-size:28px">Rs.26,000/=</h4>
            </div>
            <div style="margin-left:160px;margin-top:5px">
                <input type="reset" value="Cancel" name="Cancel-btn" style="color: #f0f0f0;
                            background-color: goldenrod;
                            border: none;
                            padding: 10px;
                            text-align: center;
                            width: 110px;
                            cursor:pointer
                            ">
                <input type="submit" value="Book-Now" style=" color: #f0f0f0;
                            background-color: goldenrod;
                            border: none;
                            padding: 10px;
                            text-align: center;
                            width: 110px;
                            margin-left:30px;
                            cursor:pointer
                            ">
            </div>
        </div>
    </div>


    <script>
        function showMeals() {
            document.getElementById('mealCart').style.display = 'flex';
        }

        function closeFoodCart() {
            document.getElementById('mealCart').style.display = 'none';
        }

        function showPayments() {
            document.getElementById('payments').style.display = 'flex';
        }

        function closePayments() {
            document.getElementById('payments').style.display = 'none';
        }
    </script>
</body>

</html>