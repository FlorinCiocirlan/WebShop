<?php

function getConnection():PDO{
    $db_username="florin";
    $db_password="123456";
    $db_name="webshop";
    $db_server="localhost:3306";
    return new PDO("mysql:host=$db_server;dbname=$db_name",$db_username,$db_password);
}

function registerUser(string $email , string $password){
    $pdo = getConnection();
    $query = 'INSERT INTO users(email,password,isadmin) VALUES(:email,:password,0);';
    $stmt = $pdo ->prepare($query);
    $stmt->execute([':email'=>$email,':password'=>$password]);
}

