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
        // TODO: Implement handlePost() method.
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
    }

BaseController::run();