<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
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
        echo nl2br("\n<h4>Your email: $array[1] </h4>\n <h4>Your user name: $array[2] </h4>\n ");
        $_SESSION['username'] = $array[2];
        $_SESSION['email'] = $array[1];
        echo $_SESSION['username'];
    }
    
    /*
    else{
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
            echo "<h3>error</h3>";
    }
    */
    // Close connection
    mysqli_close($conn);
}
?>