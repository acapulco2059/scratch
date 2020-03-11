<?php

namespace model;

class manager
{
    protected function dbConnect(){
        $db = new \PDO('mysql:host=localhost; db=scratch', 'root', 'root');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
}