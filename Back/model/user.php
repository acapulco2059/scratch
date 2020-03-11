<?php

namespace model;

class user
{
    private $id;
    private $pseudo;
    private $password;
    private $firstname;
    private $lastname;

    public function hydrate(array $datas)
    {
        foreach ($datas as $key => $value)
        {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);
            // Si le setter correspondant existe.
            if (method_exists($this, $method))
            {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }

    public function id() { return $this->id; }
    public function pseudo() { return $this->pseudo; }
    public function password() { return $this->password; }
    public function firstname() { return $this->firstname; }
    public function lastname() { return $this->lastname; }

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