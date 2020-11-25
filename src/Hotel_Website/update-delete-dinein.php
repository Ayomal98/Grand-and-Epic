<!-- This page containes about the queries of both update and delete queries for the dinein booking -->


<?php include("../../config/connection.php");
include("./myreservations.php");
//query to delete the dinein bookig
if (isset($_POST['Delete'])) {
  $dinein_id = $_POST['dinein_id'];
  $table_no = $_POST['table_no'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  echo "<script> console.log($table_no);</script>";
  $deletequerybook = "DELETE FROM dinein_booking WHERE Table_No=' $table_no ' AND Date='$date' AND Time='$time'";
  if ($con->query($deletequerybook) === TRUE) {
    echo "<script>
             alert('Your booking has been Deleted Successfully');
            window.location.href='HomePage-login.php';
        </script>";
  } else {
    echo "<script>
             alert('Your booking has not been Deleted');
            window.location.href='HomePage-login.php';
        </script>";
  }
}
//query to update the dinein booking
if (isset($_POST['Update'])) {
  $dinein_id = mysqli_real_escape_string($con, $_POST['dinein_id']);
  $customername = mysqli_real_escape_String($con, $_POST['customer-name']);
  $emailaddress = mysqli_real_escape_String($con, $_POST['customer-email']);
  $numguests = mysqli_real_escape_string($con, $_POST['number-of-guests']);
  $mealperiod = mysqli_real_escape_string($con, $_POST['Meal-Period']);
  $tableno = mysqli_real_escape_string($con, $_POST['table-no']);
  $date = mysqli_real_escape_string($con, $_POST['Dine-in-date']);
  if ($mealperiod == 'Breakfast') {
    $timeperiod = mysqli_real_escape_string($con, $_POST['breakfast-times']);
  } elseif ($mealperiod == 'Lunch') {
    $timeperiod = mysqli_real_escape_string($con, $_POST['lunch-times']);
  } else {
    $timeperiod = mysqli_real_escape_string($con, $_POST['dinner-times']);
  }
  //to check the required booking has been already been booked
  $selectAvailability = "SELECT * FROM dinein_booking where Time='$timeperiod' AND Date='$date' AND Table_No='$tableno'";
  $checkAvailability = mysqli_query($con, $selectAvailability);
  if (mysqli_num_rows($checkAvailability) == 1) {
    echo "<script>
          alert('Table you selected has been already reserved, Please try another table !!');
          window.location.href='myreservations.php';
          </script>";
  } else {
    $updatequery = "UPDATE dinein_booking SET Table_No='$tableno',Customer_email='$emailaddress',Num_Guests='$numguests',Meal_Period='$mealperiod',Date='$date',Time='$timeperiod' WHERE Dinein_ID=$dinein_id ";
    if ($con->query($updatequery) === TRUE) {
      echo "<script>
             alert('Your booking details has been Updated Successfully');
            window.location.href='HomePage-login.php';
          </script>";
    } else {
      echo "<script>
    alert('Your booking details has not been Updated');
   window.location.href='HomePage-login.php';
 </script>";
    }
    /* Redirect browser */
  }
} ?>