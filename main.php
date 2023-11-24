<?php
class DBConnect
{
    function getPDO()
    {
        try {
            $db = new PDO(
                'mysql:host=localhost;dbname=projet_5;charset=utf8',
                'root',
                'root'
            );
            return $db;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}

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
