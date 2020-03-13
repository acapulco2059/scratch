<?php

require_once ("manager.php");

class playerManager extends manager
{
    public function getLastPlayers()
    {
        $manager = new manager();
        $db = $manager->dbConnect();
        $req = $db->prepare('SELECT user_id, DATE_FORMAT(play_date, \'%d/%m/%Y\') as play_date, state, pseudo FROM player INNER JOIN user ON player.user_id = user.id ORDER BY user.id DESC LIMIT 5');
        $req->execute();
        $result = $req->fetchall();
        return $result;
    }

    public function addPlayDb($user_id, $state)
    {
        $state = (int) $state;
        $manager = new manager();
        $db = $manager->dbConnect();
        $req = $db->prepare('INSERT INTO player (user_id, state, play_date) VALUES (:user_id, :state, NOW())');
        $req->bindParam(':user_id', $user_id);
        $req->bindParam(':state', $state);
        $req->execute();
    }

    public function userGameCountDb($user_id)
    {
        $manager = new manager();
        $db = $manager->dbConnect();
        $req = $db->prepare('SELECT COUNT(*) FROM player WHERE user_id = :user_id AND DATE(NOW())');
        $req->bindParam(':user_id', $user_id);
        $result = $req->execute();
        return $result;
    }
}