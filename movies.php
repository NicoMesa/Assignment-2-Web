<?php
//session start to get global variables
session_start();
include("headboiler.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
</head>
<body>
    <div class="movies">
        <!-- this web is able to search and display the required movie -->
        <?php include ("headerboiler.html"); ?>
        <h2>Add here your favorite movies</h2>
        <!-- form to get values to search -->
        <form method="POST">
            <input type="text" placeholder="Search.." name="movie" id="search">
            <button type="submit">Search</button>
        </form>
        <?php
        ini_set('display_startup_errors', 1);
        ini_set('display_errors', 1);
        error_reporting(-1);
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                //unset varibles to store new values after the post reuqets
                unset($_SESSION['title']);
                unset($_SESSION['poster']);
                unset($_SESSION['year']);
                unset($_SESSION['plot']);
                unset($_SESSION['rating']);
                //obtain movie name from form
                $search = $_POST['movie'];
                //API reuqets to database containing movies. The return type will be a JSON containing information
                $request = "http://www.omdbapi.com/?t=$search&plot=full&type=movie&apikey=9ab90ab5&";
                //API reuqets to database containing movies. The return type will be a JSON containing information
                $array_movies = file_get_contents($request);
                //decode results as array to retrieve information
                $json = json_decode($array_movies, true);
                //Obtaining info about movies by searching the array
                $title = $json['Title'];
                $poster = $json['Poster'];
                $year = $json['Year'];
                $plot = $json['Plot'];
                $rating = $json['Ratings'][1]['Value'];
                //set session variables in order to handle them in a new page after a new post request
                $_SESSION['title'] = $title;
                $_SESSION['poster'] = $poster;
                $_SESSION['year'] = $year;
                $_SESSION['plot'] = $plot;
                $_SESSION['rating'] = $rating;
                //display info about movies
                echo "<img src='$poster'>
                <div class='displayInfo'>
                <h3>$title</h3>
                <h4>$year</h4>
                <p>$plot</p>
                <p>$rating</p>
                </div>";
                //if user is not signed in
                if(!isset($_SESSION['id'])){
                    echo "<h2> Please sign or create an account to add movies to your profile! </h2>";
                }
                //if user signed in, can add movie to profile
                else{
                echo "<form action='add_movie.php' method='post'>
                <button type='submit'> Add to my profile </button>
                </form>";
                }
            }
        ?>
    </div>
</body>
</html>