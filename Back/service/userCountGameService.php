<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once "../controller/playerController.php";


$data = json_decode(file_get_contents("php://input"));
//var_dump($data); die;
if (isset($data->user_id) && isset($data->state)) {
    $playerController = new playerController();
    $addPlay = $playerController->userGameCount($data->user_id);
    $logs['success'] = true;
    $logs['count']= $addPlay;
}

print_r(json_encode($logs));

