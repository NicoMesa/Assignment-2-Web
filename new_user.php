<?php
include_once("dbhelper.php");
$db = connectdb();

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = $_POST['email'];
    $user_name = $_POST['login'];
    $pass = $_POST['pass'];

    $new_user = msqli_query( $db_connect, "insert into users values ('$email', '$user_name', '$pass')");

    $id = mysqli_insert_id($db);

    header("Location: profile.html?id=  $id");

    closedb();
}
?>