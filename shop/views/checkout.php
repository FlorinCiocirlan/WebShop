<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="content">
    <div class="row">
    <div class="col-4 border rounded">
    <form action="../shop/checkout.php" method="post">
        <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" type="text" id="name" name="name" value="<?=$name?>" required>
            </div>
        <div class="form-group">
        <label for="address">Address</label>
        <input class="form-control" type="text" id="address" name="adress" value="<?=$address?>" required>
        </div>
        <div class="form-group">
        <label for="phone">Phone Number</label>
        <input class="form-control" type="text" id="phone" name="phone" value="<?=$phone?>" required>
        </div>
        <label for="delivery">Delivery Method</label>
        <select class="form-control" id="delivery" name="delivery" required>
            <option name="dhl">DHL Express (15.99 USD)</option>
            <option name="post">Local Post (5.99 USD)</option>
            <option name="pickUp">Pick up from location (Free)</option>
        </select>
        <label for="payment"> Payment Method</label>
        <div class="form-group">
        <select class="form-control" id="payment" name="payment" required>
            <option selected name="cash">Cash</option>
        </select>
        </div>
        <input type="text" value="<?=$products[0]['cart_id'] ?>" name="cart_id" hidden>
        <button class="btn btn-sm btn-info " type="submit">Place Order</button>
    </form>
    </div>
    <div class="col-sm">
    <div class="productsContainer">
        <?php
//            var_dump($products);
//            die();
            $total = 0;
         foreach ($products as $product){
             $total += (int)$product['quantity'] * (int)$product['product_price'];
             echo '<div class="productDiv">
                    <span><img src="../../images/'.$product['product_image'].'" alt="product image" height="50" width="50"></span>
                    <span>'.$product['product_name'].'</span>
                    <span>'.$product['product_category'].'</span>
                    <span>'.$product['product_brand'].'</span>
                    <span>'.$product['quantity'].'</span>
                    <span>'.$product['product_price'].'</span>
                    <p>'.$product['product_description'].'</p>
            </div>';
         }
         echo '<div class="totalCost">'.$total.' USD'.'</div>'
        ?>
    </div>
    </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
