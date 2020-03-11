<?php


namespace model;


class playerManager extends manager
{
    public function getLastPlayers()
    {
        $manager = new manager();
        $db = $manager->dbConnect();

        $req = $db->prepare('SELECT id, user_id, DATE_FORMAT(play_date, \'%d /%m /%Y\') as play_date, state FROM player ODER BY DESC LIMIT 5');
        $req = $db->execute();
        $result = $req->fetchAll();
        return $result;
    }

    public function addPlay($user_id, $state)
    {
        $manager = new manager();
        $db = $manager->dbConnect();

        $req = $db->prepare('INSERT INTO player (user_id, state, play_date) VALUES (?, ?, NOW())');
        $req = $db->execute(array($user_id, $state));
    }



}