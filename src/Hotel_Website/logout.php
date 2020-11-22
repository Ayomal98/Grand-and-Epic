<?php
session_destroy();
unset($_SESSION['First_Name']);
header('location:../Hotel_Website/index.php');
?>
