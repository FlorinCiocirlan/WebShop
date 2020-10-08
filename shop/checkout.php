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
            return 'checkout';
            } else {
                header('Location : /shop/login.php ');
            }
        }

        public function handlePost(): string
        {
            // TODO: Implement handlePost() method.
        }
    }

    baseController::run();