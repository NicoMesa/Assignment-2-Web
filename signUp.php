<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
        </div>

        <div class="textfield">
            <label for="pass">Password</label>
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
</body>
</html>