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