<?php
require_once("../../config/connection.php"); ?>
<?php
session_start();

//logout for the staff
if (isset($_SESSION['First_Name']) && isset($_SESSION['User_Role'])) {
    session_unset($_SESSION['First_Name']);
    session_unset($_SESSION['Employee_ID']);
    session_unset($_SESSION['User_Role']);
    session_destroy();
    header('location:index.php');
    exit();
}
//logout for the customers
if (isset($_SESSION['First_Name'])) {
    session_unset($_SESSION['First_Name']);
    session_unset($_SESSION['User_Email']);
    session_destroy();
    header('location:index.php');
    exit();
}
?>