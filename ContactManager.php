<?php
require "DBConnect.php";
require "Contact.php";

class ContactManager
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
        if ($row = $contactStatement->fetch()) {
            $contact = new Contact();
            $contact->setId($row["id"]);
            $contact->setName($row["name"]);
            $contact->setEmail($row["email"]);
            $contact->setPhone($row["phone"]);

            echo $contact;
        }
        if (empty($contact)) {
            echo "Aucun contact a l'id: " . $id . "
            ";
            return;
        };
        return $contact;
    }

    function createContact(string $name, string $email, int $phone)
    {
        $dbconnect = new DBConnect();
        $pdo = $dbconnect->getPDO();
        $sqlQuery = "INSERT INTO contact (name, email, phone) VALUES (?,?,?)";
        $contactsSatement = $pdo->prepare($sqlQuery);
        $contactsSatement->execute([$name, $email, $phone]);
        $id = $pdo->lastInsertId();
        var_dump($id);
        echo "
        " . $name . " a été ajouté aux contacts\n";
        return;
    }

    function deleteContact(int $id)
    {
        $db = new DBConnect();
        $sql = "DELETE FROM contact WHERE id = :id";
        $name = $this->findById($id)->getName();
        $db->getPDO()->exec($sql);
        echo "
        L'id " . $id . " qui avait le nom de " . $name . " a été supprimé
        ";
        return;
    }
}
