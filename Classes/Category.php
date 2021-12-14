<?php


class Category
{
    public $id;
    public $title;
    public $image;

    public function __construct()
    {
        settype($this->id, 'integer');
    }
}