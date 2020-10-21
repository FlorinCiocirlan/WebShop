<?php


require_once "../Core/basecontroller.php";


class CategoriesController extends BaseController
{



    public function handleGet(): string
    {

        $this->getUser()->checkIfLoggedInAsAdmin();

        if (isset($_GET['delete']))
            $this->setDeleted($_GET['delete'],1);
        if (isset($_GET['undelete']))
            $this->setDeleted($_GET['undelete'],0);

        $categories=$this->getAllCategoriesOnPage();

        foreach ($categories as $key=>$category) {

            $categoryid=$category['id'];
            $categories[$key]['deleted']=($category['deleted']==0)?"<a href=categories.php?delete=$categoryid>Delete</a>":"<a href=categories.php?undelete=$categoryid>Undelete</a>";

        }

        $this->templateData["categories"]=$categories;

        return "categories";

    }

    public function handlePost(): string
    {

    }

    public function setDeleted(int $id, int $value):void{
        $pdo = getConnection();
        $query = 'UPDATE category SET deleted=:value WHERE id=:id';
        $stmt = $pdo ->prepare($query);
        $stmt->execute(["value"=>$value,"id"=>$id]);

    }


    public function getAllCategoriesOnPage():array{

        $pdo = getConnection();
        $query = addPagingInfoToQuery('SELECT * FROM category ORDER BY id DESC');
        $stmt = $pdo ->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();

    }


}


BaseController::run();