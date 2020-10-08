<?php
require_once "../Core/basecontroller.php";


class ProductController extends BaseController
{


    public function handleGet(): string
    {
        $product = $this->getProduct();

      $random = $this->getRandomProduct($product);

        $this->templateData['prod'] =['prod'=>$product, 'rand'=> $random ];

        return "product";

    }


    public function handlePost(): string
    {
        // TODO: Implement handlePost() method.
    }

    public function getProduct():array
    {
        $connection = getConnection();

        $query = addPagingInfoToQuery("SELECT * FROM product WHERE id=".$_GET['id']  );
        //echo ($query);
        $statement = $connection->prepare($query);
        $statement->execute();
        $resultset = $statement->fetch();
        return $resultset;
    }
    public function getRandomProduct($prod):array
    {
        $connection = getConnection();

        $query = addPagingInfoToQuery("SELECT * FROM product WHERE category_name='".$prod['category_name'].
"' ORDER BY RAND() 
   LIMIT 3;"  );

        $statement = $connection->prepare($query);
        $statement->execute();
        $resultset = $statement->fetchAll();
        return $resultset;
    }
}

BaseController::run();
