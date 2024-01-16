<?php
require "ContactManager.php";

class Command
{
    public function list(): void
    {
        $contactManager = new ContactManager();
        $contactManager->findAll();
    }

    public function detail(int $id): void
    {
        $contactManager = new ContactManager();
        $contactManager->findById($id);
    }

    public function create(string $name, string $email, int $phone): void
    {
        $contactManager = new ContactManager();
        $contactManager->createContact($name, $email, $phone);
    }
    public  function delete(int $id): void
    {
        $contactManager = new ContactManager();
        $contactManager->deleteContact($id);
    }
    public  function help(): void
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
