<?php
require "ContactManager.php";

class Command extends ContactManager
{
    function list()
    {
        $this->findAll();
    }

    function detail(int $id)
    {
        $this->findById($id);
    }

    function create(string $name, string $email, int $phone)
    {
        $this->createContact($name, $email, $phone);
    }
    function delete(int $id)
    {
        $this->deleteContact($id);
    }
    function help()
    {
        echo "
help : affiche cette aide

list : liste les contacts

detail [id] : affiche le contact

create [name], [email], [phone number] : crée un contact

delete [id] : supprime un contact

exit : quitte le programme
";
    }
}
