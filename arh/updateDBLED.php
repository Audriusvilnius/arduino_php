<?php
require 'database.php';

if (!empty($_POST)) {
    $Stat = $_POST['Stat'];
    $temperature = 2;
    // insert data
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO tbl_temp (temp_value) VALUES ($temperature)";

    //$sql = "UPDATE statusled SET Stat = ? WHERE ID = 0";
    $q = $pdo->prepare($sql);
    foreach ($q as $row) {
        echo $row['temp_id'] . '. temperatur - ' . $row['temp_value'] . "<br>";
    }
    $q->execute(array($Stat));
    Database::disconnect();
    header("Location: Main.php");
}
