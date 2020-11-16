<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Css/style.css">
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body style="background: url('../Images/pexels-agung-pandit-wiguna-2788488.jpg');width:100%;height:100%;background-size:cover">
    <div class="events-booking-form">
        <form action="" method="post">
            <h2 style="position:absolute;top:50px;left:30%;text-align:center">Reservation Form For Wedding & Parties</h2>
            <div class="customer-details-events">
                <input type="text" name="customer-name" id="" placeholder="Customer Name" style="padding:10px;margin:10px;" required>
                <input type="email" name="customer-email" id="" placeholder="Email address" style="padding:10px;margin:10px;" required>
                <input type="number" name="number-of-guests" placeholder="No-Guests" style="padding:10px;margin:10px;width:130px;" min="30" max="250" step="1" style="width:110px;" required>
            </div>
            <div class="events-booking-wrapper">
                <label for="type-of-reservation" style="font-size:25px;position:absolute;top:210px;left:30%">Reservation Type</label>
                <i class="fas fa-glass-cheers" style="position: absolute;top:185px;left:35%"></i>
                <select name="Reservation-type-events" id="meal-types" style="position:absolute;top:210px;left:42%;padding:5px;">
                    <option value="Weddings">Wedding</option>
                    <option value="Parties">Party</option>
                </select>
                <label for="type-of-meal" style="position: absolute;top:210px;left:52%;font-size:25px" ">Type Of Meal</label>
                <i class=" fas fa-utensils" style="position: absolute;top:185px;left:55%"></i>
                    <select name=" meal-type" id="std-cus-meal" style="position:absolute;top:210px;left:62%;padding:5px " onclick="mealSelection()">
                        <option value="Set-Menu">Set Menu</option>
                        <option value="Customized">Customized</option>
                    </select>
            </div>
            <div class="date-time-details">
                <div class="date-container">
                    <i class="fas fa-calendar-alt" style="position: absolute;top:250px;left:34%"></i>
                    <label for="Reservation-Date" " style=" font-size:25px;position:absolute;top:270px;left:30%;">Reservation Date</label><br>
                    <input type="date" name="events-reservation-date" id="datefield" style=" position: absolute;top:310px;left:30%">
                </div>
                <div class="time-details-events">
                    <i class="fas fa-clock" style="position: absolute;top:250px;left:64%;"></i>
                    <label for="time-container" style="position: absolute;top:270px;left:60%;font-size:25px">Time Period</label>
                    <div class="time-details-shower">
                        <label for="" style="position:absolute;top:310px;left:52%;font-size:25px;font-size:20px;">Starting time</label>
                        <input type="time" name="starting-time" id="" style="position:absolute;top:350px;left:52%">
                        <label for="" style="position: absolute;top:310px;left:70%;font-size:20px">Ending time</label>
                        <input type="time" name="ending-time" id="" style="position:absolute;top:350px;left:70%">
                    </div>
                </div>
            </div>
            <div class="additional-features" style="display: inline-block;">
                <i class="fas fa-icons" style="position:absolute;top:410px;left:35%;"></i>
                <label for="" style="font-size: 25px;position:absolute;top:430px;left:30%;">Additional Features</label>
                <label for="DJ-Music" style="font-size: 15px;position:absolute;top:440px;left:45%">DJ Music</label>
                <input type="checkbox" name="DJ-Music" id="" style="font-size: 20px;position:absolute;top:445px;left:50%;cursor:pointer">
                <label for="DJ-Music" style="font-size: 15px;position:absolute;top:440px;left:55%">Decorations</label>
                <input type="checkbox" name="DJ-Music" id="" style="font-size: 20px;position:absolute;top:445px;left:60%;cursor:pointer">
                <label for="DJ-Music" style="font-size: 15px;position:absolute;top:440px;left:65%">Champaigne Tables</label>
                <input type="checkbox" name="DJ-Music" id="" style="font-size: 20px;position:absolute;top:445px;left:73%;cursor:pointer">
            </div>
            <label for=""></label><input type="button" value="See-Price" id="See-Price" name="See-Price-btn" onclick="seePrice()" style="position: absolute;top:90px;right:140px;padding:14px 18px 14px 18px;width:9.5%;cursor:pointer;background:#b88b4a;border:none;color:white;font-weight:bolder;">
            <div class="payment-cancel-btns">
                <label for=""></label><input type="button" value="Check-Availability" id="check-availability" name="See-Price-btn" style="position: absolute;top:100px;left:140px;padding:14px 18px 14px 18px;width:9.5%;cursor:pointer;background:#b88b4a;border:none;color:white;font-weight:bolder;">
                <div class="payment-cancel-btns">
                    <input type="submit" value="Book-Now" name="Book-btn" id="book-btn" class="book-evt-btn" style="display:inline-block; position: absolute;top:500px;padding:8px;left:50%;cursor:pointer">
                    <a href="meal-selection.html"><input type="button" id="meal-btn" value="Meal-Selection" name="Meal-btn" class="event-meal-selection-btn-before"></a>
                    <input type="reset" value="Cancel" name="Cancel-btn" class="cancel-evt-btn" style="position: absolute;top:500px; padding:8px;left:40%;cursor:pointer">
                </div>
                <div class="payment-shower" style="display: none;" id="payment-shower">
                    <div class="close">+</div>
                    <h1 style="font-size:22px;text-align:center;margin-right:8px;">Payment & Reservation Details</h1>
                    <h2 style="font-size:15px;font-weight:lighter;margin-right:10px;margin-top:20px;margin-left:-75px;">Starting Time : <span style="font-weight: bold;"> 1.30 P.M. </span></h2>
                    <h2 style="font-size:15px;font-weight:lighter;margin-left:-90px;margin-top:20px;">Ending Time:<span style="font-weight: bold;">6.30 P.M.</span></h2>
                    <h2 style="font-size:15px;font-weight:lighter;margin-left:-95px;margin-top:20px;">Number Of Guests:<span style="font-weight: bold;">60</span></h2>
                    <h2 style="font-size:15px;font-weight:lighter;margin-left:-40px;margin-top:20px;">Price For Location:<span style="font-weight: bold;">Rs.50,000/=</span></h2>
                    <h2 style="font-size:15px;font-weight:lighter;margin-left:-55px;margin-top:20px;">Price For Meal:<span style="font-weight: bold;"> Rs.30,000/=</span></h2>
                    <h2 style="font-size:15px;font-weight:lighter;margin-left:-45px;margin-top:20px;">Advance amount :<span style="font-weight: bold;"> Rs.16,000/=</span></h2>
                </div>
        </form>
    </div>
    <script>
        //--    for setting the current day as the minimum date for the time being --
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        today = yy + '-' + mm + '-' + dd;
        document.getElementById("datefield").setAttribute("min", today);

        //--    for displaying the meal button according to the selection of meal type --
        function mealSelection() {
            var mealType = document.getElementById('std-cus-meal').value;
            if (mealType == 'Customized') {
                document.getElementById('book-btn').setAttribute('style', 'display:none');
                document.getElementById('meal-btn').classList.add("after");
            }

            if (mealType == 'Set-Menu') {
                document.getElementById('meal-btn').className = "event-meal-selection-btn-before";
                document.getElementById('book-btn').setAttribute('style', 'display:block');
            }

        }

        function seePrice() {
            document.getElementById('payment-shower').setAttribute('style', 'display-flex');
            document.getElementById('payment-shower').style.borderRadius = ' 10px';
            document.getElementById('payment-shower').style.padding = ' 5px';
        }
        document.querySelector(".close").addEventListener("click", function() {
            document.querySelector(".payment-shower").style.display = "none";
        });

        function displayCalender() {
            document.getElementById('date-picker').style.display = 'block';
        }
    </script>
</body>

</html>