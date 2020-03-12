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

}