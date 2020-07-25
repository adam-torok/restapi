<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('"Access-Control-Allow-Headers", "Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With"');
        
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){  
        var_dump($_FILES);
        var_dump($_POST['advert_picture']);
        if(is_uploaded_file($_FILES["advert_picture"]["tmp_name"])){
            $tmp_file = $_FILES['advert_picture']['tmp_name'];
            $img_name = $_FILES['advert_picture']['name'];
            $upload_dir = "../../storage/".$img_name;
            move_uploaded_file($tmp_file,$upload_dir);
        }else{
            echo "Nincs kép more";
        }
    }
?>  

