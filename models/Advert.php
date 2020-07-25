<?php
class Advert{
    private $conn;
    private $table = 'adverts';

    public $id;
    public $user_id;
    public $advert_name;
    public $advert_desc;

    public function __construct($db){
        $this->conn = $db;
    }

    public function read($console_type){
        $query = "SELECT * FROM adverts WHERE console_type = '$console_type'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readSingle($id){
        $query = "SELECT * FROM adverts WHERE advert_id = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readLatest(){
        $query = "SELECT * FROM adverts WHERE TIMESTAMPDIFF(MINUTE,advert_time,NOW())<1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function insert($adv){
        $query = "INSERT INTO adverts (user_id, advert_name, advert_desc, advert_type, advert_price, advert_picture, console_type) VALUES  ('$adv->user_id', '$adv->advert_name', '$adv->advert_desc', '$adv->advert_type', '$adv->advert_price', '$adv->advert_picture', '$adv->console_type')";
        echo $query;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }
}
?>