<?php

namespace model;

class manager
{
    protected function dbConnect(){
        try {
            //connexion à la BDD
            $db = new \PDO('mysql:host=localhost; db=scratch', 'root', 'root');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        }
        catch(Exception $e)
        {
            //erreur d'accès à ta bdd
            die($e->getMessage());
        }
    }
}