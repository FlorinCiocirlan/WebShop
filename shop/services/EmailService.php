<?php
    namespace App\Services\EmailService;
    require_once(__DIR__.'../../../Core/Mailer.php');

    class EmailService
    {

        public function sendResetPasswordLink(string $email, string $link)
        {
            sendEmail($email, 'Your reset link', $link);
        }

        public function sendConfirmationOrder(array $OrderDetails, array $UserInfoDetails, string $email)
        {
            $mailHeader = '<div style="height: 50px; width: 100%; background-color:#0D1F2D;text-align: center; color: white;">Your order</div>';
            $content = '<table style="border-collapse: collapse;border: 1px solid darkgrey; table-layout: auto; width: 100%;">';
            $productCounter = 0;
            $totalCost = 0;
            $emailText = '<div style="width: 100%; height: auto; text-align: center; background-color: white; color: black;font-size: 16px; padding-top:15px; padding-bottom: 15px;">Hello '.$UserInfoDetails['name'].'. Thanks for your order placed on
            our webshop. We are currently reviewing it and will be shipped in time via the shipping method
            you have selected. Below you can find some useful information about your order.
            Best regards!'.'</div>';
            foreach ($OrderDetails as $product) {
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
                    <p>Name : '.$UserInfoDetails['name'].'</p>
                    <p>Address : '.$UserInfoDetails['address'].'</p>
                    <p>Phone : '.$UserInfoDetails['phone'].'</p>
                    <p>Shipping method : '.$UserInfoDetails['delivery'].'</p>
                    <p>Payment method : '.$UserInfoDetails['payment'].'</p>
                                    </div>';
            $costContent = '<div style="color: black">Total : '.$totalCost.' USD'.'</div>';
            $message = '<div style="background-color:white; font-size: 20px">'.$mailHeader.$emailText.$content.$costContent.$userDetailsContent.'</div>';

            sendEmail($email, "Your order summary", $message);
        }
    }