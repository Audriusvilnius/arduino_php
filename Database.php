<?php
/**
 * This file is used to get the value of the sensor in the database.
 */
class Database
{
    private $servername = '127.0.0.1';
    private $username = 'root';
    private $password = '';
    private $dbname = 'home-iot';
    private $conn;
    private $sensor = [
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
    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }
    public function update($id, $value)
    {
        $query = 'UPDATE securities SET ' . $this->sensor[$id] . ' = ' . $value . ' WHERE id = ' . 1;
        echo '<br>' . $query . '<br>';
        $rez = $this->conn->query($query);

        if (!$rez) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        $this->conn->query($query);
        $this->conn->close();
        return true;
    }
    public function getDate()
    {
        $query = 'SELECT ' . '*' . ' FROM securities WHERE id = ' . 1;
        $rez = $this->conn->query($query);
        if (!$rez) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        $rez = $rez->fetch_assoc();
        return json_encode($rez);
    }
}