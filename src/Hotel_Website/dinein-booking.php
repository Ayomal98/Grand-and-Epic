<!-- This page contains about the actual booking(insert query) for the dinein-booking -->
<?php include("../Templates/connection.php");
$boolTrue = TRUE;
$boolFalse = False;
$timeperiod = '';
$date;
if (isset($_POST['confirm-book-btn'])) {
    $customername = mysqli_real_escape_String($con, $_POST['customer-name']);
    $emailaddress = mysqli_real_escape_String($con, $_POST['customer-email']);
    $numguests = mysqli_real_escape_string($con, $_POST['number-of-guests']);
    $mealperiod = mysqli_real_escape_string($con, $_POST['Meal-Period']);
    $tableno = mysqli_real_escape_string($con, $_POST['table-no']);

    if ($mealperiod == 'Breakfast') {
        $timeperiod = mysqli_real_escape_string($con, $_POST['breakfast-times']);
    } elseif ($mealperiod == 'Lunch') {
        $timeperiod = mysqli_real_escape_string($con, $_POST['lunch-times']);
    } else {
        $timeperiod = mysqli_real_escape_string($con, $_POST['dinner-times']);
    }
    $date = mysqli_real_escape_string($con, $_POST['Dine-in-date']);
    $query = "INSERT INTO dinein_booking (Table_No,Customer_email,Customer_Name,Num_Guests,Meal_Period,Date,Time) VALUES ('" . $tableno . "','$emailaddress','" . $customername . "','" . $numguests . "','" . $mealperiod . "','" . $date . "','" . $timeperiod . "') ";
    $insertTablesQuery = "INSERT INTO tables (Table_No,Time,Date,isBooked) VALUES ('" . $tableno . "','" . $timeperiod . "','" . $date . "','" . $boolTrue . "')";
    mysqli_query($con, $insertTablesQuery);
    if ($con->query($query) === TRUE) {
        echo "<script>
            alert('Your booking has been successfully completed');
            window.location.href='HomePage-login.php';
            </script>";
    } else {
        echo "Error: " . $query . "<br>" . $con->error;
    }
}
