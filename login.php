<<<<<<< HEAD
<?php include ("headerboiler.html"); ?>
<body>
    <a class="top" href="index.php">Back to home page</a>
    <a class="top" href="register.php">Register as new user</a>
    <h2>Register as a new user</h2>
    <form action="new_user.php" method="post" id="register" onsubmit="return newUser()">
        <div class="textfield">
            <label for="email">Email Address</label>
            <input type="text" name="email" id="email" placeholder="Email">
            <span id="mailError" class="error"></span>
        </div>

        <div class="textfield">
            <label for="login">User Name</label>
            <input type="text" name="login" id="login" placeholder="User name">
            <span id="loginError" class="error"></span>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/scripts.js" defer></script>

    <title>Login</title>
</head>

<body>
    <h2>Login with existing username</h2>
    <form action="profile.html" method="post" id="loginform" >
        <div class="textfield">
            <label for="userlogin">User Name</label>
            <input type="text" name="userlogin" id="userlogin" placeholder="User name">
            <span id="userLoginError" class="error"></span>
>>>>>>> e47129b4140667aba30314dda51fac7ab77d613c
        </div>

        <div class="textfield">
            <label for="pass">Password</label>
<<<<<<< HEAD
            <input type="password" name="pass" id="pass" placeholder="Password">
            <span id="passError" class="error"></span>
        </div>
    
        <div class="textfield">
            <label for="pass2">Re-type Password</label>
            <input type="password" id="pass2" placeholder="Password">
            <span id="pass2Error" class="error"></span>
        </div>
        <button type="submit">Create User</button>

    </form>
   
=======
            <input type="password" name="userPass" id="userPass" placeholder="Password">
            <span id="userPassError" class="error"></span>
        </div>
        <button type="submit">Login In</button>
    </form>
>>>>>>> e47129b4140667aba30314dda51fac7ab77d613c
</body>
</html>