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

        const cart = document.getElementById('addCart');
        cart.addEventListener('submit', (e) => {
            e.preventDefault();
        })
    </script>
</body>

</html>
<!--  -->