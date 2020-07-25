<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-requested-With');

    require_once('../../config/Database.php');
    require_once('../../models/Advert.php');
    
    $database = new Database();
    $db = $database->connect();

    $adv = new Advert($db);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data = json_decode(file_get_contents("php://input"));
        $adv->user_id = $data->user_id;
        $adv->advert_name = $data->advert_name;
        $adv->advert_desc = $data->advert_desc; 
        $adv->advert_type = $data->advert_type;   
        $adv->advert_price = $data->advert_price;   
        $adv->advert_picture = $data->advert_picture; 
        $adv->console_type = $data->console_type;   
        $adv->insert($adv);
    }
?>