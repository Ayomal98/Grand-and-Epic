<?php include("../Templates/connection.php");
session_start();
if (isset($_POST['Submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $usertype = mysqli_real_escape_string($con, $_POST['User-Type']);
    $query = '';
    if ($usertype == 'Employee') {
        $query = "SELECT First_Name,Email,Password,User_Role FROM employee WHERE Email='" . $email . "' AND Password='" . $password . "'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row["User_Role"] == "Admin") {
                $_SESSION['username'] = $row['First_Name'];
                $_SESSION["User_Email"] = $row["Email"];
                header('Location:../Admin/AdminDashboard.php');
            } elseif ($row["User_Role"] == "Hotel Manager") {
                $_SESSION['username'] = $row['First_Name'];
                $_SESSION["User_Email"] = $row["Email"];
                header('Location:../Hotel_Manager/HotelManagerDashboard.php');
<<<<<<< HEAD
            } elseif ($row["User_Role"] == "Supervisor") {
=======
                $_SESSION["First_Name"] = $row["First_Name"];
            } elseif ($row["User_Role"] == "Hotel Supervisor") {
>>>>>>> aa343214f299f5100baa68ba394797cb1643a1ab
                $_SESSION['username'] = $row['First_Name'];
                $_SESSION["User_Email"] = $row["Email"];
                header('Location:../Hotel_Supervisor/SupervisorDashboard.php');
            } elseif ($row["User_Role"] == "Employee") {
                $_SESSION['username'] = $row['First_Name'];
                $_SESSION["User_Email"] = $row["Email"];
<<<<<<< HEAD
                header('Location:../Employees/EmployeeDashboard.html');
            } else {
                $_SESSION['username'] = $row['First_Name'];
                $_SESSION["User_Email"] = $row["Email"];
                header('Location:../Receptionist/ReceptionistDashboard.html');
=======
                header('Location:../Employees/EmployeeDashboard.php');
            }
            elseif ($row["User_Role"] == "Receptionist") {
                $_SESSION['username'] = $row['First_Name'];
                $_SESSION["User_Email"] = $row["Email"];
                header('Location:../Receptionist/ReceptionistDashboard.php');
            }
            elseif ($row["User_Role"] == "Hotel Supervisor") {
                $_SESSION['username'] = $row['First_Name'];
                $_SESSION["User_Email"] = $row["Email"];
                header('Location:../Employee/EmployeeDashboard.php');
>>>>>>> aa343214f299f5100baa68ba394797cb1643a1ab
            }
        }
    } elseif ($usertype == 'Customer') {
        $query = "SELECT First_Name,Email, Password FROM customer WHERE Email=' $email ' AND Password='" . $password . "' ";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $_SESSION["First_Name"] = $row["First_Name"];
            $_SESSION["User_Email"] = $row["Email"];
            header('Location:HomePage-login.php');
        }
    }
}
