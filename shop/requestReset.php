<?php
    require_once "../Core/basecontroller.php";
    require_once '../Core/encryption.php';
    require_once '../Core/Mailer.php';

    class RequestResetController extends BaseController{

        public function handleGet(): string
        {
            if(!$this->getUser()->isLoggedIn()){
            return 'requestReset';
        } else {
                header('Location: products.php');
                exit();
            }
        }

        public function handlePost(): string
        {
            $userEmail = $_POST['email'];
            if(getUserByEmail($userEmail)){
                $creation_date = time();
                $encryptedEmail = encrypt($userEmail);
                $encryptedTimestamp = encrypt($creation_date);
                $resetLink = "http://localhost:8080/shop/reset.php?email=".$encryptedEmail."&time=".$encryptedTimestamp;
                addResetLink($userEmail,$resetLink);
                addResetTimestamp($userEmail,$creation_date);

                $emailTemplate = "<div>
<h3>Here is your password reset link</h3>

<p>".$resetLink."</p>
</div>";

                sendEmail($userEmail, 'Your password reset link', $emailTemplate);
                $this->templateData['feedback'] = "We have sent you an email with the reset link.";
                return 'requestReset';
            } else {
                $this->templateData['feedBack'] = "You don't have an account";
                $this->templateData['color'] = "red";
                return 'login';
            }
        }
    }

    BaseController::run();