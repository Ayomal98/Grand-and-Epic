<?php
session_destroy();
unset($_SESSION['First_Name']);
header('location:../index.php');
?>