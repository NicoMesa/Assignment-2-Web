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
    <h2>Add here your favorite movies</h2>
    <form method="POST">
        <input type="text" placeholder="Search.." name="movie" id="search">
        <button type="submit">Search</button>
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $search = $_POST['movie'];
            $request = "http://www.omdbapi.com/?t=$search&plot=full&type=movie&apikey=9ab90ab5&";
            $array_movies = file_get_contents($request);
            $json = json_decode($array_movies, true);
            /*
            foreach($json as $i){
                echo $i;
            }
            */
            print_r ($json);
            $title = $json['Title'];
            $poster = $json['Poster'];
            $year = $json['Year'];
            $plot = $json['Plot'];
            $rating = $json['Ratings'][1]['Value'];
            
            echo "<img src='$poster'>
            <div>
            <h3>$title</h3>
            <h4>$year</h4>
            <p>$plot</p>
            <p>$rating</p>
            <button type='button'> Add to my profile </button>
            ";
    
        }
  
    ?>

   
    
</body>
</html>