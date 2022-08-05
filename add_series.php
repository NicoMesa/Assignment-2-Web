<?php
session_start();
header( "refresh:5;url=series.php" );
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $title = $_SESSION['title'];
    $poster = $_SESSION['poster'];
    $year = $_SESSION['year'];
    $plot = $_SESSION['plot'];
    $rating = $_SESSION['rating'];
    
    $conn = mysqli_connect("localhost", "root", "", "assignment2");
    echo "<p>after conection </p>";
    // Check connection
    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
            echo "<h3>error conecting to database</h3>";
    }
    
    // Performing insert query execution
    $sql = "INSERT INTO series (user_id, title, year, img, rating) 
    VALUES (  ".$_SESSION['id']." , '$title', '$year', '$poster', '$rating')";
    if(mysqli_query($conn, $sql)){
        echo "<h1>You succesfully added the show $title to your profile!</h1>
        <img src='$poster' >
        <h4> You will be redirectioned to the series search bar in 5 seconds... </h4>";
    } else{
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
            echo "<h3>error</h3>";
    }
    // Close connection
    mysqli_close($conn);
    unset($_SESSION['title']);
    unset($_SESSION['poster']);
    unset($_SESSION['year']);
    unset($_SESSION['plot']);
    unset($_SESSION['rating']);
}
?>