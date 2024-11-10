<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "denumaedu";

$data = mysqli_connect($host, $user, $password, $db);

if ($data===false) {
    die("Connection failed ");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $room_name = $_POST['room_name'];
    $capacity = $_POST['capacity'];
    $facility = $_POST['facility'];

    $stmt = $data->prepare("INSERT INTO rooms (room_name, capacity, facility) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $room_name, $capacity, $facility);
    $stmt->execute();
    $stmt->close();

    header("Location:roomdetail.php");
    exit();
}
?>