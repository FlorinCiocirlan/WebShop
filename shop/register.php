<?php
    require_once "../Core/basecontroller.php";
    require_once '../utils/utils.php';

    class RegisterController extends baseController
    {

        public function handleGet(): string
        {
            return 'register';
        }

        public function handlePost(): string
        {
            try{
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            registerUser($email,$password);
            $this->templateData['feedBack'] = "You successfully registered";
            $this->templateData['color'] = "green";
            return 'login';
        } catch (Exception $e){
                $this->templateData['feedBack'] = "You already have an account";
                $this->templateData['color'] = 'red';
                return 'login';
            }

        }
    }


    baseController::run();