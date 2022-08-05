<?php
session_start();
//redirects to search web 
header( "refresh:5;url=series.php" );
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    //get data from global variables
    $title = $_SESSION['title'];
    $poster = $_SESSION['poster'];
    $year = $_SESSION['year'];
    $plot = $_SESSION['plot'];
    $rating = $_SESSION['rating'];
    //start connection to database
    $conn = mysqli_connect("localhost", "root", "", "assignment2");
    // check the connection
    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
            echo "<h3>error conecting to database</h3>";
    }
    // insert data to table series
    $sql = "INSERT INTO series (user_id, title, year, img, rating) 
    VALUES (  ".$_SESSION['id']." , '$title', '$year', '$poster', '$rating')";
    //succesfully added movies
    if(mysqli_query($conn, $sql)){
        //display the series info and redirect message
        echo "<h1>You succesfully added the show $title to your profile!</h1>
        <img src='$poster' >
        <h4> You will be redirectioned to the series search bar in 5 seconds... </h4>";
    } else{
        echo "not able to add series $sql. "
            . mysqli_error($conn);
            echo "<h3>ERROR</h3>";
    }
    // close the connection
    mysqli_close($conn);
    //unset global variables to perfomr new searches
    unset($_SESSION['title']);
    unset($_SESSION['poster']);
    unset($_SESSION['year']);
    unset($_SESSION['plot']);
    unset($_SESSION['rating']);
}
?>