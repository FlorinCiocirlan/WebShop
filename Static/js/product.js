
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
            let $totalPriceContainer = $table.find('.js-total-price');
            let newPrice = parseInt($totalPriceContainer.html()) - $row.data('price');
            $.ajax(
                {
                    type: "POST",
                    url: $deleteUrl,
                    data: $data,
                    success: function () {
                        $row.fadeOut();
                        console.log(parseInt($totalPriceContainer.html()));
                        console.log($row.data('price'));
                        console.log(newPrice);
                        $totalPriceContainer.html(newPrice);
                        console.log($data);
                    }
                })
        })

    let $product = $('.js-product');
    $product.find('.js-add-product').on('click', function (e) {
    e.preventDefault();

    let $deleteUrl = $(this).data('url');
    let $data = { 'action': $(this).data('action'),
    'productId': $(this).data('product-id')
}

    $.ajax(
{
    type: "POST",
    url: $deleteUrl,
    data: $data,
    success: function () {
    console.log($data);
}
})
})
})
