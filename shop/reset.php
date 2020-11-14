<?php
    require_once '../Core/basecontroller.php';
    require_once '../Core/encryption.php';
    require_once 'services/UserService.php';

    use App\Services\UserService\UserService;

    class ResetController extends BaseController
    {
        private UserService $userService;

        function __construct()
        {
            $this->userService = new UserService();
        }

        public function handleGet(): string
        {
            $token = explode('__', decrypt($_GET['token']));
            $email = $token[0];
            $time = $token[1];
            $user = $this->userService->fetchByEmail($email);
            if (!$this->userService->checkResetLink($user->getResetLink()) || !$this->userService->checkResetTime(
                    $time
                )) {
                $this->templateData['feedback'] = "You have a non valid reset link";
                $this->templateData['color'] = "text-danger";

                return 'requestReset';
            } else {
                $this->templateData['email'] = encrypt($email);

                return 'reset';
            }
        }

//


        public function handlePost(): string
        {
            $email = decrypt($_POST['email']);
            $password = md5($_POST['password']);
            $this->userService->updateByEmail(
                $email,
                ["password" => $password, "reset_link" => '', "updated" => time()]
            );
            $this->templateData['feedBack'] = "You have successfully reset your password";
            $this->templateData['color'] = "green";

            return 'login';
        }
    }


    BaseController::run();