<!-- contains the login and signup form for the customer and the staff -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/1d5f2c83e1.js" crossorigin="anonymous"></script>
</head>

<body>
    <input type="submit" value="Log-In" name="Log-In" class="btn login-btn" id="btn-login">
    <input type="submit" value="Sign-Up" name="Sign-Up" class="btn signup-btn" id="btn-signup">
    <div class="bg-modal">
        <div class="modal-content">
            <div class="close">+</div>
            <img src="../../public/Images/download.png" alt="" class="customer-logo">
            <h3 class="login-heading">Log-IN</h3>
            <form action="./connect_login.php" method="POST" id="login-form">
                <!-- <div class="user-selection">
                    <label for="User type">User Type</label>
                    <select name="User-Type" id="" class="user-type" required>
                        <option value="Customer" selected>Customer</option>>
                        <option value="Staff">Staff</option>
                    </select>
                </div> -->
                <input type="text" name="email" placeholder="Email" class="inputs" id="login-customer-email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                <input type="password" name="password" placeholder="Password" class="inputs" title="Your Password Should contain minimum of 8 characters, the first character should should be uppercase & should include special characters as well" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                <input type="submit" value="Submit" name="Submit" class="log-btn submit">
                <input type="reset" value="Cancel" name="Cancel" class="log-btn cancel"><br />
                <a href="#" onclick="diplayForgetPassword()"><span style="font-weight: bold; color:black;">Forgot your password ?</span></a>
            </form>
        </div>
    </div>
    <div class="bg-modal-signup">
        <div class="modal-content signup">
            <div class="close-signup">+</div>
            <i class="fas fa-user-plus" style="font-size:65px;margin-left:5px;margin-bottom:5px;padding:5px;text-align:center;"></i>
            <h3 class="login-heading">Sign-Up</h3>
            <form action="./Connect_signup.php" method="POST">
                <input type="text" name="firstname" placeholder="First Name" class="inputs" pattern="[A-Za-z]{1,32}" required>
                <input type="text" name="lastname" placeholder="Last Name" class="inputs" pattern="^[A-Za-z]+$" required>
                <input type="text" name="email" placeholder="Email" class="inputs" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                <input type="password" name="password" placeholder="Password" class="inputs" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Your Password Should contain minimum of 8 characters, the first character should should be uppercase & should include special characters as well" required>
                <input type="text" name="contactNum" placeholder="Contact-number" pattern="[0][0-9]{9}" class="inputs" required>
                <input type="submit" value="Submit" name="Submit" class="log-btn submit">
                <input type="reset" value="Cancel" name="Cancel" class="log-btn cancel">
            </form>
        </div>
    </div>
    <script>
        //email validation
        // function validation() {
        //     var form = document.getElementById("login-form");
        //     var email = document.getElementById("login-customer-email").value;
        //     var text = document.getElementById("valid-invalidity");
        //     const pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        //     if (email.match(pattern)) {
        //         form.classList.add("valid");
        //         form.classList.remove("invalid");
        //         text.innerHTML = "";
        //     } else {
        //         form.classList.remove("valid");
        //         form.classList.add("invalid");
        //         text.innerHTML = "Please Enter Valid Email Address";
        //         text.style.color = "#ff0000";
        //     }
        // }
    </script>
</body>

</html>