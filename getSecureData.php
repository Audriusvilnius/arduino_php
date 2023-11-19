<?php
// http://localhost/arduino_php/getSecureData.php
require  __DIR__ .'/Database.php';
$db = new Database();
echo $db->getDate();