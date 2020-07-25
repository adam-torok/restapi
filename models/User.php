<?php
class Advert{
    private $conn;
    private $table = 'users';

    public $user_id;
    public $user_name;
    public $user_name;
    public $user_email;
    public $user_password;

    public function __construct($db){
        $this->conn = $db;
    }

    public function login($user){
        $query = 'SELECT * FROM $this->table WHERE user_name = $user->user_name AND user_password = $user->user_password';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function registrate($user){
        $query = 'SELECT * FROM $this->table WHERE user_name = $user->user_name AND user_password = $user->user_password';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>