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
            <img src="Images/download.png" alt="" class="customer-logo">
            <h3 class="login-heading">Log-IN</h3>
            <form action="Hotel_Website/connect_login.php" method="POST" id="login-form">
                <div class="user-selection">
                    <label for="User type">User Type</label>
                    <select name="User-Type" id="" class="user-type" required>
                        <option value="Customer" selected>Customer</option>>
                        <option value="Employee">Staff</option>
                    </select>
                </div>
<<<<<<< HEAD
                <input type="text" name="email" placeholder="Email" class="inputs" id="login-customer-email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                <span id="valid-invalidity"></span>
=======
                <input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Email" class="inputs" required>
>>>>>>> aa343214f299f5100baa68ba394797cb1643a1ab
                <input type="password" name="password" placeholder="Password" class="inputs" required>
                <a href=""><span style="font-weight: bold; color:black;">Forgot your password ?</span></a><br />
                <input type="submit" value="Submit" name="Submit" class="log-btn submit">
                <input type="reset" value="Cancel" name="Cancel" class="log-btn cancel">

            </form>
        </div>
    </div>
    <div class="bg-modal-signup">
        <div class="modal-content signup">
            <div class="close-signup">+</div>
            <i class="fas fa-user-plus" style="font-size:65px;margin-left:5px;margin-bottom:5px;padding:5px;text-align:center;"></i>
            <h3 class="login-heading">Sign-Up</h3>
            <form action="Hotel_Website/Connect_signup.php" method="POST">
                <input type="text" name="firstname" placeholder="First Name" class="inputs" pattern="[A-Za-z]{1,32}" required>
                <input type="text" name="lastname" placeholder="Last Name" class="inputs" pattern="[A-Za-z]{1,32}" required>
                <input type="text" name="email" placeholder="Email" class="inputs" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                <input type="password" name="password" placeholder="Password" class="inputs" required>
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