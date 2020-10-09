<?php


require_once "../Core/basecontroller.php";


class ProductController extends BaseController
{



    public function handleGet(): string
    {
        $this->getUser()->checkIfLoggedInAsAdmin();


        $this->templateData['name']="";
        $this->templateData['description']="";
        $this->templateData['category_name']="";
        $this->templateData['brand']="";
        $this->templateData['stock']="";
        $this->templateData['price']="";
        $this->templateData['image']="";


        if (!isset($_GET['id']))
            return "add_product";

        $product=$this->getProductById($_GET['id']);

        $this->templateData['id']=$product['id'];
        $this->templateData['name']=$product['name'];
        $this->templateData['description']=$product['description'];
        $this->templateData['category_name']=$product['category_name'];
        $this->templateData['brand']=$product['brand'];
        $this->templateData['stock']=$product['stock'];
        $this->templateData['price']=$product['price'];
        $this->templateData['image']=$product['image'];

        $this->templateData['categories']=$this->getAllCategories();

        return "add_product";




    }

    public function handlePost(): string
    {
        $this->getUser()->checkIfLoggedInAsAdmin();


        $pdo = getConnection();
        $description=$_POST['description'];
        $name=$_POST['name'];
        $category_name=$_POST['category'];
        $brand=$_POST['brand'];
        $stock=$_POST['stock'];
        $price=$_POST['price'];


        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $image_not_present=!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name']);
            if (!$image_not_present){
                $target_dir = "../images/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                $image=basename($_FILES["image"]["name"]);
                $query = "UPDATE product SET name=:name,description=:description,category_name=:category_name,brand=:brand,stock=:stock,price=:price,image=:image WHERE id=:id";
                //var_dump($query);
                $stmt = $pdo ->prepare($query);
                $stmt->execute(["id"=>$id,"name"=>$name,"description"=>$description,"category_name"=>$category_name,"brand"=>$brand,"stock"=>$stock,"price"=>$price,"image"=>$image]);


            } else{

                $query = "UPDATE product SET name=:name,description=:description,category_name=:category_name,brand=:brand,stock=:stock,price=:price WHERE id=:id";
                //var_dump($query);
                $stmt = $pdo ->prepare($query);
                $stmt->execute(["id"=>$id,"name"=>$name,"description"=>$description,"category_name"=>$category_name,"brand"=>$brand,"stock"=>$stock,"price"=>$price]);


            }

            header("Location: products.php");
            exit();





        }



        return "";



    }


    public function getAllCategories(){
        $pdo = getConnection();
        $query = 'SELECT * FROM category WHERE deleted=0';
        $stmt = $pdo ->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    public function getProductById(int $id):array{

        $pdo = getConnection();
        $query = 'SELECT * FROM product WHERE id=:id';
        $stmt = $pdo ->prepare($query);
        $stmt->execute(["id"=>$id]);
        return $stmt->fetch();

    }


}


BaseController::run();