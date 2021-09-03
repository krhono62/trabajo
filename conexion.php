<?php

function conectar() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'id17105767_root';
    $DATABASE_PASS = '(cBu3BoPI3|W{KE#';
    $DATABASE_NAME = 'id17105767_donpizza';
    try {
        return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {        
    }
}

?>