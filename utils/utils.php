<?php
session_start();

function getConnection():PDO{
    $db_username="florin";
    $db_password="123456";
    $db_name="webshop";
    $db_server="localhost:3306";
    return new PDO("mysql:host=$db_server;dbname=$db_name",$db_username,$db_password);
}

function registerUser(string $email , string $password){
    if(getUserByEmail($email)){
        return false;
    }
    $pdo = getConnection();
    $query = 'INSERT INTO users(email,password,isadmin) VALUES(:email,:password,0);';
    $stmt = $pdo ->prepare($query);
    return $stmt->execute([':email'=>$email,':password'=>$password]);

}


function addPagingInfoToQuery(string $query):string{
    $elementsInPage=isset($_GET['epp'])?$_GET['epp']:10;
    $pageNumber=isset($_GET['pg'])?$_GET['pg']:1;
    $offset=($pageNumber-1)*$elementsInPage;

    return $query." LIMIT $offset, $elementsInPage";

}


function paging(string $table):void{

    $originalLink=$_SERVER['REQUEST_URI'];


    $elementsInPage=isset($_GET['epp'])?$_GET['epp']:10;
    if (!isset($_GET['pg'])){
        //echo("asd");
        $pageNumber = 1;
        if (strpos($originalLink,".php?"))
            $originalLink=$originalLink."&pg=1";
        else
            $originalLink=$originalLink."?pg=1";

    } else
        $pageNumber=$_GET['pg'];


    $connection=getConnection();
    $query="SELECT COUNT(*) as n FROM $table";
    $statement=$connection->prepare($query);
    $statement->execute();
    $numberOfElements=$statement->fetch()["n"];
    //$numberOfElements=125;
    $numberOfPages=(int)(($numberOfElements+$elementsInPage-1) / $elementsInPage);

    echo"<div style='text-align: center'>";
    for ($i=1;$i<=$numberOfPages;$i++){
        if ($i==$pageNumber)
            echo("<span>$i </span>");
        else{
            $link=preg_replace("/pg=\d+/","pg=$i",$originalLink);
            //echo $originalLink;

            echo("<span> <a href='".$link."'><u>$i</u></a> </span>");



        }
    }
    echo"</div>";

}

function getUserByEmail(string $email){
    $pdo = getConnection();
    $query = 'SELECT * FROM users WHERE email=:email';
    $stmt = $pdo ->prepare($query);
    $stmt->execute([':email'=>$email]);
    return $stmt->fetch();
}

function getUserById(int $id){
    $pdo = getConnection();
    $query = 'SELECT * FROM users WHERE id=:id';
    $stmt = $pdo ->prepare($query);
    $stmt->execute([':id'=>$id]);
    return $stmt->fetch();
}

function getCartDetails(int $userID){
    $pdo = getConnection();
    $query = 'SELECT cart.status as cart_status, cart.id as cart_id, cp.product_id, cp.quantity, p.name as product_name, c.name as product_category, p.description as product_description, p.brand as product_brand, p.price as product_price, p.image as product_image FROM cart JOIN cart_product cp on cart.id = cp.cart_id JOIN product p on cp.product_id = p.id JOIN category c on p.category_id = c.id WHERE user_id=:userID;';
    $stmt = $pdo->prepare($query);
    $stmt->execute([':userID'=>$userID]);
    return $stmt->fetchAll();
}

function addOrder(array $orderDetails){
    $pdo = getConnection();
    $query = "INSERT INTO `order`(cart_id, user_id, payment_method, delivery_method, status) VALUES(:cartID, :userID, :payment, :delivery, :status)";
    $stmt = $pdo->prepare($query);
    return $stmt->execute([
        ':cartID'=>$orderDetails['cartID'],
        ':userID'=>$orderDetails['userID'],
        ':payment'=>$orderDetails['payment'],
        ':delivery'=>$orderDetails['delivery'],
        ':status'=>$orderDetails['status']
    ]);
}


