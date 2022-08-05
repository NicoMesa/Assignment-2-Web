<?php
    session_start();
    echo $_SESSION['title'];
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
    <?php include ("headerboiler.html"); ?>
    <h2>Add here your favorite movies</h2>
    <form method="POST">
        <input type="text" placeholder="Search.." name="movie" id="search">
        <button type="submit">Search</button>
    </form>
    <?php
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);
    $flag=false;
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            unset($_SESSION['title']);
            unset($_SESSION['poster']);
            unset($_SESSION['year']);
            unset($_SESSION['plot']);
            unset($_SESSION['rating']);
            $search = $_POST['movie'];
            $request = "http://www.omdbapi.com/?t=$search&plot=full&type=movie&apikey=9ab90ab5&";
            $array_movies = file_get_contents($request);
            $json = json_decode($array_movies, true);
            print_r ($json);
            $title = $json['Title'];
            $poster = $json['Poster'];
            $year = $json['Year'];
            $plot = $json['Plot'];
            $rating = $json['Ratings'][1]['Value'];

            $_SESSION['title'] = $title;
            $_SESSION['poster'] = $poster;
            $_SESSION['year'] = $year;
            $_SESSION['plot'] = $plot;
            $_SESSION['rating'] = $rating;

            echo "<img src='$poster'>
            <div>
            <h3>$title</h3>
            <h4>$year</h4>
            <p>$plot</p>
            <p>$rating</p>
            </div>";

            echo "<form action='add_movie.php' method='post'>
            <button type='submit'> Add to my profile </button>
            </form>";
        }
       
           
    ?>

   
    
</body>
</html>