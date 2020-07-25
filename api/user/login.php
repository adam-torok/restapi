<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-requested-With');

    require_once('../../config/Database.php');
    require_once('../../models/User.php');
    
    $database = new Database();
    $db = $database->connect();

    $user = new User($db);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        var_dump($_POST);
        $data = json_decode(file_get_contents("php://input"));
        $user->user_email = $data->user_email;
        $user->user_password = $data->user_password;
        $user->login($user);
    }
?>