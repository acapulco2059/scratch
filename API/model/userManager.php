<?php

require_once ("manager.php");

class userManager extends manager
{
    public function log($pseudo, $password)
    {
        $manager = new manager();
        $db = $manager->dbConnect();

        $req = $db->prepare('SELECT id, pseudo FROM user WHERE pseudo = :pseudo AND password = :password');
        $req->bindParam(':pseudo', $pseudo);
        $req->bindParam(':password', $password);
        $req->execute();
        $result = $req->fetch();
        return $result;
    }

    public function getUser($user_id)
    {
        $manager = new manager();
        $db = $manager->dbConnect();

        $req = $db->prepare('SELECT * FROM user WHERE id = :user_id');
        $req->bindParam(':user_id', $user_id);
        $req->execute();
        $result = $req->fetch();
        return $result;
    }

}