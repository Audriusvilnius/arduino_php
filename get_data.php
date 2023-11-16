<?php
$servername = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'db_arduino';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//$conn->set_charset('utf8');

if (isset($_GET['temperature'])) {
    $temperature = $_GET['temperature']; // get temperature value from HTTP GET
    echo 'Temperature is set to ' . $temperature;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO tbl_temp (temp_value) VALUES ($temperature)";

    if ($conn->query($sql) === TRUE) {
        echo
        'New record created successfully';
        $conn->close();
    } else {
        echo "Error: " . $sql . " => " . $conn->error;
    }
} else {
    echo 'Temperature is not set';
}
