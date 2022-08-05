
<?php 
//Index web page
//start session to get variables if exists
session_start();
//include html templates
include ("headboiler.html"); 
include ("headerboiler.html"); ?>
<body>
    <?php
    //check if there is a session active to greet the user
    if(isset($_SESSION['username'])){
        echo "<h2>Welcome back: " .$_SESSION['username']. " </h2>";
        echo "<p>Your Email: " .$_SESSION['email']. " </p>";
   }
   ?>
<!-- rest of the page to show what the page does -->
    <div>
        <h1> This web let you search your favorite movies and store it in your profile! </h1>
        <h2> Search thousands of movies and series and add them to your watchllist!</h2>
        <h3> <i>Never forget what movie or show to watch next</i> </h3>
    </div>
</body>
</html>