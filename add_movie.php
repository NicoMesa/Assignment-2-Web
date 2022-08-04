<?php
//include('movies.php');
//header( "refresh:3;url=movies.php" );
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
if($_SERVER["REQUEST_METHOD"] == 'POST'){
    echo "<p>get method </p>";
    $conn = mysqli_connect("localhost", "root", "", "assignment2");
    echo "<p>after conection </p>";
    // Check connection
    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
            echo "<h3>error conecting</h3>";
    }
    
    // Performing insert query execution
    $sql = "INSERT INTO movies (user_id, title, img, year, plot, rating)
    VALUES ( " .$_SESSION['id']. ", '$title', '$poster', '$year', 'plot', '$rating' )";
    if(mysqli_query($conn, $sql)){
        echo "<h3>You succesfully added $title to your profile!</h3>";
    } else{
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
            echo "<h3>error</h3>";
    }
    // Close connection
    mysqli_close($conn);
    
}
?>