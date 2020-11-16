<!-- This page is to show the availability of tables when customers select time slots -->
<?php
include("../Templates/connection.php");
$mealPeriod = $_POST['mealPeriod'];
$breakfastPeriod = $_POST['breakfastPeriod'];
$lunchPeriod = $_POST['lunchPeriod'];
$dinnerPeriod = $_POST['dinnerPeriod'];
$dateSelected = $_POST['dateSelected'];
$date = date('Y-m-d', strtotime($dateSelected));
$selected = array(); //an empty array to store the selected tables(before)
//loading tables for Lunch mealPeriod
if ($mealPeriod == 'Lunch') {
    $sql1 = "SELECT Table_No,Date,Date_Format(Time,'%k:%i') as 'TimeDemo' from dinein_booking where Date='" . $dateSelected . "'";
    $result1 = mysqli_query($con, $sql1);
    while ($row = mysqli_fetch_assoc($result1)) {
        if ($row["TimeDemo"] == $lunchPeriod) {
            array_push($selected, $row['Table_No']);
        }
    }
    for ($i = 1; $i <= 15; $i++) {
        if (in_array($i, $selected)) {
            echo "<div class=\"dot not-avb \"><span>$i</span></div>";
        } else {
            echo "<div class=\"dot \"><span>$i</span></div>";
        }
    }
}
//loading tables for Breakfast mealPeriod
elseif ($mealPeriod == 'Breakfast') {
    $sql2 = "SELECT Table_No,Date,Date_Format(Time,'%k:%i') as 'TimeDemo' from dinein_booking where Date='" . $dateSelected . "'";
    $result2 = mysqli_query($con, $sql2);
    while ($row = mysqli_fetch_assoc($result2)) {
        if ($row["TimeDemo"] == $breakfastPeriod) {
            array_push($selected, $row['Table_No']);
        }
    }
    for ($i = 1; $i <= 15; $i++) {
        if (in_array($i, $selected)) {
            echo "<div class=\"dot not-avb \"><span>$i</span></div>";
        } else {
            echo "<div class=\"dot \"><span>$i</span></div>";
        }
    }
}

//loading tables for Dinner mealPeriod
else {
    $sql3 = "SELECT Table_No,Date,Date_Format(Time,'%k:%i') as 'TimeDemo' from dinein_booking where Date='" . $dateSelected . "'";
    $result3 = mysqli_query($con, $sql3);
    while ($row = mysqli_fetch_assoc($result3)) {
        if ($row["TimeDemo"] == $dinnerPeriod) {
            array_push($selected, $row['Table_No']);
        }
    }
    for ($i = 1; $i <= 15; $i++) {
        if (in_array($i, $selected)) {
            echo "<div class=\"dot not-avb \"><span>$i</span></div>";
        } else {
            echo "<div class=\"dot \"><span>$i</span></div>";
        }
    }
}
