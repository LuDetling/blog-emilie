<?php
require "DBConnect.php";

class ContactManager
{
    function findAll()
    {
        $dbconnect = new DBConnect();
        $sqlQuery = "SELECT * FROM contact";
        $contactsStatement = $dbconnect->getPDO()->query($sqlQuery);
        $contacts = $contactsStatement->fetchAll();
        return $contacts;
    }
}
$contacts = new ContactManager;

var_dump($contacts->findAll());
