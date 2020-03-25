<?php

require_once('../controller/winnerController.php');

$winnerController = new winnerController();
$winnerController->setWinnerOfDay();
