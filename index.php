<?php

$servername = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'db_arduino';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset('utf8');
function data_read($conn)
{
    echo 'data_read function is called' . '<br>';
    $rez = $conn->query('SELECT * FROM tbl_temp');
    foreach ($rez as $row) {
        echo $row['temp_id'] . '. temperatur - ' . $row['temp_value'] . "<br>";
    }
    //$conn->close();
}


if (isset($_GET['temperature'])) {
    $temperature = $_GET['temperature']; // get temperature value from HTTP GET
    echo 'temperature is set to ' . $temperature . '<br>';
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO tbl_temp (temp_value) VALUES ($temperature)";

    if ($conn->query($sql) === TRUE) {
        echo
        'New record created successfully' . '<br>';
        data_read($conn);
    } else {
        echo "Error: " . $sql . " => " . $conn->error;
    }
} else {
    echo 'temperature is not set' . '<br>';
    data_read($conn);
}
?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body> -->
<?php
// $servername = '104.28.131.98';
// $dbname   = 'ivoorg_arduino';
// $username = 'ivoorg_naujas';
// $password = 'Elektra225';
// $charset = 'utf8mb4';
// $dsn = "mysql:host=$servername;dbname=$dbname;charset=$charset";
// $options = [
//     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//     PDO::ATTR_EMULATE_PREPARES   => false,
// ];
// echo 'PDO connection is called' . '<br>';
// $conn = new PDO($dsn, $username, $password, $options);
// data_read($conn);
?>
<!-- </body>

</html> -->