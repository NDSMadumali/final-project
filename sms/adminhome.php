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
    <title> Admin Dashboard</title>


</head>

<body>

<header class=" header"> 
    
<a href="">Admin Dashboard</a>
</header>


<h1> Admin home</h1>
  <a href="logout.php"> Logout</a>

</body>

</html>