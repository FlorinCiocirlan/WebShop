<?php


require_once "../Core/basecontroller.php";


class UserController extends BaseController
{



    public function handleGet(): string
    {
        $this->getUser()->checkIfLoggedInAsAdmin();


        $this->templateData['name']="";
        $this->templateData['email']="";
        $this->templateData['address']="";
        $this->templateData['phone']="";
        $this->templateData['admin']=FALSE;

        if (!isset($_GET['id']))
            return "add_user";

        $user=$this->getUserById($_GET['id']);

        $this->templateData['id']=$user['id'];
        $this->templateData['name']=$user['name'];
        $this->templateData['email']=$user['email'];
        $this->templateData['address']=$user['address'];
        $this->templateData['phone']=$user['phone'];
        $this->templateData['admin']=($user['isadmin']==0)?FALSE:TRUE;

        return "add_user";




    }

    public function handlePost(): string
    {

        $this->getUser()->checkIfLoggedInAsAdmin();

        $name=$_POST['name'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
        $isadmin=(isset($_POST['admin']))?1:0;
        $pdo = getConnection();
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $query = "UPDATE users SET name=:name,email=:email,address=:address,phone=:phone,isadmin=:isadmin WHERE id=:id";
            $stmt = $pdo->prepare($query);
            $stmt->execute(["id" => $id, "name" => $name, "email" => $email, "address" => $address, "phone" => $phone, "isadmin" => $isadmin]);

        } else{
            $query = "INSERT INTO users SET name=:name,email=:email, password='', address=:address,phone=:phone,isadmin=:isadmin";
            var_dump($query);
            $stmt = $pdo->prepare($query);
            $stmt->execute(["name" => $name, "email" => $email, "address" => $address, "phone" => $phone, "isadmin" => $isadmin]);


        }

        header("Location: users.php");
        exit();

        return "";



    }




    public function getUserById(int $id):array{

        $pdo = getConnection();
        $query = 'SELECT * FROM users WHERE id=:id';
        $stmt = $pdo ->prepare($query);
        $stmt->execute(["id"=>$id]);
        return $stmt->fetch();

    }


}


BaseController::run();