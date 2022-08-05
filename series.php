<?php
    session_start();
 
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
    <h2>Add here your favorite series and shows</h2>
    <form method="POST">
        <input type="text" placeholder="Search.." name="series" id="search">
        <button type="submit">Search</button>
    </form>
    <?php
       if($_SERVER["REQUEST_METHOD"] == "POST"){
        unset($_SESSION['title']);
        unset($_SESSION['poster']);
        unset($_SESSION['year']);
        unset($_SESSION['plot']);
        unset($_SESSION['rating']);

        $search = $_POST['series'];
        $request = "http://www.omdbapi.com/?t=$search&plot=full&type=series&apikey=9ab90ab5&";
        $array_movies = file_get_contents($request);
        $json = json_decode($array_movies, true);
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
        </div>
        ";
        if(!isset($_SESSION['id'])){
            echo "<h2> Please sign or create an account to add movies to your profile! </h2>";
        }
        else{
        echo "<form action='add_series.php' method='post'>
            <button type='submit'> Add to my profile </button>
            </form>";
        }
    }
   
    ?>
</body>
</html>