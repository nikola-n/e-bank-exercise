<?php
try{
    $host = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "banking";
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, $options);
}catch(PDOException $e){
    echo $e->getMessage();
    die();
}
