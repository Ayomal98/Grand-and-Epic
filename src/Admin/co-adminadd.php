<?php include("../../config/connection.php");
if (isset($_POST['ADD'])) {

    $empFname = $_POST['empFname'];
    $empSname = $_POST['empSname'];
    $empEmail = $_POST['empEmail'];
    $empPass = $_POST['empPass'];
    $empContact = $_POST['empContact'];
    $userrole = 'Hotel Manager';

    $sql = "INSERT into employee (First_Name,Last_Name,Email,Password,Contact_No,User_Role) VALUES ('" . $empFname . "','" . $empSname . "','" . $empEmail . "','" . $empPass . "','" . $empContact . "','" . $userrole . "')";
    $query_run = mysqli_query($con,$sql);

    if ($query_run) {
		echo "<script>
		alert('Hotel Manager Has been Added');
		window.location.href='AdminManageCoAdmins.php';
		</script>";
	} else {
		echo '<script> alert("Data Not Added") </script>';
	}
}
?>