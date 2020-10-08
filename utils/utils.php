<?php

function getConnection():PDO{
    $db_username="florin";
    $db_password="123456";
    $db_name="webshop";
    $db_server="localhost:3306";
    return new PDO("mysql:host=$db_server;dbname=$db_name",$db_username,$db_password);
}

