<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once "../controller/userController.php";


$data = json_decode(file_get_contents("php://input"));
if(!empty($data->pseudo) && !empty($data->password))
    {
        $userController = new userController();
        $logUser = $userController->userLog($data->pseudo, $data->password);
    }

