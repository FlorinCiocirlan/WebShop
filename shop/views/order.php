<?php require "../layout/header.php"?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order History</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<?php if(isset($orders)){
        echo '<div class="container">';
        echo '<div class="row">';
    foreach ($orders as $order){
        echo '<div class="col-5 m-4 ">';
        echo '<ul class="list-group">';
        echo '<li class="list-group-item d-flex justify-content-between">'.
            '<span>Nr</span>'.
            '<strong>'.(int)($order[0]['order_id']-1).'</strong>'.
            '</li>';
        foreach ($order as $product){
            echo '<li class="list-group-item">';
            echo '<span class="m-1">'.$product['product_name'].'</span>';
            echo '<span class="m-1">'.$product['product_brand'].'</span>';
            echo '<span class="m-1">'.$product['product_category'].'</span>';
            echo '<span class="m-1">$'.$product['product_price'].'</span>';
            echo '<span class="m-1">'.$product['product_quantity'].'unit(s)'.'</span>';
            echo '</li>';
        }
        echo '<ul class="list-group"> <li class="list-group-item">Payment : '.$order[0]['order_payment'].'</li><li class="list-group-item"> Shipping : '.$order[0]['order_delivery'].'</li>'.
            '<li class="list-group-item"> Status : '.$order[0]['order_status'].'</li>'.
              '<form method="post" action="/shop/order.php">
                <button style="background-color: #E4C3AD; color: black;" class="btn btn-sm" type="submit" name="orderID" value="'.$order[0]['order_id'].'">Download Receipt</button>
                </form>';
            '</ul>';
        echo '</ul>';
        echo '</div>';
    }
        echo '</div>';
        echo '</div>';
}?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<?php require "../layout/footer.php"?>
</html>
