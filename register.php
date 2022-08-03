<?php include ("headerboiler.html"); 
?>
<body>
    <a class="top" href="index.php">Back to home page</a>
    <a class="top" href="register.php">Register as new user</a>
    <h2>Register as a new user</h2>

    <form action="index.php" method="post" id="register" onsubmit="return newUser()">
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