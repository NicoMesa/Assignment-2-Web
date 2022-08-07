
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
<?php 
include("headboiler.html");
include ("headerboiler.html"); ?>
<?php
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);
    include_once("verify_login.php");
    if(!isset($_SESSION['id'])){
        ?>
        
        <?php
        echo "<h2> Please sign in to your account! </h2>";
    }
    else{
?> 
    <main id='profile'>
        <div>
            <br><br><br> <br><br><br><br><br>
            <h1>Welcome back <?php echo $_SESSION['username']?></h1>
            <input type="text" placeholder="Filter by title">
        </div>
        <div>
            <h2>Your watchlist</h2>
            <?php
             $conn = mysqli_connect("localhost", "root", "", "assignment2");
             // Check connection
             if($conn === false){
                 die("ERROR: Could not connect. "
                     . mysqli_connect_error());
                     echo "<h3>error conecting</h3>";
             }
             
             // select movies that user added
             $sql_movies = "SELECT title, img, year, rating FROM movies WHERE user_id = " .$_SESSION['id']. " ";
             $movies = mysqli_query($conn, $sql_movies);
             
             if($movies){
                 echo "<h3>Your movies!</h3>";
                 $rows = mysqli_num_rows($movies);
                           
                if ($rows > 0){
                    echo 
                    "<div>
                    <table> 
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
                    echo "
                    </table>
                    </div>";
                    mysqli_free_result($movies);
                } else {
                    echo "<h3> 0 movies on your profile! </h3>";
                }
             }

                $sql_series = "SELECT title, img, year, rating FROM series WHERE user_id = " .$_SESSION['id']. " ";
                $series = mysqli_query($conn, $sql_series);
                if($series){
                    echo "<h3>Your Series!</h3>";
                    $rows = mysqli_num_rows($series);
                              
                   if ($rows > 0){
                       echo "
                       <div>
                       <table> 
                       <tr>
                           <th></th>
                           <th>Title</th> 
                           <th>Year</th>
                           <th>Rating</th>
                       </tr>";
                       while($i = mysqli_fetch_assoc($series)) {
                           echo 
                               "<tr>
                                   <td> <img src=' ".$i['img']." '> </td>
                                   <td>".$i['title']."</td> 
                                   <td>".$i['year']."</td>
                                   <td>".$i['rating']."</td>
                               </tr>";
                       }
                       echo "
                       </div>
                       </table>";
                       mysqli_free_result($series);
                   } else {
                       echo "<h3> 0 series on your profile! </h3>";
                       }
                    
            }
             // Close connection
             mysqli_close($conn);
            ?>
        </div>
    </main>
    <?php
    }
    ?>
    <footer>

    </footer>
</body>
</html>