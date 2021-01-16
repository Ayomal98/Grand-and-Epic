<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="bg-modal-signup-edit">
        <div class="modal-content signup">
            <div class="close-signup">+</div>
            <i class="fas fa-user-plus" style="font-size:65px;margin-left:5px;margin-bottom:5px;padding:5px;text-align:center;"></i>
            <h3 class="login-heading">Edit Profile</h3>
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
</body>

</html>