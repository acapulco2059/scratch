<?php
require_once "../controller/playerController.php";

$playerController = new \controller\playerController();
$listPlayer = $playerController->getLastPlay();
print_r(json_encode($listPlayer));