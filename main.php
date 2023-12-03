<?php

require "Command.php";

while (true) {
    $line = readline("Entrez votre commande : ");
    if ($line === "list") {
        (new Command())->list();
    }
    echo "Vous avez saisi : $line\n";
}
