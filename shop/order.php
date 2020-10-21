<?php
    require_once '../Core/basecontroller.php';
    require_once '../utils/utils.php';
    require  '../Core/PDFCreator.php';
    class OrderController extends baseController {

        public function handleGet(): string
        {
            $this->getUser()->checkIfLoggedIn();
            //var_dump($this->getUser());
            $orders = getOrderByUserId($this->getUser()->getID());

            $ordersId = getOrdersIdByUserId($this->getUser()->getID());
            $orderProds = array();
            foreach ($ordersId as $id){
                foreach ($orders as $order){
                    if ((int)$order['order_id'] === (int)$id['id']){
                       $orderProds[$order['order_id']][]=$order;
                    }
                }
            }
           $this->templateData['orders'] = $orderProds;

            return 'order';
        }

        public function handlePost(): string
        {
            $this->getUser()->checkIfLoggedIn();

            $order = getOrderById((int)$_POST['orderID']);
            createPDF(getUserById($this->getUser()->getID())['name'],$order);
        }
    }


    baseController::run();