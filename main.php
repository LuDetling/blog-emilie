<?php

require "DBConnect.php";

class Contact
{

    private $id;
    private $name;
    private $email;
    private $phone;
    function getId($id)
    {
        return $id;
    }
    function getName($name)
    {
        return $name;
    }

    function getEmail($email)
    {
        return $email;
    }
    function getPhone($phone)
    {
        return $phone;
    }

    function setName()
    {
    }
}
