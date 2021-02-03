
<?php
$select_Cus = "SELECT * FROM customer WHERE Email='$email'";
$result = mysqli_query($con, $select_Cus);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $first_name = $row["First_Name"];
    $last_name = $row["Last_Name"];
    $email = $row["Email"];
    $contactNo = $row["Contact_No"];
    echo "
            <div class=\"bg-modal-edit\">
                <div class=\"modal-content signup\">
                    <div class=\"close-edit\" onclick=\"closeEdit()\">+</div>
                    <i class=\"fas fa-user-plus\" style=\"font-size:65px;margin-left:5px;margin-bottom:5px;padding:5px;text-align:center;\"></i>
                    <h3 class=\"login-heading\">Edit Profile</h3>
                    <form action=\"\" method=\"POST\">
                        <input type=\"text\" name=\"firstname\" placeholder=\"First Name\" class=\"inputs\" pattern=\"^[A-Za-z]+$\" value=\"$first_name \" required>
                        <input type=\"text\" name=\"lastname\" placeholder=\"Last Name\" class=\"inputs\" pattern=\"^[A-Za-z]+$\" value=\"$last_name \" required>
                        <input type=\"text\" name=\"email\" placeholder=\"Email\" class=\"inputs\" pattern=\"[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$\" value=\"$email \" required>
                        <input type=\"text\" name=\"contactNum\" placeholder=\"Contact-number\" pattern=\"[0][0-9]{9}\" class=\"inputs\" value=\"$contactNo \" required>
                        <input type=\"submit\" value=\"Update\" name=\"Update\" class=\"log-btn submit\">
                        <input type=\"reset\" value=\"Reset\" name=\"Cancel\" class=\"log-btn cancel\">
                    </form>
                </div>
            </div>";

    //customer update query
    if (isset($_POST['Update'])) {
        $first_nameUp = mysqli_real_escape_string($con, $_POST['firstname']);
        $last_nameUp = mysqli_real_escape_string($con, $_POST['lastname']);
        $contactNoUp = mysqli_real_escape_string($con, $_POST['contactNum']);
        echo $email, $first_nameUp, $last_nameUp;
        $updateCusQuery = "UPDATE customer set First_Name='$first_nameUp',Last_Name='$last_nameUp',Contact_No='$contactNoUp' WHERE Email='$email' ";
        if (mysqli_query($con, $updateCusQuery)) {
            echo "Record Updated";
        } else {
            echo "Record Not Updated";
        }
    }
}
?>
