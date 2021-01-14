<?php include("../../config/connection.php");
include("../../public/includes/session.php");
if (isset($_POST['Submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = md5($_POST['password']);
    // $usertype = mysqli_real_escape_string($con, $_POST['User-Type']);
    $loginQuery = "SELECT * FROM login_table WHERE Email='" . $email . "' AND Password='" . $password . "' ";
    $resultLogin = mysqli_query($con, $loginQuery);
    if (mysqli_num_rows($resultLogin) > 0) {
        $row1 = mysqli_fetch_assoc($resultLogin);
        $usertype = $row1["User_Type"];
        $typeCustomer = "Customer";
        $typeEmployee = "Employee";
        if ($usertype == $typeCustomer) {
            echo "<script>alert('Done');</script>";
            $customerQuery = "SELECT * FROM customer WHERE Email='" . $email . " ' AND Password='" . $password . "' ";
            $resultCustomer = mysqli_query($con, $customerQuery);
            checkSession();
            $rowCustomer = mysqli_fetch_assoc($resultCustomer);
            $_SESSION["First_Name"] = $rowCustomer["First_Name"];
            $_SESSION["User_Email"] = $rowCustomer["Email"];
            header('Location:HomePage-login.php');
        } else {
            echo "<script>
                alert('Your Login Credentials are invalid! Please Try Again');
                window.location.href='index.php';
                </script>";
        }
    } else {
        $row = mysqli_fetch_assoc($resultLogin);
        echo $row["Email"];
        echo $password;
        echo "<script>alert('WTFF');</script>";
    }
}
//     $query1 = "SELECT First_Name,Email,Password,User_Role FROM employee WHERE Email='" . $email . "' AND Password='" . $password . "'";
    


//     if ($usertype == 'Staff') {
//         $result1 = mysqli_query($con, $query1);
//         if (mysqli_num_rows($result1) == 1) {
//             $row = mysqli_fetch_assoc($result1);
//             checkSession();
//             $_SESSION["First_Name"] = $row['First_Name'];
//             $_SESSION["Employee_ID"] = $row['Employee_ID'];
//             $_SESSION["User_Role"] = $row['User_Role'];
//             if ($row["User_Role"] == "Admin") {

//                 header('Location:../Admin/AdminDashboard.php');
//             } elseif ($row["User_Role"] == "Hotel Manager") {

//                 header('Location:../Hotel_Manager/HotelManagerDashboard.php');
//             } elseif ($row["User_Role"] == "Hotel Supervisor") {
//                 header('Location:../Hotel_Supervisor/SupervisorDashboard.php');
//             } elseif ($row["User_Role"] == "Employee") {
//                 header('Location:../Employee/EmployeeDashboard.php');
//             } elseif ($row["User_Role"] == "Receptionist") {
//                 header('Location:../Receptionist/ReceptionistDashboard.php');
//             }
//         } else {
//             echo "<script>
//             alert('Your Login Credentials are invalid! Please Try Again');
//             window.location.href='index.php';
//             </script>";
//         }
//     } elseif ($usertype == 'Customer') {
//         $result2 = mysqli_query($con, $query2);

//         if (mysqli_num_rows($result2) == 1) {
//             $row = mysqli_fetch_assoc($result2);
//             checkSession();
//             $_SESSION["First_Name"] = $row["First_Name"];
//             $_SESSION["User_Email"] = $row["Email"];

//             header('Location:HomePage-login.php');
//         } else {
//             echo "<script>
//             alert('Your Login Credentials are invalid! Please Try Again');
//             window.location.href='index.php';
//             </script>";
//         }
//     }
// }

    // $customeQuery = "SELECT * FROM customer WHERE Email='" . $email . "' AND Password='" . $password . "' ";
    // $employeeQuery = "SELECT * FROM employee WHERE Email='" . $email . "' AND Password='" . $password . "' ";

    // $customerResult = mysqli_query($con, $customeQuery);
    // $employeeResult = mysqli_query($con, $employeeQuery);

    // if (mysqli_num_rows($customerResult) == 1) {
    //     $row = mysqli_fetch_assoc($customerResult);
    //     $_SESSION["First_Name"] = $row["First_Name"];
    //     $_SESSION["User_Email"] = $row["Email"];
    //     header('Location:HomePage-login.php');
    // } else if (mysqli_num_rows($employeeResult) == 1) {
    //     $row = mysqli_fetch_assoc($employeeResult);
    //     $row = mysqli_fetch_assoc($result);
    //     if ($row["User_Role"] == "Admin") {
    //         $_SESSION['username'] = $row['First_Name'];
    //         $_SESSION["User_Email"] = $row["Email"];
    //         header('Location:../Admin/AdminDashboard.php');
    //     } elseif ($row["User_Role"] == "Hotel Manager") {
    //         $_SESSION['username'] = $row['First_Name'];
    //         $_SESSION["User_Email"] = $row["Email"];
    //         header('Location:../Hotel_Manager/HotelManagerDashboard.php');
    //     } elseif ($row["User_Role"] == "Hotel Supervisor") {
    //         $_SESSION['username'] = $row['First_Name'];
    //         $_SESSION["User_Email"] = $row["Email"];
    //         header('Location:../Hotel_Supervisor/SupervisorDashboard.php');
    //     } elseif ($row["User_Role"] == "Employee") {
    //         $_SESSION['username'] = $row['First_Name'];
    //         $_SESSION["User_Email"] = $row["Email"];
    //         header('Location:../Employee/EmployeeDashboard.php');
    //     } elseif ($row["User_Role"] == "Receptionist") {
    //         $_SESSION['username'] = $row['First_Name'];
    //         $_SESSION["User_Email"] = $row["Email"];
    //         header('Location:../Receptionist/ReceptionistDashboard.php');
    //     }
    // } else {
    //     echo "<script>
    //     alert('Your Login Credentials are invalid! Please Try Again');
    //     window.location.href='index.php';
    //     </script>";
    // }

    // if ($usertype == 'Employee') {
    //     $query = "SELECT First_Name,Email,Password,User_Role FROM employee WHERE Email='" . $email . "' AND Password='" . $password . "'";
    //     $result = mysqli_query($con, $query);
    //     if (mysqli_num_rows($result) == 1) {
    //         $row = mysqli_fetch_assoc($result);
    //         if ($row["User_Role"] == "Admin") {
    //             $_SESSION['username'] = $row['First_Name'];
    //             $_SESSION["User_Email"] = $row["Email"];
    //             header('Location:../Admin/AdminDashboard.php');
    //         } elseif ($row["User_Role"] == "Hotel Manager") {
    //             $_SESSION['username'] = $row['First_Name'];
    //             $_SESSION["User_Email"] = $row["Email"];
    //             header('Location:../Hotel_Manager/HotelManagerDashboard.php');
    //         } elseif ($row["User_Role"] == "Hotel Supervisor") {
    //             $_SESSION['username'] = $row['First_Name'];
    //             $_SESSION["User_Email"] = $row["Email"];
    //             header('Location:../Hotel_Supervisor/SupervisorDashboard.php');
    //         } elseif ($row["User_Role"] == "Employee") {
    //             $_SESSION['username'] = $row['First_Name'];
    //             $_SESSION["User_Email"] = $row["Email"];
    //             header('Location:../Employee/EmployeeDashboard.php');
    //         } elseif ($row["User_Role"] == "Receptionist") {
    //             $_SESSION['username'] = $row['First_Name'];
    //             $_SESSION["User_Email"] = $row["Email"];
    //             header('Location:../Receptionist/ReceptionistDashboard.php');
    //         }
    //     } else {
    //         echo "<script>
    //         alert('Your Login Credentials are invalid! Please Try Again');
    //         window.location.href='index.php';
    //         </script>";
    //     }
    // } elseif ($usertype == 'Customer') {
    //     $query = "SELECT First_Name,Email, Password FROM customer WHERE Email='" . $email . "' AND Password='" . $password . "' ";
    //     $result = mysqli_query($con, $query);
    //     if (mysqli_num_rows($result) == 1) {
    //         $row = mysqli_fetch_array($result);
    //         $_SESSION["First_Name"] = $row["First_Name"];
    //         $_SESSION["User_Email"] = $row["Email"];
    //         header('Location:HomePage-login.php');
    //     } else {
    //         echo "<script>
    //         alert('Your Login Credentials are invalid! Please Try Again');
    //         window.location.href='index.php';
    //         </script>";
    //     }
    // }
