<?php
require_once "../Core/basecontroller.php";


class ProductsController extends BaseController
{


    public function handleGet(): string
    {

        $as ='ceva';
        $prod = "Acesta este products conroler";
         $ds = $this->getAllProducts();
        $this->templateData['prod'] = ['as'=> $as, "prod"=>$ds];



        return "products";

    }


    public function handlePost(): string
    {
        // TODO: Implement handlePost() method.
    }

    public function getAllProducts():array
    {
        $connection = getConnection();
        $query = addPagingInfoToQuery("SELECT * FROM product");
        //echo ($query);
        $statement = $connection->prepare($query);
        $statement->execute();
        $resultset = $statement->fetchAll();
        return $resultset;
    }
    }

BaseController::run();