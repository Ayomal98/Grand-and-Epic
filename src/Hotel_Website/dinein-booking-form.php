<!-- This page conatins about dine in-booking form -->
<?php include("time-inclusion.php");
?>
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
    <title>Dine-in Booking</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <!-- Script to load the table availability when customer enters the mealperiod, time & the date, which will passed to the dinein-booking.php file -->
    <script>
        $(document).ready(function() {
            var mealPeriod = '';
            var breakfastPeriod = '';
            var lunchPeriod = '';
            var dinnerPeriod = '';
            var dateSelected = null;
            $('#time-period').on('change', function() {
                var optionSelected = $(this).find("option:selected");
                mealPeriod = optionSelected.val();
                var textSelected = optionSelected.text();
                console.log(mealPeriod)
                if (mealPeriod === 'Breakfast') {
                    $('#breakfast-times').on('change', function() {
                        var optionAgainSelected = $(this).find("option:selected");
                        breakfastPeriod = optionAgainSelected.val();
                        console.log(breakfastPeriod);
                        optionAgainSelected = '';
                    })
                }
                if (mealPeriod === 'Lunch') {
                    $('#lunch-times').on('change', function() {
                        var optionAgainSelected = $(this).find("option:selected");
                        lunchPeriod = optionAgainSelected.val();
                        console.log(lunchPeriod);
                        optionAgainSelected = '';
                    })
                }
                if (mealPeriod === 'Dinner') {
                    $('#dinner-times').on('change', function() {
                        var optionAgainSelected = $(this).find("option:selected");
                        dinnerPeriod = optionAgainSelected.val();
                        console.log(dinnerPeriod);
                        optionAgainSelected = '';
                    })
                }
                $('#datefield').on('change', function() {
                    var date = new Date($('#datefield').val());
                    var day = date.getDate();
                    var month = date.getMonth() + 1;
                    var year = date.getFullYear();
                    dateSelected = [year, month, day];
                    dateSelected = dateSelected.join('-');
                })

                $('.check-availability-btn').click(function(e) {
                    console.log(breakfastPeriod); // to check the data passing using the console
                    console.log(lunchPeriod);
                    console.log(dinnerPeriod);
                    console.log(dateSelected);
                    console.log(mealPeriod);
                    $('.table-showing-container').load("showtables-after.php", { //will load the availability of the tables using showtables-after.php file
                        mealPeriod: mealPeriod,
                        breakfastPeriod: breakfastPeriod,
                        lunchPeriod: lunchPeriod,
                        dinnerPeriod: dinnerPeriod,
                        dateSelected: dateSelected
                    })
                })
            })
        })
    </script>

</head>

<body>

    <div class="dine-in-booking-form-container">
        <form action="dinein-booking.php" class="dine-in-form" method="post">
            <h2 style="font-size:40px;">Reservation for Dine-in</h2>
            <div class="customer-details">
                <input type="text" style="width:28%;" name="customer-name" id="" placeholder="Customer Name" required>
                <input type="text" style="width:45%;" name="customer-email" id="" placeholder="Email address" required>
                <input type="number" name="number-of-guests" placeholder="No-Guests" min="1" max="15" step="1" style="width:110px;padding:3px" id="number-of-guest" required>
            </div>
            <div class="dine-in-details-wrapper" style="display:flex;align-items:center;">
                <div class="meal-container">
                    <label for="Meal-type" id="meal-label-id" style="position: absolute;top:210px;left:29%">Meal Type</label>

                    <select name="Meal-Period" id="time-period" onchange="mealShow()">
                        <option value="Breakfast">Breakfast</option>
                        <option value="Lunch">Lunch</option>
                        <option value="Dinner">Dinner</option>
                    </select>

                </div>
                <div class="time-period">
                    <label for="Time-Period">Time Period</label>
                    <div class="breakfast-time-period-selection">

                        <select name="breakfast-times" id="breakfast-times" style="padding:5px">
                            <?php echo getBreakfastTime(); ?>
                        </select>

                    </div>
                    <div class=" lunch-time-period-selection">
                        <select name="lunch-times" id="lunch-times" style="padding:5px">
                            <?php echo getLunchTime(); ?>
                        </select>

                    </div>
                    <div class="dinner-time-period-selection">

                        <select name="dinner-times" id="dinner-times" style="padding:5px">
                            <?php echo getDinnerTime(); ?>
                        </select>
                    </div>
                </div>

                <div class="date-container">
                    <input type="date" name="Dine-in-date" min="" id="datefield" style="padding:5px">
                </div>
            </div>

            <div class="table-container">
                <div class="table-showing-container">
                    <?php include("showtables.php"); ?>
                </div>
                <input type="button" value="Check-Availability" name="check-availability" class="check-availability-btn"><i class="fas fa-check" style="position:absolute;top:66.4%;right:26.2%;"></i></input>
                <div style="display:flex;flex-direction:column">
                    <br><input type="number" name="table-no" placeholder="Table-No" id="table-no" style="position:absolute;top:75%;right:25%;width:180px; height:40px;padding:10px" min="1" max="15"><br>
                    <div class="dot not-avb"></div><span style="margin-top: -35px;margin-left:160px;">Not Available</span><br>
                    <div class="dot"></div><span style="margin-top: -35px;margin-left:160px;">Available</span><br>
                    <div id="table-availability-checker" style="position:absolute;color:red;top:82%;right:25%"></div>
                </div>
            </div>
            <div class="btn-wrapper" style="display: inline-block;margin:auto 10px;">
                <input type="reset" value="Cancel" name="cancel-book-btn" class="reservation-submit-btn cancel">
                <input type="submit" value="Confirm" name="confirm-book-btn" class="reservation-submit-btn">
            </div>
        </form>
    </div>
    <script>
        //---  for displaying the repective meal-time  ---
        function mealShow() {
            var meal_type = document.getElementById("time-period").value;
            if (meal_type == "Breakfast") {
                document.getElementById("breakfast-times").style.display = "inline-block";
                document.getElementById("lunch-times").style.display = "none";
                document.getElementById("dinner-times").style.display = "none";
            }
            if (meal_type == "Lunch") {
                document.getElementById("lunch-times").style.display = "inline-block";
                document.getElementById("breakfast-times").style.display = "none";
                document.getElementById("dinner-times").style.display = "none";
            }
            if (meal_type == "Dinner") {
                document.getElementById("dinner-times").style.display = "inline-block";
                document.getElementById("lunch-times").style.display = "none";
                document.getElementById("breakfast-times").style.display = "none";
            }
            document.getElementById('meal-label-id').setAttribute("style", "left:26%");
        }
    </script>
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
    </script>

    <script>
        let Guests_evt = document.getElementById("number-of-guest");
        let no_Guests = 0;
        let table_no = document.getElementById("table-no");
        const guestsHandler = document.getElementById('table-availability-checker');
        Guests_evt.addEventListener("input", (e) => {
            no_Guests = e.target.value
        })
        table_no.addEventListener("input", (e) => {
            let inputValue = e.target.value;
            let tableValues = <?php echo json_encode($tableParticipant); ?>;
            console.log(no_Guests)
            if (no_Guests > tableValues[inputValue]) {
                guestsHandler.innerHTML = "Please Select another table"
                console.log("*Please select another table");
            } else {
                guestsHandler.innerHTML = "";
                console.log("Selected table is sufficient enough");
            }
        })
    </script>
</body>

</html>