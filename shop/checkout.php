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
                $this->templateData['products'] = $cartDetails;

                return 'checkout';
            } else {
                header('Location : /shop/login.php ');
            }
        }

        public function handlePost(): string
        {
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

            $emailOrderDetails = getCartDetails($this->getUser()->getID());

            $emailUserInfoDetails['name'] = $_POST['name'];
            $emailUserInfoDetails['address'] = $_POST['adress'];
            $emailUserInfoDetails['phone'] = $_POST['phone'];
            $emailUserInfoDetails['delivery'] = $_POST['delivery'];
            $emailUserInfoDetails['payment'] = $_POST['payment'];

            $to = getUserById($this->getUser()->getID())['email'];

            $productCounter = 0;
            $totalCost = 0;
            $emailText = '<div style="width: 100%; height: auto; text-align: center; background-color: white; color: black;font-size: 16px; padding-top:15px; padding-bottom: 15px;">Hello '.$emailUserInfoDetails['name'].'. Thanks for your order placed on
            our webshop. We are currently reviewing it and will be shipped in time via the shipping method
            you have selected. Below you can find some useful information about your order.
            Best regards!'.'</div>';
            $mailHeader = '<div style="height: 50px; width: 100%; background-color:#0D1F2D;text-align: center; color: white;">Your order</div>';
            $content = '<table style="border-collapse: collapse;border: 1px solid darkgrey; table-layout: auto; width: 100%;">';
            foreach ($emailOrderDetails as $product) {
                $totalCost += (int)$product['quantity'] * (int)$product['product_price'];
                $productCounter += 1;
                $content .= '<tr style="text-align: center; color: black;">
                <td style="border: 1px solid darkgrey;">'.$productCounter.'</td>
                <td style="border: 1px solid darkgrey;">'.$product['product_name'].'</td>
                <td style="border: 1px solid darkgrey;">'.$product['product_category'].'</td>
                <td style="border: 1px solid darkgrey;">'.$product['product_brand'].'</td>
                <td style="border: 1px solid darkgrey;">'.$product['quantity'].'</td>
                <td style="border: 1px solid darkgrey;">'.$product['product_price'].' USD'.'</td>
                            </tr>';
            }
            $content .= '</table>';

            $userDetailsContent = '<div style="background-color: white;color: black;border: 1px solid darkgrey;font-size: 16px; padding-top:20px;">
                    <p>Name : '.$emailUserInfoDetails['name'].'</p>
                    <p>Address : '.$emailUserInfoDetails['address'].'</p>
                    <p>Phone : '.$emailUserInfoDetails['phone'].'</p>
                    <p>Shipping method : '.$emailUserInfoDetails['delivery'].'</p>
                    <p>Payment method : '.$emailUserInfoDetails['payment'].'</p>
                                    </div>';
            $costContent = '<div style="color: black">Total : '.$totalCost.' USD'.'</div>';
            $message = '<div style="background-color:white; font-size: 20px">'.$mailHeader.$emailText.$content.$costContent.$userDetailsContent.'</div>';

            sendEmail($to, 'Your order', $message);
            header("Location:products.php");
            exit();
        }
    }

    baseController::run();