
<?php session_start();
include ("headboiler.html"); 
include ("headerboiler.html"); ?>
<body>
    <h2> This web let you search your favorite movies and store it in your profile! </h2>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
</head>
<body>
    <?php include_once("new_user.php");
   if(isset($_SESSION['username'])){
    echo "<h2>Welcome back: " .$_SESSION['username']. " </h2>";
   }
   ?>
   <h1>Find movies or shows in here</h1>
  

</body>
</html>