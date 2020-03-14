<?php

require_once ("../model/playerManager.php");

class playerController
{
    public function getLastPlay()
    {
        $playManager = new playerManager();
        $lastPlay = $playManager->getLastPlayers();
        return $lastPlay;
    }

    public function addPlay($user_id, $state)
    {
        $playManager = new playerManager();
        $playManager->addPlayDb($user_id, $state);
    }

    public function userGameCount($user_id)
    {
        $playerManager = new playerManager();
        $count = $playerManager->userGameCountDb($user_id);
        return $count;
    }

}