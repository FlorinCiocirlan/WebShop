<?php
require_once "../Core/basecontroller.php";


class ProductsController extends BaseController
{


    public function handleGet(): string
    {
        $products = $this->getAllProducts();
        $this->templateData['prod'] = [ "prod"=>$products];

        return "products";
    }


    public function handlePost(): string
    {

        $products = $this->searchProducts($_POST['searchValue']);
//        var_dump($products);
        $this->templateData['prod'] = [ "prod"=>$products];

        return "products";
    }

    public function getAllProducts():array
    {
        $connection = getConnection();
        $query = addPagingInfoToQuery("SELECT * FROM product WHERE deleted=0");
        //echo ($query);
        $statement = $connection->prepare($query);
        $statement->execute();
        $resultset = $statement->fetchAll();
        return $resultset;
    }
    public function searchProducts($searchValue):array
    {
        $connection = getConnection();
        $query = addPagingInfoToQuery("SELECT * FROM product WHERE deleted=0 AND name LIKE '%".$searchValue."%'
         OR brand LIKE '%".$searchValue."%' OR category_name LIKE '%".$searchValue."%';");
//        echo ($query);
        $statement = $connection->prepare($query);
        $statement->execute();
        $resultset = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $resultset;
    }
    }

BaseController::run();