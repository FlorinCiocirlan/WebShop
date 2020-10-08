<html lang="en">
<?php require "../layout/header.php"?>

<div class="container" style="margin-top: 15px">

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach ($cart as $item){
        echo '
            <tr>
                <td>' . $item["name"]. '</td>
                <td>' . $item["price"]. '$</td>
                <td>' . $item["prodQty"]. '</td>
                <td>
                    &nbsp;
                </td>
            </tr>';
            } ?>
        </tbody>
        <tfoot>
        <tr>
            <td>&nbsp;</td>
            <th>Total</th>
            <th>Total sum</th>
            <td>&nbsp;</td>
        </tr>
        </tfoot>
    </table>

</div>

<?php require "../layout/footer.php" ?>

</html>
