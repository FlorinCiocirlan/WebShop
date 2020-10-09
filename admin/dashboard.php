<?php


require_once "../Core/basecontroller.php";


class DashboardController extends BaseController
{



    public function handleGet(): string
    {

        $this->getUser()->checkIfLoggedInAsAdmin();

        return "dashboard";

    }

    public function handlePost(): string
    {

    }

    public function setDeleted(int $id, int $value){
        $pdo = getConnection();
        $query = 'UPDATE users SET deleted=:value WHERE id=:id';
        $stmt = $pdo ->prepare($query);
        $stmt->execute(["value"=>$value,"id"=>$id]);

    }


    public function getAllUsersOnPage():array{

        $pdo = getConnection();
        $query = addPagingInfoToQuery('SELECT * FROM users');
        $stmt = $pdo ->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();

    }


}


BaseController::run();