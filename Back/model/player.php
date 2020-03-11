<?php


namespace model;


class player
{

    private $id;
    private $user_id;
    private $play_date;
    private $state;

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
    public function userId() { return $this->user_id; }
    public function playDate() { return $this->play_date; }
    public function state() { return $this->state; }

    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setPlay_date($play_date)
    {
        $this->play_date = $play_date;
    }

    public function setState($state)
    {
        $this->state = $state;
    }
}