<?php
require_once "../Core/basecontroller.php";
require_once "../utils/utils.php";

class CartController extends BaseController{

    private function setTemplateData($cart = [])
    {
        $this->templateData['title'] = 'Cart';
        $this->templateData['cart'] = $cart;
        $this->templateData['sum'] = 0;
        if (count($cart) !== 0) {
            foreach ($cart as $item) {
                $this->templateData['sum'] += $item['price'] * $item['prodQty'];
            }
        }
    }

    public function handleGet(): string
    {
        if(isset($_SESSION['userID'])) {
            $id = $_SESSION['userID'];
            $pdo = getConnection();
            $cart = getByID($pdo, $id);
            $this->setTemplateData($cart);
            return "cart";
        } elseif (isset($_COOKIE['cart'])){
            $cart = json_decode($_COOKIE['cart'], true);
            $this->setTemplateData($cart);
            return "cart";
        }

        $this->setTemplateData();
        return "cart";
    }

    public function handlePost(): string
    {
        var_dump(getCartByID());
        if ($_REQUEST['action'] === 'delete') {
            if(isset($_SESSION['userID'])) {
                $pdo = getConnection();
                $cartID = (int)getCartByID();
                $productId = (int)$_REQUEST['productId'];
                deleteCartItem($pdo, $productId, $cartID);
                exit();
            } elseif (isset($_COOKIE['cart'])){
                $productId = $_REQUEST['productId'];
                $cart = json_decode($_COOKIE['cart'], true);
                unset($cart[$productId]);
                setcookie('cart', json_encode($cart), time()+3600);

            }
        } elseif ($_REQUEST['action'] === 'add'){
            if(isset($_SESSION['userID'])) {
                $pdo = getConnection();
                $cartID = (int)getCartByID();
                $productId = (int)$_REQUEST['productId'];
                $quantity = (int)$_REQUEST['productId'] !== null ?: 1;
                addCartItem($pdo, $productId, $cartID, $quantity);
                exit();
            } elseif (isset($_COOKIE['cart'])){
                $pdo = getConnection();
                $productId = (int)$_REQUEST['productId'];
                $product = getProductById($pdo, $productId);
                $cart = json_decode($_COOKIE['cart'], true);
                $product['prodQty'] = isset($cart[$productId]['prodQty']) ? $cart[$productId]['prodQty'] +1 : 1;
                $cart[$productId] = $product;
                setcookie('cart', json_encode($cart), time()+3600);
            }
        }
    }
}

BaseController::run();