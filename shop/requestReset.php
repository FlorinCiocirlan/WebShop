<?php
    require_once "../Core/basecontroller.php";
    require_once '../Core/encryption.php';
    require_once '../Core/Mailer.php';

    class RequestResetController extends BaseController
    {
        private UserService $service = new UserService();

        public function handleGet(): string
        {
            if (!$this->getUser()->isLoggedIn()) {
                return 'requestReset';
            } else {
                header('Location: products.php');
                exit();
            }
        }

        public function handlePost(): string
        {
            $userEmail = $_POST['email'];
            if ($this->service->fetchByEmail($userEmail)) {
                $timestamp = time();
                $token = encrypt($userEmail.'__'.$timestamp);
                $resetLink = "http://localhost:8080/shop/reset.php?token=".$token;
                $updateValues = ["reset_link" => $resetLink, 'update' => $timestamp];

                $this->service->updateByEmail($userEmail,$updateValues);

                //TODO: refactor to use email service
                // $emailService-> sendResetPasswordLink($email , $resetlink)

                return 'requestReset';
            } else {
                $this->templateData['feedBack'] = "You don't have an account";
                $this->templateData['color'] = "red";

                return 'login';
            }
        }
    }

    BaseController::run();