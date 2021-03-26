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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var roomtype = 'Suite Rooms';
            $("#check-in-date").on("input", function() {
                var checkInDate = new Date($('#check-in-date').val());
                var checkInDay = checkInDate.getDate();
                var checkInMonth = checkInDate.getMonth() + 1;
                var checkInYear = checkInDate.getFullYear();
                var checkIndatearray = [checkInYear, checkInMonth, checkInDay];
                var checkIndateSelected = [checkInYear, checkInMonth, checkInDay].join('-');
                $("#check-out-date").on("input", function() {
                    var checkOutDate = new Date($('#check-out-date').val());
                    var checkOutDay = checkOutDate.getDate();
                    var checkOutMonth = checkOutDate.getMonth() + 1;
                    var checkOutYear = checkOutDate.getFullYear();
                    var checkOutdatearray = [checkOutYear, checkOutMonth, checkOutDay];
                    var checkOutdateSelected = [checkOutYear, checkOutMonth, checkOutDay].join('-');
                    $('#check-in-time').on("input", function() {
                        var checkInTimeSelected = $(this).find("option:selected").val();
                        $('#check-availability').click(function(e) {
                            var checkOutTimeSelected = $('#check-out-time').val();
                            console.log(checkOutdateSelected);
                            console.log(checkIndateSelected);
                            console.log(checkInTimeSelected);
                            console.log(checkOutTimeSelected);
                            $(".suite-icons-rooms-container").load("rooms-availability.php", {
                                checkIndateSelected: checkIndateSelected,
                                checkOutdateSelected: checkOutdateSelected,
                                checkInTimeSelected: checkInTimeSelected,
                                checkOutTimeSelected: checkOutTimeSelected,
                                roomtype: roomtype
                            })
                        })
                    })

                })

            })


        })
    </script>
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
                        <div style="margin-left: -520px;margin-top:-25px">
                            <label for="reservation-type" style="font-size:20px;margin-right:5px;">Reservation Type</label>
                            <select name=" reservation-type" id="reservation-type" onchange="DisplayMealTypes(event)" style="padding:5px" required>
                                <option value="Full-Board">Full Board</option>
                                <option value="Half-Board">Half Board</option>
                                <option value="Room Only">Room Only</option>
                                <option value="Room & Breakfast">Room & Breakfast</option>
                            </select>
                        </div>
                        <div class="occupancy-number-details" style="margin-left: -80px;font-size:20px">
                            <div class="occupancy-number-details-container">
                                <label for="kids">No.Of Occupants</label>
                                <input type="number" min="1" max="25" style="width: 70%;height:50%" name="No-Occupants" id="predict-rooms" style="padding:5px" oninput="predictNoRooms(event)" required>
                            </div>
                        </div>
                        <input type="hidden" name="room_type" value="Suite Rooms">
                        <div style="margin-left:100px;margin-top:-30px;width:150px;">
                            <span style="font-size: 12px;color:red" id="predicted-rooms"></span>
                        </div>
                        <div style="display:none;position:relative;top:-30px;left:100%" id="no_rooms_id">
                            <input type="number" name="No-Rooms" style="width: 70%;height:50%;padding:7px" min="1" max="5" oninput="enteredNo(event)" placeholder="Enter Number of Rooms" style="padding: 8px;" required>
                            <br>
                            <span id="entered-no" style="margin-top: 5px;color:green"></span>
                        </div>
                    </div>
                    <div class="time-checker">
                        <label for="check-in-time" style="margin-left:-60px">Check In Time</label>
                        <select name="check-in-time" id="check-in-time" style="padding:5px;border-radius:5px;border:none;margin-right:20px" onchange="showCheckOut(event)" required>
                            <option value="9.00 A.M.">9.00 A.M.</option>
                            <option value="2.00 P.M.">2.00 P.M.</option>
                            <option value="8.00 P.M">8.00 P.M</option>
                        </select>
                        <label for="check-out-time">Check Out Time</label>
                        <input type="text" name="check-out-time" id="check-out-time" value="" style="margin-right:5px;margin-left:-2px;padding:5px;" required>
                    </div>

                    <div class="form-page-fields">
                        <div class="date-checker">
                            <div class="date-checker-checkin">
                                <label for="check-in-Date">Check In Date</label>
                                <input type="date" name="check-in-Date" id="check-in-date" required>
                            </div>
                            <div class="date-checker-checkout">
                                <label for="check-out-Date">Check Out Date</label>
                                <input type="date" name="check-out-Date" id="check-out-date" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-page-fields">
                        <div class="meal-selection-fields" id="meal-selection-fields" style="position:relative;top:-260px;right:-190%">
                            <label for="meal-selection" style="font-size:20px;">Meal Selection</label><br>
                            <select name="meal-selection" id="meal-type" onclick="selectMealType()" style="padding:7px;margin-top:10px" required>
                                <option value="Set-Menu">Set Menu</option>
                                <option value="Customized">Customized</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <input type="button" name="Check-Availability" id="check-availability" value="Check Availability" style="border-radius:5px;padding:8px;color:white;background-color: goldenrod;border:none;width:120px;height:40px;font-size:12px;cursor:pointer;position:relative;top:-170px;left:190px">
                    <div class="form-page-fields suite-icons-container">
                        <div class="suite-icons-rooms-container" id="suite-icons-rooms-container">
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
                        <!-- <label for="" style="font-weight:bolder;margin-bottom:10px;font-size:15px;">Selection Of Room</label> -->
                    </div>


                    <input type="hidden" name="emailUser" value="<?php echo $_SESSION['User_Email']; ?>">
                    <div class="button-container-suite-form" style="margin-top:-10px;">
                        <input type="submit" name="Next" value="Next" id="next" style="padding:5px;color:white;background-color: goldenrod;border:none;width:170px;height:60px;font-size:22px;cursor:pointer;" onclick="userPayment()">
                        <input type="submit" name="Meal-Selection" value="Meal Selection" id="meal-selection" style="display:none;padding:5px;color:white;background-color: goldenrod;border:none;width:170px;height:60px;font-size:22px;cursor:pointer;" onclick="mealSelect()">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--start of form for customized meal selection-->


    <!--start of form for payment & user Details for setmenu details-->





    <!--start of form for payment & user Details for customized details-->



    <script>
        var a;
        var predictNo_Rooms;
        //occurs in the room details page
        function selectMealType() {
            var val = document.getElementById('meal-type').value;
            // console.log(val);
            if (val == 'Set-Menu') {
                document.getElementById('meal-selection').style.display = 'none'
                document.getElementById('next').style.display = 'block'
            }
            if (val == 'Customized') {
                document.getElementById('next').style.display = 'none'
                document.getElementById('meal-selection').style.display = 'block'
            }
        }

        function predictNoRooms(e) {
            let noParticpants = e.target.value;
            document.getElementById('no_rooms_id').style.display = "block";
            if (noParticpants > 0 && noParticpants <= 5) {
                document.getElementById('predicted-rooms').innerText = 'You have to book at least ' + 1 + ' rooms ';
                predictNo_Rooms = 1;
            } else if (noParticpants > 5 && noParticpants <= 10) {
                document.getElementById('predicted-rooms').innerText = 'You have to book at least ' + 2 + ' rooms';
                predictNo_Rooms = 2;
            } else if (noParticpants > 10 && noParticpants <= 15) {
                document.getElementById('predicted-rooms').innerText = 'You have to book at least ' + 3 + ' rooms';
                predictNo_Rooms = 3;
            } else if (noParticpants > 15 && noParticpants <= 20) {
                document.getElementById('predicted-rooms').innerText = 'You have to book at least ' + 4 + ' rooms';
                predictNo_Rooms = 4;
            } else {
                document.getElementById('predicted-rooms').innerText = 'You have to book at least ' + 5 + ' rooms';
                predictNo_Rooms = 5;
            }

        }


        function enteredNo(e) {
            let enteredRoomsNo = parseInt(e.target.value);
            let predictNoRooms = parseInt(document.getElementById("predict-rooms").value);
            // console.log(enteredRoomsNo);
            // console.log(predictNoRooms);
            if (predictNo_Rooms > enteredRoomsNo) {
                document.getElementById("entered-no").innerText = "please add eligible amount number of rooms Or More";
                // console.log('please add eligible amount number of rooms');
            } else {
                document.getElementById("entered-no").innerText = " ";
                var select_R = document.querySelector('.select-rooms');
                select_R.innerHTML = ""
                for (let i = 1; i <= enteredRoomsNo; i++) {
                    // console.log(i);
                    var newInput = document.createElement("input");
                    newInput.setAttribute("type", "number");
                    newInput.setAttribute("name", "room-number-" + i);
                    newInput.setAttribute("placeholder", "Room " + i);
                    newInput.style.padding = '5px'
                    newInput.style.marginTop = '-10px'
                    select_R.appendChild(newInput);
                    select_R.appendChild(document.createElement("br"));
                }
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
            if (reservationType == 'Full-Board' || reservationType == 'Half-Board' || reservationType == 'Room Only' || reservationType == 'Room & Breakfast') {
                if (checkIn == '9.00 A.M.') {
                    checkOut = '8.00 A.M.'
                } else if (checkIn == '2.00 P.M.') {
                    checkOut = '1.00 P.M.'
                } else {
                    checkOut = '7.00 P.M.'
                }
                document.getElementById('check-out-time').value = checkOut
            }
        }


        //adding event listener for the showing from payment page to meals page
        document.getElementById("previous-meal-btn").addEventListener('click', PaymentToMeals);

        function DisplayMealTypes(e) {
            if (e.target.value == 'Room Only') {
                console.log('Room Only')
                document.getElementById('meal-selection-fields').style.display = "none";
            } else {
                document.getElementById("meal-selection-fields").style.display = "block";
            }
        }
    </script>
    <script>
        //--    for setting the current day as the minimum date for the time being --
        var today = new Date();
        var dd = today.getDate() + 1;
        var mm = today.getMonth() + 1;
        var yy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        today = yy + '-' + mm + '-' + dd;
        document.getElementById("check-in-date").setAttribute("min", today);
    </script>

</body>

</html>