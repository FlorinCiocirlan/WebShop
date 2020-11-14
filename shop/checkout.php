<?php
    require_once '../Core/basecontroller.php';
    require_once '../utils/utils.php';
    require_once '../Core/Mailer.php';

    class CheckoutController extends baseController
    {

        public function handleGet(): string
        {
            if ($this->getUser()->isLoggedIn()) {
                $userDetails = getUserById($this->getUser()->getID());
                $this->templateData['name'] = $userDetails['name'];
                $this->templateData['address'] = $userDetails['address'];
                $this->templateData['phone'] = $userDetails['phone'];

                $cartDetails = getCartDetails($this->getUser()->getID());
                if (count($cartDetails)>0) {
                    $this->templateData['products'] = $cartDetails;

                    return 'checkout';
                }else{
                    header('Location: products.php ');
                    exit();

                }

            } else {
                header('Location: login.php ');
                exit();
            }
        }

        public function handlePost(): string
        {
            $this->getUser()->checkIfLoggedIn();

            $orderDetails['userID'] = $this->getUser()->getID();
            $orderDetails['cartID'] = $_POST['cart_id'];
            $orderDetails['payment'] = $_POST['payment'];
            $orderDetails['delivery'] = $_POST['delivery'];
            $orderDetails['status'] = 'placed';
            if($_POST['payment'] === 'PayPal'){
                $orderDetails['status'] = 'paid';
            } else {
                $orderDetails['status'] = 'placed';
            }
            addOrder($orderDetails);
            setCartStatusById((int) $_POST['cart_id'], 'Completed');

            $emailOrderDetails = getCartDetails($this->getUser()->getID());

            $emailUserInfoDetails['name'] = $_POST['name'];
            $emailUserInfoDetails['address'] = $_POST['adress'];
            $emailUserInfoDetails['phone'] = $_POST['phone'];
            $emailUserInfoDetails['delivery'] = $_POST['delivery'];
            $emailUserInfoDetails['payment'] = $_POST['payment'];

            $to = getUserById($this->getUser()->getID())['email'];

            EmailService::sendConfirmationOrder($emailOrderDetails,$emailUserInfoDetails,$to);
            header("Location:products.php");
            exit();
        }
    }

    baseController::run();