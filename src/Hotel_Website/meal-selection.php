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
    <input type="button" value="Proceed to Payment" class="button1 Payment" onclick="showPayments()">

    <a href="events-booking-form.php"><input type="button" value="Back" class="button1 Payment" style="padding: 15px;position:absolute;top:5%;width:10%;left:10px"></a>
    <?php echo 'EMail is' . $_GET["events_id"] . ''; ?>


    <?php
    include('../../config/connection.php');
    $selectMeal = "SELECT * FROM events_meals_packages";
    $excecuteMeals = mysqli_query($con, $selectMeal);
    if (mysqli_num_rows($excecuteMeals) > 0) {
        while ($row = mysqli_fetch_assoc($excecuteMeals)) {
            echo '  <form action="events-booking.php" method="post">
                            <div style="color:white;margin-top:20px;background-color:black;opacity:0.9" >
                                <h3 style="text-align:center">' . $row["Package_Name"] . '</h2>
                                <div style="display:flex;flex-direction:row;justify-content:space-evenly;margin-top:20px">
                                    <div style="display:flex;flex-direction:column">
                                        <img src="data:image;base64,' . base64_encode($row["Meal1_Image"]) . '" alt="Image" style="width:180px;height:144px;" >
                                        <h4 style="text-align:center;margin-top:5px">' . $row["Meal1"] . '</h4>
                                    </div>
                                    <div style="display:flex;flex-direction:column">
                                        <img src="data:image;base64,' . base64_encode($row["Meal2_Image"]) . '" alt="Image" style="width:180px;height:144px;">
                                        <h4 style="text-align:center;margin-top:5px">' . $row["Meal2"] . '</h4>
                                    </div>
                                    <div style="display:flex;flex-direction:column">
                                        <img src="data:image;base64,' . base64_encode($row["Meal3_Image"]) . '" alt="Image" style="width:180px;height:144px;">
                                        <h4 style="text-align:center;margin-top:5px">' . $row["Meal3"] . '</h4>
                                    </div>
                                    <div style="display:flex;flex-direction:column">
                                        <img src="data:image;base64,' . base64_encode($row["Meal4_Image"]) . '" alt="Image" style="width:180px;height:144px;">
                                        <h4 style="text-align:center;margin-top:5px">' . $row["Meal4"] . '</h4>
                                    </div>
                                    <div style="display:flex;flex-direction:column">
                                        <img src="data:image;base64,' . base64_encode($row["Meal5_Image"]) . '" alt="Image" style="width:180px;height:144px;">
                                        <h4 style="text-align:center;margin-top:5px">' . $row["Meal5"] . '</h4>
                                    </div>
                                </div>
                                <div class="amount-events" style="margin-top:25px;margin-left:1200px"><span> Whole Plate For Rs.' . $row["price"] . '/=</span></div>
                                <input type="submit" value="Select the Package" name="Select_Meal" id="addCart" onsubmit="handleSubmit()">
                                <input type="hidden" value=' . $row["Package_ID"] . ' name="packageID">
                                <input type="hidden" value=' . $_GET["events_id"] . ' name="eventsID">
                            </div>
                            </form>';
        }
    }
    ?>
    <div style="display:none;position:absolute;top:10px;background-color: black;opacity:0.95;width:100%;height:100%;justify-content:center;align-items:center;height:100vh" id="payments">
        <?php 
        ?>
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
                <input type="submit" name="paymet" value="Book-Now" style=" color: #f0f0f0;
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
<!--  -->