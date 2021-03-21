<?php
include("../../config/connection.php");

//ADD
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

		


//UPDATE
if (isset($_POST['update'])) {
							$Promotion_Type=$_POST['type'];
							$Context = $_POST['Context'];
                           //$Policies = $_POST['Policies'];
                            $query = "UPDATE promotions SET Context='$Context' where Promotion_type=' $Promotion_type '";
							$query_run = mysqli_query($con, $query);
							if ($query_run) {
								echo '<script type="text/javascript">alert("Data updated successfully")</script>';
								echo '<script>window.location.href="AdminAddPromotion.php"</script>';
							} else {
								echo '<script type="text/javascript">alert("Data update is unsuccessful. Please try again")</script>';
								echo '<script>window.location.href=AdminAddPromotion.php"</script>';
							}
						}

//DELETE
if (isset($_POST['delete'])) {
    $query = "DELETE FROM promotions where Promotion_type='$_POST[Promotion_type]'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        echo "<script>
alert('Promotion is successfully deleted');
window.location.href='AdminAddPromotion.php';
</script>";
    } else {
        echo '<script> alert("Deletion is not successful. Please try again") </script>';
    }
}
?>

