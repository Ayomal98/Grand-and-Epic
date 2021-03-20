<?php
include("../../config/connection.php");
if (isset($_POST['ADD'])) {
	$Heading = $_POST['Heading'];
	$Content = $_POST['Content'];
	$Img_url = addslashes(file_get_contents($_FILES["contentimage"]["tmp_name"]));

	$sql = "INSERT into content (Heading,Content,Img_url) VALUES (' $Heading ',' $Content','" . $Img_url . "')";

	$query_run = mysqli_query($con, $sql);

	if ($query_run) {
		echo "<script>
		alert('Post is successfully added');
		window.location.href='AdminManageContent.php';
        </script>";
	} else {
		echo "<script> alert('Promotion adding is not successful. please try again') ;
    window.location.href='AdminManageContent.php';

        </script>";
	}
}
