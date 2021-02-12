<?php 
include("../../config/connection.php");
if (isset($_POST['ADD'])) {
    $Promotion_type=$_POST['Loyalty'];
    $Context = $_POST['Context'];
    $Policies = $_POST['Policies'];

    $sql = "INSERT into promotion (Promotion_type,Context,Policies) VALUES ('" . $Promotion_type . "','" . $Context . "','" . $Policies . "')";
    

    $query_run = mysqli_query($con,$sql);

    if ($query_run) {
	echo "<script>
		alert('Promotion is successfully added');
		window.location.href='AdminAddPromotions.php';
        </script>";
         
      } else {
        echo "<script> alert('Promotion adding is not successful. please try again') ;
        window.location.href='AdminAddPromotions.php';
        </script>";
	}
}
?>  
