<?php


namespace model;


class players
{

    private $id;
    private $user_id;
    private $play_date;
    private $state;

    public function __construct($id, $user_id, $play_date, $state)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->play_date = $play_date;
        $this->state = $state;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getPlayDate()
    {
        return $this->play_date;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setPlayDate($play_date)
    {
        $this->play_date = $play_date;
    }

    public function setState($state)
    {
        $this->state = $state;
    }
}