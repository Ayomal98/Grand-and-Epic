<?php
session_destroy();
unset($_SESSION['First_Name']);
unset($_SESSION['User_Email']);
header('location:index.php');
