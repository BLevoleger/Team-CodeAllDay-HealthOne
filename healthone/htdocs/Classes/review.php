<?php


class review
{
    public $id;
    public $name;
    public $description;
    public $stars;
    public $time;
    public $product_id;

    public function __construct()
    {
        settype($this->id, 'integer');
        settype($this->stars, 'integer');
        settype($this->product_id, 'integer');
    }
}