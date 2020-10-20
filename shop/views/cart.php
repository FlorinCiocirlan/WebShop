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
            <tr>
                <td>' . $item["name"]. '</td>
                <td>' . $item["prodQty"]. '</td>
                <td>' . $item["prodQty"] * $item["price"] . '$</td>
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
            <th><?= $this->templateData['sum'] ?>$</th>
            <td>&nbsp;</td>
        </tr>
        </tfoot>
    </table>
    <a href="checkout.php" class="btn" style="background-color: #E4C3AD; color: black;">Checkout</a>
</div>

<?php require "../layout/footer.php" ?>

<script>
    $(document).ready(function () {
        let $table = $('.js-table');
        $table.find('.js-delete-products').on('click', function (e) {
            e.preventDefault();
            $(this).addClass('text-danger');
            $(this).find('.fa')
                .removeClass('fa-trash')
                .addClass('fa-spinner')
                .addClass('fa-spin')

            let $deleteUrl = $(this).data('url');
            let $data = { 'action': $(this).data('action'),
                        'cartId': $(this).data('cart-id'),
                        'productId': $(this).data('product-id')
            }
            let $row = $(this).closest('tr');
            $.ajax(
                {
                type: "POST",
                url: $deleteUrl,
                data: $data,
                success: function () {
                    $row.fadeOut();
                    console.log($data);
                }
            })
        })
    })
</script>

</html>
