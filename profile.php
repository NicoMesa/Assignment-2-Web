<?php
echo 'PHP version: ' . phpversion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
<?php include ("headerboiler.html"); ?>
<?php
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);
    include_once("verify_login.php");
?>
    
    <main>
        <div>
            <input type="text" placeholder="Filter by title">
        </div>
        <div>
            Movies
            <!--loop to show a table of title, year, plot -->
            <?php
             $conn = mysqli_connect("localhost", "root", "", "assignment2");
             echo "<p>after conection </p>";
             // Check connection
             if($conn === false){
                 die("ERROR: Could not connect. "
                     . mysqli_connect_error());
                     echo "<h3>error conecting</h3>";
             }
             
             // Performing insert query execution
             $sql = "SELECT title, img, year, plot, rating FROM movies WHERE user_id = " .$_SESSION['id']. " ";
             $movies = mysqli_query($conn, $sql);
             
             if($movies){
                 echo "<h3>Your movies!</h3>";
                 $rows = mysqli_num_rows($movies);
                           
                if ($rows > 0){
                    echo "<table> 
                    <tr>
                        <th></th>
                        <th>Title</th> 
                        <th>Year</th>
                        <th>Rating</th>
                    </tr>";
                    while($i = mysqli_fetch_assoc($movies)) {
                        echo 
                            "<tr>
                                <td> <img src=' ".$i['img']." '> </td>
                                <td>".$i['title']."</td> 
                                <td>".$i['year']."</td>
                                <td>".$i['rating']."</td>
                            </tr>";
                    }
                    echo "</table>";
                    mysqli_free_result($movies);
                } else {
                    echo "<h3> 0 movies on your profile! </h3>";
                    }
            }
             // Close connection
             mysqli_close($conn);
            ?>
        </div>
        <div>
            Shows
            <!--loop to show a table of title, year, plot -->

        </div>
    </main>
    <footer>

    </footer>
</body>
</html>