<?php

require_once("manager.php");

class winnerManager extends manager
{
    public function setWinnerOfDayDb($player_id)
    {
        $manager = new manager();
        $db = $manager->dbConnect();
        $req = $db->prepare('INSERT INTO winner (player_id) VALUES (:player_id)');
        $req->bindParam(':player_id',  $player_id);
        $req->execute();
    }
}