<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-requested-With');

    require_once('../../config/Database.php');
    require_once('../../models/Advert.php');
    
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $console_type = $_GET["type"];
        $database = new Database();
        $db = $database->connect();
        $adv = new Advert($db);
        $result = $adv->read($console_type);
        $num = $result->rowCount();
        if($num>0){
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
                    'advert_price' => $advert_price
                );
                array_push($adv_array['data'],$adv_item);
            }
            echo json_encode($adv_array);
        }
    }
?>