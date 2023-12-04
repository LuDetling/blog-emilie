<?php
class DBConnect
{
    function getPDO()
    {
        require 'config.php';

        try {
            $db = new PDO(
                'mysql:host=localhost;dbname=projet_5;charset=utf8',
                $log,
                $pwd,
            );
            return $db;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
