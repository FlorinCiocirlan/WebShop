<?php
require_once "../Core/basecontroller.php";
require_once "../utils/utils.php";

class CartController extends BaseController{

    public function handleGet(): string
    {
        session_start();
        $id = $_SESSION['userID'];
        $pdo = getConnection();
        $cart = getByID($pdo, $id);
        $this->templateData['cart']= $cart;
        return "cart";

    }

    public function handlePost(): string
    {
        // TODO: Implement handlePost() method.
    }
}

BaseController::run();