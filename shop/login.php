<?php
    require_once "../Core/basecontroller.php";
    class LoginController extends baseController{

        public function handleGet(): string
        {
           return 'login';
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