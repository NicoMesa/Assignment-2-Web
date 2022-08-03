<?php
    function connectdb(){
        
        $servername = "localhost";
        $username = "group39";
        $password = "Password";

        $db_connect = 
            mysqli_connect($servername, $username, $password);

        if (!$db_connect) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else{
            echo "<p> succesful </p>";
        }

    }
    function closedb(){

        mysqli_close($db_connect);

    }

?>