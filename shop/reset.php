<?php
    require_once '../Core/basecontroller.php';
    require_once '../Core/encryption.php';

    class ResetController extends BaseController{

        public function handleGet(): string
        {
            $encryptedEmail = $_GET['email'];
            $plainEmail = decrypt($encryptedEmail);
            $encryptedTime = $_GET['time'];
            $plainTime = decrypt($encryptedTime);
            $user = getUserByEmail($plainEmail);
            if((time() - $plainTime) > 3600 || $user['reset_link'] !== "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"){
                $this->templateData['feedback'] = "You have a non valid reset link";
                $this->templateData['color'] = "text-danger";
                return 'requestReset';
            } else {
                return 'reset';
            }
        }
//


        public function handlePost(): string
        {
            // TODO: Implement handlePost() method.
        }
    }


    BaseController::run();