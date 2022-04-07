<?php


class User
{
    public $id;
    public $username;
    public $PfPic;
    public $email;
    public $password;
    public $role;
    public $memberSince;

    public function __construct()
    {
        settype($this->id, 'integer');
        settype($this->role, 'integer');
    }
}

?>