<?php

// Là ou la classe est déclarée (où son fichier se trouve)
namespace App\Service;

use \PDO;

class DatabaseInterface {

    public function getAllLegos() {
        $cnx = new PDO("mysql:host=tp-symfony-mysql;dbname=lego_store", "root", "root");
        $answer = $cnx->prepare("SELECT *");
        $res = $answer->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }
}