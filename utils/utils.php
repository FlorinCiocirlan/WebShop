<?php

function getConnection():PDO{
    $db_username="root";
    $db_password="";
    $db_name="webshop";
    $db_server="localhost:3308";
    return new PDO("mysql:host=$db_server;dbname=$db_name",$db_username,$db_password);
}

