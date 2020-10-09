<?php


require_once "../Core/basecontroller.php";


class ProductsController extends BaseController
{



    public function handleGet(): string
    {

        $this->getUser()->checkIfLoggedInAsAdmin();

        if (isset($_GET['delete']))
            $this->setDeleted($_GET['delete'],1);
        if (isset($_GET['undelete']))
            $this->setDeleted($_GET['undelete'],0);

        $products=$this->getAllProductsOnPage();

        foreach ($products as $key=>$product) {

            $productid=$product['id'];
            $products[$key]['deleted']=($product['deleted']==0)?"<a href=products.php?delete=$productid>Delete</a>":"<a href=products.php?undelete=$productid>Undelete</a>";

        }

        $this->templateData["products"]=$products;

        return "products";

    }

    public function handlePost(): string
    {

    }

    public function setDeleted(int $id, int $value):void{
        $pdo = getConnection();
        $query = 'UPDATE product SET deleted=:value WHERE id=:id';
        $stmt = $pdo ->prepare($query);
        $stmt->execute(["value"=>$value,"id"=>$id]);

    }


    public function getAllProductsOnPage():array{

        $pdo = getConnection();
        $query = addPagingInfoToQuery('SELECT * FROM product ORDER BY id DESC');
        $stmt = $pdo ->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();

    }


}


BaseController::run();