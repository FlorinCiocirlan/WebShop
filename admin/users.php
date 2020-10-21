<?php


require_once "../Core/basecontroller.php";


    class UsersController extends BaseController
{



    public function handleGet(): string
    {

        $this->getUser()->checkIfLoggedInAsAdmin();

        if (isset($_GET['delete']))
            $this->setDeleted($_GET['delete'],1);
        if (isset($_GET['undelete']))
            $this->setDeleted($_GET['undelete'],0);

        $users=$this->getAllUsersOnPage();

        foreach ($users as $key=>$user) {

            $userid=$user['id'];
            $users[$key]['deleted']=($user['deleted']==0)?"<a href=users.php?delete=$userid>Delete</a>":"<a href=users.php?undelete=$userid>Undelete</a>";
            $users[$key]['isadmin']=($user['isadmin']==0)?"NO":"YES";
        }

        $this->templateData["users"]=$users;

        return "users";

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