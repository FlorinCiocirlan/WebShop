<?php
    require_once '../Core/basecontroller.php';
    require_once '../utils/utils.php';
    class CheckoutController extends baseController{

        public function handleGet(): string
        {
            if($this->getUser()->isLoggedIn()){
            $userDetails = getUserById($this->getUser()->getID());
            $this->templateData['name'] = $userDetails['name'];
            $this->templateData['address'] = $userDetails['address'];
            $this->templateData['phone'] = $userDetails['phone'];

            $cartDetails = getCartDetails($this->getUser()->getID());
            $this->templateData['products'] = $cartDetails;
            return 'checkout';
            } else {
                header('Location : /shop/login.php ');
            }
        }

        public function handlePost(): string
        {
            $orderDetails['userID'] = $this->getUser()->getID();
            $orderDetails['cart_id'] = $_POST['cart_id'];
            $orderDetails['payment_method'] = $_POST['payment'];
            $orderDetails['delivery_method'] = $_POST['delivery'];



            $emailOrderDetails = getCartDetails($this->getUser()->getID());

            $emailUserInfoDetails['name'] = $_POST['name'];
            $emailUserInfoDetails['address'] = $_POST['address'];
            $emailUserInfoDetails['phone'] = $_POST['phone'];
            $emailUserInfoDetails['delivery'] = $_POST['delivery'];
            $emailUserInfoDetails['payment'] = $_POST['payment'];


        }
    }

    baseController::run();