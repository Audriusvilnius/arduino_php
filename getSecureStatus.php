<?php
/*
    This file is used to set the value of the sensor in the database.
    The value is sent via the GET method.
    Example:http://localhost/arduino_php/getSecureStatus.php/?value=2&id=3
*/ 
require  __DIR__ .'/Database.php';
$db = new Database();
$sensor = [
    1 => 'status',
    2 => 'doors',
    3 => 'windows',
    4 => 'indoor_gate',
    5 => 'outdoor_gate',
    6 => 'motion',
    7 => 'glass_break',
    8 => 'perimeter',
    9 => 'smoke'
];

if (isset($_GET['value']) && isset($_GET['id'])) {
    $value = $_GET['value'];
    $id = $_GET['id']; 
    if ($db->update($id, $value) === TRUE) {
        echo $sensor[$id].' sensor is set value =  '.$value;
    } else {
        echo 'Sensor or sensor value is not set';
    }
} else {
    echo 'Values is not set';
}