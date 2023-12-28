<?php
/**
 * This file is used to get the value of the sensor in the database.
 * The value is sent via the GET method.
 * Example:http://localhost/arduino_php/getSecureData.php
*/
require  __DIR__ .'/Database.php';
$db = new Database();
echo $db->getDate();