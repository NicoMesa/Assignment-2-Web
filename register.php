 <?php include ("headerboiler.html"); ?>
 <body>
    <a class="top" href="index.php">Back to home page</a>
    <a class="top" href="login.php">Already have an account? Sign-In!</a>
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