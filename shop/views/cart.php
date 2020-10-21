<html lang="en">
<?php require "../layout/header.php"?>

<div class="container" style="margin-top: 15px">

    <table class="table table-striped js-table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php
            if($cart !==''){
            foreach ($cart as $item){
                $dataCartId = isset($item['cartId']) ? 'data-cart-id = '. $item['cartId'] : '';
                $dataProdId = isset($item['productId']) ? 'data-product-id = '. $item['productId'] : '';

        echo '
            <tr data-price="'.$item["prodQty"] * $item["price"].'">
                <td>' . $item["name"]. '</td>
                <td>' . $item["prodQty"]. '</td>
                <td class="price">' . $item["prodQty"] * $item["price"] . '$</td>
                <td>
                    <a href="#" class="js-delete-products"
                        data-url = "cart.php"
                        '.$dataCartId.'
                        '.$dataProdId.'
                        data-action = "delete"
                    >
                        <span class="fa fa-trash"></span>
                    </a>
                </td>
            </tr>';
            }}?>
        </tbody>
        <tfoot>
        <tr>
            <td>&nbsp;</td>
            <th>Total</th>
            <th class="js-total-price"><?= $this->templateData['sum'] ?></th>
            <td>&nbsp;</td>
        </tr>
        </tfoot>
    </table>
    <a href="checkout.php" class="btn" style="background-color: #E4C3AD; color: black;">Checkout</a>
</div>

<?php require "../layout/footer.php" ?>

<script>
    <?php require "../Static/js/product.js"?>

</script>

</html>
