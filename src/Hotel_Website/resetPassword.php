<?php include("../../config/connection.php");

if (!isset($_GET["customercode"])) {
    echo "<script>alert('Your password has not been updated successfully')</script>";
}
//to get the customer code
if (isset($_GET["customercode"])) {
    $customercode = $_GET["customercode"];
    $getCustomerEmailQuery = mysqli_query($con, "SELECT email FROM reset_password_customer WHERE code='$customercode'");
    if (isset($_POST["submit"])) {
        $password = md5($_POST["password"]);
        if (mysqli_num_rows($getCustomerEmailQuery)) {
            $row = mysqli_fetch_assoc($getCustomerEmailQuery);
            $email = $row["email"];
            // if (mysqli_query($con, $sqlupdatePassword)) {
            //     echo "password updated correctly";
            //     $result=mysqli_fetch_assoc($sqlupdate)
            // } else {
            //     echo "no";
            // }
            // $update = "UPDATE customer SET Customer_ID='$num' WHERE Email='$email1'";
            // mysqli_query($con, $update);
            $updatePasswordQuery = mysqli_query($con, "UPDATE customer SET Password = '$password' WHERE Email='$email'");
            $deleteRequest = "DELETE FROM reset_password_customer WHERE code='$customercode' AND email='$email'";
            if ($updatePasswordQuery) {
                mysqli_query($con, $deleteRequest);
                echo "<script>alert('Your password has been updated successfully')</script>";
            }

            //  $result=mysqli_fetch_assoc($updatePasswordQuery);
            //  if($result){
            //      echo correct;
            // //  }
            // if ($updatePasswordQuery) {
            //     echo $email . "<br>";
            //     echo $password . "<br>";
            //     exit();
            // } else {
            //     exit("something went wrong");
            // }
        }
    }
}

//to get the employee code
elseif (isset($_GET["employeecode"])) {
    $employeecode = $_GET["employeecode"];
    $getEmployeeEmailQuery = mysqli_query($con, "SELECT email FROM reset_password_employee WHERE code='$employeecode'");
    if (isset($_POST["submit"])) {
        $password = md5($_POST["password"]);
        if (mysqli_num_rows($getEmployeeEmailQuery)) {
            $row = mysqli_fetch_assoc($getEmployeeEmailQuery);
            $email = $row["email"];
            // if (mysqli_query($con, $sqlupdatePassword)) {
            //     echo "password updated correctly";
            //     $result=mysqli_fetch_assoc($sqlupdate)
            // } else {
            //     echo "no";
            // }
            // $update = "UPDATE customer SET Customer_ID='$num' WHERE Email='$email1'";
            // mysqli_query($con, $update);
            $updatePasswordQuery = mysqli_query($con, "UPDATE employee SET Password = '$password' WHERE Email='$email'");
            $deleteRequest = "DELETE FROM reset_password_employee WHERE code='$employeecode' AND email='$email'";
            mysqli_query($con, $deleteRequest);
            //  $result=mysqli_fetch_assoc($updatePasswordQuery);
            //  if($result){
            //      echo correct;
            // //  }

        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../../public/css/reset-password.css">
</head>

<body>
    <div class="form-container">

        <img src="../../public/images/Hotel-logo.png" alt="">
        <u>
            <h2 style="font-size: 30px;">Reset Password</h2>
        </u>
        <form action="#" method="POST">
            <input type="password" name="password" id="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="New Password" class="val">
            <input type="submit" value="Change Password" name="submit" class="change-pw">
        </form>
    </div>

</body>

</html>