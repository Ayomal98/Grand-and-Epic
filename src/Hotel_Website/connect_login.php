<?php include("../../config/connection.php");
include("../../public/includes/session.php");
if (isset($_POST['Submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = md5($_POST['password']);
    $loginQuery = "SELECT * FROM login_table WHERE Email='" . $email . "' AND Password='" . $password . "' "; //query to check details from login table
    $resultLogin = mysqli_query($con, $loginQuery);
    if (mysqli_num_rows($resultLogin) > 0) {
        $row1 = mysqli_fetch_assoc($resultLogin);
        $usertype = $row1["User_Type"];
        $typeCustomer = "Customer";
        $typeEmployee = "Employee";
        if ($usertype == $typeCustomer) { //if the login user is a customer
            $customerQuery = "SELECT * FROM customer WHERE Email='" . $email . " ' AND Password='" . $password . "' ";
            $resultCustomer = mysqli_query($con, $customerQuery);
            checkSession();
            $rowCustomer = mysqli_fetch_assoc($resultCustomer);
            $_SESSION["First_Name"] = $rowCustomer["First_Name"];
            $_SESSION["User_Email"] = $rowCustomer["Email"];
            header('Location:HomePage-login.php');
        } elseif ($usertype == $typeEmployee) { //if the login user is an employee
            $employeeQuery = "SELECT * FROM employee WHERE Email='" . $email . "' AND Password='" . $password . "' ";
            $resultEmployee = mysqli_query($con, $employeeQuery);
            $rowEmployee = mysqli_fetch_assoc($resultEmployee);
            checkSession();
            $_SESSION["First_Name"] = $rowEmployee['First_Name'];
            $_SESSION["Employee_ID"] = $rowEmployee['Employee_ID'];
            if ($rowEmployee["User_Role"] == "Hotel Manager") {
                header('Location:../Hotel_Manager/HotelManagerDashboard.php');
            } elseif ($rowEmployee["User_Role"] == "Admin") {
                header('Location:../Admin/AdminDashboard.php');
            } elseif ($rowEmployee["User_Role"] == "Hotel Supervisor") {
                header('Location:../Hotel_Supervisor/SupervisorDashboard.php');
            } elseif ($rowEmployee["User_Role"] == "Employee") {
                header('Location:../Employee/EmployeeDashboard.php');
            } elseif ($rowEmployee["User_Role"] == "Receptionist") {
                header('Location:../Receptionist/ReceptionistDashboard.php');
            }
        }
    } else {
        echo "<script>
            alert('Your Login Credentials are invalid! Please Try Again');
            window.location.href='index.php';
            </script>";
    }
}
