<?php


require_once "../Core/basecontroller.php";


class CategoryController extends BaseController
{
    public static $DEFAULT_IMAGE = "default.jpg";


    public function handleGet(): string
    {
        $this->getUser()->checkIfLoggedInAsAdmin();


        $this->templateData['name'] = "";
        $this->templateData['description'] = "";


        if (!isset($_GET['id']))
            return "add_category";

        $category = $this->getCategoryById($_GET['id']);

        $this->templateData['id'] = $category['id'];
        $this->templateData['name'] = $category['name'];
        $this->templateData['description'] = $category['description'];


        return "add_category";


    }

    public function handlePost(): string
    {
        $this->getUser()->checkIfLoggedInAsAdmin();

        $pdo = getConnection();
        $description = $_POST['description'];
        $name = $_POST['name'];

        if (isset($_POST['id'])) {
            $id=$_POST['id'];
            $query = "UPDATE category SET name=:name,description=:description WHERE id=:id";
            $stmt = $pdo->prepare($query);
            $stmt->execute(["id" => $id, "name" => $name, "description" => $description]);

        } else {
            $query = "INSERT INTO category SET name=:name,description=:description";
            $stmt = $pdo->prepare($query);
            $stmt->execute(["name" => $name, "description" => $description]);

        }

        header("Location: categories.php");
        exit();


        return "";


    }


    public function getCategoryById(int $id): array
    {

        $pdo = getConnection();
        $query = 'SELECT * FROM category WHERE id=:id';
        $stmt = $pdo->prepare($query);
        $stmt->execute(["id" => $id]);
        return $stmt->fetch();

    }


}


BaseController::run();