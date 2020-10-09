<?php
    require_once "../Core/basecontroller.php";
    require_once '../utils/utils.php';

    class RegisterController extends baseController
    {

        public function handleGet(): string
        {
            if(!$this->getUser()->isLoggedIn()){
                return 'register';
            } else {
                header("Location:products.php");
            }
        }

        public function handlePost(): string
        {

            $email = $_POST['email'];
            $password = md5($_POST['password']);
            if(registerUser($email,$password)){
                $this->templateData['feedBack'] = "You successfully registered";
                $this->templateData['color'] = "green";
            } else {
                $this->templateData['feedBack'] = "You already have an account";
                $this->templateData['color'] = 'red';
            }
                return 'login';
        }
    }


    baseController::run();