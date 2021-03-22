<?php
include("../../config/connection.php");
if (isset($_POST['ADD'])) {
  $promotion_type = $_POST['typelist'];
  $context = $_POST['Context'];
  $policies = $_POST['Policies'];

  $sql = "INSERT into promotions (Promotion_type,Context,Policies) VALUES ('" . $promotion_type . "','" . $context . "','" . $policies . "')";

  $query_run = mysqli_query($con, $sql);

  if ($query_run) {
    echo "<script>
		alert('Promotion is successfully added');
		window.location.href='AdminAddPromotion.php';
        </script>";
  } else {
    echo "<script> alert('Promotion adding is not successful. please try again') ;
    window.location.href='AdminAddPromotion.php';

        </script>";
  }
}
