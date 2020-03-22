<?php

require_once('../model/playerManager.php');
require_once('../model/winnerManager.php');

class winnerController
{
    public function setWinnerOfDay()
    {
        $winnerManager = new winnerManager();

        $winner = $this->chooseWinner();

        $winnerManager->setWinnerOfDayDb($winner);
    }

    private function chooseWinner()
    {
        $playerManager = new playerManager();

        $getWinners = $playerManager->getWinner();
        $selectWinner = array_rand($getWinners, 1);
        $winner = $getWinners[$selectWinner];
        $winner = (int) $winner['id'];

        return $winner;
    }

}