<?php
session_start();
session_destroy();
echo "<script>alert('You logout of your account!');</script>";
header( "refresh:0;url=index.php" );
?>
