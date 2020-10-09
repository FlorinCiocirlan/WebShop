<?php
require_once '../vendor/autoload.php';


function createPDF($userName, $order)
{
    $pdfHeader = '<h1>Your order receipt</h1>';
    $content = '<table>
 <thead>
    <tr>
    <th>name</th>
    <th>brand</th>
    <th>category</th>
    <th>quantity</th>
    <th>price</th>
    </tr>
 </thead>
 <tbody>';
    $total = 0;
    foreach ($order as $product){
        $total += (int)$product['product_price'] * (int)$product['product_quantity'];
        $content.= '<tr>';
        $content.= '<td>'.$product['product_name'].'</td>';
        $content.= '<td>'.$product['product_brand'].'</td>';
        $content.= '<td>'.$product['product_category'].'</td>';
        $content.= '<td>'.$product['product_quantity'].' unit(s)</td>';
        $content.= '<td>$'.$product['product_price'].'</td>';
        $content.= '</tr>';
    }
    $content.= '</tbody>';
    $content .= '</table>';
    $content .= '<h4>Total : '.$total.'</h4>';
    $content .= '<h5>Payment method : '.$order[0]['order_payment'].'</h5>';
    $content .= '<h5>Shipping method : '.$order[0]['order_delivery'].'</h5>';
    $content .= '<h5>Status : '.$order[0]['order_status'].'</h5>';
    $pdfHeader.=$content;
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML($pdfHeader);
    $mpdf->Output('Order_'.$order[0]['order_id'].'.pdf','D');
    die();
}