<?php
$serverName = "localhost";
$dbName = "grand_&_epic";
$username = "root";
$password = "";
$con = mysqli_connect($serverName, $username, $password, $dbName);
if (!$con) {
    die("Connection Failed:" . mysqli_connect_error());
}
