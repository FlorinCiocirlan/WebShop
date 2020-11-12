<?php
    require_once "../Core/basecontroller.php";

    class ResetController extends BaseController{

        public function handleGet(): string
        {
            if(!$this->getUser()->isLoggedIn()){
            return 'reset';
        } else {
                header('Location: products.php');
                exit();
            }
        }

        public function handlePost(): string
        {
            // TODO: Implement handlePost() method.
        }
    }

    BaseController::run();