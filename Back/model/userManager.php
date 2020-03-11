<?php


namespace model;


class userManager extends manager
{
    public function log($pseudo, $password)
    {
        $manager = new manager();
        $db = $manager->dbConnect();

        $req = $db->prepare('SELECT pseudo, password FROM user WHERE ');

    }

}