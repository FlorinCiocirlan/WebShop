<?php
    require_once "../Core/basecontroller.php";
    require_once '../Core/encryption.php';
    require_once '../Core/Mailer.php';
    require_once 'services/UserService.php';
    require_once 'services/EmailService.php';

    use App\Services\UserService\UserService;
    use App\Services\EmailService\EmailService;

    class RequestResetController extends BaseController
    {
        private UserService $userService;
        private EmailService $emailService;

        function __construct()
        {
            $this->userService = new UserService();
            $this->emailService = new EmailService();
        }

        public function handleGet(): string
        {
            return 'requestReset';
        }

        public function handlePost(): string
        {
            $userEmail = $_POST['email'];
            if ($this->userService->fetchByEmail($userEmail)) {
                $timestamp = time();
                $token = encrypt($userEmail.'__'.$timestamp);
                $resetLink = "http://localhost:8080/shop/reset.php?token=".$token;
                $updateValues = ["reset_link" => $resetLink, 'updated' => $timestamp];

                $this->userService->updateByEmail($userEmail, $updateValues);

                //TODO: refactor to use email service
                // $emailService-> sendResetPasswordLink($email , $resetlink)
                $this->emailService->sendResetPasswordLink($userEmail, $resetLink);

                return 'requestReset';
            } else {
                $this->templateData['feedBack'] = "You don't have an account";
                $this->templateData['color'] = "red";

                return 'login';
            }
        }

    }

    BaseController::run();