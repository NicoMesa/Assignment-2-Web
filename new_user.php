<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $conn = mysqli_connect("localhost", "root", "", "assignment2");

    // Check connection
    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
            echo "<h3>error conecting</h3>";
    }
    // Taking all 5 values from the form data(input)
    $email =  $_POST['email'];
    $login = $_POST['login'];
    $pass =  $_POST['pass'];
    // Performing insert query execution
    // here our table name is college
    $sql = "INSERT INTO users (email, user_name, password) VALUES ('$email', '$login','$pass')";
    if(mysqli_query($conn, $sql)){
        echo "<h3>You succesfully created a new account!</h3>";
        echo nl2br("\n<h4>Your email: $email</h4>\n <h4>Your user name: $login</h4>\n ");
    } else{
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
            echo "<h3>error</h3>";
    }
    // Close connection
    mysqli_close($conn);
}
?>