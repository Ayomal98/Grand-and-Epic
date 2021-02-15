<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events Booking Form</title>
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

</head>

<body style="background:url('../../public/images/event-form.jpeg');width:100%;height:100%;background-size:cover">
    <form action="events-booking.php" method="post" id="event-booking">
        <div class="events-booking-form" id="events-booking-form">
            <h2 style="position:absolute;top:50px;left:30%;text-align:center">Reservation Form For Wedding & Parties</h2>
            <div class="customer-details-events">
                <input type="text" name="customer-name" id="" placeholder="Customer Name" style="padding:10px;margin:10px;" required>
                <input type="email" name="customer-email" id="" placeholder="Email address" style="padding:10px;margin:10px;" required>
                <input type="number" name="number-of-guests" placeholder="No-Guests" style="padding:10px;margin:10px;width:130px;" min="30" max="250" step="1" style="width:110px;" required>
            </div>
            <div class="events-booking-wrapper">
                <label for="type-of-reservation" style="font-size:25px;position:absolute;top:210px;left:12%">Reservation Type</label>
                <i class="fas fa-glass-cheers" style="position: absolute;top:190px;left:17%"></i>
                <select name="Reservation-type-events" id="meal-types" style="position:absolute;top:250px;left:15%;padding:5px;">
                    <option value="Weddings">Wedding</option>
                    <option value="Parties">Party</option>
                </select>

            </div>
            <div class="date-time-details">
                <div class="date-container">
                    <i class="fas fa-calendar-alt" style="position: absolute;top:185px;left:34%"></i>
                    <label for="Reservation-Date" " style=" font-size:25px;position:absolute;top:200px;left:30%;">Reservation Date</label><br>
                    <input type="date" name="events-reservation-date" id="datefield" style=" position: absolute;top:240px;left:30%;padding:5px">
                </div>
                <div class="time-details-events">
                    <i class="fas fa-clock" style="position: absolute;top:180px;left:64%;"></i>
                    <label for="time-container" style="position: absolute;top:200px;left:60%;font-size:25px">Time Period</label>
                    <div class="time-details-shower">
                        <label for="" style="position:absolute;top:250px;left:52%;font-size:25px;font-size:20px;">Starting time</label>
                        <input type="time" name="starting-time" id="" style="position:absolute;top:280px;left:52%">
                        <label for="" style="position: absolute;top:250px;left:70%;font-size:20px">Ending time</label>
                        <input type="time" name="ending-time" id="" style="position:absolute;top:280px;left:70%">
                    </div>
                </div>
            </div>
            <div class="additional-features" style="display: inline-block;">
                <i class="fas fa-icons" style="position:absolute;top:365px;left:62%;"></i>
                <label for="" style="font-size: 25px;position:absolute;top:390px;left:55%;">Additional Features</label>
                <label for="DJ-Music" style="font-size: 15px;position:absolute;top:440px;left:45%">DJ Music</label>
                <input type="checkbox" name="additional[]" id="" value="DJMusic" style="font-size: 20px;position:absolute;top:443px;left:50%;cursor:pointer">
                <label for="DJ-Music" style="font-size: 15px;position:absolute;top:440px;left:55%">Decorations</label>
                <input type="checkbox" name="additional[]" value="Decorations" id="" style="font-size: 20px;position:absolute;top:445px;left:61%;cursor:pointer">
                <label for="DJ-Music" style="font-size: 15px;position:absolute;top:440px;left:65%">Champaigne Tables</label>
                <input type="checkbox" name="additional[]" value="ChampaigneTables" id="" style="font-size: 20px;position:absolute;top:445px;left:74%;cursor:pointer">
            </div>

            <div class="payment-cancel-btns">
                <label for=""></label><input type="button" value="Check-Availability" id="check-availability" name="See-Price-btn" style="position: absolute;top:100px;left:130px;padding:14px 18px 14px 18px;width:9.5%;cursor:pointer;background:#b88b4a;border:none;color:white;font-weight:bolder;" onclick="checkAvailability()">
                <div class="payment-cancel-btns">
                    <input type="submit" id="meal-btn" value="Submit & Proceed to Package Selection" name="event-details" class="event-meal-selection-btn">
                    <input type="reset" value="Cancel" name="Cancel-btn" class="event-meal-selection-btn cancel-evt-btn">
                </div>
                <div class="check-availability-shower" style="display:none;background-color:white;left:1.7%;top:25%;position:absolute;height:290px;width:25%;padding:14px 5px;border-radius:5px;" id="check-availability-shower">
                    <div><i class="fas fa-times-circle" style="position:absolute;top:5%;left:90%;color:black;font-size:20px;cursor:pointer" onclick="closeAvailability()"></i></div>
                    <div style="text-align: center;"><i class="fas fa-less-than" style="color:black;position:absolute;left:15%;top:15%"></i><span style="color: black;font-weight:bolder;font-size:25px;position:absolute;top:12%;left:25%">26th November</span><i class="fas fa-greater-than" style="color:black;position:absolute;left:75%;top:15%"></i></div>
                    <table border="1px solid black" style="background-color: black;position:absolute;top:30%;left:10%;border-radius:5px;">
                        <thead>
                            <tr>
                                <th style="padding:5px">Starting Time</th>
                                <th style="padding:5px">Ending Time</th>
                                <th style="padding:5px">Availability</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding: 5px;">8.00 A.M</td>
                                <td style="padding: 5px;">11.00 A.M</td>
                                <td style="padding: 5px 10px;"><i class="fa fa-times" aria-hidden="true"></i>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 5px;">12.00 P.M</td>
                                <td style="padding: 5px;">3.00 P.M</td>
                                <td style="padding: 5px 10px;"><i class="fa fa-times" aria-hidden="true"></i>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 5px;">4.00 P.M</td>
                                <td style="padding: 5px;">12.00 A.M</td>
                                <td style="padding: 5px 10px;"><i class="fas fa-check"></i></td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="color: black;position:absolute;right:8%;top:82%"><i class="fa fa-times"><span style="margin-left: 10px;">Not Available</span></i></div>
                    <div style="color: black;position:absolute;right:16%;top:92%"><i class="fas fa-check"><span style="margin-left: 5px;">Available</span></i></div>
                    <div style="color: black;position:absolute;top:77%;font-weight:bolder">* Please note that there will be a <br>delay of one hour after each <br>reservation</div>
                </div>

                <!-- <input type="submit" name="payment"> -->
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
    </script>
</body>

</html>