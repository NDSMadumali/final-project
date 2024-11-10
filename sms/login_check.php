
<?php
error_reporting(0);
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "denumaedu";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $pass = $_POST['password'];
    $sql = "SELECT * FROM user WHERE Username = '.$name.' AND Password = '.$pass.'";
    $result = mysqli_query($data, $sql);
    $row = mysqli_fetch_array($result);

    if ($row["Usertype"] == "student") {
        $_SESSION['username']=$name;
        header("Location:studenthome.php");
        exit();
    } elseif ($row["Usertype"] == "admin") {
        $_SESSION['username']=$name;
        header("Location:admintome.php");
        exit();
    } elseif ($row["Usertype"] == "teacher") {
        $_SESSION['username']=$name;
        header("Location:teacherhome.php");
        exit();
    } else {
        $message = "Username or password do not match";
        $_SESSION['loginMessage'] = $message;
        header("Location: login.php");
        exit();
    }
}
?>











<?php

error_reporting(0);
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "denumaedu";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM user WHERE Username = '$name' AND password = '$pass'";
    $result = mysqli_query($data, $sql);
    $row = mysqli_fetch_array($result);

    if ($row["usertype"] == "student") {
        header("Location: studenthome.php");
        exit();
    } elseif ($row["usertype"] == "admin") {
        header("Location: admintome.php");
        exit();
    } elseif ($row["usertype"] == "teacher") {
        header("Location: teacherhome.php");
        exit();
    } else {


        session_start();
        $message="Username or password do not match";
        $_SESSION['loginMessage']=$message;
        header("location:login.php");
    }
}

?>

<!--<?php

$host="localhost";
$user="root";
$password="";
$db="denumaedu";

$data=mysqli_connect($host,$user,$password,$db);

if($data===false){
   die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = $_POST['username'];
    $pass = $_POST['password'];

    $sql="select * from user where username='".$name."'    AND   password='".$pass."'";

    $result= mysqli_query($data,$sql);

    $row=mysqli_fetch_array($result);

    if($row["Usertype"]=="student")
    {
        header("location:studenthome.php");

    }

    elseif($row["Usertype"]=="admin")
    {
        header("location:adminthome.php");

    }

    elseif($row["Usertype"]=="teacher")
    {
        header("location:teacherhome.php");

    }

    else{
        echo"Usename or password do not match";
    }





}