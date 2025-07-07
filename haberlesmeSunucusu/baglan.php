<?php

try {

    $host = 'localhost';
    $db   = 'xxx';
    $user = 'xxx';
    $pass = 'xxx';
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $baglanti = new PDO("mysql:host=".$host.";dbname=".$db, "root", "",  $options);

    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }


?>