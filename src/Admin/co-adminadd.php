<?php include("../Templates/connection.php");
if (isset($_POST['ADD'])) {

    $empFname = $_POST['empFname'];
    $empSname = $_POST['empSname'];
    $empEmail = $_POST['empEmail'];
    $empPass = $_POST['empPass'];
    $empContact = $_POST['empContact'];
    $userrole = 'Hotel Manager';

    $sql = "INSERT into employee (First_Name,Last_Name,Email,Password,Contact_No,User_Role) VALUES ('" . $empFname . "','" . $empSname . "','" . $empEmail . "','" . $empPass . "','" . $empContact . "','" . $userrole . "')";

    if ($con->query($sql) === TRUE) {
        header("location:AdminManageCoAdmins.php");
    } else {
        echo "record is not successful";
    }
}
