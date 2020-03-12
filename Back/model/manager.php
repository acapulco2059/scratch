<?php

class manager
{
    protected function dbConnect(){
        try {
            //connexion à la BDD
            $db = new PDO('mysql:host=localhost; dbname=scratch', 'root', 'root');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $db;
        }
        catch(Exception $e)
        {
            //erreur d'accès à ta bdd
            die($e->getMessage());
        }
    }
}