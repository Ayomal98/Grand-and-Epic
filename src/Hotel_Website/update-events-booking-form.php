<?php include('./time-inclusion.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events Booking Form</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var morningTime = '';
            var afternoonTime = '';
            var nightTime = '';
            var timeslot = '';
            $("#preferred-timeslot").on("change", function() {
                timeslot = $(this).find("option:selected").val();
                console.log(timeslot);
                if (timeslot === 'Morning') {
                    $("#morning-times").on("change", function() {
                        var timeSelected = $(this).find("option:selected");
                        morningTime = timeSelected.val();
                        console.log(morningTime);
                        timeSelected = '';
                    })
                }
                if (timeslot === 'Afternoon') {
                    $("#afternoon-times").on("change", function() {
                        var timeSelected = $(this).find("option:selected");
                        afternoonTime = timeSelected.val();
                        console.log(afternoonTime);
                        timeSelected = '';
                    })
                }
                if (timeslot === 'Night') {
                    $("#night-times").on("change", function() {
                        var timeSelected = $(this).find("option:selected");
                        nightTime = timeSelected.val();
                        console.log(nightTime)
                        timeSelected = '';
                    })
                }
            })
            $("#datefield").on("change", function() {
                var date = new Date($('#datefield').val());
                var day = date.getDate();
                var month = date.getMonth() + 1;
                var year = date.getFullYear();
                var datearray = [year, month, day];
                var dateSelected = [year, month, day].join('-');
                $("#check-availability").click(function(e) {
                    console.log(dateSelected);
                    console.log(datearray);
                    console.log(morningTime);
                    console.log(afternoonTime);
                    console.log(nightTime);
                    $("#check-availability-shower").load("events-availability.php", {
                        dateSelected: dateSelected,
                        timeslot: timeslot,
                        morningTime: morningTime,
                        afternoonTime: afternoonTime,
                        nightTime: nightTime,
                        datearray: datearray
                    })
                });

            })

        })
    </script>
</head>
<?php
include('../../config/connection.php');
$eventsID = $_GET['id'];
$selectEventsDetails = mysqli_query($con, "SELECT * FROM events_booking WHERE Events_ID='$eventsID'");
$getRowEventDetails = mysqli_fetch_assoc($selectEventsDetails);
$eventType = $getRowEventDetails["Event_Type"];
$startingTime = $getRowEventDetails["Starting_Time"];
$endingTime = $getRowEventDetails["Ending_Time"];
$startingTimeInHours = date("H", strtotime($startingTime));
$startingTimeHM = date("H:i", strtotime($startingTime));
$endingTimeHM = date("H:i", strtotime($endingTime));
$timeInHours = date("H", (strtotime($endingTime) - strtotime($startingTime)) - 1);
$eventFeatureDetails = unserialize($getRowEventDetails["Selected_Features"]);
?>

<body style="background:url('../../public/images/event-form.jpeg');width:100%;height:100%;background-size:cover">
    <div class="suite-form-header" style="height: 12vh;">
        <h3 style="font-weight: bolder;color:white">Event Details & Location Availability</h3>
        <h3 style="color:black">Meal Package Selection & Payment</h3>
    </div>
    <form action="update-events-booking.php" method="post" id="event-booking">
        <div class="events-booking-form" id="events-booking-form">
            <h2 style="position:absolute;top:150px;left:30%;text-align:center">Reservation Form For Wedding & Parties</h2>
            <div class="customer-details-events">
                <input type="text" name="customer-name" id="" placeholder="Customer Name" style="padding:10px;margin:20px;" value="<?php echo $getRowEventDetails["Customer_Name"] ?>" readonly>
                <input type="email" name="customer-email" id="" placeholder="Email address" style="padding:10px;margin:10px;" value="<?php echo $getRowEventDetails["Customer_Email"] ?>" readonly>

                <input type="number" name="number-of-guests" placeholder="No-Guests" style="padding:10px;margin:10px;width:130px;" min="30" max="250" step="1" style="width:110px;" value="<?php echo $getRowEventDetails["Num_Guests"] ?>" required>
                <label for="" style="color:white;font-weight:bolder">Previosuly Selected Starting Time => <?php echo $startingTimeHM; ?> </label>
                <label for="" style="color:white;font-weight:bolder;margin-left:580px;">Previosuly Selected Ending Time => <?php echo $endingTimeHM; ?> </label>
            </div>
            <div class="events-booking-wrapper">
                <label for="type-of-reservation" style="font-size:25px;position:absolute;top:295px;left:12%">Reservation Type</label>
                <i class="fas fa-glass-cheers" style="position: absolute;top:280px;left:17%"></i>
                <select name="Reservation-type-events" id="meal-types" style="position:absolute;top:340px;left:15%;padding:5px;" onclick="getReservationType(event)" required>
                    <?php
                    if ($eventType == 'Wedding') {
                    ?>
                        <option value="Wedding" selected="selected">Wedding</option>
                        <option value="Party">Party</option>
                    <?php } else {

                    ?>
                        <option value="Wedding">Wedding</option>
                        <option value="Party" selected="selected">Party</option>
                    <?php } ?>
                </select>

            </div>
            <div class="date-time-details">
                <div class="date-container">
                    <i class="fas fa-calendar-alt" style="position: absolute;top:274px;left:34%"></i>
                    <label for="Reservation-Date" " style=" font-size:25px;position:absolute;top:285px;left:30%;">Reservation Date</label><br>
                    <input type="date" name="events-reservation-date" id="datefield" style=" position: absolute;top:330px;left:30%;padding:5px" onchange="dateHandler(event)" value="<?php echo $getRowEventDetails['Reservation_Date'] ?>" required>
                </div>
                <div class="time-details-events">
                    <i class="fas fa-clock" style="position: absolute;top:273px;left:64%;"></i>
                    <label for="time-container" style="position: absolute;top:285px;left:60%;font-size:25px">Time Period</label>
                    <div class="time-details-shower">
                        <label for="" style="position:absolute;top:340px;left:48%;font-size:25px;font-size:20px;"> Preferred Starting time-slot</label>
                        <select style="position:absolute;top:375px;left:53%;padding:4px" name="preferred-timeslot" id="preferred-timeslot" onclick="timeShow(event)" required>
                            <?php
                            if ($startingTime >= 8 && $startingTime <= 11) {
                                echo '
                                        <option value="Morning" selected="selected">Morning</option>
                                        <option value="Afternoon">Afternoon</option>
                                        <option value="Night">Night</option>
                                 ';
                            } else if ($startingTime >= 12 && $startingTime <= 17) {
                                echo '
                                        <option value="Morning" >Morning</option>
                                        <option value="Afternoon" selected="selected">Afternoon</option>
                                        <option value="Night">Night</option>
                                    ';
                            } else {
                                echo '
                                        <option value="Morning" >Morning</option>
                                        <option value="Afternoon" >Afternoon</option>
                                        <option value="Night" selected="selected">Night</option>
                                    ';
                            }
                            ?>

                        </select>
                        <label for="" style="position:absolute;top:340px;left:65%;font-size:25px;font-size:20px;">Starting time</label>
                        <select name="morning-time" style="position:absolute;top:375px;left:65%;display:none;padding:5px" id="morning-times">
                            <?php echo getMorningTime(); ?>

                        </select>
                        <select name="afternoon-time" style="position:absolute;top:375px;left:65%;display:none;padding:5px" id="afternoon-times">
                            <?php echo getAfternoonTime(); ?>
                        </select>
                        <select name="dinner-time" style="position:absolute;top:375px;left:65%;display:none;padding:5px" id="night-times">
                            <?php echo getNightTime(); ?>
                        </select>
                        <!-- <input type="time" name="starting-time" id="" style="position:absolute;top:280px;left:68%"> -->
                        <label for="" style="position:absolute;top:345px;left:74%;font-size:15px;font-size:15px;">Time Duration(In Hours)</label>
                        <input type="number" name="event-duration" min="3" max="5" style="position:absolute;top:375px;left:76%;font-size:15px;font-size:20px;padding:3px" oninput="addHours(event)" value="<?php echo $timeInHours; ?>" required>
                        <label for="" style="position: absolute;top:345px;left:87%;font-size:20px">Ending time</label>
                        <input type="text" name="ending-time" id="ending-time" style="position:absolute;top:375px;left:86.5%;padding:5px;width:120px" required>
                        <input type="hidden" name="events_id" value="<?php echo $eventsID; ?>" </div>
                    </div>
                </div>
                <div class="additional-features" style="display: inline-block;">
                    <i class="fas fa-icons" style="position:absolute;top:440px;left:62%;"></i>
                    <label for="" style="font-size: 25px;position:absolute;top:460px;left:55%;">Additional Features</label>
                    <label for="DJ-Music" style="font-size: 15px;position:absolute;top:498px;left:45%">DJ Music</label>
                    <?php if (in_array("DJMusic", $eventFeatureDetails)) {
                        echo ' <input type="checkbox" name="additional[]" id="" value="DJMusic" style="font-size: 20px;position:absolute;top:501px;left:50%;cursor:pointer" checked="checked">';
                    } else {
                        echo ' 
                    <input type="checkbox" name="additional[]" id="" value="DJMusic" style="font-size: 20px;position:absolute;top:501px;left:50%;cursor:pointer">';
                    } ?>
                    <?php if (in_array("Decorations", $eventFeatureDetails)) {
                        echo '<input type="checkbox" name="additional[]" value="Decorations" id="" style="font-size: 20px;position:absolute;top:501px;left:61%;cursor:pointer" checked="checked">';
                    } else {
                        echo '<input type="checkbox" name="additional[]" value="Decorations" id="" style="font-size: 20px;position:absolute;top:501px;left:61%;cursor:pointer">';
                    } ?>
                    <?php if (in_array("ChampaigneTables", $eventFeatureDetails)) {
                        echo '<input type="checkbox" name="additional[]" value="ChampaigneTables" id="" style="font-size: 20px;position:absolute;top:501px;left:74%;cursor:pointer" checked="checked">';
                    } else {
                        echo '<input type="checkbox" name="additional[]" value="ChampaigneTables" id="" style="font-size: 20px;position:absolute;top:501px;left:74%;cursor:pointer">';
                    } ?>
                    <label for="DJ-Music" style="font-size: 15px;position:absolute;top:498px;left:55%">Decorations</label>
                    <label for="DJ-Music" style="font-size: 15px;position:absolute;top:498px;left:65%">Champaigne Tables</label>
                </div>

                <div class="payment-cancel-btns">
                    <label for=""></label><input type="button" value="Check-Availability" id="check-availability" name="See-Price-btn" style="position: absolute;top:215px;left:185px;padding:14px 18px 14px 18px;width:9.5%;cursor:pointer;background:#b88b4a;border:none;color:white;font-weight:bolder;" onclick="checkAvailability()">
                    <div class="payment-cancel-btns">
                        <input type="submit" id="meal-btn" value="Update & Proceed to Package Selection" name="update-event-details" class="event-meal-selection-btn">
                        <input type="reset" value="Cancel" name="Cancel-btn" class="event-meal-selection-btn cancel-evt-btn">
                    </div>
                    <div class="check-availability-shower" id="check-availability-shower" style="display:none;background-color:white;left:8%;top:52%;position:absolute;height:290px;width:25%;padding:14px 5px;border-radius:5px;" id="check-availability-shower">
                    </div>
                </div>
            </div>
    </form>

    <!-- <div class="meal-section" id="meal-section" style="display: none;">
        <h1 style="text-align: center;color:white;margin-top:10px"><u>Meal Selection</u></h1>
        <input type="button" value="Proceed to Payment" class="button-event payment" onclick="showPayments()">
        <input type="button" value="Back" class="button-event payment" style="padding: 15px;position:absolute;top:4%;width:10%;left:10px">
        
    </div> -->
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

        function addHours(e) {
            console.log(typeof(parseInt(e.target.value)))
            let timeValue = document.getElementById('preferred-timeslot').value;
            if (timeValue == "Morning") {
                let hours = parseInt(document.getElementById('morning-times').value.split(":")[0]);
                let addedHours = hours + parseInt(e.target.value)
                document.getElementById('ending-time').value = addedHours.toString() + ':00';
            }
            if (timeValue == "Afternoon") {
                let hours = parseInt(document.getElementById('afternoon-times').value.split(":")[0]);
                let addedHours = hours + parseInt(e.target.value)
                document.getElementById('ending-time').value = addedHours.toString() + ':00';
            }
            if (timeValue == "Night") {

                let hours = parseInt(document.getElementById('night-times').value.split(":")[0]);
                let addedHours = hours + parseInt(e.target.value)
                document.getElementById('ending-time').value = addedHours.toString() + ':00';

            }
        }
        // Date.prototype.addHours = function(h) {
        //     this.setTime(this.getTime() + (h * 60 * 60 * 1000));
        //     return this;
        // }

        function checkAvailability() {
            document.getElementById('check-availability-shower').style.display = 'block'
        }

        function closeAvailability() {
            document.getElementById('check-availability-shower').style.display = 'none'
        }

        function getReservationType(e) {
            console.log(e.target.value)
        }

        function dateHandler(e) {
            // console.log(e.target.value);
        }

        //to get the starting time-slot
        function timeShow(e) {
            var time_slot = e.target.value;
            if (time_slot == "Morning") {
                document.getElementById("morning-times").style.display = "inline-block";
                document.getElementById("afternoon-times").style.display = "none";
                document.getElementById("night-times").style.display = "none";
            }
            if (time_slot == "Afternoon") {
                document.getElementById("afternoon-times").style.display = "inline-block";
                document.getElementById("morning-times").style.display = "none";
                document.getElementById("night-times").style.display = "none";
            }
            if (time_slot == "Night") {
                document.getElementById("night-times").style.display = "inline-block";
                document.getElementById("afternoon-times").style.display = "none";
                document.getElementById("morning-times").style.display = "none";
            }
        }
    </script>
</body>

</html>