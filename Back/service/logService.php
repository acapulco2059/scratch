<?php
require_once "../controller/userController.php";

$userController = new \controller\userController();
$logUser = $userController->userLog();