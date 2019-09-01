<?php

    $server =  "localhost";
    $dbname = "banco_dados";
    $user = "root";
    $pwd = "";

    try {
        $pdo = new PDO("mysql:host=$server;dbname=$dbname;charset=utf8",$user,$pwd);
    } catch (PDOException $erro) {
        echo $erro->getMessage();
        exit;
    }