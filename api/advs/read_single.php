<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    require_once('../../config/Database.php');
    require_once('../../models/Advert.php');
    
    $database = new Database();
    $db = $database->connect();

    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        $id = $_GET['id'];
    }else{
        $id = 1;
    }

    $adv = new Advert($db);
    $result = $adv->readSingle($id);
    $adv_array = array();
    $adv_array['data'] = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    $adv_item = array(
    'advert_id' => $advert_id,
    'user_id' => $user_id,
    'advert_name' => $advert_name,
    'advert_desc' => $advert_desc,
    'advert_picture' => $advert_picture,
    'advert_type' => $advert_type,
    'advert_price' => $advert_price
    );
    array_push($adv_array['data'],$adv_item);
    echo json_encode($adv_array);
    }
?>