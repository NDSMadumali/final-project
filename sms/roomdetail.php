







<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title> Admin Dashboard-roomdetails</title>
     <link rel="stylesheet" type="text/css" href="adminhome2.css">

     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>

<body>
<header class="header"> 
    <a href="">Teacher Dashboard</a>
    <div class="logout">
        <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>
</header>

<aside>
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Student</a></li>
        <li><a href="#">Teacher</a></li>
        <li><a href="#">Course</a></li>
        <li><a href="#">Class Schedule</a></li>
        <li><a href="#">Notification</a></li>
    </ul>
</aside>

<div class="content">
    <div class="room-details-form">
        <h2>Room Details</h2>
        <form action="roomdata.php" method="POST" class="row">
            <!-- Room Name Field -->
            <div class="form-group col-md-4">
                <label for="roomName">Room Name:</label>
                <input type="text" class="form-control" id="roomName" name="room_name" placeholder="Enter Room Name" required>
            </div>

            <!-- Capacity Range Field -->
            <div class="form-group col-md-4">
                <label for="capacityRange">Capacity Range:</label>
                <select class="form-control" id="capacityRange" name="capacity"   required>
                <option value="" disabled selected>Select no.of students</option> 
                    <option value="1-50">1-50</option>
                    <option value="51-100">51-100</option>
                </select>
            </div>

            <!-- Facilities Field -->
            <div class="form-group col-md-4">
                <label for="facilities">Facilities:</label>
                <select class="form-control" id="facilities" name="facility" required>
                <option value="" disabled selected>Select facilities</option> 
                    <option value="Smartboard with Sound">Smartboard with Sound</option>
                    <option value="Whiteboard with Projector and Sound">Whiteboard with Projector and Sound</option>
                    <option value="Whiteboard">Whiteboard</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-success" >Add Room</button>
                <button type="button" class="btn btn-primary">View Data</button>
            </div>
        </form>

        <hr>
        <h3>Room Data</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Room ID</th>
                    <th>Room Name</th>
                    <th>Capacity</th>
                    <th>Facilities</th>
                </tr>
            </thead> 
            <tbody>

            <?php
                    // Database connection
                    $host = "localhost";
                    $user = "root";
                    $password = "";
                    $db = "denumaedu";
                    $data = new mysqli($host, $user, $password, $db);

                    if ($data->connect_error) {
                        die("Connection failed: " . $data->connect_error);
                    }

                    $result = $data->query("SELECT * FROM rooms");
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['room_id']}</td>
                                <td>{$row['room_name']}</td>
                                <td>{$row['capacity']}</td>
                                <td>{$row['facility']}</td>
                              </tr>";
                    }
                    $data->close();
                ?>


                 
            </tbody>
        </table>
    </div>

    <div class="make-reservation-form"  style="width: 80%; margin: 0 auto;">
    <h3>Make Reservation</h3>
    <form id="reservationForm" method="POST" action="check_availability.php" class="row">
        <!-- Date -->
        <div class="form-group col-md-6">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>

        <!-- Time Range -->
        <div class="form-group col-md-6">
            <label for="timeRange">Time Range:</label>
            <select class="form-control" id="timeRange" name="time_range" required>
            <option value="" disabled selected>Select Time Range</option> 
                <option value="8-10">8AM-10AM</option>
                <option value="10-12">10AM-12AM</option>
                <option value="12-14">12AM-14PM</option>
                <option value="14-16">14PM-16PM</option>
                <option value="16-18">16PM-18PM</option>
                <option value="18-20">18PM-1=20PM</option>
                <option value="20-22">20PM-22PM</option>
                 
                <!-- Add other time slots -->
            </select>
        </div>

        <!-- Capacity -->
        <div class="form-group col-md-6">
            <label for="capacity">Capacity:</label>
            <select class="form-control" id="capacity" name="capacity" required>
            <option value="" disabled selected>Select no.of students</option> 
                <option value="1-50">1-50</option>
                <option value="51-100">51-100</option>
            </select>
        </div>

        <!-- Facilities -->
        <div class="form-group col-md-6">
            <label for="facility">Facility:</label>
            <select class="form-control" id="facility" name="facility" required>
            <option value="" disabled selected>Select facilities</option> 
                <option value="Smartboard with Sound">Smartboard with Sound</option>
                <option value="Whiteboard with Projector and Sound">Whiteboard with Projector and Sound</option>
                    <option value="Whiteboard">Whiteboard</option>
                <!-- Add more options as needed -->
            </select>
        </div>

        <div class="form-group col-md-6">

        <button type="button" class="btn btn-primary" onclick="checkAvailability()">Check Availability</button>
        </div>
    </form>

    <div id="availableRooms"></div> <!-- Room availability results -->
</div>











</div>





</body>

</html>