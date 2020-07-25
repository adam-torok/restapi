<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-requested-With');
    require_once('../../models/Notification.php');
    require_once('../../config/Database.php');
    require_once('../../models/Advert.php');
    $database = new Database();
    $db = $database->connect();
    $noti = new Notification();
    $adv = new Advert($db);
    $result = $adv->readLatest();
    $num = $result->rowCount();
    if($num>0){
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $noti->notify = true;   
        $noti->id =  $row['advert_id'];
        $noti->desc =  $row['advert_desc'];
        $noti->title = $row['advert_name'];
        $noti->type = $row['advert_type'];
        $noti->image = $row['advert_picture'];
        $noti->url = "http://stackoverflow.com";
        }
    }else{
        $noti->notify = false;
        $noti->ico =  null;
        $noti->desc =  null;
        $noti->title = null;
        $noti->url = null;
        }

    $myJSON = json_encode($noti);
    echo $myJSON;

?>