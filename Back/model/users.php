<?php

namespace model;

class users
{
    private $id;
    private $pseudo;
    private $password;
    private $firstname;
    private $lastname;

    public function __construct($id ,$pseudo, $password)
    {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

}