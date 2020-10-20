<?php require "../layout/header.php"?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script type="text/javascript" src="../../Static/js/checkout.js" defer></script>
</head>

<div class="container mt-3">
    <div class="row">
    <div class="col-md-4 order-md-1 mb-4">
        <h4 class="mb-3">Billing address</h4>
    <form action="../shop/checkout.php" method="post">
        <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control form-control-sm" type="text" id="name" name="name" value="<?=$name?>" required>
            </div>
        <div class="form-group">
        <label for="address">Address</label>
        <input class="form-control form-control-sm" type="text" id="address" name="adress" value="<?=$address?>" required>
        </div>
        <div class="form-group">
        <label for="phone">Phone Number</label>
        <input class="form-control form-control-sm" type="text" id="phone" name="phone" value="<?=$phone?>" required>
        </div>
        <hr class="mb-4">
        <label for="delivery">Delivery</label>
        <select class="form-control form-control-sm" id="delivery" name="delivery" required>
            <option name="dhl">DHL Express (15.99 USD)</option>
            <option name="post">Local Post (5.99 USD)</option>
            <option name="pickUp">Pick up from location (Free)</option>
        </select>
        <hr class="mb-4">
        <label for="payment"> Payment</label>
        <div class="form-group">
        <select class="form-control form-control-sm" id="payment" name="payment" required>
            <option id="cash-payment" name="cash" selected>Cash</option>
            <option id="paypal-payment" name="paypal">PayPal</option>
        </select>
        </div>
        <hr class="mb-4">
        <input type="text" value="<?=$products[0]['cart_id'] ?>" name="cart_id" hidden>
        <div style="display: none" id="paypal-button-container">

        </div>
        <button id="continue-button" class="btn btn-sm btn-block" type="submit" style="background-color: #546A7B;color:white">Continue</button>
    </form>
    </div>
    <div class="col-md-8 order-md-2">
    <div class="productsContainer">
        <?php
            echo '<h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">'.count($products).'</span>
</h4>';
            $total = 0;
            echo '<ul class="list-group mb-3">';
         foreach ($products as $product){
             $total += (int)$product['quantity'] * (int)$product['product_price'];
             echo '
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <span><img src="../../images/'.$product['product_image'].'" alt="product image" height="50" width="50"></span>
                    <span>'.$product['product_name'].'</span>                  
                    <small class="text-muted">'.$product['product_category'].'</small>
                    <small class="text-muted">'.$product['product_brand'].'</small>
                     ';
                 echo (int)$product['quantity'] > 1 ? '<small class="text-muted">'.$product['quantity'].' units'.'</small>' : '<small class="text-muted">'.$product['quantity'].' unit'.'</small>';
                    echo '<span class="text-muted">'.'$'.$product['product_price'].'</span>';
                   echo '</li>';

         }
         echo '<li class="list-group-item d-flex justify-content-between">
                    <span>Total (USD)</span>
                    <strong id="amount"> '.'$'.$total.'</strong>
             </li>';
         echo '</ul>';

         echo '<div class="text-center text-success modal-container"></div>';
        ?>
    </div>
    </div>
        <script src="https://www.paypal.com/sdk/js?client-id=AXfgE1YbXNIaXGkEEV0RS6imDZlNQCA5Ain1g-Yv2fnS2Lf3WZBccNiBhE8qnwW67v7WhGH7gAv7n2_D&currency=EUR"></script>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<?php require "../layout/footer.php"?>
</html>
