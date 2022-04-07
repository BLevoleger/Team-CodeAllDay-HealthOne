<?php


class Time
{
    public $id;
    public $hour;
    public $name;

    public function __construct()
    {
        settype($this->id, 'integer');
        settype($this->dayId, 'integer');
    }
}