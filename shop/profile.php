<?php
require_once "../Core/basecontroller.php";


class ProfileController extends BaseController
{


    public function handleGet(): string
    {

        $product = $this->getUser()->getAllUserInfo();

        $this->templateData['prod'] =['prod'=>$product];

        return "profile";

    }


    public function handlePost(): string
    {

        $this->doUpdate($_POST);
        $product = $this->getUser()->getAllUserInfo();

        $this->templateData['prod'] =['prod'=>$product];
        return "profile";
    }

    public function doUpdate($info)
    {
        $connection=getConnection();
        $query="UPDATE users SET name=:name, address=:address, phone=:phone WHERE id=:id";
        $statement=$connection->prepare($query);
        $data=["name"=>$info['name'], "address"=>$info['address'], 'phone' => $info['phone'], 'id'=> $this->getUser()->getID()];
        $statement->execute($data);

    }

}

BaseController::run();

