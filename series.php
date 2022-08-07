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
    <title>Series</title>
</head>
<body>
    <div class="display">
        <!-- this web is able to search and display the required show -->
        <?php include ("headerboiler.html"); ?>
        <h2>Add here your favorite series and shows</h2>
        <!-- form to get values to search -->
        <form method="POST">
            <input type="text" placeholder="Search.." name="series" id="search">
            <button type="submit">Search</button>
        </form>
        <?php
           if($_SERVER["REQUEST_METHOD"] == "POST"){
            //obtain series name from form
            $search = $_POST['series'];
            //API reuqets to database containing shows. The return type will be a JSON containing information
            $request = "http://www.omdbapi.com/?s=$search&type=series&apikey=9ab90ab5&";
            $array_series = file_get_contents($request);
            //decode results as array to retrieve information
            $json = json_decode($array_series, true);
            //Obtaining info about shows by searching the array
            foreach ($json['Search'] as $i){
                //save variablesa accordingly
                $title = $i['Title'];
                $poster = $i['Poster'];
                $year = $i['Year'];
                $code = $i['imdbID'];
                //new request to extra information not available
                $extra_info = "http://www.omdbapi.com/?type=series&i=$code&plot=full&apikey=9ab90ab5&";
                $extra_array = file_get_contents($extra_info);
                $json_extra = json_decode($extra_array, true);
                $plot = $json_extra['Plot'];
                $rating = $json_extra['Ratings'][1]['Value'];
                //display info about series
                echo "
                <form action='add_series.php' method='get'>
                    <div class='containerInfo'>
                        <div class'poster'>
                        <br>
                        <img src='$poster'>
                        </div>
                        <div class='displayInfo'>
                        <h4 name='series'>$title</h4>
                        <h3 name='year'>$year</h3>
                        <p name='plot'>$plot</p>
                        <p name='rating'>$rating</p>
                        </div>
                    </div>";
                    //if user is not signed in
                    if(!isset($_SESSION['id'])){
                        echo "<h4> Please sign or create an account to add $title to your profile! </h4>
                        <hr>";
                    }
                    //if user signed in, can add serie to profile
                    else{
                    echo "
                    <button type='submit'> <a href='add_series.php?title=$title&poster=$poster&year=$year&rating=$rating'> Add $title to my profile </a> </button>
                    <br>
                    </form>";
                    }
            }
        }
        ?>
    </div>
</body>
</html>