<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/scripts.js" defer></script>

    <title>Document</title>
</head>

<body>
    <h2>Login with existing username</h2>
    <form action="profile.html" method="post" id="loginform" >
        <div class="textfield">
            <label for="userlogin">User Name</label>
            <input type="text" name="userlogin" id="userlogin" placeholder="User name">
            <span id="userLoginError" class="error"></span>
        </div>

        <div class="textfield">
            <label for="pass">Password</label>
            <input type="password" name="userPass" id="userPass" placeholder="Password">
            <span id="userPassError" class="error"></span>
        </div>
        <button type="submit">Login In</button>
    </form>
</body>
</html>