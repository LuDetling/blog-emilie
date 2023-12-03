<?php
require "ContactManager.php";

class Command extends ContactManager
{
    function list()
    {
        $this->findAll();
    }

    function detail()
    {
    }
}
