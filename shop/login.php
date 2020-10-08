<?php
    require_once "../Core/basecontroller.php";
    class LoginController extends baseController{

        public function handleGet(): string
        {
            if(!$this->getUser()->isLoggedIn()){
                return 'login';
            } else {
            header('Location:products.php');
            }
        }

        public function handlePost(): string
        {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = new User();
            $user->login($email,$password);
        }
    }

    baseController::run();