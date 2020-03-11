<?php

namespace controller;

use model\playerManager;

class playerController
{
    public function getLastPlay()
    {
        $playManager = new playerManager();
        $lastPlay = $playManager->getLastPlayers();
        return $lastPlay;
    }

    public function addPlay()
    {

    }

}