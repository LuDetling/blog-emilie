<?php
require "DBConnect.php";
require "Contact.php";

class ContactManager extends Contact
{
    function findAll()
    {
        $dbconnect = new DBConnect();
        $sqlQuery = "SELECT * FROM contact";
        $contactsStatement = $dbconnect->getPDO()->query($sqlQuery);
        $contacts = [];

        while ($row = $contactsStatement->fetch()) {
            $contact = new Contact();
            $contact->setId($row["id"]);
            $contact->setName($row["name"]);
            $contact->setEmail($row["email"]);
            $contact->setPhone($row["phone"]);

            echo $contact;
            $contacts[] = $contact;
        }
        return $contacts;
    }

    function findById(int $id)
    {
        $dbconnect = new DBConnect();
        $sqlQuery = 'SELECT * FROM contact WHERE id = :id';
        $contactStatement = $dbconnect->getPDO()->prepare($sqlQuery);
        $contactStatement->execute(["id" => $id]);
        while ($row = $contactStatement->fetch()) {
            $contact = new Contact();
            $contact->setId($row["id"]);
            $contact->setName($row["name"]);
            $contact->setEmail($row["email"]);
            $contact->setPhone($row["phone"]);

            echo $contact;
        }
        return $contact;
    }
}
