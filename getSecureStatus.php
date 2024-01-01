<?php
/**
 * This file is used to set the value of the sensor in the database.
 * The value is sent via the GET method.
 * Example:http://localhost/arduino_php/getSecureStatus.php/?value=2&id=3
 */

require __DIR__ . '/Database.php';
$db = new Database();
$sensor = [
    0 => 'status',
    1 => 'doors',
    2 => 'windows',
    3 => 'indoor_gate',
    4 => 'outdoor_gate',
    5 => 'motion',
    6 => 'glass_break',
    7 => 'perimeter',
    8 => 'smoke'
];

if (isset($_GET['value']) && isset($_GET['id'])) {
    $value = $_GET['value'];
    $id = $_GET['id'];
    if ($db->update($id, $value) === TRUE) {
        echo $sensor[$id] . ' sensor is set value =  ' . $value;
    } else {
        echo 'Sensor or sensors value is not set';
    }
} else {
    echo 'Values is not set';
}