<?php
include('../../config/connection.php');

//room details
if (isset($_POST['Next']) || isset($_POST['Meal-Selection'])) {
    $reservationType = $_POST['reservation-type'];
    $noOccupants = $_POST['No-Occupants'];
    $checkInTime = $_POST['check-in-time'];
    $checkOutTime = $_POST['check-out-time'];
    $checkInDate = $_POST['check-in-Date'];
    $checkOutDate = $_POST['check-out-Date'];
    $mealSelection = $_POST['meal-selection']; //meal-type
    $emailUser = $_POST['emailUser'];
    $roomType = 'Suite Rooms';
    $occupancy = 'Suite';
    $noRooms = $_POST['No-Rooms'];
    $roomPrice;
    $mealPrice;
    $rooms = array();
    echo gettype($noRooms);
    for ($i = 1; $i <= $noRooms; $i++) {
        array_push($rooms, $_POST['room-number-' . $i]);
    }
    $encoded_rooms = serialize($rooms);
    //to select the price for the rooms
    $selectRoomPrice = mysqli_query($con, "SELECT Price from rooms WHERE Room_Type=' $roomType  '");
    while ($rowRooms = mysqli_fetch_assoc($selectRoomPrice)) {
        $roomPrice = (int)$rowRooms['Price'] * $noRooms;
    }
    //to select the price for the meals accordingly
    if ($mealSelection == 'Set-Menu' && $reservationType == 'Full-Board') {
        $selectMealPrice = mysqli_query($con, "SELECT * FROM stayingin_setmenu");
        if (mysqli_num_rows($selectMealPrice) > 0) {
            while ($rowMeals = mysqli_fetch_assoc($selectMealPrice)) {
                $mealPrice += (int) $rowMeals['Price'];
            }
        }
        //inserting data into the temporary table
        $insertRoomDetails = mysqli_query($con, "INSERT into stayingin_booking_temp (Occupancy,No_Occupants,No_Rooms,Room_Numbers,Meal_Selection,Reservation_Type,CheckIn_Date,CheckOut_Date,CheckIn_Time,CheckOut_Time,Room_Type,User_Email,Room_Price,Meal_Price) VALUES('$occupancy','$noOccupants','$noRooms','" . $encoded_rooms . "','$mealSelection','$reservationType','$checkInDate','$checkOutDate','$checkInTime','$checkOutTime','$roomType','$emailUser','$roomPrice','$mealPrice')");

        if ($insertRoomDetails < 0) {
            echo 'Data has not been entered';
        } else {
            $stayingIn_ID;
            $selectTempBookingID = mysqli_query($con, "SELECT StayingIn_ID FROM stayingin_booking_temp WHERE User_Email='$emailUser'");
            while ($row = mysqli_fetch_assoc($selectTempBookingID)) {
                $stayingIn_ID = $row['StayingIn_ID'];
            }
            header('location:stayingin-payment.php?temp_id=' . $stayingIn_ID . '');
        }
    }

    //for the customized-foods
    else if ($mealSelection == 'Customized') {
        $mealPrice = 0;
        //inserting data into the temporary table
        $insertRoomDetails = mysqli_query($con, "INSERT into stayingin_booking_temp (Occupancy,No_Occupants,No_Rooms,Room_Numbers,Meal_Selection,Reservation_Type,CheckIn_Date,CheckOut_Date,CheckIn_Time,CheckOut_Time,Room_Type,User_Email,Room_Price,Meal_Price) VALUES('$occupancy','$noOccupants','$noRooms','" . $encoded_rooms . "','$mealSelection','$reservationType','$checkInDate','$checkOutDate','$checkInTime','$checkOutTime','$roomType','$emailUser','$roomPrice','$mealPrice')");
        if ($insertRoomDetails < 0) {
            echo 'Data has not been entered';
        } else {
            $stayingIn_ID;
            $selectTempBookingID = mysqli_query($con, "SELECT StayingIn_ID FROM stayingin_booking_temp WHERE User_Email='$emailUser'");
            while ($row = mysqli_fetch_assoc($selectTempBookingID)) {
                $stayingIn_ID = $row['StayingIn_ID'];
            }
            header('location:stayingin-meals.php?temp_id=' . $stayingIn_ID . '');
        }
    }
}

if (isset($_POST['user-meals'])) {
    $total_price = $_POST['total_price'];
    $temp_id = $_POST['temp_id'];
    session_start();
    $meals_arr = array(); //meal array that going to send to the db
    $quantity_arr = array();
    $selectedMeals = $_SESSION['meal_cart'];
    foreach ($selectedMeals as $meal) {
        foreach ($meal as $keys => $values) {
            if ($keys == 'meal_name') {
                array_push($meals_arr, $values);
            }
            if ($keys == 'quantity') {
                array_push($quantity_arr, $values);
            }
            // echo $keys . ':' . $values . '<br>';
        }
    }
    $serializedMealsArr = serialize($meals_arr); //serialize meals array in order to send it to the db 
    $serializedQuantityArr = serialize($quantity_arr);
    $insertCustomizeMealDetails = mysqli_query($con, "INSERT into customize_meals_stayingin (Selected_Meal_Names,Selected_Meals_Quantity,Total_Price,Stayingin_booking_id) VALUES('" . $serializedMealsArr . "','" . $serializedQuantityArr . "','$total_price','$temp_id')");
    $updateMealPrice = mysqli_query($con, "UPDATE stayingin_booking_temp SET Meal_Price='$total_price' WHERE StayingIn_ID='$temp_id'");
    if ($insertCustomizeMealDetails) {
        unset($_SESSION['meal_cart']);
        header('location:stayingin-payment.php?temp_id=' . $temp_id . '');
    }
}

//entering the user details and total amount
if (isset($_POST['BOOK_SUITE'])) {
    $firstName = $_POST['FName'];
    $lastName = $_POST['LName'];
    $contactNo = $_POST['ContactNo'];
    $address = $_POST['Address'];
    $city = $_POST['City'];
    $total_amount = $_POST['Total_Amount'];
    $advance_amount = $_POST['Advance_Amount'];
    $stayingIn_temp = $_POST['staying_in_temp'];
    $insertUserDetails = mysqli_query($con, "INSERT into stayingin_user_details (User_FName,User_LName,Contact_No,Street,City,StayingIn_ID,Total_Amount,Advance_Amount) VALUES('$firstName','$lastName','$contactNo','$address','$city','$stayingIn_temp','$total_amount','$advance_amount')");
    if ($insertUserDetails) {
        header('location:stayingin-payment-payhere.php?user_book_id=' . $stayingIn_temp . '');
    }
}
