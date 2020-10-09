<?php
require_once "../Core/basecontroller.php";
require_once "../utils/utils.php";

class CartController extends BaseController{

    public function handleGet(): string
    {
        if(isset($_SESSION['userID'])) {
            $id = $_SESSION['userID'];
            $pdo = getConnection();
            $cart = getByID($pdo, $id);
            $this->templateData['title'] = 'Cart';
            $this->templateData['cart'] = $cart;
            $this->templateData['sum'] = 0;
            foreach ($cart as $item){
                $this->templateData['sum'] += $item['price'] * $item['prodQty'];
            }
            return "cart";
        }

        $this->templateData['title'] = 'Cart';
        $this->templateData['cart'] = '';
        return "cart";
    }

    public function handlePost(): string
    {
        if ($_REQUEST['action'] === 'delete')
        {
            $pdo = getConnection();
            $cartID = (int)$_REQUEST['cartId'];
            $productId = (int)$_REQUEST['productId'];
            deleteCartItem($pdo, $productId, $cartID);
            exit();
        } elseif ($_REQUEST['action'] === 'add')
        {
            $pdo = getConnection();
        }

    }
}

BaseController::run();