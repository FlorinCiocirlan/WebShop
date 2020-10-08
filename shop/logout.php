<?php
    require_once '../Core/basecontroller.php';
    class LogoutController extends baseController{

        public function handleGet(): string
        {
            if($this->getUser()->isLoggedIn()){
                $this->getUser()->logout();
            }
        }

        public function handlePost(): string
        {
            // TODO: Implement handlePost() method.
        }
    }

    baseController::run();
