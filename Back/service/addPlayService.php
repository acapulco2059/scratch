<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once "../controller/playerController.php";


$data = json_decode(file_get_contents("php://input"));
if(!empty($data->user_id) && !empty($data->state))
    {
        $playerController = new playerController();
        $addPlay = $playerController->addPlay($data->user_id, $data->state);
        $logs['succees'] = true;
        $logs['message'] = "Votre participation a bien été enregistré";
    }
    else
    {
        $logs['success'] = false;
        $logs['message'] = "Etat ou Pseudo non valide";
    }

    print_r(json_encode($logs));

