<?php

function conecta_bd() {
    $PDO = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", "root", null);
    return $PDO;
}