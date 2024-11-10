<?php
session_start();

if(!isset($_SESSION['usename'])){


    header( "location:login.php");
}

?>


<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Teacher Dashboard</title>


</head>

<body>


<h1> Teacher home</h1>
<a href="logout.php"> Logout</a>





</body>




</html>