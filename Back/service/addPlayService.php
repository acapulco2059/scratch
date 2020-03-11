<?php
require_once "../controller/playerController.php";


$playerController = new \controller\playerController();
$addPlay = $playerController->addPlay(json_decode($play));