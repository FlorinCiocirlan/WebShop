<?php

function getConnection():PDO{
    $db_username="pogar";
    $db_password="bonfiscal706623";
    $db_name="webshop";
    $db_server="localhost:3306";
    return new PDO("mysql:host=$db_server;dbname=$db_name",$db_username,$db_password);
}

