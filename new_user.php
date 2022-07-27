<?php
include_once("dbhelper.php");
$db = connectdb();

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = $_POST['email'];
    $user_name = $_POST['login'];
    $pass = $_POST['pass'];
    $sql = "INSERT INTO users VALUES ('$email', '$user_name', '$pass')";
    $new_user = msqli_query( $db_connect, $sql);

    $id = mysqli_insert_id($db);
    echo "New user inserted";
    header("Location: profile.html?id=  $id");

    closedb();
}
?>