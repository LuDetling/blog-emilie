<?php

require "Command.php";

while (true) {
    $line = readline("Entrez votre commande (help, list, detail, create, delete, exit) : ");
    $id = null;
    $name = null;
    $email = null;
    $phone = null;

    if (preg_match('/^detail (?P<id>\d+)/', $line, $matches)) {
        $id = $matches['id'];
        (new Command())->detail($id);
    } else if (preg_match('/^create (?P<name>\w+), ([_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})), (?P<phone>\d+)/', $line, $matches)) {
        $name = $matches['name'];
        $email = $matches[2];
        $phone = $matches['phone'];
        (new Command())->create($name, $email, $phone);
    } else if (preg_match('/^delete (?P<id>\d+)/', $line, $matches)) {
        $id = $matches['id'];
        (new Command())->delete($id);
    } else if ($line === "list") {
        (new Command())->list();
    } else if ($line === "help") {
        (new Command())->help();
    } else if ($line === "exit") {
        return;
    } else {
        echo "
        Commande invalide ! Tapez help pour connaître les commandes fonctionnelles.\n";
    }
    echo "Vous avez saisi : $line\n";
}
