<?php
class Database{
    private $host = 'localhost';
    private $db_name = 'api';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function connect(){
        $this->conn = null;
        $this->conn = new PDO('mysql:host=localhost;dbname=api', $this->username, $this->password);
        return $this->conn;
    }   
}
