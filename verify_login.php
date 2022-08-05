<?php
//file to verify if user exist and login to profile
//session start to get session variables
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //connect to database
    $conn = mysqli_connect("localhost", "root", "", "assignment2");
    // Check connection
    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
            echo "<h3>error conecting</h3>";
    }
    // Taking all 5 values from the form data(input)
    $login = $_POST['userlogin'];
    $pass =  $_POST['userPass'];

    // Performing insert query execution
    // here our table name is college
    $sql = "SELECT * FROM users WHERE user_name = '$login' and password = '$pass' ";
    $info = mysqli_query($conn, $sql);
    if(!$info){
        echo "<h3>No records</h3>";
    }
    else{
        $array = mysqli_fetch_array($info);
        echo "<h1>Welcome back: $array[2]</h1>";
        echo ("<h4>Your email: $array[1] </h4> 
        <h4>Your user name: $array[2] </h4>");
        $_SESSION['username'] = $array[2];
        $_SESSION['email'] = $array[1];
        $_SESSION['id'] = $array[0];
    }
    // Close connection
    mysqli_close($conn);
}
?>