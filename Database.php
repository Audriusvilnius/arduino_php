<?php

class Database
{
    private $servername = '127.0.0.1';
    private $username = 'root';
    private $password = '';
    private $dbname = 'home-iot';
    private $conn;
    private $sensor = [
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
    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }
    public function update($id, $value)
    {
        $query = 'UPDATE securities SET ' . $this->sensor[$id] . ' = ' . $value . ' WHERE id = ' . 1;
        echo '<br>' . $query.'<br>';
        $rez = $this->conn->query($query);
 
        if (!$rez) {
            die("Connection failed: " . $this->conn->connect_error);
        }
            $this->conn->query($query);
            $this->conn->close();
            return true;
        }
    public function getDate(){
        $query = 'SELECT ' .'*'. ' FROM securities WHERE id = ' . 1;
        $rez = $this->conn->query($query);
        if (!$rez) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        $rez = $rez->fetch_assoc();
        return json_encode($rez);
    }
}